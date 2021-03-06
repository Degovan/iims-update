@extends('shared.base')
@push('style')
<style>
	.image-input {
		display: none;
	}

	.image-label {
		width: 6em;
		height: 7em;
		border: 1px dashed #d1d3e2;
		cursor: pointer;
		background-image: url('noimage.png');
		background-size: cover;
		background-position: center;
		float: left;
	}
</style>
@endpush

@section('content')
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">
		<h7 class="m-0 font-weight-bold text-primary">Edit Homepage</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">
		<form action="/edit-homepage" method="post" enctype="multipart/form-data">{{ csrf_field() }}
			<table class="table">
				@if (count($errors) > 0)
				<tr>
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</tr>
				@endif
				<tr>
					<td>
						{{-- FOTO BACKGOUND --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Background</label>
							<div class="col-sm-10">
								<label for="background-input" class="image-label" id="background-label" style="background-image: url('/assets/images/{{ $data->background }}')">
									<input type="file" class="image-input" id="background-input" name="background">
								</label>
							</div>
						</div>
						{{-- end FOTO BACKGOUND --}}
						{{-- FOTO LOGO --}}
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Logo</label>
							<div class="col-sm-10">
								<label for="logo-input" class="image-label" id="logo-label" style="background-image: url('/assets/images/{{ $data->logo }}')">
										<input type="file" class="image-input" id="logo-input" name="logo">
								</label>
							</div>
						</div>
						{{-- end FOTO LOGO --}}
                        <div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Text 1</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="greeting" value="{{ $data->greeting }}">
							</div>
						</div>
                        <div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Text 2</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="content" value="{{ $data->content }}">
							</div>
						</div>
                        <div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Text 3</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="footer" value="{{ $data->footer }}">
							</div>
						</div>
                        <div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Copyright</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="copyright" value="{{ $data->copyright }}">
							</div>
						</div>
						<div class="form-group row" style="float: right;">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-0">
								<button type="submit" class="btn btn-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Update</i>
								</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
@endsection

@push('script')
<script src="/assets/js/jquery.uploadPreview.min.js"></script>
<script>
	$('.image-input').change(e => {
		const parentEl = $(e.target).parent();
		const reader = new FileReader();

		reader.onload = () => {
			parentEl.css('background-image', `url(${reader.result})`);
		}

		reader.readAsDataURL(e.target.files[0]);
	});
</script>
@endpush
