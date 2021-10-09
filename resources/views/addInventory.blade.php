@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-1" style="text-align: center;">
		<h7 class="m-0 font-weight-bold text-primary">Add Data Inventory</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">
		<form action="{{route('inventorySimpan')}}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
			<table class="table">
				<div class="form-group row mb-2 mt-2" style="float: left;">
					<div class="col-sm-10"> <a type="submit" href="{{route('inventory')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
					</div>
				</div>
				<tr>
					<td>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Gudang</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="lokasi_gudang">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Rak</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="lokasi_rak">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Baris Rak</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="lokasi_barisRak">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Kolom Rak</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="lokasi_kolomRak">
							</div>
						</div>
						<div class="form-group row" style="float: right;">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-outline-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Tambah</i>
								</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
@endsection