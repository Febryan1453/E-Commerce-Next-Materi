{{--  Modal Delete Kategori Produk  --}}
<form method="POST" action="{{route('kategori.delete', $row->id)}}" role="form">
						@csrf
						@method('delete')
			<div class="modal fade" id="HapusKategori{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi Delete Kategori</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
						<div class="modal-body">
							<div class="form-group">
								<label>Yakin ingin hapus data kategori <strong>{{$row->nama_kategori}}</strong> ?</label>								
							</div>
						</div>
						<!-- /.card-body -->

						<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-danger">Hapus</button>
						</div>
					

					</div>
				</div>
			</div>
        </form>
			{{--  End Modal Delete Kategori Produk  --}}