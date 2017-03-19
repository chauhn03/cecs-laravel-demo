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
    public function index(int $eventId = 1) {
        if ($eventId === null) {
            $eventId = DB::table('events')->orderBy('created_at', 'desc')->first();
        }

        $members = DB::table('members')->get();
        $guests = DB::table('event_members')
                ->join('members', 'event_members.id', '=', 'members.id')
                ->where('eventId', $eventId)
                ->select('event_members.*', 'members.nickname')
                ->get();
        
        $events = DB::table('events')->get();
        $event = DB::table('events')->where('id', 40)->first();
//        dd($event);
        return view('guests.list')
                        ->with("selectEvent", $event)
                        ->with("members", $members)
                        ->with("guests", $guests)
                        ->with('$events', $events);
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

    public function insertGuests(Request $request) {
        
    }

}
