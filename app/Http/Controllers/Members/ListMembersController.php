<?php

namespace App\Http\Controllers\Members;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListMembersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $members = DB::table('members')->get();
        return view('members.list')->withCharacters($members);
    }

    public function delete(Request $request) {
        $deletedCheckbox = $request->checkboxDelete;
        DB::table('members')->whereIn('id', $deletedCheckbox)->delete();
        return redirect()->route('members_list');
    }
}
