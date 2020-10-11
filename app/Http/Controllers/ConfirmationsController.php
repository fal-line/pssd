<?php

namespace App\Http\Controllers;

use App\User;
use App\Bank;
use App\Payment;
use App\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class ConfirmationsController extends Controller
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
                    $confirmations = Confirmation::all()->where('status', '!=', 'selesai');
                    return view('confirmation.index', ['confirmations' => $confirmations]);
                break;

                default:
                    if(!Gate::allows('isUser')){
                        $confirmations = Confirmation::all()->where( 'status', '!=' , 'selesai');
                        return view('confirmation.index', ['confirmations' => $confirmations]);
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
                if(!Gate::allows('isUser')){
                    $banks = Bank::all();
                    $payments = Payment::all()->where( 'status', '=' , 'menunggu konfirmasi' );
                    return view('confirmation.create', ['banks' => $banks], ['payments' => $payments]);
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
            'payment_id' => 'required|numeric',
            'account_number' => 'required|max:20',
            'account_holder' => 'required',
            'amount' => 'required|numeric|min:400000',
            'to_bank' => 'required',
            'date' => 'required',
            ]);

        $confirmation = new Confirmation;
        $confirmation->payment_id = $request->payment_id;
        $confirmation->account_number = $request->account_number;
        $confirmation->account_holder = $request->account_holder;
        $confirmation->amount = $request->amount;
        $confirmation->to_bank = $request->to_bank;
        $confirmation->date = $request->date;
        $confirmation->status = 'diajukan';
        
        $confirmation->save();

        return redirect('/confirmation')->with('status','Pembayaran di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Confirmation $confirmation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Confirmation $confirmation)
    {
        return view('confirmation.edit', ['confirmation' => $confirmation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmation $confirmation)
    {
            switch ($confirmation->status) {
                case "diajukan":
                    Confirmation::where('id', $confirmation->id)
                    ->update([
                        'status' => $request->status,
                        'employe_id' => $request->employe_id,
                    ]);
                  return redirect('/confirmation')->with('status','Pembayaran di lanjutkan ke proses verifikasi!');;
                  break;
                  
                case "diproses":
                    Confirmation::where('id', $confirmation->id)
                    ->update([
                        'status' => $request->status,
                    ]);
                    return redirect('/confirmation')->with('status','Pembayaran telah selesai!');;
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
    public function destroy(Confirmation $confirmation)
    {   
        Payment::destroy($confirmation->id);
        return redirect('/confirmation')->with('status','Data pembayaran dihapus.');
    }
}
