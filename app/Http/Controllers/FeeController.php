<?php
namespace App\Http\Controllers;
use App\Models\Fee;
use App\Http\Requests\StoreFees;
use App\Models\level;
use Illuminate\Http\Request;
class FeeController extends Controller
{
    public function index()
    {
        $fees = Fee::all();
        $levels = level::all();
        return view('DashboardAdmin.fees.index',compact('fees','levels'));
    }

    public function create()
    {
        $levels = level::all();
        return view('DashboardAdmin.fees.create',compact('levels'));
    }

    public function store(StoreFees $request)
    {
        try {
            $validated = $request->validated();
            $fees = new Fee();
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title_ar];
            $fees->amount  =$request->amount;
            $fees->level_id  =$request->level_id;
            $fees->classroom_id  =$request->classroom_id;
            $fees->description  =$request->description;
            $fees->year  =$request->year;
            $fees->fee_type  =$request->fee_type;
            $fees->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('fees.create');

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fee = Fee::findorfail($id);
        $levels = level::all();
        return view('DashboardAdmin.fees.edit',compact('fee','levels'));
    }

    public function update(StoreFees $request, $id)
    {
        try {
            $validated = $request->validated();
            $fees = Fee::findorfail($id);
            $fees->title = ['en' => $request->title_en, 'ar' => $request->title];
            $fees->amount  = $request->amount;
            $fees->level_id  = $request->level_id;
            $fees->classroom_id  = $request->classroom_id;
            $fees->description  = $request->description;
            $fees->year  = $request->year;
            $fees->fee_type  = $request->fee_type;
            $fees->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('fees.index');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Fee::destroy($request->id);
            toastr()->error(trans('messages.Delete'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
