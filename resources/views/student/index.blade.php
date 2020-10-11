@extends('layouts.main')

@section('content')
        <h2>List Daftar Siswa</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar murid yang terdaftar di SMKN 1 Bekasi</p>
                <h4><a class="badge badge-success mb-2" href="{{ url('student/create') }}">Tambah Data</a></h4>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nis</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                        <td>{{$user->nis}}</td>
                        <td>{{$user->class}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/student/edit/{{$user->id}}">edit</a>
                            <form action="/student/{{ $user->id }}" method="post" class="d-inline">
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