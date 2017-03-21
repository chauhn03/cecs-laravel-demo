<?php

namespace App\Http\Controllers\Guests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller {

    public function get(int $eventId = 1, int $statusId = 3) {
        $event = DB::table('events')->where('id', $eventId)->first();
        $members = DB::table('members')->get();
        $guest_status = DB::table('guest_status')->get();
        return view('guests.create')
                        ->with('statusId', $statusId)
                        ->with('members', $members)
                        ->with('statuses', $guest_status)
                        ->with('event', $event);
    }

    protected function create(Request $request) {
        $this->insert($request);
        $submitType = $request->submit;

        if ($submitType === 'create') {
            return redirect()->route('guests_list', ['eventId' => $request->eventId]);
        }
        
        if ($submitType == 'createAndNew') {
            return redirect()->route('create_guest', ['eventId' => $request->eventId, 'statusId' => $request->statusId]);
        }
    }

    private function insert(Request $request) {
        $eventId = DB::table('guests')->insert([[
        'eventId' => $request->eventId,
        'memberId' => $request->memberId,
        'statusId' => $request->statusId,
        'note' => $request->note
        ]]);
    }

}
