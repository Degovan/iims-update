
	@extends('shared.base')
@section('content')
                    <div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Data Permission</h7>
						</div>
                        <div class="card-body">
							<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
								<form action="/user/cari" class="form-inline" method="GET">
									<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">
									<button class="btn btn-outline-secondary my-2 my-sm-0 btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>
								</form>
							</nav>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Role Description</th>
                                            <th>Permissions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Role Description</th>
                                            <th>Permissions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @forelse ($roles as $role)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <input type="text" class="form-control" value="{{ $role->name }}" disabled>
                                                </div>
                                            </td>
                                            <form action="{{ route('permissions.mass_update', $role->id) }}" method="post">
                                                @method('PUT')
                                                @csrf
                                            <td class="row" style="text-align: left;">
                                            @foreach ($permissions as $perm)
											
                                                <div class="col-4">
                                                    <label for="perm-b{{ $perm->name . $role->name }}">
                                                        <input type="checkbox" name="perms[]" id="perm-b{{ $perm->name . $role->name }}" @if($role->hasPermissionTo($perm->name)) checked @endif value="{{ $perm->name }}"> {{ $perm->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                                <div class="col-12 mt-1 text-right">
                                                    <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-caret-square-up"></i> Update</button>
                                                </div>
												
                                            </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">Role is empty</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
               
					@endsection