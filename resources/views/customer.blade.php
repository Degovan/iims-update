@extends('shared.base')
@section('content')

<div class="card shadow mb-4">
	<div class="card-header py-1" style="text-align: center;">
		<h7 class="m-0 font-weight-bold text-primary">Data customer</h7>
	</div>
	<div class="card-body">
		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
			<form action="{{route('customerCari')}}" class="form-inline" method="GET">
				<a class="btn btn-outline-primary my-2 my-sm-0 btn-sm" type="submit" href="{{route('customerTambah')}}"><i class="fas fa-plus"></i>&nbsp;Tambah</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">
				<button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>
			</form>
		</nav>
		<div class="table-responsive">
			<table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th>No</th>
						<th>Nama Customer</th>
						<th>Alamat Customer</th>
						<th>Telepon</th>
						<th>Fax</th>
						<th>Email</th>
						<th>Customer CP</th>
						<th>Nama</th>
						<th>HP</th>
						<th>Catatan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th>No</th>
						<th>Nama Customer</th>
						<th>Alamat Customer</th>
						<th>Telepon</th>
						<th>Fax</th>
						<th>Email</th>
						<th>Customer CP</th>
						<th>Nama</th>
						<th>HP</th>
						<th>Catatan</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
				<tbody>@php $i = 1; @endphp @foreach ($customer as $data)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$data -> nama_customer}}</td>
						<td>{{$data -> alamat_customer}}</td>
						<td>{{$data -> telepon}}</td>
						<td>{{$data -> fax}}</td>
						<td>{{$data -> email}}</td>
						<td>{{$data -> customer_cp}}</td>
						<td>{{$data -> nama}}</td>
						<td>{{$data -> hp}}</td>
						<td>{{$data -> catatan}}</td>
						<td> <a href="customer/edit/{{$data->id_customer}}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
							<a href="customer/hapus/{{$data->id_customer}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>
						</td>
					</tr>@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection