@extends('shared.base')
@section('content')
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">
		<h7 class="m-0 font-weight-bold text-primary">Edit Data Produk </h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">
        @foreach($produk as $data)
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
					<td style="text-align: left; font-size: 10px; margin-right: -40px;">
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-5">
								<input class="form-control form-control-sm" type="hidden" name="id_produk" value="{{ $data->id_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kode Produk</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="kode_produk" value="{{ $data->kode_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">No. Seri</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="no_seri" value="{{ $data->no_seri }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Nama Produk</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="nama_produk" value="{{ $data->nama_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Photo</label>
							<div class="col-md-10 div-foto" id="showImg">
								@if($data->photo_produk_tampil != null)
								<a href="{{$data->photo_produk_tampil }}" target="_blank" rel="noopener noreferrer">
									<img src="{{$data->photo_produk_tampil }}" class="img-produk" alt="foto">
								</a>
								<br>
								@endif
								<input type="file" id="photo_produk" class="form-control form-control-sm" name="photo_produk" accept="image/*" />
								<input type="hidden" value="$data->photo_produk" name="foto_lama" id="foto_lama" value="{{ $data->photo_produk }}">

							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Jenis Produk</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="jenis_produk" value="{{ $data->jenis_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Kategori Produk</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="kategori_produk" value="{{ $data->kategori_produk }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Barcode</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="barcode" value="{{ $data->barcode }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Harga</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="harga" value="{{ $data->harga }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Modal</label>
							<div class="col-sm-8">
								<input type="number" class="form-control form-control-sm" required="required" name="modal" value="{{ $data->modal }}">
							</div>
						</div>
					</td>
					<td style="text-align: left; font-size: 10px; ">
						<br>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-3 col-form-label">Dimensi</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="dimensi" value="{{ $data->dimensi }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-3 col-form-label">Berat</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="berat" value="{{ $data->berat }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-3 col-form-label">Unit Pembelian</label>
							<div class="col-sm-8">
								<input type="text" class="form-control form-control-sm" required="required" name="unit_pembelian" value="{{ $data->unit_pembelian }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-3 col-form-label">Lokasi Gudang</label>
							<div class="col-sm-8">
								<select name="lokasi_gudang" class="form-control form-control-sm" id="lokasi_gudang" required>
                                    @foreach ( as )

                                    @endforeach
								</select>
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_gudang" value="{{ $data->lokasi_gudang }}">-->
								<!--<input type="text" class="form-control form-control-sm"  required="required" name="lokasi_gudang" value="{{ $data->id_inventory }}">-->

							</div>
						</div>

						<div class="form-group row">
							<label for="inputtext" class="col-sm-3 col-form-label">QTY</label>
							<div class="col-sm-8">
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
		</form>
        @endforeach
	</div>
</div>
@endsection
