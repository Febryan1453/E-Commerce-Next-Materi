@extends('front.landing')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{asset('front/img/sale-1.jpg')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{url('front/img/sale-2.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('front/img/sale-2.jpg')}}" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="{{url('front/img/sale-3.jpg')}}" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>

    <section class="container mt-4">
      <h4><strong>Berdasarkan Kategori</strong></h4>
      <div class="row mt-3">
        @foreach($kategori as $kat)
        <div class="col mt-3">
            <a style="text-decoration:none; color:#5a5a5a;" href="{{route('landing.kategori',$kat->slug)}}">
              <div class="card shadow">
                  <div class="card-body text-center">
                     {{$kat->nama_kategori}}
                  </div>
              </div>
            </a>
        </div>
        @endforeach
      </div>
   </section>
    
    <section class="container mt-5 mb-5">
      <h4 class="d-flex justify-content-between">
        <strong>Produk Terbaru</strong>
        <!-- <a href="#" class="btn btn-dark float-right"><i class="fas fa-eye"></i> Lihat Semua </a> -->
      </h4>

      <div class="row mt-3">

      @foreach($produk as $row)
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
      @endforeach

      </div>
      
    </section>

@endsection