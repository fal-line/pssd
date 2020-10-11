@extends('layouts.main')

@section('content')
        <h2>List Daftar Petugas</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar petugas yang terdaftar dan aktif di SMKN 1 Bekasi</p>
                @can('isAdmin')
                <h4><a class="badge badge-success mb-2" href="{{ url('employe/create') }}">Tambah Data</a></h4>
                @endcan
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kode Petugas</th>
                        <th scope="col">Bagian</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        @can('isAdmin')
                        <th scope="col">Aksi</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                        <td>{{$user->emp_id}}</td>
                        <td>{{$user->section}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @can('isAdmin')
                        <td>
                            <a class="btn btn-primary btn-sm" href="/employe/edit/{{$user->id}}">edit</a>
                            <form action="/employe/{{ $user->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" href="">delete</button>
                            </form>
                       </td>
                       @endcan
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
@endsection