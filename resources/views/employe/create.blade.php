@extends('layouts.main')

@section('content')
    <h2>Form Tambah Petugas</h2>
    
    <form method="post" action="/employe">
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="emp_id">ID Petugas</label>
                            <input type="text" class="form-control @error('emp_id') is-invalid @enderror" id="emp_id" name="emp_id" placeholder="Masukan nomor registrasi petugas" value="{{ old('emp_id') }}">
                            @error('emp_id')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                    </div>
                    <div class="col">
                        <label for="section">Bagian</label>
                        <select id="section" name='section' class="form-control @error('section') is-invalid @enderror">
                          <option value="" selected>Bagian Petugas</option>
                          <option value="Administrasi">Administrasi</option>
                          <option value="Keuangan">Keuangan</option>
                          <option value="Manager">Manager</option>
                          <option value="Supervisor">Supervisor</option>
                        </select>
                        @error('section')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                    </div>
                  </div>
                
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama petugas" value="{{ old('name') }}">
                        @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan email petugas" value="{{ old('email') }}">
                        @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" type="text" id="password" name="password" placeholder="Password bawaan" readonly>
                  <small id="passwordInfo" class="form-text text-muted">Password petugas "gantipassword"</small>
                </div>

                <button type="submit" class="btn btn-primary">Daftarkan siswa</button>
            </form>
        </div>
    </div>
@endsection