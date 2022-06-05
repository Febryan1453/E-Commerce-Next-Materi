@extends('front.landing')

@section('content')

<div class="container detail-produk">

    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a style="color:#5a5a5a" href="{{url('/')}}">Home</a></li>

                    <li class="breadcrumb-item"><a style="color:#5a5a5a" href="#">Produk</a></li>

                    <li class="breadcrumb-item active" aria-current="page"><strong>Detail Produk</strong></li>

                </ol>
            </nav>
        </div>
    </div>

    @if(Session::get('Success'))
    <div class="row flash">
        <div class="col-md-12">
            <div class="alert alert-success">
                <i class="fas fa-shopping-cart"></i> {{Session::get('Success')}}
            </div>
        </div>
    </div>
    @endif

    @if(Session::get('Failed'))
    <div class="row flash">
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{Session::get('Failed')}}
            </div>
        </div>
    </div>
    @endif

    <div class="row">

        <div class="col-md-6 mt-3">
            <div class="card h-80">
                <div class="card-body text-center">
                    <img id="zoom_01" src="{{url('storage/'.$produk->img)}}" data-zoom-image="{{url('storage/'.$produk->img)}}" alt="Gambar Produk" class="img-fluid">
                    <!-- <img src="{{url('storage/'.$produk->img)}}" class="img-fluid w-75"> -->
                </div>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <h4>
                <strong>{{$produk->nama_produk}}</strong>
            </h4>
            <h4>Rp. {{ number_format($produk->harga) }}</h4>
            <div class="row">
                <div class="col">
                    <form action="{{route('landing.tambah')}}" method="POST">
                        @csrf

                        <input type="hidden" class="form-control" id="id" name="id" value="{{$produk->id}}">
                        <input type="hidden" class="form-control" name="nama_produk" value="{{$produk->nama_produk}}">
                        <input type="hidden" class="form-control" name="harga" value="{{$produk->harga}}">

                        <table class="table" style="border-top-style: hidden">

                            <tr>
                                <td>Ketersediaan</td>
                                <td>:</td>
                                <td>
                                    @if ($produk->status == 'Tersedia')
                                    <span class="badge bg-success"><i class="fas fa-check"></i>Tersedia</span>
                                    @else
                                    <span class="badge bg-danger"><i class="fas fa-times"></i>Kosong</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><a style="color:#5a5a5a;" href="{{route('landing.kategori',$produk->kategori->slug)}}">{{$produk->kategori->nama_kategori}}</a></td>
                            </tr>

                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td>{{$produk->berat}}</td>
                            </tr>

                            <tr>
                                <td>Jumlah</td>
                                <td>:</td>
                                <td>
                                    <input required class="form-control" id="number" name="jumlah" style="width: 100%;" type="number" min="1">
                                </td>
                            </tr>

                            <script>
                                // Select your input element.
                                var number = document.getElementById('number');

                                // Listen for input event on numInput.
                                number.onkeydown = function(e) {
                                    if (!((e.keyCode > 95 && e.keyCode < 106) ||
                                            (e.keyCode > 47 && e.keyCode < 58) ||
                                            e.keyCode == 8)) {
                                        return false;
                                    }
                                }
                            </script>

                            <tr>
                                <td>Catatan</td>
                                <td>:</td>
                                <td>
                                    <!-- <input style="width: 100%; cursor:not-allowed !important;">    -->
                                    <textarea class="form-control" name="catatan" id="" placeholder="Opsional" rows="4"></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="3" style="border-bottom: none;">
                                    @guest
                                    <p class="text-center mt-4"><a style="text-decoration: none;" href="{{route('login')}}">Login</a> dulu ya kak <br> sebelum menambahkan produk ke keranjang.</p>
                                    @else
                                    @if ($produk->status == 'Tersedia')
                                    <button class="btn btn-dark btn-block" type="submit" style="width: 100%"><i class="fas fa-shopping-cart"></i> Keranjang</button>
                                    @else
                                    <p class="text-center mt-4">Kami kehabisan stok untuk <strong>{{$produk->nama_produk}}</strong> nih kak</p>
                                    @endif
                                    @endguest
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection