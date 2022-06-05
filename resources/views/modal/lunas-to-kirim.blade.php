{{-- Modal Delete Kategori Produk  --}}
<form method="POST" action="{{route('transaksi.edit.lunas')}}" role="form">
	@csrf
	@method('put')
	<input type="hidden" name="id" value="{{$row->id}}">
	<div class="modal fade" id="Lunas{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<!-- <div style="text-align: center;">
						<div class="progress-container">
							<div class="progress" id="progress"></div>
							<div class="circle active">1</div>
							<div class="circle">2</div>
							<div class="circle">3</div>
							<div class="circle">4</div>
						</div>
					</div> -->


					<div class="form-group">
						<select class="form-control" name="status">
							@if($row->status == 2)
							<option value="2" selected>Lunas</option>
							<option value="3">Kirim</option>
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