<?php

namespace App\Http\Controllers;

use App\Confirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class ConfirmationsHistoryController extends Controller
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
                    $confirmations = Confirmation::all()->where( 'status', '=' , 'selesai');
                    return view('confirmation.history.index', ['confirmations' => $confirmations]);
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
    public function destroy(Confirmation $confirmation)
    {   
        Payment::destroy($confirmation->id);
        return redirect('/confirmation/history')->with('status','Data pembayaran dihapus.');
    }
}
