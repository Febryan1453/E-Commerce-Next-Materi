@extends('user.template')

@section('content')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Transaksi</h4>
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
					<a href="{{route('transaksi.dikirim')}}">Dikirm</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center justify-content-between">
							<h4 class="card-title">Transaksi User</h4>
							<!-- <a data-target="#ModalAddKateggori" data-toggle="modal">
								<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
									<i class="fa fa-plus"></i> &nbsp;
									Kategori
								</button>
							</a> -->
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
													<th class="sorting" style="width: 100px;">Kode Unik</th>
													<th class="sorting" style="width: 167.797px;">Kode Pemesanan</th>
													<th class="sorting" style="width: 167.797px;">Total Harga</th>
													<th class="sorting" style="width: 167.797px;">Nama Member</th>
													<th class="sorting" style="width: 167.797px;">Status</th>
													<th style="width: 122.344px;" class="sorting">Action</th>
												</tr>
											</thead>
											<tbody>
												@forelse($pesanan as $row)
												<tr role="row" class="odd text-center">
													<td class="">{{$row->id}}</td>
													<td class="">{{$row->kode_unik}}</td>
													<td class="">{{$row->kode_pemesanan}}</td>
													<td class="">Rp{{number_format($row->total_harga+$row->kode_unik)}}</td>
													<td style="text-align:left !important;" class="">

														{{$row->user->name}}

													</td>
													<td class="">
														@if($row->status == 2)
														<span class="badge bg-info text-dark">Lunas</span>
														@elseif($row->status == 1)
														<span class="badge bg-warning text-dark">Pending</span>
														@elseif($row->status == 3)
														<span class="badge bg-success text-dark">Dikirim</span>
														@endif
													</td>
													<td>
														<div class="form-button-action">


															<a style="cursor:pointer ;" data-target="#Lunas{{$row->id}}" data-toggle="modal" title="Update Status">
																<i class="fas fa-pen-square"></i>&nbsp; STATUS
															</a>

															@include('modal.lunas-to-kirim')


														</div>
													</td>
												</tr>
												@empty
												<tr>
													<td colspan="7" class="text-center">Data tidak ditemukan</td>
												</tr>

												@endforelse
											</tbody>
										</table>

									</div>
								</div>

								<div class="row">
									<div class="col-sm-12 col-md-5">
										<div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
											Menampilkan &nbsp;&nbsp; <strong>{{ $pesanan->firstItem() }}</strong> &nbsp;&nbsp; sampai &nbsp;&nbsp; <strong>{{ $pesanan->lastItem() }}</strong> &nbsp;&nbsp; dari &nbsp;&nbsp; <strong>{{ $pesanan->total() }}</strong> &nbsp;&nbsp; data.
										</div>
									</div>
									<div class="col-sm-12 col-md-7">
										<div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
											{{ $pesanan->links('pagination::bootstrap-4') }}
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

@endsection