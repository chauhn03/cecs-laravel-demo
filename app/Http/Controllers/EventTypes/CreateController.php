<?php

namespace App\Http\Controllers\EventTypes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller {

    protected function get() {
        return view('event_types.create');
    }

    protected function create(Request $request) {
        $submitType = $request->submit;
        echo 'Date time: '. $request->dateTime;
        $this->insert($request);
        if ($submitType === 'create') {
            return view('event_types.create');
//            return redirect()->route('event_types_list');
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
