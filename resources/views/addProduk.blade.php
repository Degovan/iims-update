@extends('shared.base')
@section('content')
@push('style')
	{{-- CSS --}}
	<style>
		#image-input {
			display: none;
		}

		#image-label {
			width: 6em;
			height: 7em;
			border: 1px dashed #d1d3e2;
			cursor: pointer;
			background-image: url('noimage.png');
			background-size: cover;
			background-position: center;
			float: left;
		}
	</style>
	{{-- end CSS --}}
@endpush

<div class="card shadow mb-4">
	<div class="card-header py-1" style="text-align: center;">
		<h7 class="m-0 font-weight-bold text-primary">Add Data Produk</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">
		<form action="{{route('produkSimpan')}}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
			<table class="table">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<div class="form-group row mb-2 mt-2" style="float: left;">
					<div class="col-sm-10"> <a type="submit" href="{{route('produk')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
					</div>
				</div>
				<tr>
					<td>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kode Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="kode_produk">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">No Seri</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="no_seri">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Nama Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="nama_produk">
							</div>
						</div>
						{{-- FOTO PRODUK --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Photo Produk</label>
							<div class="col-sm-10">
								<label for="image-input" id="image-label">
									<input type="file" id="image-input" name="photo_produk">
								</label>
								<div></div>
							</div>
						</div>
						{{-- end FOTO PRODUK --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Jenis Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="jenis_produk">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kategori Produk</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="kategori_produk">
							</div>
						</div>
						<!--<div class="form-group row">-->
						<!--	<label for="inputtext" class="col-sm-2 col-form-label">Barcode</label>-->
						<!--	<div class="col-sm-10">-->
						<!--		<input type="number" class="form-control form-control-sm" required="required" name="barcode">-->
						<!--	</div>-->
						<!--</div>-->
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Harga</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm price" required="required" name="harga">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Modal</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm price" required="required" name="modal">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Dimensi</label>
							<div class="col-sm-10">
								{{-- input grup dimensi --}}
								<div class="input-group">
									<input type="text" class="form-control form-control-sm" required="required" name="dimensi">
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
									<input type="text" class="form-control form-control-sm" required="required" name="berat">
									<div class="input-group-append">
										<span class="input-group-text">kg</span>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Unit Pembelian</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="unit_pembelian">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Gudang</label>
							<div class="col-sm-10">
								<select name="lokasi_gudang" id="lokasi_gudang" class="form-control form-control-sm" required="required" >
									@foreach ($inventory as $role)
									@if($user ?? null):
									<option value="{{ $role->lokasi_gudang }}/{{ $role->lokasi_rak }}/{{ $role->lokasi_barisRak }}/{{ $role->lokasi_kolomRak }}" @if ($user->hasRole($role->lokasi_gudang))
										selected
										@endif>{{ $role->lokasi_gudang }}/{{ $role->lokasi_rak }}/{{ $role->lokasi_barisRak }}/{{ $role->lokasi_kolomRak }}}</option>
									@else
									<option value="{{ $role->lokasi_gudang }}/{{ $role->lokasi_rak }}/{{ $role->lokasi_barisRak }}/{{ $role->lokasi_kolomRak }}">{{ $role->lokasi_gudang }}/{{ $role->lokasi_rak }}/{{ $role->lokasi_barisRak }}/{{ $role->lokasi_kolomRak }}</option>
									@endif
									@endforeach
								</select>
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_gudang">-->
							</div>
						</div>
						<!--<div class="form-group row">-->
						<!--	<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Rak</label>-->
						<!--	<div class="col-sm-10">-->
						<!--		<select name="lokasi_rak" id="lokasi_rak" class="form-control form-control-sm" required="required">-->
						<!--			@foreach ($inventory as $role)-->
						<!--			@if($user ?? null):-->
						<!--			<option value="{{ $role->lokasi_rak }}" @if ($user->hasRole($role->lokasi_rak))-->
						<!--				selected-->
						<!--				@endif>{{ $role->lokasi_rak }}</option>-->
						<!--			@else-->
						<!--			<option value="{{ $role->lokasi_rak }}">{{ $role->lokasi_rak }}</option>-->
						<!--			@endif-->
						<!--			@endforeach-->
						<!--		</select>-->
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_rak">-->
						<!--	</div>-->
						<!--</div>-->
						<!--<div class="form-group row">-->
						<!--	<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Baris Rak</label>-->
						<!--	<div class="col-sm-10">-->
						<!--		<select name="lokasi_barisRak" id="lokasi_barisRak" class="form-control form-control-sm" required="required">-->
						<!--			@foreach ($inventory as $role)-->
						<!--			@if($user ?? null):-->
						<!--			<option value="{{ $role->lokasi_barisRak }}" @if ($user->hasRole($role->lokasi_barisRak))-->
						<!--				selected-->
						<!--				@endif>{{ $role->lokasi_barisRak }}</option>-->
						<!--			@else-->
						<!--			<option value="{{ $role->lokasi_barisRak }}">{{ $role->lokasi_barisRak }}</option>-->
						<!--			@endif-->
						<!--			@endforeach-->
						<!--		</select>-->
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_barisRak">-->
						<!--	</div>-->
						<!--</div>-->
						<!--<div class="form-group row">-->
						<!--	<label for="inputtext" class="col-sm-2 col-form-label">Lokasi Kolom Rak</label>-->
						<!--	<div class="col-sm-10">-->
						<!--		<select name="lokasi_kolomRak" id="lokasi_kolomRak" class="form-control form-control-sm" required="required">-->
						<!--			@foreach ($inventory as $role)-->
						<!--			@if($user ?? null):-->
						<!--			<option value="{{ $role->lokasi_kolomRak }}" @if ($user->hasRole($role->lokasi_kolomRak))-->
						<!--				selected-->
						<!--				@endif>{{ $role->lokasi_kolomRak }}</option>-->
						<!--			@else-->
						<!--			<option value="{{ $role->lokasi_kolomRak }}">{{ $role->lokasi_kolomRak }}</option>-->
						<!--			@endif-->
						<!--			@endforeach-->
						<!--		</select>-->
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_kolomRak">-->
						<!--	</div>-->
						<!--</div>-->
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">QTY</label>
							<div class="col-sm-10">
								<input type="number" class="form-control form-control-sm" required="required" name="qty">
							</div>
						</div>
						<div class="form-group row" style="float: right;">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>
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
		</script>
	@endpush
	{{-- end SCRIPT --}}
@endsection
