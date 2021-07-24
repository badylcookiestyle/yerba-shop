<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Users;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function payment(PaymentRequest $request){
        Payment::payment($request);
    }
}
