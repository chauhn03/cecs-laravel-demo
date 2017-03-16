<?php

namespace App\Http\Controllers\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
     public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $event_types = DB::table('events')->get();
        return view('events.list')->withCharacters($event_types);
    }

}
