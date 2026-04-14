<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function sendTestMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        try {
            Mail::to($request->email)->send(new TestMail());
            return response()->json(['message' => 'Test email sent successfully to ' . $request->email], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['message' => 'Failed to send test email.', 'error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}