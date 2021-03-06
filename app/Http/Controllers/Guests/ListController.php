<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ListController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $eventId = 40) {
        if ($eventId === null) {
            $eventId = DB::table('events')->orderBy('created_at', 'desc')->first();
        }

        $members = DB::table('members')->get();
        $guests = DB::table('guests')
                ->join('members', 'guests.memberId', '=', 'members.id')
                ->join('guest_status', 'guests.statusId', '=', 'guest_status.id')
                ->where('eventId', $eventId)
                ->select('guests.*', 'members.nickname', 'guest_status.name as status')
                ->get();

        $events = DB::table('events')->get();
        $event = DB::table('events')->where('id', $eventId)->first();
        return view('guests.list')
                        ->with("selectEvent", $event)
                        ->with("members", $members)
                        ->with("guests", $guests)
                        ->with('events', $events);
    }

    public function guestsOfEvent(int $eventId) {
        $members = DB::table('members')->get();
        $guests = DB::table('event_members')->where('eventId', $eventId)->get();
        $events = DB::table('events')->get();
        return view('guests.list')
                        ->with("selectedEventId", $eventId)
                        ->with("members", $members)
                        ->with("guests", $guests)
                        ->with('events', $events);
    }

    public function delete(Request $request) {
        $deletedCheckbox = $request->checkboxDelete;
        DB::table('guests')->whereIn('id', $deletedCheckbox)->delete();
        return redirect()->route('guests_list');
    }

}
