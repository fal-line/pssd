<?php

namespace App\Http\Controllers;

use App\User;
use App\Bank;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            switch (Auth::user()->user_role){
                case"student":
                    $payments = Payment::all()->where( 'student_id', '=' , Auth::user()->nis);
                    return view('payment.index', ['payments' => $payments]);
                break;

                default:
                    if(!Gate::allows('isUser')){
                        $payments = Payment::all()->where( 'status', '!=' , 'selesai');
                        return view('payment.index', ['payments' => $payments]);
                    }
            }
            return back()->withInput();
        }
        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            switch (Auth::user()->user_role){
                case"student":
                        $users = User::all()->where('nis', '=', Auth::user()->nis);
                        $banks = Bank::all();
                        return view('payment.create', ['users' => $users], ['banks' => $banks]);
                break;

                default:
                    if(!Gate::allows('isUser')){
                        $users = User::all()->where('user_role', 'student');
                        $banks = Bank::all();
                        return view('payment.create', ['users' => $users], ['banks' => $banks]);
                    }
            }
            return back()->withInput();
        }
        return redirect('/login');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|digits:9|numeric',
            'pay_for' => 'required|max:10',
            'amount' => 'required|numeric|min:400000',
            'to_bank' => 'required',
            ]);

        $payment = new Payment;
        $payment->student_id = $request->student_id;
        $payment->pay_for = $request->pay_for;
        $payment->amount = $request->amount;
        $payment->to_bank = $request->to_bank;
        $payment->status = 'diajukan';
        
        $payment->save();

        return redirect('/payment')->with('status','Pembayaran di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('payment.edit', ['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
            switch ($request->status) {
                case "menunggu konfirmasi":
                Payment::where('id', $payment->id)
                    ->update([
                        'status' => $request->status,
                        'employe_id' => $request->employe_id,
                    ]);
                  return redirect('/payment')->with('status','Pembayaran di lanjutkan ke proses verifikasi!');;
                  break;
                case "selesai":
                Payment::where('id', $payment->id)
                    ->update([
                        'status' => $request->status,
                    ]);
                    return redirect('/payment')->with('status','Pembayaran telah selesai!');;
                break;
            default:
            }
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
        return redirect('/payment')->with('status','Data pembayaran dihapus.');
    }
}
