<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index(){
        $payments=Payment::where("user_id",Auth::id())->get();
        return view("payments.index",compact("payments"));
        
    }
}
