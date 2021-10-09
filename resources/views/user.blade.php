@extends('shared.base')

@section('content')

<div class="card shadow mb-4 mt-2">

	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">

		<h7 class="m-0 font-weight-bold text-primary">Data User</h7>

	</div>

	<div class="card-body">

		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>

			<form action="public/user/cari" class="form-inline" method="GET">

				<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">

				<button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>

			</form>

		</nav>

		<div class="table-responsive">

		<table class="table table-bordered table-sm" style="font-size: 5px; text-align: left;" id="dataTable" width="100%" cellspacing="0">

				<thead class="thead-light">

					<tr>

						<th>No</th>

						<th>Name</th>

						<th>Photo</th>

						<th>Hak Akses</th>

						<th>Email</th>

						<th>Password</th>

						<th>Aksi</th>

					</tr>

				</thead>

				<tfoot>

					<tr>

						<th>No</th>

						<th>Name</th>

						<th>Photo</th>

						<th>Hak Akses</th>

						<th>Email</th>

						<th>Password</th>

						<th>Aksi</th>

					</tr>

				</tfoot>

				<tbody>@php $i = 1; @endphp @foreach ($user as $data)

					@php

					$role = DB::table('model_has_roles')->where('model_id', $data->id)->first();

					$akses = DB::table('roles')->where('id', $role->role_id ?? 0)->first() ?? 0;

					@endphp

					<tr>

						<td>{{$i++}}</td>

						<td>{{$data -> name}}</td>

						<td>{{$data -> photo}}</td>

						<td>{{$akses -> name ?? ''}}</td>

						<td>{{$data -> email}}</td>

						<td>{{$data -> password}}</td>

						<td> <a href="public/user/edit/{{$data->id}}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>

							<a href="public/user/hapus/{{$data->id}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>

						</td>

					</tr>@endforeach

				</tbody>

			</table>

		</div>

	</div>

</div>

@endsection