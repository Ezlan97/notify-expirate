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
        
        $news = $reminders->where('reminder', '>', date("Y-m-d"))->where('expired', '>', date("Y-m-d"));
        $incomings = $reminders->where('reminder', '<', date("Y-m-d"))->where('expired', '>', date("Y-m-d"));
        $expireds = $reminders->where('reminder', '<', date("Y-m-d"))->where('expired', '<', date("Y-m-d"));

        $all = $reminders->count();
        $new = $reminders->where('reminder', '>', date("Y-m-d"))->count();
        $incoming = $reminders->where('reminder', '<', date("Y-m-d"))->count();
        $expired = $reminders->where('expired', '>', date("Y-m-d"), 'reminder', '<', date("Y-m-d"))->count();

        return view('home', compact('reminders', 'new', 'incoming', 'expired', 'all', 'news', 'incomings', 'expireds'));
    }
}
