{{-- Modal Delete Kategori Produk  --}}
<form method="POST" action="{{route('transaksi.edit.pending')}}" role="form">
	@csrf
	@method('put')
	<input type="hidden" name="id" value="{{$row->id}}">
	<div class="modal fade" id="Pending{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="alert alert-primary mt-3" role="alert">
						<p style="line-height: 25px;"> Pastikan bahwa <strong style="color: green;">"{{$row->user->name}}"</strong> telah membayar tagihan sebesar <strong style="color: green;">Rp{{number_format($row->total_harga+$row->kode_unik)}}</strong> sebelum mengubah status menjadi <span class="badge bg-info text-dark">Lunas</span></p>
					</div>

					<div class="form-group">
						<select class="form-control" name="status">
							@if($row->status == 1)
							<option value="1" selected>Pending</option>
							<option value="2">Lunas</option>
							@endif
						</select>
					</div>
				</div>
				<!-- /.card-body -->

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Save</button>
				</div>

			</div>
		</div>
	</div>
</form>
{{-- End Modal Delete Kategori Produk  --}}