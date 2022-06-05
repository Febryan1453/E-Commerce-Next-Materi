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
								<a href="{{route('kategori.index')}}">{{$title}}</a>
							</li>
						</ul>
					</div>
                    <div class="row">
                    <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center justify-content-between">
										<h4 class="card-title">List Kategori</h4>
										<a data-target="#ModalAddKateggori" data-toggle="modal">
											<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i> &nbsp;
												Kategori
											</button>
										</a>
									</div>
								</div>
								<div class="card-body">
									
									<div class="table-responsive">
										<div id="add-row_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
											<div class="row">
												<div class="col-sm-12 col-md-6">
													<!-- <div class="dataTables_length" id="add-row_length">
														<label>Show 
															<select name="add-row_length" aria-controls="add-row" class="form-control form-control-sm">
																<option value="10">10</option>
																<option value="25">25</option>
																<option value="50">50</option>
																<option value="100">100</option>
															</select> entries
														</label>
													</div> -->
												</div>
												<div class="col-sm-12 col-md-6">
													<form class="form" method="get" action="{{ route('kategori.cari') }}">														
														<div id="add-row_filter" class="dataTables_filter">
															<label>Search:</label>
															<input type="text" name="cari" value="{{$keyword}}" class="form-control form-control-sm" placeholder="" aria-controls="add-row">
															<button type="submit" class="btn btn-info btn-sm">Cari</button>
														</div>	
													</form>
												</div>
												
											</div>

											<div class="row">
												<div class="col-sm-12">
													<table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
														<thead>
															<tr style="text-align: center;" role="row">
																<th class="sorting" style="width: 10px;">#</th>
																<th class="sorting" style="width: 167.797px;">Nama Kategori</th>	
																<th style="width: 122.344px;" class="sorting">Action</th>
															</tr>
														</thead>
														<tbody>	
														<!-- {{-- @foreach($produk as $row) --}} -->
														@forelse($kategori as $row)
															<tr role="row" class="odd text-center">
																<td class="">{{$row->id}}</td>
																<td style="text-align:left !important;" class="">{{$row->nama_kategori}}</td>
																<td>
																	<div class="form-button-action">
																	<a data-target="#EditKategori" data-toggle="modal" data-id={{$row->id}} data-nama_kategori={{$row->nama_kategori}} title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																		<i class="fa fa-edit"></i>
																	</a>

																		<!-- <a 
																		data-target="#EditKategori"
																		data-toggle="modal"
																		data-id={{$row->id}}
																		data-nama_produk={{$row->nama_produk}}
																		data-harga={{$row->harga}}
																		data-berat={{$row->berat}}
																		data-img={{$row->img}}
																		data-status={{$row->status}}  

																		title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																			<i class="fa fa-edit"></i>
																		</a> -->
																	
																			<!-- <button data-target="#DeleteKategori" data-toggle="modal" data-id={{$row->id}} data-nama_kategori={{$row->nama_kategori}} type="button" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
																				<i class="fa fa-times"></i>
																			</button> -->

																			<button data-target="#HapusKategori{{$row->id}}" data-toggle="modal" data-nama_kategori={{$row->nama_kategori}} type="button" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove">
																				<i class="fa fa-times"></i>
																			</button>

																			@include('modal.hapus-kategori')
																			
																	</div>
																</td>
															</tr>
														@empty
														<tr>
															<td colspan="6" class="text-center">Data tidak ditemukan</td>
														</tr>
														@endforelse
														</tbody>
													</table>

                                    </div>
                                </div>

								<div class="row">
										<div class="col-sm-12 col-md-5">
											<div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
											Menampilkan &nbsp;&nbsp; <strong>{{ $kategori->firstItem() }}</strong> &nbsp;&nbsp; sampai &nbsp;&nbsp; <strong>{{ $kategori->lastItem() }}</strong> &nbsp;&nbsp; dari &nbsp;&nbsp; <strong>{{ $kategori->total() }}</strong> &nbsp;&nbsp; data.
											</div></div>
												<div class="col-sm-12 col-md-7">
													<div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
														{{ $kategori->links('pagination::bootstrap-4') }}
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        </div>
				</div>
			</div>


			{{--  Modal Tambah Kategori Produk  --}}
			<div class="modal fade" id="ModalAddKateggori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori Baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="POST" action="{{route('kategori.add')}}" role="form">
						@csrf

						<div class="modal-body">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input type="text" class="@error('nama_kategori') is-invalid @enderror form-control" required id="nama_kategori" name="nama_kategori">
								@error('nama_kategori')
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
								@enderror
							</div>
						</div>
						<!-- /.card-body -->

						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</form>

					</div>
				</div>
			</div>
			{{--  End Modal Tambah Kategori Produk  --}}



			{{--  Modal Edit Kategori Produk  --}}
			<div class="modal fade" id="EditKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Edit Kategori</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="POST" action="{{route('kategori.edit','terserah')}}" role="form">
						@csrf
						@method('put')
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input type="hidden" class="form-control" id="id" name="id" value="">
								<input type="text" class="form-control" required id="nama_kategori" name="nama_kategori">								
							</div>
						</div>
						<!-- /.card-body -->

						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>

					</div>
				</div>
			</div>
			{{--  End Modal Edit Kategori Produk  --}}



			{{--  Modal Delete Kategori Produk  --}}
			<div class="modal fade" id="DeleteKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Delete Kategori</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="POST" action="{{route('kategori.delete', 'id')}}" role="form">
						@csrf
						@method('delete')
						<div class="modal-body">
							<div class="form-group">
								<label>Yakin ingin hapus data ini ?</label>
								<input type="hidden" class="form-control" id="id" name="id" value="">
								<span id="nama_kategori"></span>								
							</div>
						</div>
						<!-- /.card-body -->

						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
						</div>
					</form>

					</div>
				</div>
			</div>
			{{--  End Modal Delete Kategori Produk  --}}

@endsection