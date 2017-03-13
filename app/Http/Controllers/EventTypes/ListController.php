<?php

namespace App\Http\Controllers\EventTypes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
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
        $event_types = DB::table('event_types')->get();
        return view('event_types.list')->withCharacters($event_types);
    }

    public function delete(Request $request) {
        $deletedCheckbox = $request->checkboxDelete;
        DB::table('members')->whereIn('id', $deletedCheckbox)->delete();
        return redirect()->route('members_list');
    }
}
