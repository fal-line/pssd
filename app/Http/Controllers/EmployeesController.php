<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class EmployeesController extends Controller
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
                    $users = User::all()->where('user_role', 'employe');
                    return view('employe.index', ['users' => $users]);
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
                    return view('employe.create');
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
            'emp_id' => 'required|digits:4|unique:users|numeric',
            'name' => 'required|max:200',
            'email' => 'required|unique:users|email|',
            'section' => 'required',
            ]);

        $user = new User;       
        $user->emp_id =  $request->emp_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password = Hash::make('gantipassword');
        $user->section = $request->section;
        $user->user_role = 'employe';
        
        $user->save();

        return redirect('/employe')->with('status','Petugas di daftarkan! beritahu petugas untuk mengubah password');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('employe.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::where('id', $user->id)
        ->update([
            'emp_id' => $request->emp_id,
            'class' => $request->class,
            'name' => $request->name,
            'email' => $request->email,
            'section' => $request->section,
        ]);
    return redirect('/employe')->with('status','Data petugas di ubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/employe')->with('status','Data siswa di dihapus.');
    }
}
