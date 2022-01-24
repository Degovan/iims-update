@extends('shared.base')
@section('content')
<div class="card shadow mb-4 mt-2">
	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">
		<h7 class="m-0 font-weight-bold text-primary">Edit Data vendor</h7>
	</div>
	<div class="card-body" style="margin-top: -20px;">@foreach($vendor as $data)
		<form action="{{route('vendorUpdate')}}" method="post">{{ csrf_field() }}
			<table class="table">
				<div class="form-group row mb-2 mt-2" style="float: left;">
					<div class="col-sm-10"> <a type="submit" href="{{route('vendor')}}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
					</div>
				</div>
				<tr>
					<td style="text-align: left; font-size: 10px; margin-right: -40px;">
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<input class="form-control form-control-sm" type="hidden" name="id_vendor" value="{{ $data->id_vendor }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Nama Vendor</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="nama_vendor" value="{{ $data->nama_vendor }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Email Vendor</label>
							<div class="col-sm-10">
								<input type="email" class="form-control form-control-sm" required="required" name="email" value={{ $data->email }}>
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Alamat vendor</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="alamat_vendor" value="{{ $data->alamat_vendor }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Telp</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="telp" value="{{ $data->telp }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="inputtext" class="col-sm-2 col-form-label">Fax</label>
							<div class="col-sm-10">
								<input type="text" class="form-control form-control-sm" required="required" name="fax" value="{{ $data->fax }}">
							</div>
						</div>

						<div class="form-group row" style="float: right;">
							<label for="inputtext" class="col-sm-2 col-form-label"></label>
							<div class="col-sm-10">
								<button type="submit" class="btn btn-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Update</i>
								</button>
							</div>
						</div>
					</td>
				</tr>
			</table>
		</form>@endforeach
	</div>
</div>
@endsection