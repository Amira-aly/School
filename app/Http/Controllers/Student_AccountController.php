<?php
namespace App\Http\Controllers;
use App\Models\Fee;
use App\Models\Fee_invoice;
use App\Models\level;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Student_AccountController extends Controller
{
    public function index()
    {
        $fee_invoices = Fee_invoice::all();
        $levels = level::all();
        return view('DashboardAdmin.fee-student.index',compact('fee_invoices','levels'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
                $Fee_invoices = new Fee_invoice();
                $Fee_invoices->invoice_date = date('Y-m-d');
                $Fee_invoices->student_id = $request->student_id;
                $Fee_invoices->level_id = $request->level_id;
                $Fee_invoices->classroom_id = $request->classroom_id;
                $Fee_invoices->fee_id = $request->fee_id;
                $Fee_invoices->amount = $request->amount;
                $Fee_invoices->description = $request->description;
                $Fee_invoices->save();

                $StudentAccount = new Student_Account();
                $StudentAccount->date = date('Y-m-d');
                $StudentAccount->type = 'invoice';
                $StudentAccount->fee_invoice_id = $Fee_invoices->id;
                $StudentAccount->student_id = $request->student_id;
                $StudentAccount->level_id = $request->level_id;
                $StudentAccount->classroom_id = $request->classroom_id;
                $StudentAccount->debit = $request->amount;
                $StudentAccount->credit = 0.00;
                $StudentAccount->description = $request->description;
                $StudentAccount->save();
                DB::commit();
                toastr()->success(trans('messages.success'));
                return redirect()->route('fees_student.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        $fees = Fee::where('classroom_id',$student->classroom_id)->get();
        return view('DashboardAdmin.fee-student.create',compact('student','fees'));
    }

    public function edit($id)
    {
        $fee_invoices = Fee_invoice::findorfail($id);
        $fees = Fee::where('classroom_id',$fee_invoices->classroom_id)->get();
        return view('DashboardAdmin.fee-student.edit',compact('fee_invoices','fees'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $Fees = Fee_invoice::findorfail($request->id);
            $Fees->fee_id = $request->fee_id;
            $Fees->amount = $request->amount;
            $Fees->description = $request->description;
            $Fees->save();

            $StudentAccount = Student_Account::where('fee_invoice_id',$request->id)->first();
            $StudentAccount->Debit = $request->amount;
            $StudentAccount->description = $request->description;
            $StudentAccount->save();
            DB::commit();

            toastr()->success(trans('messages.Update'));
            return redirect()->route('fees_student.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Fee_invoice::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
