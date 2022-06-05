@extends('front.landing')
@section('content')
<div class="container history" style="margin-top: -60px;">

      <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                
                    <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="{{url('/')}}">Home</a></li>
                    
                    <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="#">Checkout</a></li>
                    
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                
                </ol>
            </nav>
        </div>
      </div>

        @if(Session::get('Success')) 
            <div class="row flash mb-2">
                <div class="col-md-12">
                    <div class="alert alert-success">                        
                      <i class="fas fa-trash text-success"></i> {{Session::get('Success')}}
                    </div>
                </div>
            </div>                                        
       @endif

      <div class="row">
        <div class="col">        
          <a href="{{route('landing.keranjang')}}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i></a>
        </div>
      </div>    

      <div class="row mt-4">
        <div class="col">
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <td>No.</td>                
                  <td>Tanggal Pesan</td>
                  <td>Kode Pemesanan</td>
                  <td>Pesanan</td>
                  <td>Status</td>
                  <td><strong>Total Harga</strong></td>
                  <td></td>
                </tr>
              </thead>

              <tbody>
              <?php $no = 1 ?>
              @forelse ($pesanans as $pesanan)
                <tr>            
                    <td>{{ $no++ }}</td>
                    <td>{{ $pesanan->created_at }}</td>
                    <td>{{ $pesanan->kode_pemesanan }}</td>
                    <td>
                        <?php $pesanan_details = App\Models\DetailPesanan::where('pesanan_id', $pesanan->id)->get(); ?>
                        @foreach ($pesanan_details as $pesanan_detail)
                            <img src="{{ url('storage', $pesanan_detail->produk->img )}}" class="img-fluid" width="50">
                            {{ $pesanan_detail->produk->nama_produk }}
                            <br>
                        @endforeach
                    </td>
                    <td>
                        @if($pesanan->status == 2)
                            <span class="badge bg-info text-dark">Lunas</span>
                        @elseif($pesanan->status == 1)
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($pesanan->status == 3)
                            <span class="badge bg-success text-dark">Dikirim</span>
                        @endif
                    </td>                
                  <td><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong></td>
                  <td></td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">Data Kosong</td>
                </tr>
                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="row mt-4">

        <div class="col">
          <div class="card shadow py-3 px-3">
            <div class="card-body">
              <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
              <div class="media">              
                <img class="mr-3" src="{{asset('front/icon/wa.png')}}" alt="Logo WhatsApp" width="60">              
                <div class="media-body mt-2">
                  <h5 class="mt-0">WhatsApp</h5>
                  +62 821-9117-0349 <br>
                  <div class="mt-2">
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=6282191170349" class="btn btn-success btn-sm">Hubungi Admin di WhatsApp</a>                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col">
          <div class="card shadow py-3 px-3">
            <div class="card-body">
              <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
              <div class="media">              
                <img class="mr-3" src="{{asset('front/icon/tel.png')}}" alt="Bank BRI" width="40">              
                <div class="media-body mt-2">
                  <h5 class="mt-0">Telegram</h5>
                  +62 821-9117-0349 <br>
                  <div class="mt-2">
                    <a target="_blank" href="https://t.me/fbrynryn" class="btn btn-success btn-sm telegram">Hubungi Admin di Telegram</a>                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row mt-5">
        <div class="col">        
          <div class="shadow alert alert-success" role="alert">          
            <h6><strong>*Saat konfirmasi silahkan lampirkan :</strong></h6>
            <p><strong>1. Struk bukti transfer diikuti dengan kode unik pada total harga</strong></p>
          </div>
        </div>
      </div>

    </div>
@endsection