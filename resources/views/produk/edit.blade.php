@extends('user.template')

@section('content')

        <div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">{{$title}}</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="{{route('profile.index')}}">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="{{route('produk.index')}}">List Produk</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">{{$title}}</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">{{$title}}</div>
								</div>
								<div class="card-body">									

                                    <form action="{{route('produk.update', $produk->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
									@method('PUT')

									<div class="row">
										<div class="col-md-1"></div>

										<div class="col-md-6">

											<div class="form">
										
												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Nama :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input value="{{ $produk->nama_produk }}" type="text" name="nama_produk" class="@error('nama_produk') is-invalid @enderror form-control input-fixed" id="exampleInputPassword1">
                                                        @error('nama_produk')
                                                        <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
												</div>

                                                <div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Harga :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input value="{{ $produk->harga }}" type="text" name="harga" class="@error('harga') is-invalid @enderror form-control input-fixed" id="exampleInputPassword1">
                                                        @error('harga')
                                                        <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
												</div>

												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Kategori :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<!-- <input type="text" name="status" class="@error('status') is-invalid @enderror form-control input-fixed" id="exampleInputPassword1"> -->
                                                        <select class="@error('kategori_id') is-invalid @enderror form-control input-fixed" name="kategori_id">
                                                            <option value="">-- Kategori Produk --</option>
															@foreach($kategori as $kat)
															<option value="{{$kat->id}}" @if ($kat->id == $produk->kategori_id) selected="selected" @endif>{{$kat->nama_kategori}}</option>
															@endforeach
                                                        </select>
                                                        @error('kategori_id')
                                                        <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
												</div>

                                                <div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Status :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<!-- <input type="text" name="status" class="@error('status') is-invalid @enderror form-control input-fixed" id="exampleInputPassword1"> -->
                                                        <select class="form-control input-fixed" name="status">
                                                            @if($produk->status == 'Tersedia')
																<option value="">-- Pilih Status --</option>
																<option value="Tersedia" selected>Tersedia</option>                                                            
																<option value="Kosong">Kosong</option>
															@else
																<option value="">-- Pilih Status --</option>
																<option value="Tersedia">Tersedia</option>                                                            
																<option value="Kosong" selected>Kosong</option>
															@endif
                                                        </select>
                                                    </div>
												</div>

                                                <div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Berat :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input value="{{ $produk->berat }}" type="text" name="berat" class="@error('berat') is-invalid @enderror form-control input-fixed" id="exampleInputPassword1">
                                                        @error('berat')
                                                        <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
												</div>	

												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">	
													<label>Gambar :</label>													
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">
														<input type="file" name="img" class="@error('img') is-invalid @enderror form-control input-fixed">												
													
                                                        @error('img')
                                                        <div class="invalid-feedback" style="width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror</div>
												</div>
												
											</div> 	
																				
										</div>

																			
										
										<div class="col-md-1"></div>
									</div>

								    </div>
                                    <div class="card-footer">
                                        <div class="form">
                                            <div class="form-group from-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                        <button id="displayNotif" type="submit" class="btn btn-primary">Save Produk</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection