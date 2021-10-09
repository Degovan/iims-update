@extends('shared.base')
@section('content')
					<div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Edit Data customer</h7>
						</div>
						<div class="card-body" style="margin-top: -20px;">@foreach($customer as $data)
							<form action="{{route('customerUpdate')}}" method="post">{{ csrf_field() }}
								<table class="table">
									<div class="form-group row mb-2 mt-2" style="float: left;">
										<div class="col-sm-10"> <a type="submit" href="{{route('customer')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
										</div>
									</div>
									<tr>
										<td>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label"></label>
												<div class="col-sm-10">
													<input class="form-control form-control-sm" type="hidden" name="id_customer" value="{{ $data->id_customer }}" placeholder="text">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Nama customer</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="nama_customer" value="{{ $data->nama_customer }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Alamat Customer</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="alamat_customer" value="{{ $data->alamat_customer }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Telepon</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="telepon" value="{{ $data->telepon }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Fax</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="fax" value="{{ $data->fax }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="email" value="{{ $data->email }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Customer CP</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="customer_cp" value="{{ $data->customer_cp }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="nama" value="{{ $data->nama }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">HP</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="hp" value="{{ $data->hp }}">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Catatan</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" placeholder="text" required="required" name="catatan" value="{{ $data->catatan }}">
												</div>
											</div>
											<div class="form-group row" style="float: right;">
												<label for="inputtext" class="col-sm-2 col-form-label"></label>
												<div class="col-sm-10">
													<button type="submit" class="btn btn-outline-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Update</i>
													</button>
												</div>
											</div>
										</td>
									</tr>
								</table>
							</form>@endforeach</div>
					</div>
					@endsection