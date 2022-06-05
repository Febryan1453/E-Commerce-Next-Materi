@extends('user.template')

@section('content')

			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">{{$title}}</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
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

                            <form action="{{route('update-pass')}}" method="POST">
                            @csrf
                            @method('PUT')
								<div class="card-header">
									<div class="card-title">{{$title}} {{ Auth::user()->name }}</div>
								</div>
								<div class="card-body">									

									<div class="row">	
                                        
                                    <div class="col-md-1"></div>

										<div class="col-md-6">

                                            @if(Session::get('Success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    {{Session::get('Success')}}
                                                </div>
                                            @endif

                                            @if(Session::get('Failed'))
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    {{Session::get('Failed')}}
                                                    <!-- <button type="button" data-dismiss="alert" aria-label="Close" class="close">
                                                        <span style="line-height: 0px !important;" aria-hidden="true">&times;</span>
                                                    </button> -->
                                                </div>
                                            @endif

											<div class="form">

												<div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label for="#passNow">Password sekarang :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="password" name="old_password" class="form-control input-fixed @error('old_password') is-invalid @enderror" style="margin-left: 35px;" id="passNow">
                                                        @error('old_password')
                                                        <div class="invalid-feedback" style="margin-left: 35px; width: 300px !important;" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                                    </div>
												</div>	

                                                <div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Password baru :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="password" name="password"class="form-control input-fixed @error('password') is-invalid @enderror " style="margin-left: 35px;" id="exampleInputPassword1">
                                                        @error('password')
                                                            <div class="invalid-feedback" style="margin-left: 35px; width: 300px !important;" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
												</div>

                                                <div class="form-group form-show-notify row">
													<div class="col-lg-3 col-md-3 col-sm-4 text-right">
														<label>Ulangi Password baru :</label>
													</div>
													<div class="col-lg-4 col-md-9 col-sm-8">												
														<input type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror form-control input-fixed" style="margin-left: 35px;" id="exampleInputPassword1">
                                                        @error('password_confirmation')
                                                            <div class="invalid-feedback" style="margin-left: 35px; width: 300px !important;" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                        @enderror
                                                    </div>
												</div>
												
											</div> 	
																				
										</div>

									</div>

								</div>
                                    <div class="card-footer">
                                        <div class="form">
                                            <div class="form-group from-show-notify row">
                                                <div class="col-lg-3 col-md-3 col-sm-12">

                                                </div>
                                                <div class="col-lg-4 col-md-9 col-sm-12">
                                                    <button type="submit" id="displayNotif" style="margin-left: -3px !important;" class="btn btn-primary">{{$title}}</button>											
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