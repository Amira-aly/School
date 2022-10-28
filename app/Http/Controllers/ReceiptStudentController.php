<?php
namespace App\Http\Controllers;

use App\Models\Fund_Account;
use App\Models\Receipt_Student;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiptStudentController extends Controller
{
    public function index()
    {
        $receipt_students = Receipt_Student::all();
        return view('DashboardAdmin.receipt.index',compact('receipt_students'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $receipt_students = new Receipt_Student();
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->debit = $request->debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            $fund_accounts = new Fund_Account();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            $fund_accounts = new Student_Account();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->level_id = $request->level_id;
            $fund_accounts->classroom_id = $request->classroom_id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();
            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('receipt_students.index');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('DashboardAdmin.receipt.create',compact('student'));
    }

    public function edit($id)
    {
        $receipt_student = Receipt_Student::findorfail($id);
        return view('DashboardAdmin.receipt.edit',compact('receipt_student'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $receipt_students = Receipt_Student::findorfail($request->id);
            $receipt_students->date = date('Y-m-d');
            $receipt_students->student_id = $request->student_id;
            $receipt_students->debit = $request->debit;
            $receipt_students->description = $request->description;
            $receipt_students->save();

            $fund_accounts = Fund_Account::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();

            $fund_accounts = Student_Account::where('receipt_id',$request->id)->first();
            $fund_accounts->date = date('Y-m-d');
            $fund_accounts->type = 'receipt';
            $fund_accounts->student_id = $request->student_id;
            $fund_accounts->receipt_id = $receipt_students->id;
            $fund_accounts->debit = 0.00;
            $fund_accounts->credit = $request->debit;
            $fund_accounts->description = $request->description;
            $fund_accounts->save();
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('receipt_students.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Receipt_Student::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
