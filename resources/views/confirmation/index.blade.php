@extends('layouts.mainPay')

@section('content')
        <h2>List Daftar Pembayaran yang di konfirmasi</h2>
        <div class="card px-4">
            <div class="card-body">
                <p class="card-text">List daftar pembayaran yang di konfirmasi oleh siswa</p>
                <div class="container">
                    @cannot('isUser')
                        @cannot('isStudent')
                    <div class="row row-cols-2">
                        <div class="col p-0">
                            <h4><a class="badge badge-success mb-2" href="{{ url('confirmation/create') }}">Tambah Pembayaran</a></h4>
                        </div>
                        <div class="col p-0 d-flex justify-content-end">
                          <h4><a class="badge badge-info mb-2" href="{{ url('confirmation/history') }}">Riwayat Pembayaran</a></h4>
                        </div>
                    </div>
                </div>
                        @endcannot
                    @endcannot
                
                
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
                        @cannot('isUser')
                        @cannot('isStudent')
                        <th scope="col">Aksi</th>
                        @endcannot
                        @endcannot
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
                        
                        @cannot('isUser')
                        @cannot('isStudent')
                        <td>
                        @switch($confirmation->status)
                            @case('diajukan')
                                <form action="/confirmation/{{ $confirmation->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input hidden type="text" class="form-control" name="status" value="diproses">
                                    <input hidden type="text" class="form-control" name="employe_id" value="{{ Auth::user()->id }}">
                                    <button class="btn btn-primary btn-sm" href="">proses</button>
                                </form>
                                @break
                        
                            @case('diproses')
                                <form action="/confirmation/{{ $confirmation->id }}" method="post" class="d-inline">
                                    @method('put')
                                    @csrf
                                    <input hidden type="text" class="form-control" name="status" value="selesai">
                                    <button class="btn btn-primary btn-sm" href="">konfirmasi</button>
                                </form>
                                @break
                        
                            @default
                            
                        @endswitch
                            <form action="/confirmation/{{ $confirmation->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger btn-sm" href="">delete</button>
                            </form>
                        </td>
                        @endcannot
                        @endcannot
                    </tr>
                    @endforeach
                    
                    </tbody>
                  </table>
            </div>
        </div>
@endsection