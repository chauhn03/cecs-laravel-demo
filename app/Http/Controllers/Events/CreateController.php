<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends Controller
{
     protected function get() {
        return view('events.create');
    }

    protected function create(Request $request) {
        $submitType = $request->submit;
        $this->insert($request);
        if ($submitType === 'create') {
            return redirect()->route('event_types_list');
        }

        if ($submitType == 'createAndNew') {
            return view('event_types.create');
        }
    }

    private function insert($eventTypes) {
        DB::table('event_types')->insert([[
        'name' => $eventTypes->name,
        'description' => $eventTypes->description,
        'defaultPlace' => $eventTypes->place,
        'defaultFee' => $eventTypes->fee,
        'note' => $eventTypes->note
        ]]);
    }
}
