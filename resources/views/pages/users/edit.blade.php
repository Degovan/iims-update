@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-1" style="text-align: center;">
		<h6 class="m-0 font-weight-bold text-primary">Edit Data User</h6>
	</div>
	<div class="card-body">

		<form action="{{ route('users.update', $user->id) }}" method="post">
			@method('PUT')
			@include('pages.users.components.form')
			<div class="form-group d-flex justify-content-between">

				<button type="submit" class="btn btn-primary">
					<i class="fas fa-save"></i> Save
				</button>
			</div>
		</form>
	</div>
</div>

@endsection