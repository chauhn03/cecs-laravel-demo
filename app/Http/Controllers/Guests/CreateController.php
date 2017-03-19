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
    
    
    
     public function insert(int $eventId, int $memberId) {
        $members = DB::table('members')->get();
        foreach ($members as $member) {
            $eventId = DB::table('event_members')->insert([[
            'eventId' => $eventId,
            'memberId' => $member->id
            ]]);
        }
    }
    
    private function getMember(string $searchMemberString) {
        explode("-", $searchMemberString);
    }
}
