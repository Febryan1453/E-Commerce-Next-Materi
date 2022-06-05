{{--  Modal Tambah User --}}
			<div class="modal fade" id="ModalAddUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambah User Baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<form method="POST" action="{{route('add.user')}}" role="form">
						@csrf

						<div class="modal-body">
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="@error('name') is-invalid @enderror form-control" required id="name" name="name">
								@error('name')
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
								@enderror
							</div>

							<div class="form-group">
								<label>Username</label>
								<input type="text" class="@error('username') is-invalid @enderror form-control" required id="username" name="username">
								@error('username')
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
								@enderror
							</div>

							<div class="form-group">
								<label>Email</label>
								<input type="text" class="@error('email') is-invalid @enderror form-control" required id="email" name="email">
								@error('email')
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
								@enderror
							</div>

							<div class="form-group">
								<label>Role</label>
								<select class="@error('role') is-invalid @enderror form-control" name="role">
                                    <option value="">-- Pilih --</option>
                                    <option value="Admin">Admin</option>                                                            
                                    <option value="User">User</option>
                                </select>
								@error('role')
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
								@enderror
							</div>

							<div class="form-group" style="margin-bottom: -15px !important;">
								<p class="text-center">Password default : <strong style="color: red;">12345</strong></p>
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
			{{--  End Modal Tambah User --}}