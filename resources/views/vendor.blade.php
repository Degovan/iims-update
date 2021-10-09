@extends('shared.base')

@section('content')

<div class="card shadow mb-4 mt-2">

	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">

		<h7 class="m-0 font-weight-bold text-primary">Data Vendor</h7>

	</div>

	<div class="card-body">

		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>

			<form action="{{route('vendorCari')}}" class="form-inline" method="GET">

				<a href="{{route('vendorTambah')}}" class="btn btn-primary mr-sm-2 my-2 my-sm-0 btn-sm "><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>

				<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">

				<button class="btn btn-secondary my-2 my-sm-0  btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>

			</form>

		</nav>

		<div class="table-responsive">

			<table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">

				<thead class="thead-light">

					<tr>

						<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama Vendor</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Alamat</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Telp.</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Fax</th>

						<th class="center-dt" style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</thead>

				<tfoot>

					<tr>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama Vendor</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Alamat</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Telp.</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Fax</th>

						<th class="center-dt" style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</tfoot>

				<tbody>@php $i = 1; @endphp @foreach ($vendor as $data)

					<tr>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$i++}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> nama_vendor}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> alamat_vendor}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> telp}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$data -> fax}}</td>

						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;"> 

							<a href="{{route('vendorEdit',$data->id_vendor)}}" class="btn btn-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>

							<a href="{{route('vendorHapus',$data->id_vendor)}}" class="btn btn-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>

						</td>

					</tr>@endforeach

				</tbody>

			</table>

		</div>

	</div>

</div>

@endsection