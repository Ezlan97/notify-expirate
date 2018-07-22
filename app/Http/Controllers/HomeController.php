<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = Reminder::where('user_id', Auth::user()->id)->get()->sortByDesc('created_at');

        return view('home', compact('reminders'));
    }
}
