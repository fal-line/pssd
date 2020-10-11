<?php

namespace App\Http\Controllers;

use App\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class BanksController extends Controller
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
                    $banks = Bank::all();
                    return view('bank.index', ['banks' => $banks]);
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
            if(!Gate::allows('isStudent')){
                if(!Gate::allows('isUser')){
                    return view('bank.create');
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
            'account_number' => 'required|unique:banks|numeric',
            'name' => 'required|max:50'
            ]);

        $bank = new Bank;       
        $bank->account_number =  $request->account_number;
        $bank->name = $request->name;
        
        $bank->save();

        return redirect('/bank')->with('status','Bank di tambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('bank.edit', ['bank' => $bank]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        Bank::where('id', $bank->id)
        ->update([
            'account_number' => $request->account_number,
            'name' => $request->name,
        ]);
    return redirect('/bank')->with('status','Data bank diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        Bank::destroy($bank->id);
        return redirect('/bank')->with('status','Bank berhasil di dihapus.');
    }
}
