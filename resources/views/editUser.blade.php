@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-1" style="text-align: center;">
		<h7 class="m-0 font-weight-bold text-primary">Edit Data user</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">@foreach($user as $data)
		@php
		$role = DB::table('model_has_roles')->where('model_id', $data->id)->first();
		$akses = DB::table('roles')->where('id', $role->role_id ?? 0)->first() ?? 0;
		@endphp
		<form action="public/user/update" method="post">{{ csrf_field() }}
			<table class="table">
				<div class="form-group row mb-2 mt-2" style="float: left;">
					<div class="col-sm-10"> <a type="submit" href="{{route('users.index')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
					</div>
				</div>
				<tr>
					<td>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<input class="form-control form-control-sm" type="hidden" name="id_user" value="{{ $data->id }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Name</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="name" value="{{ $data->name }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Photo</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="photo" value="{{ $data->photo }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Hak Akses</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="hak_akses" value="{{ $akses->name ?? '' }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="email" value="{{ $data->email }}">
							</div>
						</div>
						{{-- password tidak wajib --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" name="password" value="{{ $data->password }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Ulangi Password</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" placeholder="ulangi password" name="ulangi_password">
							</div>
						</div>
						{{-- password tidak wajib --}}
					</td>
				</tr>
			</table>
		</form>@endforeach
	</div>
</div>
@endsection