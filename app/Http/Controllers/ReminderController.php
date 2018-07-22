<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use Auth;

class ReminderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function createReminder(Request $request) 
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'reminder' => 'required|date',
            'expired' => 'required|date|after:reminder'
        ]);

        $reminder = new Reminder();
        $reminder->user_id = Auth::user()->id;
        $reminder->title = $request->title;
        $reminder->desc = $request->desc;
        $reminder->reminder = $request->reminder;
        $reminder->expired = $request->expired;
        $reminder->save();

        return back()->with('success', 'Your new reminder have been created!');
    }
}
