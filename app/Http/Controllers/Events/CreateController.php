<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CreateController extends Controller {

    protected function get() {
        return view('events.create');
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
        $time = \DateTime::createFromFormat('hh:mm', $event->time);
        echo $event->place;
        DB::table('events')->insert([[
        'name' => $event->name,
        'typeId' => $event->typeId,
        'place' => $event->place,
        'date' => $date,
        'time' => $time,
        'fee' => $event->fee,
        'note' => $event->note
        ]]);
    }

}
