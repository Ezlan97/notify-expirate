<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Reminder;
use Carbon\Carbon;

class SendNotificationReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SendNotificationReminder:sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email based on user requested date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Search for reminder with the same date declare
        $today = Carbon::today();
        $search = Reminder::select('users.email', 'reminders.reminder', 'reminders.title', 'reminders.desc')
        ->leftjoin('users', 'users.id', '=', 'reminders.user_id')
        ->whereDate('reminder', $today)->get();

        foreach ($search as $email) {
            //array data for send email
            $data = array(
                'email' => $email->email,
                'subject' => 'Here your reminder ' . $email->desc,
            );
            
            //send email
            Mail::send('email.reminder', $data, function ($message) use ($data) {
                $message->from('khairat.online@gmail.com');
                $message->to($data['email']);
                $message->subject($data['subject']);
            });
        }
    }
}
