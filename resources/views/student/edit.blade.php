@extends('layouts.main')

@section('content')
    <h2>Ubah Data Siswa</h2>
    
    <form method="post" action="/student/edit/{{ $user->id }}">
      @method('patch')
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="nis">Nis</label>
                            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" placeholder="Masukan nomor induk siswa" value="{{ $user->nis }}">
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
                          <option value="">Kelas-Jurusan-Gugus</option>
                          <option value="12 RPL B" {{ $user->class == '12 RPL B' ? 'selected' : '' }}>12 RPL B</option>
                          <option value="12 RPL A" {{ $user->class == '12 RPL A' ? 'selected' : '' }}>12 RPL A</option>
                          <option value="11 RPL B" {{ $user->class == '11 RPL B' ? 'selected' : '' }}>11 RPL B</option>
                          <option value="11 RPL A" {{ $user->class == '11 RPL A' ? 'selected' : '' }}>11 RPL A</option>
                          <option value="10 RPL B" {{ $user->class == '10 RPL B' ? 'selected' : '' }}>10 RPL B</option>
                          <option value="10 RPL A" {{ $user->class == '10 RPL A' ? 'selected' : '' }}>10 RPL A</option>
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
                  <small id="nope" class="form-text text-muted">Untuk alasan keamanan password tidak bisa di ubah oleh orang lain.</small>
                </div>

                <button type="submit" class="btn btn-primary">Ubah data siswa</button>
            </form>
        </div>
    </div>
@endsection