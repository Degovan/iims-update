@extends('shared.base')

@section('content')



<div class="card shadow mb-4">

	<div class="card-header py-1" style="text-align: center;">

		<h7 class="m-0 font-weight-bold text-primary">Data inventory</h7>

	</div>

	<div class="card-body">

		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>

			<form action="{{route('inventoryCari')}}" class="form-inline" method="GET">

				<a href="{{route('inventoryTambah')}}" class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0 btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>

				<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">

				<button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>

			</form>

		</nav>

		<div class="table-responsive">

			<table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">

				<thead class="thead-light">

					<tr>

						<th>No</th>

						<th>Lokasi_gudang</th>

						<th>Lokasi_rak</th>

						<th>Lokasi_barisRak</th>

						<th>Lokasi_kolomRak</th>

						<th>Aksi</th>

					</tr>

				</thead>

				<tfoot>

					<tr>

						<th>No</th>

						<th>Lokasi_gudang</th>

						<th>Lokasi_rak</th>

						<th>Lokasi_barisRak</th>

						<th>Lokasi_kolomRak</th>

						<th>Aksi</th>

					</tr>

				</tfoot>

				<tbody>@php $i = 1; @endphp @foreach ($inventory as $data)

					<tr>

						<td>{{$i++}}</td>

						<td>{{$data -> lokasi_gudang}}</td>

						<td>{{$data -> lokasi_rak}}</td>

						<td>{{$data -> lokasi_barisRak}}</td>

						<td>{{$data -> lokasi_kolomRak}}</td>

						<td> <a href="{{route('inventoryEdit',$data->id_inventory)}}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>

							<a href="{{route('inventoryHapus',$data->id_inventory)}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>

						</td>

					</tr>@endforeach

				</tbody>

			</table>

		</div>

	</div>

</div>

@endsection