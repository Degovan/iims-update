@extends('shared.base')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card shadow">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary">Add User Form</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
					@include('pages.users.components.form')
					<div class="form-group d-flex justify-content-between">
						<!-- <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
							<i class="fas fa-arrow-left"></i> Back
						</a> -->
						<button type="submit" class="btn btn-primary">
							<i class="fas fa-save"></i> Save
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
