@extends('layouts.main')

@section('content')
            <div class="card">
                <h5 class="card-header">
                    Masuk
                </h5>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat datang {{ Auth::user()->name }}!
                </div>
            </div>
            
            
            <button class="btn btn-secondary btn-lg btn-block mt-4" disabled></button>

        @can('isStudent')
            <div class="row mt-4">
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Pembayaran Baru</h5>
                            <div class="card-body">
                                <p class="card-text">Langsung ke form Pembayaran</p>
                                <a href="{{ url('payment/create') }}" class="btn btn-primary">Ke Pembayaran</a>
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h5 class="card-header">Konfirmasi Pembayaran</h5>
                            <div class="card-body">
                                <p class="card-text">Konfirmasi pembayaran yang sudah di proses</p>
                                <a href="{{ url('confirmation/create') }}" class="btn btn-primary">Konfirmasi Pembayaran</a>
                            </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <div class="card mt-4">
                        <h5 class="card-header">Pembayaran</h5>
                            <div class="card-body">
                                <p class="card-text">Daftar pembayaran yang di ajukan murid sebelum melakukan konfirmasi.</p>
                                <a href="{{ url('payment') }}" class="btn btn-primary">Ke List Daftar Pembayaran</a>
                            </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mt-4">
                        <h5 class="card-header">List Konfirmasi Pembayaran</h5>
                            <div class="card-body">
                                <p class="card-text">Daftar pembayaran yang telah di konfirmasi oleh murid butuh verifikasi</p>
                                <a href="{{ url('confirmation') }}" class="btn btn-primary">Ke List Konfirmasi Pembayaran</a>
                            </div>
                    </div>
                </div>
            </div>
            
        @endcan


        @cannot('isUser')
            @cannot('isStudent')

            <div class="card mt-4">
                <h5 class="card-header">Jalan Pintas</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header">Murid Baru</h5>
                                        <div class="card-body">
                                            <p class="card-text">Langsung ke form Murid baru.</p>
                                            <a href="{{ url('student/create') }}" class="btn btn-primary">Murid Baru</a>
                                        </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header">Pembayaran Baru</h5>
                                        <div class="card-body">
                                            <p class="card-text">Langsung ke form Pembayaran</p>
                                            <a href="{{ url('payment/create') }}" class="btn btn-primary">Form Pembayaran</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <button class="btn btn-secondary btn-lg btn-block mt-4" disabled></button>
            
                <div class="row">
                    <div class="col">
                        <div class="card mt-4">
                            <h5 class="card-header">Pembayaran</h5>
                                <div class="card-body">
                                    <p class="card-text">Daftar pembayaran yang di ajukan murid sebelum melakukan konfirmasi.</p>
                                    <a href="{{ url('payment') }}" class="btn btn-primary">Ke List Daftar Pembayaran</a>
                                </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mt-4">
                            <h5 class="card-header">List Konfirmasi Pembayaran</h5>
                                <div class="card-body">
                                    <p class="card-text">Daftar pembayaran yang telah di konfirmasi oleh murid butuh verifikasi</p>
                                    <a href="{{ url('confirmation') }}" class="btn btn-primary">Ke List Konfirmasi Pembayaran</a>
                                </div>
                        </div>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <h5 class="card-header">Daftar Murid</h5>
                        <div class="card-body">
                            <p class="card-text">List daftar murid yang terdaftar di SMKN 1 Bekasi</p>
                            <a href="{{ url('student') }}" class="btn btn-primary">Ke List Daftar Murid</a>
                        </div>
                </div>

                <div class="card mt-4">
                    <h5 class="card-header">Daftar Petugas</h5>
                        <div class="card-body">
                            <p class="card-text">List daftar petugas yang terdaftar</p>
                            <a href="{{ url('employe') }}" class="btn btn-primary">Ke List Daftar Petugas</a>
                        </div>
                </div>
                
                <div class="card mt-4">
                    <h5 class="card-header">Daftar Bank</h5>
                        <div class="card-body">
                            <p class="card-text">List daftar bank yang bekerja sama dengan SMKN 1 Bekasi</p>
                            <a href="{{ url('bank') }}" class="btn btn-primary">Ke List Daftar Bank</a>
                        </div>
                </div>
                
                <button type="button" class="btn btn-secondary btn-lg btn-block mt-4" disabled></button>

                @cannot('isEmploye')
                <div class="card mt-4">
                    <h5 class="card-header">Daftar User</h5>
                        <div class="card-body">
                            <p class="card-text">List Lengkap User Yang Terdaftar</p>
                            <a href="{{ url('user') }}" class="btn btn-primary">List User</a>
                        </div>
                </div>
                @endcannot
                @endcannot
            @endcannot
            
@endsection
