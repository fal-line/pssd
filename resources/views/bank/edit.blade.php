@extends('layouts.main')

@section('content')
    <h2>Edit Bank</h2>
    
    <form method="post" action="/bank/edit/{{ $bank->id }}">
      @method('patch')
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="account_number">Rekening Bank</label>
                            <input type="text" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" placeholder="Masukan nomor rekening yang berkerjasama" value="{{ $bank->account_number }}">
                            @error('account_number')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                            @enderror
                          </div>
                    </div>
                  </div>
                <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukan nama petugas" value="{{ $bank->name }}">
                        @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                <button type="submit" class="btn btn-primary">Ubah Bank</button>
            </form>
        </div>
    </div>
@endsection