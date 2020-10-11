@extends('layouts.main')

@section('content')
        <h2>List Daftar Bank</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List Bank yang bekerja sama dengan SMKN 1 Bekasi</p>
                @can('isAdmin')
                <h4><a class="badge badge-success mb-2" href="{{ url('bank/create') }}">Tambah Data</a></h4>
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
                        <th scope="col">Nomor Rekening</th>
                        <th scope="col">Nama Bank</th>
                        @can('isAdmin')
                        <th scope="col">Aksi</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($banks as $bank)
                    <tr>
                    <th scope="row">{{$bank->id}}</th>
                        <td>{{$bank->account_number}}</td>
                        <td>{{$bank->name}}</td>
                        @can('isAdmin')
                        <td>
                            <a class="btn btn-primary btn-sm" href="/bank/edit/{{$bank->id}}">edit</a>
                            <form action="/bank/{{ $bank->id }}" method="post" class="d-inline">
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