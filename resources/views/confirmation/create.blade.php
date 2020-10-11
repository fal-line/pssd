@extends('layouts.main')

@section('content')
    <h2>Form Konfirmasi Pembayaran</h2>
    
    <form method="post" action="/confirmation">
    @csrf
    <div class="card px-4">
        <div class="card-body">
        <div class="form-group">
            <label for="payment_id">Nomor Pembayaran</label>
            <select id="payment_id" name='payment_id' class="form-control @error('payment_id') is-invalid @enderror">
              <option value="" selected>Pilih Nomor Pembayaran</option>
              @foreach ($payments as $payment)
                <option value="{{$payment->id}}" {{ old('payment_id') == $payment->id ? 'selected' : '' }}>{{$payment->id}}</option>
              @endforeach
            </select>
            @error('payment_id')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
            @enderror
            </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="account_number">Nomor Rekening Pengirim</label>
                            <input type="account_number" class="form-control @error('account_number') is-invalid @enderror" id="account_number" name="account_number" placeholder="Masukan Nomor Rekening Pengirim" value="{{ old('account_number') }}">
                                  @error('account_number')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                  @enderror
                          </div>
                        </div>
                    </div>

                    <div class="col">
                      <div class="form-group">
                        <div class="form-group">
                          <label for="account_holder">Nama Pemegang Rekening</label>
                          <input type="account_holder" class="form-control @error('account_holder') is-invalid @enderror" id="account_holder" name="account_holder" placeholder="Masukan Nama Pemegang Rekening" value="{{ old('account_holder') }}">
                                @error('account_holder')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                @enderror
                        </div>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="amount">Jumlah yang di bayarkan</label>
                  <input type="amount" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" placeholder="Masukan jumlah yang ingin dibayarkan" value="{{ old('amount') }}">
                  <small id="nope" class="form-text text-muted">Nominal pembayaran kelipatan Rp400.000,-</small>
                        @error('amount')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                        @enderror
                </div>
                
                <div class="row">
                  <div class="col">
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
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="date">Tanggal transfer</label>
                      <br>
                      <input class="form-control" type="date" name="date">
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Buat Konfirmasi Pembayaran</button>
            </form>
        </div>
    </div>
@endsection