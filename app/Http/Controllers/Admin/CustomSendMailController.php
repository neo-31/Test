<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\CustomEmailSend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class CustomSendMailController extends Controller
{
    public function __construct()
    {
		 $this->middleware('auth');
    }

    // Custom Send Email Start
    public function custom_send_email()
    {
        $custom_email_list = CustomEmailSend::where('is_deleted','1')->get();
        return view('admin.pages.custom_send_email', compact('custom_email_list'));
    }

    public function custom_send_email_create()
    {
        return view('admin.pages.custom_send_email_create');
    }

    public function custom_send_mail(Request $request)
    {
        $validation_array = [
            'email' => 'required|max:255',
        ];

        $request->validate($validation_array);
        $emails = explode("," , $request->input('email'));

        $custom = new CustomEmailSend;
		$custom->email = $request->input('email');
		$custom->subject =  $request->input('subject');
		$custom->email_content = $request->input('email_content');
		$custom->created_by = Auth::user()->id;
        $custom->save();

        foreach ($emails as $email_id)
        {
            $data['email'] = $email_id;
            $data['subject'] = $request->input('subject');
            $data['email_content'] = $request->input('email_content');

            Mail::send(
                ['html' => 'emails.custom_send_mail'],
                array(
                    'email' => $data['email'],
                    'subject' => $data['subject'],
                    'email_content' => $data['email_content'],
                ),
                function ($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject']);
            });
        }
        return redirect()->back()->with('message', 'Successfully!');
    }

    public function GetCustomEmailInfo($id)
    {
        $custom_email = CustomEmailSend::findOrFail($id);

        return compact('custom_email');
    }
    // Custom Send Email Ends

}
