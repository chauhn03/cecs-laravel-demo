<?php

namespace App\Http\Controllers\Members;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateMemberControllers extends Controller {

    protected function getCreateMember() {
        return view('members.createmember');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request) {
        $submitType = $request->submit;
        $this->printResult($request);
        $this->insertNewMemeber($request);
        if ($submitType === 'create') {
            return redirect()->route('members_list');
        }

        if ($submitType == 'createAndNew') {
            return view('members.createmember');
        }
    }

    private function insertNewMemeber($member) {
        DB::table('members')->insert([[
        'fullname' => $member->fullname,
        'nickname' => $member->nickname,
        'en_name' => $member->en_name,
        'email' => $member->email,
        'phone' => $member->phone,
        'facebook' => $member->facebook
        ]]);
    }

    private function printResult(Request $request) {
        echo 'Submit: ' . $request->submit . "</br>";
        echo 'Name: ' . $request->fullname . "</br>";
        echo 'Nick name: ' . $request->nickname;
        echo 'English name: ' . $request->en_name;
        echo 'Email: ' . $request->email;
        echo 'Phone: ' . $request->phone;
        echo 'Facebook: ' . $request->facebook;
        echo 'Create member successfully';
    }

}
