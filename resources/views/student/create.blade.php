@extends('layouts.main')

@section('content')
    <h2>Form Tambah Siswa</h2>
    
    <form method="post" action="/student">
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nis">Nis</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="Masukan nomor induk siswa" value="{{ old('nis') }}">
                            @error('nis')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                    </div>
                    <div class="col">
                        <label for="inputState">Kelas</label>
                        <select id="inputState" name='class' class="form-control @error('class') is-invalid @enderror">
                          <option value="" selected>Kelas-Jurusan-Gugus</option>
                          <option value="12 RPL B" {{ old('class') == '12 RPL B' ? 'selected' : '' }}>12 RPL B</option>
                          <option value="12 RPL A" {{ old('class') == '12 RPL A' ? 'selected' : '' }}>12 RPL A</option>
                          <option value="11 RPL B" {{ old('class') == '11 RPL B' ? 'selected' : '' }}>11 RPL B</option>
                          <option value="11 RPL A" {{ old('class') == '11 RPL A' ? 'selected' : '' }}>11 RPL A</option>
                          <option value="10 RPL B" {{ old('class') == '10 RPL B' ? 'selected' : '' }}>10 RPL B</option>
                          <option value="10 RPL A" {{ old('class') == '10 RPL A' ? 'selected' : '' }}>10 RPL A</option>
                        </select>
                        @error('class')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                    </div>
                  </div>
                
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama siswa" value="{{ old('name') }}">
                        @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukan email siswa" value="{{ old('email') }}">
                        @error('email')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control @error('password') is-invalid @enderror" type="text" id="password" name="password" placeholder="Password bawaan" readonly>
                  <small id="passwordInfo" class="form-text text-muted">Password bawaan siswa mengikuti nis.</small>
                </div>

                <button type="submit" class="btn btn-primary">Daftarkan siswa</button>
            </form>
        </div>
    </div>
@endsection