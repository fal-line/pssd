<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class PaymentsHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if(!Gate::allows('isStudent')){
                if(!Gate::allows('isUser')){
                    $payments = Payment::all()->where( 'status', '=' , 'selesai');
                    return view('payment.history.index', ['payments' => $payments]);
                }
            }
            return back()->withInput();
        }
        return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {   
        Payment::destroy($payment->id);
        return redirect('/payment/history')->with('status','Data pembayaran dihapus.');
    }
}
