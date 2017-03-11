<?php

namespace App\Http\Controllers\Members;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EditMemberController extends Controller {

    protected function getMember(int $id) {
        $member = DB::table('members')->where('id', $id)->first();
        $this->printResult($member);
        return view('members.editmember')->withCharacters($member);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function update(Request $request) {
        $submitType = $request->submit;
        $this->printResult($request);
        $this->saveChanges($request);
        return redirect()->route('members_list');
    }

    private function saveChanges($member) {
        DB::table('members')->where('id', $member->id)
                ->update([
                    'fullname' => $member->fullname,
                    'nickname' => $member->nickname,
                    'en_name' => $member->en_name,
                    'email' => $member->email,
                    'phone' => $member->phone,
                    'facebook' => $member->facebook
        ]);
    }

    private function printResult($request) {
        echo 'Id: ' . $request->id . "</br>";
        echo 'Name: ' . $request->fullname . "</br>";
        echo 'Nick name: ' . $request->nickname . "</br>";
        echo 'English name: ' . $request->en_name . "</br>";
        echo 'Email: ' . $request->email . "</br>";
        echo 'Phone: ' . $request->phone . "</br>";
        echo 'Facebook: ' . $request->facebook . "</br>";
        echo 'Save member successfully';
    }

}
