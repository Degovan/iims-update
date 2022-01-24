@extends('shared.base')
@section('content')
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">
		<h7 class="m-0 font-weight-bold text-primary">Data User</h7>
	</div>
	<div class="card-body">
		<!-- <div class="text-right mb-4">
                                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
                            </div> -->
		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
			<form action="/user/cari" class="form-inline" method="GET">
				<a href="{{ route('users.create') }}" class="btn btn-primary mr-sm-2 my-2 my-sm-0 btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>
				<!-- <input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">
				<button class="btn btn-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button> -->
			</form>
		</nav>

		@if (\Session::has('alert'))
		<div class="alert alert-{{Session::get('alert.type')}}">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>{{Session::get('alert.msg')}}</strong>
		</div>
		@endif

		<div class="table-responsive">
		<table class="table table-bordered table-sm" style="font-size: 5px; text-align: left;" id="dataTable" width="100%" cellspacing="0">
				<thead class="thead-light">
					<tr>
						<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Name</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Photo</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Email</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Name</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Photo</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Email</th>
						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>
					</tr>
				</tfoot>
				<tbody>
					@forelse($users as $user):
					<tr>
						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{ $loop->index + 1 }}</td>
						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{ $user->name }}</td>
						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;"><img src="{{url('/assets/images/users/' . ($user->photo ?? 'noimage.png'))}}" width="80px" alt=""></td>
						<td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{ $user->email }}</td>
						<td class="" style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">
							<a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm" style="font-size: 10px;">
								<i class="fas fa-pencil-alt"></i> Edit
							</a>
							<form class="d-inline" action="{{ route('users.destroy', $user->id) }}" method="post">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger btn-sm" style="font-size: 10px;">
									<i class="fas fa-trash-alt"></i> Hapus
								</button>
							</form>
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="4">User is empty</td>
					</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
