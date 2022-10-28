<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreLibrary;
use App\Models\level;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class LibraryController extends Controller
{
    public function index()
    {
        $books = Library::all();
        return view('DashboardAdmin.library.index',compact('books'));
    }

    public function create()
    {
        $levels = level::all();
        return view('DashboardAdmin.library.create',compact('levels'));
    }

    public function store(StoreLibrary $request)
    {
        try {
            $validated = $request->validated();
            $books = new Library();
            $books->title = $request->title;
            $books->file_name =  $request->file('file_name')->getClientOriginalName();
            $books->level_id = $request->level_id;
            $books->classroom_id = $request->classroom_id;
            $books->section_id = $request->section_id;
            $books->teacher_id = 1;
            $books->save();
            $this->uploadFile($request,'file_name');
            toastr()->success(trans('messages.success'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $levels = Level::all();
        $book = library::findorFail($id);
        return view('DashboardAdmin.library.edit',compact('book','levels'));
    }

    public function uploadFile($request,$name)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/library/',$file_name,'upload_attachments');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('upload_attachments')->exists('attachments/library/'.$name);
        if($exists)
        {
            Storage::disk('upload_attachments')->delete('attachments/library/'.$name);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $book = library::findorFail($request->id);
            $book->title = $request->title;
            if($request->hasfile('file_name')){
                $this->deleteFile($book->file_name);
                $this->uploadFile($request,'file_name');
                $file_name_new = $request->file('file_name')->getClientOriginalName();
                $book->file_name = $book->file_name !== $file_name_new ? $file_name_new : $book->file_name;
            }
            $book->level_id = $request->level_id;
            $book->classroom_id = $request->classroom_id;
            $book->section_id = $request->section_id;
            $book->teacher_id = 1;
            $book->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('library.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $this->deleteFile($request->file_name);
        library::destroy($request->id);
        toastr()->error(trans('messages.Delete'));
        return redirect()->route('library.index');
    }

    public function downloadAttachment($filename)
    {
        return response()->download(public_path('attachments/library/'.$filename));
    }
}
