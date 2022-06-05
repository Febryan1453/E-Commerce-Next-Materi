@extends('front.landing')

@section('content')
 
    <section class="container mt-5 mb-5">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    
                        <li class="breadcrumb-item"><a style="text-decoration: none; color:#5a5a5a" href="{{url('/')}}">Home</a></li>
                        
                        <li class="breadcrumb-item"><a style="text-decoration: none; color:#5a5a5a" href="#">Kategori</a></li>
                        
                        <li class="breadcrumb-item active" aria-current="page"><strong>{{$nama_kat->nama_kategori}}</strong></li>
                    
                    </ol>
                </nav>
            </div>
        </div>

      <div class="row mt-3">

      @forelse($produk as $row)
        <div class="col-md-3 mt-2">
            <div class="card">
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
                        <a style="width:100%" href="{{route('detail',$row->slug)}}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                    </div>
                  </div>

              </div>
            </div>
        </div>
      @empty

      <p class="text-center">Admin belum menambahkan produk pada kategori {{$nama_kat->nama_kategori}}</p>

      @endforelse

      </div>
      
    </section>

@endsection

