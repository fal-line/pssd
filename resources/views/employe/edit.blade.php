@extends('layouts.main')

@section('content')
    <h2>Ubah Data Petugas</h2>
    
    <form method="post" action="/employe/edit/{{ $user->id }}">
      @method('patch')
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="emp_id">ID Petugas</label>
                            <input type="text" class="form-control @error('emp_id') is-invalid @enderror" id="emp_id" name="emp_id" placeholder="Masukan ID Petugas" value="{{ $user->emp_id }}">
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
                          <option value="Administrasi" {{ $user->section == 'Administrasi' ? 'selected' : '' }}>Administrasi</option>
                          <option value="Keuangan" {{ $user->section == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                          <option value="Manager" {{ $user->section == 'Manager' ? 'selected' : '' }}>Manager</option>
                          <option value="Supervisor" {{ $user->section == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
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
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama siswa" value="{{ $user->name }}">
                        @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan email siswa" value="{{ $user->email }}">
                        @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                
                <div class="form-group">
                  <label for="nope">Password</label>
                  <input class="form-control" type="text" id="nope" name="nope" placeholder="Unavailable" readonly>
                  <small id="nope" class="form-text text-muted">Untuk alasan keamanan password tidak bisa di ubah siapapun.</small>
                </div>

                <button type="submit" class="btn btn-primary">Ubah data siswa</button>
            </form>
        </div>
    </div>
@endsection