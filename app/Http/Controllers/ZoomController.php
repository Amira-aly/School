<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreZoom;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Models\level;
use App\Models\Online_zoom;
use Illuminate\Http\Request;
class ZoomController extends Controller
{
    public function index()
    {
        $online_zooms = Online_zoom::all();
        return view('DashboardAdmin.zooms.index', compact('online_zooms'));
    }

    public function create()
    {
        $levels = level::all();
        return view('DashboardAdmin.zooms.create', compact('levels'));
    }

    public function indirectCreate()
    {
        $levels = level::all();
        return view('DashboardAdmin.zooms.indirect', compact('levels'));
    }

    public function store(StoreZoom $request)
    {
        try {
            $validated = $request->validated();
            $user = Zoom::user()->first();
            $meetingData = [
                'topic' => $request->topic,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_time' => $request->start_time,
                'timezone' => config('zoom.timezone')
            ];
            $meeting = Zoom::meeting()->make($meetingData);
            $meeting->settings()->make([
                'join_before_host' => false,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => true,
                'waiting_room' => true,
                'approval_type' => config('zoom.approval_type'),
                'audio' => config('zoom.audio'),
                'auto_recording' => config('zoom.auto_recording')
            ]);
            $user->meetings()->save($meeting);
            Online_zoom::create([
                'integration' => true,
                'level_id' => $request->level_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->name,
                'meeting_id' => $meeting->id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $meeting->duration,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function storeIndirect(Request $request)
    {
        try {
            Online_zoom::create([
                'integration' => false,
                'level_id' => $request->level_id,
                'classroom_id' => $request->classroom_id,
                'section_id' => $request->section_id,
                'created_by' => auth()->user()->id,
                'meeting_id' => $request->meeting_id,
                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,
                'password' => $request->password,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            toastr()->success(trans('messages.success'));
            return redirect()->route('online_zoom.index');
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        try {
            $info = Online_zoom::find($request->id);
            if($info->integration == true){
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                Online_zoom::destroy($request->id);
            }
            else{
                Online_zoom::destroy($request->id);
            }
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('online_zoom.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
