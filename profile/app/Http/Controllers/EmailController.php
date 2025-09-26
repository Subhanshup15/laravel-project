<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Mail\Email;

class EmailController extends Controller
{
    public function sendemail(Request $req)
    {
        // Validate incoming form data
        $data = $req->validate([
            'to' => ['required', 'email'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        try {
            Mail::to($data['to'])->send(new Email($data['message'], $data['subject'], $data['to']));

            // Check for failures (some drivers support this)
            if (method_exists(Mail::class, 'failures') && count(Mail::failures() ?: []) > 0) {
                return redirect()->back()->with('error', 'Failed to send email.');
            }

            return redirect()->back()->with('success', 'Email sent successfully.');
        } catch (\Exception $e) {
            Log::error('Mail send error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error sending email: ' . $e->getMessage());
        }
    }
}
