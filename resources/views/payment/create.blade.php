@extends('layouts.main')

@section('content')
    <h2>Form Pembayaran</h2>
    
    <form method="post" action="/payment">
    @csrf
    <div class="card px-4">
        <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label for="student_id">Nis Siswa</label>
                          <select id="student_id" name='student_id' class="form-control @error('student_id') is-invalid @enderror">
                            <option value="" selected>Nis Siswa</option>
                            @foreach ($users as $user)
                            <option value="{{$user->nis}}" {{ old('student_id') == $user->nis ? 'selected' : '' }}>{{$user->nis}} - {{$user->name}}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                          @enderror
                        </div>
                    </div>

                    <div class="col">
                        <label for="pay_for">Pembayaran untuk bulan</label>
                        <select id="pay_for" name='pay_for' class="form-control @error('pay_for') is-invalid @enderror">
                          <option value="" selected>Masukan bulan</option>
                          <option value="Januari" {{ old('pay_for') == 'Januari' ? 'selected' : '' }}>Januari</option>
                          <option value="Februari" {{ old('pay_for') == 'Februari' ? 'selected' : '' }}>Februari</option>
                          <option value="Maret" {{ old('pay_for') == 'Maret' ? 'selected' : '' }}>Maret</option>
                          <option value="April" {{ old('pay_for') == 'April' ? 'selected' : '' }}>April</option>
                          <option value="Mei" {{ old('pay_for') == 'Mei' ? 'selected' : '' }}>Mei</option>
                          <option value="Juni" {{ old('pay_for') == 'Juni' ? 'selected' : '' }}>Juni</option>
                          <option value="Juli" {{ old('pay_for') == 'Juli' ? 'selected' : '' }}>Juli</option>
                          <option value="Agustus" {{ old('pay_for') == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                          <option value="September" {{ old('pay_for') == 'September' ? 'selected' : '' }}>September</option>
                          <option value="Oktober" {{ old('pay_for') == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                          <option value="November" {{ old('pay_for') == 'November' ? 'selected' : '' }}>November</option>
                          <option value="Desember" {{ old('pay_for') == 'Desember' ? 'selected' : '' }}>Desember</option>
                        </select>
                        @error('pay_for')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                    </div>
                  </div>
                  
                  
                <div class="form-group">
                  <label for="amount">Jumlah</label>
                  <input type="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="Masukan jumlah yang ingin dibayarkan" value="{{ old('amount') }}">
                  <small id="nope" class="form-text text-muted">Nominal pembayaran kelipatan Rp400.000,-</small>
                        @error('amount')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                
                {{-- <div class="form-group">
                  <label for="to_bank">Bank Tujuan</label>
                  <input type="text" class="form-control @error('to_bank') is-invalid @enderror" id="to_bank" name="to_bank" placeholder="Masukan nama siswa" value="{{ old('to_bank') }}">
                        @error('to_bank')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div> --}}
                <div class="form-group">
                  <label for="to_bank">Pembayaran ke bank</label>
                  <select id="to_bank" name='to_bank' class="form-control @error('to_bank') is-invalid @enderror">
                    <option value="" selected>Pilih bank</option>
                    @foreach ($banks as $bank)
                    <option value="{{$bank->account_number}}" {{ old('to_bank') == $bank->account_number ? 'selected' : '' }}>{{$bank->account_number}} - {{$bank->name}}</option>
                    @endforeach
                  </select>
                  @error('to_bank')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan Pembayaran</button>
            </form>
        </div>
    </div>
@endsection