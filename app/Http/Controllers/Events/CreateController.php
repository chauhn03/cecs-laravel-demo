<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CreateController extends Controller {

    protected function get() {
        $event_types = DB::table('event_types')->get();
        return view('events.create')->with('event_types', $event_types);
    }

    protected function create(Request $request) {
        $submitType = $request->submit;
        $this->insert($request);
        if ($submitType === 'create') {
            return redirect()->route('events_list');
        }

        if ($submitType == 'createAndNew') {
            return view('events.create');
        }
    }

    private function insert($event) {
        $date = \DateTime::createFromFormat('d/m/Y', $event->date);
        $time = date("H:i:s", strtotime($event->time));
//        $time = \DateTime::createFromFormat('h:m:s', strtotime($event->time));
        echo $time;
        $eventId = DB::table('events')->insert([[
        'name' => $event->name,
        'typeId' => $event->typeId,
        'place' => $event->place,
        'date' => $date,
        'time' => $time,
        'fee' => $event->fee,
        'note' => $event->note
        ]]);

        $this->insertGuests($eventId);
    }

    private function insertGuests(int $eventId, int $memberId) {
        $members = DB::table('members')->get();
        foreach ($members as $member) {
            $eventId = DB::table('event_members')->insert([[
            'eventId' => $eventId,
            'memberId' => $member->id
            ]]);
        }
    }

}
