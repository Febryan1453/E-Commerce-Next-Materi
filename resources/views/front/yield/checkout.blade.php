@extends('front.landing')
@section('content')

<?php $user = Illuminate\Support\Facades\Auth::user(); ?>

<div class="container checkout" style="margin-top: -60px;">

      <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                    <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="/">Home</a></li>
                    
                    <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="{{route('landing.keranjang')}}">Keranjang</a></li>
                    
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                
                </ol>
            </nav>
        </div>
    </div>
    
      <div class="row">
        <div class="col">        
          <a href="{{route('landing.keranjang')}}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i></a>
        </div>
      </div>

      <div class="row mt-4">

        <div class="col">
          <h4>Informasi Pembayaran</h4>
          <hr>
          <p>
            Untuk pembayaran silahkan dapat transfer di rekening
            dibawah ini sebesar : <strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong>
          </p>

          <div class="col">             
            <table width="100%">
              <tr>
                <td class="icon-bank"><img src="{{url('front/icon/bsi.png')}}" alt="Bank BSI" width="80"> </td>
                <td>
                  <div class="mt-2 ms-3">
                    <h5>BANK BSI - 451</h5>
                    No. Rekening <strong>7173086355</strong> a.n <strong>FEBRYAN</strong>                
                  </div>
                </td>                
              </tr>  
              <tr>
                <td class="icon-bank">
                    <div class="mt-4">
                        <img src="{{url('front/icon/bsi.png')}}" alt="Bank BSI" width="80"> 
                    </div>
                </td>
                <td>
                  <div class="mt-4 ms-3">
                    <h5>BANK BSI - 451</h5>
                    No. Rekening <strong>7173394971</strong> a.n <strong>FEBRYAN</strong>                
                  </div>
                </td>                
              </tr>            
              <tr>                
                <td class="icon-bank">
                  <div class="mt-4">
                    <img src="{{url('front/icon/bni.png')}}" alt="Bank BNI" width="80">
                  </div>
                </td>
                <td>
                  <div class="mt-4 ms-3">
                    <h5>BANK BNI - 009</h5>
                    No. Rekening <strong>1122610841</strong> a.n <strong>FEBRYAN</strong>                
                  </div>
                </td>                
              </tr>
              <tr>                
                <td class="icon-bank">
                  <div class="mt-4">
                    <img src="{{url('front/icon/jago.png')}}" alt="Bank Jago" width="80">
                  </div>
                </td>
                <td>
                  <div class="mt-4 ms-3">
                    <h5>BANK JAGO - 542</h5>
                    No. Rekening <strong>104704303891</strong> a.n <strong>FEBRYAN</strong>                
                  </div>
                </td>                
              </tr>
            </table>
          </div>
        </div>

        <div class="col">
          <h4>Informasi Pengiriman</h4>
          <hr>
          <form action="{{route('landing.checkout',$user->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group mb-3">
              <label for="">No. HP</label>            
              <input id="telp" name="hp" value="{{$user->number_phone}}" type="text" class="form-control" autofocus>           
            </div>

            <div class="form-group">
              <label for="">Alamat</label>            
              <textarea style="height: 190px;" name="alamat" class="form-control">{{$user->address}}</textarea>
            </div>

            <!-- <button type="submit" class="btn btn-success btn-block mt-4"> <i class="fas fa-arrow-right"></i> Checkout </button>           -->
            
            <button type="button" class="btn btn-success btn-block mt-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <i class="fas fa-arrow-right"></i> Checkout </button> 
            
            @include('modal.konfirmasi-checkout')

          </form>
        </div>

      </div>

    </div>

@endsection