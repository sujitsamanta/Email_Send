<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserMail;
use App\Jobs\UserQueue;
use Exception;

// use Illuminate\Support\Facades\Mail;
// use App\Notifications\Email_Queue;

class Email_Controller extends Controller
{
    public function send_email(Request $request)
    {
        $result = $request->validate([
            'email' => 'required|email',
            'send_times' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            // $request->notify(new UserMail());
            
            for ($i = 1; $i <= $request->send_times; $i++) {
                Notification::route('mail', $request->email)
                    ->notify(new UserMail(
                        $request->subject,
                        $request->message
                    ));
            }

            return redirect()->back()->with('alert', 'succesful');

        } catch (Exception $e) {
            return redirect()->back()->with('alert', 'not_succesful');

        }


        // UserQueue::dispatch($request->email, $request->subject, $request->message);
    }
}
