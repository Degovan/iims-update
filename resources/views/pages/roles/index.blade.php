
	@extends('shared.base')
@section('content')

					<div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Data Role</h7>
						</div>
						<div class="card-body">
							<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
								<form action="/user/cari" class="form-inline" method="GET">
									<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">
									<button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>
								</form>
							</nav>

							@if (\Session::has('alert'))
							<div class="alert alert-{{Session::get('alert.type')}}">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>{{Session::get('alert.msg')}}</strong>
							</div>
							@endif
							
							<div class="table-responsive">
								<div class="text-right pt-2">
									<a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah</a>
								</div>


								<table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
									<thead class="thead-light">
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Action</th>
										</tr>
									</tfoot>
									<tbody>
										@forelse($roles as $role):
										<tr>
											<td>{{ $loop->index + 1 }}</td>
											<td>{{ $role->name }}</td>
											<td class="">
												<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-outline-success" style="font-size: 10px;">
													<i class="fas fa-pencil-alt"></i> Edit
												</a>
												<form class="d-inline" action="{{ route('roles.destroy', $role->id) }}" method="post" class="form-delete-user">
													@csrf
													@method('DELETE')
													<button type="submit" class="btn btn-sm btn-outline-danger" style="font-size: 10px;">
														<i class="fas fa-trash-alt"></i> Hapus
													</button>
												</form>
											</td>
										</tr>
										@empty
										<tr>
											<td colspan="4">Role is empty</td>
										</tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>
				

@push('style')
<link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">
@endpush

@endsection