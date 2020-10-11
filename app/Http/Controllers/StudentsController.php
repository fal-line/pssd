<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gate;
use Hash;

class StudentsController extends Controller
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
                    $users = User::all()->where('user_role', 'student');
                    return view('student.index', ['users' => $users]);
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
                    return view('student.create');
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
            'nis' => 'required|digits:9|unique:users|numeric',
            'name' => 'required|max:200',
            'email' => 'required|unique:users|email|',
            'class' => 'required',
            ]);

        $user = new User;
        $user->nis = $request->nis;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password = Hash::make($request->nis);
        $user->class = $request->class;
        $user->user_role = 'student';
        
        $user->save();

        return redirect('/student')->with('status','Siswa di daftarkan! beritahu siswa untuk mengubah password');
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
        return view('student.edit', ['user' => $user]);
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
                'nis' => $request->nis,
                'class' => $request->class,
                'name' => $request->name,
                'email' => $request->email,
            ]);
        return redirect('/student')->with('status','Data siswa di ubah!');
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
        return redirect('/student')->with('status','Data siswa di dihapus.');
    }
}
