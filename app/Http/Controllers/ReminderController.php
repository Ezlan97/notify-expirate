<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reminder;
use Carbon\Carbon;
use Auth;
use Mail;

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

    public function updateReminder(Request $request, $id) 
    {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'reminder' => 'required|date',
            'expired' => 'required|date|after:reminder'
        ]);

        $reminder = Reminder::find($id);
        $reminder->title = $request->title;
        $reminder->desc = $request->desc;
        $reminder->reminder = $request->reminder;
        $reminder->expired = $request->expired;
        $reminder->save();

        return back()->with('success', 'Your reminder has been updated!');
    }

    public function deleteReminder(Request $request, $id)
    {
        $delete = Reminder::where('id', $id)->delete();

        return back()->with('success', 'Your reminder has been deleted!');
    }
}
