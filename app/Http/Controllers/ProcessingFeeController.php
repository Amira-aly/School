<?php
namespace App\Http\Controllers;
use App\Models\Processing_Fee;
use App\Models\Student;
use App\Models\Student_Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProcessingFeeController extends Controller
{
    public function index()
    {
        $processingfees = Processing_Fee::all();
        return view('DashboardAdmin.processing_fee.index',compact('processingfees'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $ProcessingFee = new Processing_Fee();
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            $students_accounts = new Student_Account();
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->debit = 0.00;
            $students_accounts->credit = $request->debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.success'));
            return redirect()->route('processing_fee.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('DashboardAdmin.processing_fee.create',compact('student'));
    }

    public function edit($id)
    {
        $processingfee = Processing_Fee::findorfail($id);
        return view('DashboardAdmin.processing_fee.edit',compact('processingfee'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $ProcessingFee = Processing_Fee::findorfail($request->id);;
            $ProcessingFee->date = date('Y-m-d');
            $ProcessingFee->student_id = $request->student_id;
            $ProcessingFee->amount = $request->debit;
            $ProcessingFee->description = $request->description;
            $ProcessingFee->save();

            $students_accounts = Student_Account::where('processing_id',$request->id)->first();;
            $students_accounts->date = date('Y-m-d');
            $students_accounts->type = 'ProcessingFee';
            $students_accounts->student_id = $request->student_id;
            $students_accounts->processing_id = $ProcessingFee->id;
            $students_accounts->debit = 0.00;
            $students_accounts->credit = $request->debit;
            $students_accounts->description = $request->description;
            $students_accounts->save();

            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('processing_fee.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Processing_Fee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
