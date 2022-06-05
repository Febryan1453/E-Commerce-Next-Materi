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
								<a href="{{route('data.user.index')}}">{{$title}}</a>
							</li>
						</ul>
					</div>


                    <div class="row">
                        <div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center justify-content-between">
										<h4 class="card-title">Data User Member</h4>
										<a data-target="#ModalAddUser" data-toggle="modal">
											<button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i> &nbsp;
												User
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
													<form class="form" method="get" action="{{ route('cari.member') }}">														
														<div id="add-row_filter" class="dataTables_filter">
															<label>Search:</label>
															<input type="text" name="cari" value="{{$keyword}}" class="form-control form-control-sm" placeholder="" aria-controls="add-row">
															<!-- <button type="submit" class="btn btn-info btn-sm">Cari</button> -->
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
																<th class="sorting" style="width: 167.797px;">Username</th>																
																<th class="sorting_asc" style="width: 255.516px;">Email</th>
																<th class="sorting" style="width: 139.344px;">Role</th>
																<th class="sorting" style="width: 139.344px;">Verifikasi</th>
																<th style="width: 122.344px;" class="sorting">Action</th>
															</tr>
														</thead>
														<tbody>	
                                                        @forelse($user as $row)
                                                            <tr role="row">
                                                                <td style="text-align: center;">
																	@if($row->image == '')
																	<img src="https://ui-avatars.com/api/?name={{ $row->name }}" alt="..." style="max-width: 100px !important; border-radius:5px" class="img-fluid">
																	@else
																	<img src="{{url('storage/'.$row->image)}}" alt="..." style="max-width: 100px !important; border-radius:5px" class="img-fluid">
																	@endif
																	
																</td>
                                                                <td>{{$row->name}}</td>
                                                                <td>{{$row->username}}</td>																
                                                                <td>{{$row->email}}</td>
                                                                <td>{{$row->role}}</td>
                                                                <td>
																	@if($row->email_verified_at == '')																	
																		<span class="badge bg-danger fw-bold">Belum Verifikasi</span>
																	@else
																		<span class="badge bg-success fw-bold">Telah Verifikasi</span>
																	@endif
																</td>
                                                                <td>Action</td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="7" class="text-center">Data User Member Belum Ada.</td>
                                                            </tr>
														@endforelse
														</tbody>
													</table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                                        Menampilkan &nbsp;&nbsp; <strong>{{ $user->firstItem() }}</strong> &nbsp;&nbsp; sampai &nbsp;&nbsp; <strong>{{ $user->lastItem() }}</strong> &nbsp;&nbsp; dari &nbsp;&nbsp; <strong>{{ $user->total() }}</strong> &nbsp;&nbsp; data.
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers mt-2" id="add-row_paginate">
														{{ $user->links('pagination::bootstrap-4') }}
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




			@include('modal.add-user')

@endsection