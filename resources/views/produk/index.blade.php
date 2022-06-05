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
					<a href="{{route('produk.index')}}">{{$title}}</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center justify-content-between">
							<h4 class="card-title">Data Produk</h4>
							<a href="{{route('produk.create')}}">
								<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
									<i class="fa fa-plus"></i> &nbsp;
									Produk
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
										<form class="form" method="get" action="{{ route('cari') }}">
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
													<th class="sorting" style="width: 167.797px;">Foto</th>
													<th class="sorting" style="width: 167.797px;">Nama</th>
													<th class="sorting" style="width: 167.797px;">Kategori</th>
													<th class="sorting_asc" style="width: 255.516px;">Harga</th>
													<th class="sorting" style="width: 139.344px;">Status</th>
													<th class="sorting" style="width: 139.344px;">Berat</th>
													<th style="width: 122.344px;" class="sorting">Action</th>
												</tr>
											</thead>
											<tbody>
												<!-- {{-- @foreach($produk as $row) --}} -->
												@forelse($produk as $row)
												<tr role="row" class="odd text-center">
													<td><img src="{{url('storage/'.$row->img)}}" alt="..." style="max-width: 100px !important; border-radius:5px" class="img-fluid"></td>
													<td class="">{{$row->nama_produk}}</td>
													<td class="">{{$row->kategori->nama_kategori}}</td>
													<td class="sorting_1">Rp. {{ number_format($row->harga) }}</td>
													<td>{{$row->status}}</td>
													<td>{{$row->berat}}</td>
													<td>
														<div class="form-button-action">

															<!-- <a href="{{route('produk.edit', $row->id)}}" title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																		<i class="fa fa-edit"></i>
																	</a> -->

															<a data-target="#ModalEdit" data-toggle="modal" data-id={{$row->id}} data-nama_produk={{$row->nama_produk}} data-kategori_id={{$row->kategori_id}} data-harga={{$row->harga}} data-berat={{$row->berat}} data-img={{$row->img}} data-status={{$row->status}} title="Edit" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
																<i class="fa fa-edit"></i>
															</a>

															<form action="{{route('produk.destroy', $row->id)}}" method="post">
																@csrf
																@method('DELETE')
																<button type="submit" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Hapus Data {{$row->nama_produk}} ?')">
																	<i class="fa fa-times"></i>
																</button>
															</form>
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
											Menampilkan &nbsp;&nbsp; <strong>{{ $produk->firstItem() }}</strong> &nbsp;&nbsp; sampai &nbsp;&nbsp; <strong>{{ $produk->lastItem() }}</strong> &nbsp;&nbsp; dari &nbsp;&nbsp; <strong>{{ $produk->total() }}</strong> &nbsp;&nbsp; data.
											<!-- Halaman : {{ $produk->currentPage() }} &nbsp; <br>
											Jumlah Data : {{ $produk->total() }}  -->
											<!-- Data Per Halaman : {{ $produk->perPage() }}  -->
										</div>
									</div>
									<div class="col-sm-12 col-md-7">
										<div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
											{{ $produk->links('pagination::bootstrap-4') }}
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- <div class="row">
										<div class="col-sm-12 col-md-5">
											<div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">Showing 1 to 5 of 10 entries</div></div>
												<div class="col-sm-12 col-md-7">
													<div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
														<ul class="pagination">
															<li class="paginate_button page-item previous disabled" id="add-row_previous">
																<a href="#" aria-controls="add-row" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
															</li>
															<li class="paginate_button page-item active">
																<a href="#" aria-controls="add-row" data-dt-idx="1" tabindex="0" class="page-link">1</a>
															</li>
															<li class="paginate_button page-item ">
																<a href="#" aria-controls="add-row" data-dt-idx="2" tabindex="0" class="page-link">2</a>
															</li>
															<li class="paginate_button page-item next" id="add-row_next">
																<a href="#" aria-controls="add-row" data-dt-idx="3" tabindex="0" class="page-link">Next</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


{{-- Modal Edit Produk  --}}
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Produk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form method="POST" action="{{route('produk.update.modal', 'terserah')}}" role="form" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="hidden" class="form-control" id="id" name="id" value="">
						<input type="text" class="form-control" id="nama_produk" name="nama_produk">
					</div>
					<div class="row">
						<div class="col-sm-6">
							<!-- text input -->
							<div class="form-group">
								<label>Harga</label>
								<input type="text" class="form-control" id="harga" name="harga">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Status</label>
								<select class="form-control" id="status" name="status">
									<option value="">-- Pilih Status --</option>
									<option value="Tersedia">Tersedia</option>
									<option value="Kosong">Kosong</option>
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Berat</label>
								<input type="text" class="form-control" id="berat" name="berat">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Kategori</label>
								<select class="form-control" id="kategori_id" name="kategori_id">
									<option value="">-- Pilih Kategori --</option>
									@foreach($kategori as $kat)
									<option value="{{$kat->id}}">{{$kat->nama_kategori}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>



					<div class="form-group">
						<label for="exampleInputFile">File Gambar</label>
						<div>
							<img src="" width="80px" id="img">
						</div>
						<div class="input-group mt-3">
							<div class="custom-file float-bottom">
								<input type="file" class="custom-file-input" id="file-upload" name="img">
								<label class="custom-file-label" for="exampleInputFile">Choose file</label>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
				</div>
			</form>

		</div>
	</div>
</div>
{{-- End Modal Edit Produk  --}}

@endsection