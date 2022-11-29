<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    
    
    public function index()
    {
        $users=User::all();
        return view("admin.payments.index",compact("users"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
       return view("admin.payments.create",compact("users"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $payment=$request->validate([
            "month"=>["required"],
            "salary"=>["required"],
            "user_id"=>["required"],
            "incentive_pay"=>["required"],
            "tax"=>["required"],
            "deduction_title"=>["nullable"],
            "deduction_amount"=>["nullable"],
            "net_pay"=>["nullable"],
            "payment_date"=>["required"]
        ]);
        
        $payment["net_pay"]=$request->salary-$request->deduction_amount+$request->incentive_pay-(((($request->salary)-($request->deduction_amount))*($request->tax))/100);
        
        Payment::create($payment);
        
        return redirect()->route("admin.payments.show",$request->user_id)->with("success","Payment created successfully");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $user = User::find($id);
        $payments = Payment::where('user_id', $user->id)->get();
        // dd($attendences);
        return view("admin.payments.individualpayment",compact("user","payments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment=Payment::find($id);
        return view("admin.payments.edit",compact("payment"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment=Payment::find($id);
        $data=$request->validate([
            "month"=>["required"],
            "salary"=>["required"],
            "user_id"=>["required"],
            "incentive_pay"=>["required"],
            "tax"=>["required"],
            "deduction_title"=>["nullable"],
            "deduction_amount"=>["nullable"],
            "net_pay"=>["nullable"],
            "payment_date"=>["required"]
        ]);
        
        $data["net_pay"]=$request->salary-$request->deduction_amount+$request->incentive_pay-(((($request->salary)-($request->deduction_amount))*($request->tax))/100);
        
        $payment->update($data);
        
        return redirect()->route("admin.payments.show",$request->user_id)->with("success","Payment updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function deletePayment(Request $request)
    {
        $payment=Payment::find($request->payment_id);
        $payment->delete();
        return redirect()->back()->with("success","Payment deleted succesfully");

    }
}
