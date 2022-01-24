@extends('shared.base')
@section('content')
	{{-- CSS --}}
	@php
		$image = (isset($produk) ? $produk[0]->photo_produk_tampil : '/assets/images/users/noimage.png');
	@endphp

	@push('style')
		<style>
			#image-input {
				display: none;
			}

			#image-label {
				width: 6em;
				height: 7em;
				border: 1px dashed #d1d3e2;
				cursor: pointer;
				background-image: url('{{ $image }}');
				background-size: cover;
				background-position: center;
				float: left;
			}
		</style>
	@endpush
	{{-- CSS --}}
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">
		<h7 class="m-0 font-weight-bold text-primary">Edit Data Produk</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">@foreach($produk as $data)
		<form action="{{route('produkUpdate')}}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
			<table class="table">
				<div class="form-group row mb-2 mt-2" style="float: left;">
					<div class="col-sm-10"> <a type="submit" href="{{route('produk')}}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
					</div>
				</div>
				@if (count($errors) > 0)
				<tr>
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</tr>
				@endif
				<tr>
					<td>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<input class="form-control form-control-sm" type="hidden" name="id_produk" value="{{ $data->id_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kode Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="kode_produk" value="{{ $data->kode_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">No. Seri</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="no_seri" value="{{ $data->no_seri }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Nama Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="nama_produk" value="{{ $data->nama_produk }}">
							</div>
						</div>
						{{-- FOTO PRODUK --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Photo Produk</label>
							<div class="col-sm-10">
								<div id="photoContainer">
									<label for="image-input" id="image-label">
										<input type="file" id="image-input" name="photo_produk">
									</label>
									<div></div>
								</div>
								{{-- checkbox hapus foto --}}
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="hapus_foto" name="hapus_foto" id="hapusFoto">
									<label class="form-check-label" for="hapusFoto">
									  Hapus Foto
									</label>
								</div>
							</div>
						</div>
						{{-- end FOTO PRODUK --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Jenis Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="jenis_produk" value="{{ $data->jenis_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kategori Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="kategori_produk" value="{{ $data->kategori_produk }}">
							</div>
						</div>
			
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Harga</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm price" required="required" name="harga" value="{{ number_format($data->harga) }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Modal</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm price" required="required" name="modal" value="{{ number_format($data->modal) }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Dimensi</label>
							<div class="col-sm-10">
								{{-- input grup dimensi --}}
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" required="required" name="dimensi" value="{{ str_replace('cm','',$data->dimensi) }}">
									<div class="input-group-append">
										<span class="input-group-text">cm</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Berat</label>
							<div class="col-sm-10">
								{{-- input grup berat --}}
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" required="required" name="berat" value="{{ str_replace('kg','',$data->berat) }}">
									<div class="input-group-append">
										<span class="input-group-text">kg</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Unit Pembelian</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="unit_pembelian" value="{{ $data->unit_pembelian }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Gudang</label>
							<div class="col-sm-10">
			
								<select name="lokasi_gudang" class="form-control form-control-sm" id="lokasi_gudang" required>
									@foreach ($data_dua as $d)
									@if($data->lokasi_gudang == $d->lokasi_gudang)
									<option value="{{ $d->lokasi_gudang }}/{{ $d->lokasi_rak }}/{{ $d->lokasi_barisRak }}/{{ $d->lokasi_kolomRak }}" selected>{{ $d->lokasi_gudang }}/{{ $d->lokasi_rak }}/{{ $d->lokasi_barisRak }}/{{ $d->lokasi_kolomRak }}</option>
									@else
									<option value="{{ $d->lokasi_gudang }}/{{ $d->lokasi_rak }}/{{ $d->lokasi_barisRak }}/{{ $d->lokasi_kolomRak }}">{{ $d->lokasi_gudang }}/{{ $d->lokasi_rak }}/{{ $d->lokasi_barisRak }}/{{ $d->lokasi_kolomRak }}</option>
									@endif
									@endforeach
								</select>
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_gudang" value="{{ $data->lokasi_gudang }}">-->
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_gudang" value="{{ $data->id_inventory }}">-->
	
							</div>
						</div>
					
					
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">QTY</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="qty" value="{{ $data->qty }}">
							</div>
						</div>
						<div class="form-group row" style="float: right;">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-0">
								<button type="submit" class="btn btn-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Update</i>
								</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>@endforeach
	</div>
</div>
{{-- SCRIPT --}}
@push('script')
<script src="/assets/js/jquery.uploadPreview.min.js"></script>
<script>
	// form uploade
	$.uploadPreview({
		input_field: '#image-input',
		preview_box: '#image-label'
	});
	// end form upload
	// masking
	$('.price').keyup(function (e) {
		if (e.which >= 37 && e.which <= 40) return;
		$(this).val(function (index, value) {
			return value
				.replace(/\D/g, "")
				.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
				;
		});
		if ($(this).val().match(/^0/)) {
			$(this).val('');
			return false;
		}
	}).keypress(function (e) {
		var charCode = (typeof e.which == "number") ? e.which : e.keyCode;

		if (!charCode || charCode == 8) {
			return;
		}

		var typedChar = String.fromCharCode(charCode);

		if (/\d/.test(typedChar)) {
			return;
		}

		return false;
	});
	// end masking
	// hapus foto
	$('#hapusFoto').change(function (e) {
		e.preventDefault();
		
		if(this.checked) {
			$('#photoContainer').hide();
		} else {
			$('#photoContainer').show();
		}
	});
	// end hapus foto
</script>
@endpush
{{-- end SCRIPT --}}
@endsection