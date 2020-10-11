@extends('layouts.mainPay')

@section('content')
        <h2>List Daftar Pembayaran menunggu konfirmasi</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar pembayaran yang belum di konfirmasi oleh siswa</p>
                <div class="container">
                    @cannot('isUser')
                    @cannot('isStudent')
                    <div class="row row-cols-2">
                      <div class="col p-0"><h4><a class="badge badge-success mb-2" href="{{ url('payment/create') }}">Tambah Pembayaran</a></h4></div>
                      <div class="col p-0 d-flex justify-content-end"><h4><a class="badge badge-info mb-2" href="{{ url('payment/history') }}">Riwayat Pembayaran</a></h4></div>
                    </div>
                    @endcannot
                    @endcannot
                </div>
                
                
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead class="thead-light"> 
                      <tr>
                        <th scope="col">ID Pembayaran</th>
                        <th scope="col">Nis Siswa</th>
                        <th scope="col">Untuk Bulan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Bank Tujuan</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">Status</th>
                        @cannot('isUser')
                        @cannot('isStudent')
                        <th scope="col">Aksi</th>
                        @endcannot
                        @endcannot
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($payments as $payment)
                    <tr>
                    <th scope="row">{{$payment->id}}</th>
                        <td>{{$payment->student_id}}</td>
                        <td>{{$payment->pay_for}}</td>
                        <td>{{$payment->amount}}</td>
                        {{-- <td>{{$payment->from_bank}}</td> --}}
                        <td>{{$payment->to_bank}}</td>
                        <td>{{$payment->employe_id}}</td>
                        <td>{{$payment->status}}</td>
                        @cannot('isUser')
                        @cannot('isStudent')
                        <td>
                        @switch($payment->status)
                            @case('diajukan')
                                <form action="/payment/{{ $payment->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input hidden type="text" class="form-control" name="status" value="menunggu konfirmasi">
                                    <input hidden type="text" class="form-control" name="employe_id" value="{{ Auth::user()->id }}">
                                    <button class="btn btn-primary btn-sm" href="">proses</button>
                                </form>
                                @break
                        
                            @case('menunggu konfirmasi')
                                <form action="/payment/{{ $payment->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input hidden type="text" class="form-control" name="status" value="selesai">
                                    <button class="btn btn-primary btn-sm" href="">konfirmasi</button>
                                </form>
                                @break
                        
                            @default
                        @endswitch
                        
                            <form action="/payment/{{ $payment->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" href="">delete</button>
                            </form>
                        @endcannot
                        @endcannot
                        </td>
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
            </div>
        </div>
@endsection