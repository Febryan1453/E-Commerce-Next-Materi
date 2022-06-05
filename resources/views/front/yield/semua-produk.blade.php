@extends('front.landing')

@section('content')
    
    <section class="container mt-5 mb-5">
      <h4 class="d-flex justify-content-between">
        <strong>Semua Produk</strong>        
      </h4>

      <div class="row mt-3">

      @forelse($produk as $row)
        <div class="col-md-3 mt-4">
            <div class="card pro-index">
              <div class="card-body text-center">
                  <img src="{{url('storage/'.$row->img)}}" class="img-fluid">
                  
                  <div class="row mt-2">
                    <div class="col-md-12">
                        <h5><strong>{{$row->nama_produk}}</strong> </h5>
                        <h5>Rp. {{ number_format($row->harga) }}</h5>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="col-md-12">
                        <a href="{{route('detail',$row->slug)}}" style="width:100%" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                    </div>
                  </div>

              </div>
            </div>
        </div>
      @empty
      <p class="text-center">Data produk tidak ditemukan !</p>
      @endforelse

      </div>
      
    </section>

@endsection