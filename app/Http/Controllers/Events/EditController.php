<?php

namespace App\Http\Controllers\Events;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EditController extends Controller {

    protected function get(int $id) {
        $member = DB::table('events')->where('id', $id)->first();
        $event_types = DB::table('event_types')->get();
        return view('events.edit')
                        ->with("characters", $member)
                        ->with('event_types', $event_types);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(Request $request) {
        $submitType = $request->submit;
        $this->saveChanges($request);
        return redirect()->route('events_list');
    }

    private function saveChanges($event) {
        $date = \DateTime::createFromFormat('d/m/Y', $event->date);
        //$time = \DateTime::createFromFormat('hh:mm', $event->time);
        $time = date("H:i:s", strtotime($event->time));

        DB::table('events')->where('id', $event->id)
                ->update([
                    'name' => $event->name,
                    'typeId' => $event->typeId,
                    'place' => $event->place,
                    'date' => $date,
                    'time' => $time,
                    'fee' => $event->fee,
                    'note' => $event->note
        ]);
    }

}
