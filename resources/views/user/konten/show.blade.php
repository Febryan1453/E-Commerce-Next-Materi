@extends('user.template')

@section('content')

<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">My Profile</h4>
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
								<a href="#">My Profile</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Profile {{$user->name}}</div>
								</div>
								<div class="card-body">									

									<div class="row">
										<div class="col-md-1"></div>

										<div class="col-md-6">

											<div class="form">
										
												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Nama :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="text" readonly value="{{$user->name}}" class="form-control input-fixed" id="exampleInputPassword1">
													</div>
												</div>
		
												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Username :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="text" readonly value="{{$user->username}}" class="form-control input-fixed" id="exampleInputPassword1">
													</div>
												</div>
		
												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Email :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="text" readonly value="{{$user->email}}" class="form-control input-fixed" id="exampleInputPassword1">
													</div>
												</div>
		
												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>No. Telp :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="text" readonly value="{{$user->number_phone}}" class="form-control input-fixed" id="exampleInputPassword1">
													</div>
												</div>

												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Alamat:</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<textarea readonly class="form-control input-fixed" cols="30" rows="5">{{$user->address}}</textarea>
													</div>
												</div>

												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Photo :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">
														@if($user->image != '')
															<img src="{{url('storage',$user->image)}}" alt="" class="avatar-img rounded">	
														@else
															<img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="image profile" class="avatar-img rounded">													
														@endif																								
													</div>
												</div>
												
											</div> 	
																				
										</div>

										<div class="col-md-4">
											<div class="card card-dark bg-secondary-gradient">
												<div class="card-body skew-shadow">
													<!-- <img src="../assets/img/visa.svg" height="12.5" alt="Visa Logo"> -->
													<h2 style="font-weight: bold; font-style: italic; font-size: medium;">MEMBER</h2>
													<h2 class="py-4 mb-0">{{$user->email}}</h2>
													<div class="row">
														<div class="col-8 pr-0">
															<h3 class="fw-bold mb-1">{{$user->name}}</h3>
															<div class="text-small text-uppercase fw-bold op-8">Since</div>
														</div>
														<div class="col-4 pl-0 text-right">
															<h3 class="fw-bold mb-1">4/26</h3>
															<div class="text-small text-uppercase fw-bold op-8">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('l, d F Y')}}</div>
														</div>
													</div>
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
												<a href="{{route('profile.edit', Auth::user()->username)}}">
													<button id="displayNotif" type="button" class="btn btn-success">Edit Profile</button>
												</a>
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