@extends('front.landing')

@section('content')

<div class="container keranjang-produk" style="margin-top: -60px;">

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    
                        <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="{{url('/')}}">Home</a></li>
                        
                        <li class="breadcrumb-item"><a style="color:#5a5a5a;" href="#">Produk</a></li>
                        
                        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                    
                    </ol>
                </nav>
            </div>
        </div>

        @if(Session::get('Success'))
            <div class="row flash">
                <div class="col-md-12">
                    <div class="alert alert-danger">                        
                    <i class="fas fa-trash text-danger"></i> {{Session::get('Success')}}
                    </div>
                </div>
            </div>                                        
        @endif

        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Gambar</td>
                                <td>Nama Produk</td>
                                <td>Catatan</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td><strong>Total Harga</strong></td>                            
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $no = 1 ?>
                            
                            @forelse ($details as $detail)
                                <tr>                        
                                    <td>{{$no++}}</td>

                                    <td>
                                        <img src="{{ url('storage',$detail->produk->img)}}" class="img-fluid" width="200">
                                    </td>

                                    <td>                            
                                        {{ $detail->produk->nama_produk }}
                                    </td>

                                    <td>                            
                                        {{ $detail->catatan }}
                                    </td>
                                
                                    <td>{{ $detail->jumlah_pesanan }}</td>

                                    <td>Rp. {{ number_format($detail->produk->harga) }}</td>

                                    <td><strong>Rp. {{ number_format($detail->total_harga) }}</strong></td>

                                    <td>
                                        <form action="{{route('del.pes.keranjang',$detail->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" title="Delete" class="btn btn-link" data-original-title="Remove" onclick="return confirm('Hapus Data {{$detail->produk->nama_produk}} ?')">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>                        
                                    <td colspan="8">Data Kosong</td>
                                </tr>
                            @endforelse
                                
                            @if(!empty($pesanan))
                                <tr>
                                    <td colspan="6" align="right"><strong>Total Harga : </strong></td>
                                    <td colspan="2" align="right"><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong> </td>
                                </tr>

                                <tr>                            
                                    <td colspan="6" align="right"><strong>Kode Unik : </strong></td>
                                    <td colspan="2" align="right"><strong>Rp. {{ number_format($pesanan->kode_unik) }}</strong> </td>
                                </tr>

                                <tr>                        
                                    <td colspan="6" align="right"><strong>Total Yang Harus dibayarkan : </strong></td>                            
                                    <td colspan="2" align="right"><strong>Rp. {{ number_format($pesanan->total_harga+$pesanan->kode_unik) }}</strong> </td>
                                </tr>

                                <tr>                        
                                    <td colspan="6"></td>
                                    <td colspan="2" align="right">                                
                                        <a href="{{route('checkout.index')}}" class="btn btn-success btn-block">                                
                                        <i class="fas fa-arrow-right"></i> Check Out                                
                                        </a>
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection