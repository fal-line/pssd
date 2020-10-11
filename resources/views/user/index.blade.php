@extends('layouts.main')

@section('content')
        <h2>List User</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar User</p>
                <h4><a class="badge badge-success mb-2" href="{{ url('student/create') }}">Tambah User</a></h4>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Level</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->user_role}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/user/edit/{{$user->id}}">edit</a>
                            <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" href="">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
            </div>
        </div>
@endsection