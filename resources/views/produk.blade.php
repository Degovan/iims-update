@extends('shared.base')

@section('content')

<div class="card shadow mb-4 mt-2">

	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">

		<h7 class="m-0 font-weight-bold text-primary">Data Produk</h7>

	</div>

	<div class="card-body">

		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>

			<form action="{{route('produkCari')}}" class="form-inline" method="GET">

				<a href="{{route('produkTambah')}}" class="btn btn-primary mr-sm-2 my-2 my-sm-0 btn-sm "><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>

				<input class="form-control form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">

				<button class="btn btn-secondary my-2 my-sm-0  btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>

			</form>

		</nav>

		<div class="table-responsive">

			<table class="table table-bordered table-sm" style="font-size: 5px; text-align: left;" id="dataTable" width="100%" cellspacing="0">

				<thead class="thead-light">

					<tr>

						<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Kode</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No.Seri</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Photo</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Jenis</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Kategori</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Barcode</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Harga</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Modal</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Dimensi</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Berat</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Unit Beli</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Lokasi Gudang</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Qty</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</thead>

				<tfoot>

					<tr>

					<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Kode</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No.Seri</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Photo</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Jenis</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Kategori</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Barcode</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Harga</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Modal</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Dimensi</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Berat</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Unit Beli</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Lokasi Gudang</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Qty</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</tfoot>

				<tbody>@php $i = 1; @endphp @foreach ($produk as $data)

					<tr>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$i++}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> kode_produk}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> no_seri}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> nama_produk}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;"><img src="{{ $data->photo_produk }}" width="80px" alt=""></td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> jenis_produk}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> kategori_produk}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">

							<div class="barcode">

								{!! DNS1D::getBarcodeHTML($data-> kode_produk, "C128",1.4,22) !!}
							</div>

						</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> harga}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> modal}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> dimensi}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> berat}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> unit_pembelian}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> lokasi_gudang}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> qty}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;"> 

							<a href="{{route('produkEdit',$data->id_produk)}}" class="btn btn-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>

							<a href="{{route('produkHapus',$data->id_produk)}}" class="btn btn-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>

						</td>

					</tr>@endforeach

				</tbody>

			</table>

		</div>

	</div>

</div>

@endsection