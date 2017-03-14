<?php

namespace App\Http\Controllers\EventTypes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EditController extends Controller {

    protected function get(int $id) {
        $member = DB::table('event_types')->where('id', $id)->first();
        return view('event_types.edit')->withCharacters($member);
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
        return redirect()->route('event_types_list');
    }

    private function saveChanges($eventTypes) {
        DB::table('event_types')->where('id', $eventTypes->id)
                ->update([
                    'name' => $eventTypes->name,
                    'description' => $eventTypes->description,
                    'defaultPlace' => $eventTypes->place,
                    'defaultFee' => $eventTypes->fee,
                    'note' => $eventTypes->note
        ]);
    }

}
