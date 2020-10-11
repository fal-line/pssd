@extends('layouts.mainPay')

@section('content')
        <h2>List Daftar Pembayaran menunggu konfirmasi</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar pembayaran yang belum di konfirmasi oleh siswa</p>
                <div class="col p-0"><h4><a class="badge badge-info mb-2" href="{{ url('confirmation') }}">Kembali</a></h4></div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light"> 
                        <tr>
                            <th scope="col">ID </th>
                            <th scope="col">Nomor Pembayaran</th>
                            <th scope="col">Nomor Rekening</th>
                            <th scope="col">A/N Rekening</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Bank Tujuan</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            @cannot('isUser') @cannot('isStudent') @cannot('isEmploye')
                            <th scope="col">Aksi</th>
                            @endcan @endcan @endcan
                          </tr>
                    </thead>
                    <tbody>

                    @foreach ($confirmations as $confirmation)
                    <tr>
                        <th scope="row">{{$confirmation->id}}</th>
                        <td>{{$confirmation->payment_id}}</td>
                        <td>{{$confirmation->account_number}}</td>
                        <td>{{$confirmation->account_holder}}</td>
                        <td>{{$confirmation->amount}}</td>
                        <td>{{$confirmation->to_bank}}</td>
                        <td>{{$confirmation->employe_id}}</td>
                        <td>{{$confirmation->date}}</td>
                        <td>{{$confirmation->status}}</td>
                    </tr>
                    @endforeach
                            <td>
                                <form action="/confirmation/history/{{ $confirmation->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm" href="">delete</button>
                                </form>
                            </td>
                            
                            @endcannot
                        @endcannot
                    </tbody>
                  </table>
            </div>
        </div>
@endsection