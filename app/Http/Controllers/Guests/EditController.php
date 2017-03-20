<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EditController extends Controller {

    protected function get(int $id) {
        $guest = DB::table('guests')->where('id', $id)->first();
        $event = DB::table('events')->where('id', $guest->eventId)->first();
        $member = DB::table('members')->where('id', $guest->memberId)->first();
        $guest_status = DB::table('guest_status')->get();
        return view('guests.edit')
                        ->with('guest', $guest)
                        ->with('member', $member)
                        ->with('statuses', $guest_status)
                        ->with('event', $event);
    }

    protected function update(Request $request) {
        $guest = DB::table('guests')->where('id', $request->id)->first();
        $this->saveChanges($request);
        return redirect()->route('guests_list', ['eventId' => $guest -> eventId ]);
    }

    private function saveChanges($guest) {
        DB::table('guests')->where('id', $guest->id)
                ->update([
                    'statusId' => $guest->statusId,
                    'note' => $guest->note
        ]);
    }

}
