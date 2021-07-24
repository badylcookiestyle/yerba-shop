<?php

namespace App\Http\Controllers;

use App\Http\Requests\orderStatusRequest;
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
      return  Payment::payment($request);
    }
    public function get($id){

            return Payment::get($id);

    }
    public function changeStatus(orderStatusRequest $request){
        return Payment::changeStatus($request);
    }
}
