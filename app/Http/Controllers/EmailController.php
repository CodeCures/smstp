<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __invoke(EmailRequest $request)
    {
        Mail::to($request->only('to'))->send(
            new TestEmail($request->except('email'))
        );

        return response()->json([
            'status' => 'success',
            'message' => 'sent successfullky!'
        ]);
    }
}
