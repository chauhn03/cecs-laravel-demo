<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller {

    public function get(int $eventId = 1) {
        $event = DB::table('events')->where('id', $eventId)->first();
        $members = DB::table('members')->get();
        return view('guests.create')
                        ->with('members', $members)
                        ->with('event', $event);
    }

    protected function create(Request $request) {
        $this->insert($request->eventId, $request->memberId);
        return redirect()->route('guests_list', ['eventId' => $request->eventId]);
    }

    private function insert(int $eventId, int $memberId) {
        echo 'EventId: ' . $eventId . '; MemberId: ' . $memberId;
        $eventId = DB::table('event_members')->insert([[
        'eventId' => $eventId,
        'memberId' => $memberId,
        'invited' => true,
        'registered' => true,
        'attended' => true,
        'paid' => true
        ]]);
    }

}
