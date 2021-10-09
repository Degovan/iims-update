@extends('shared.base')
@section('content')
					<!-- <h1 class="h3 mb-2 text-gray-800">customer</h1> -->
					<!-- <p class="mb-4">Menampilkan data customer </p> -->
					<div class="card shadow mb-4">
						<div class="card-header py-1" style="text-align: center;">
							<h7 class="m-0 font-weight-bold text-primary">Add Data customer</h7>
						</div>
						<div class="card-body" style="margin-top: -20px;">
							<form action="{{route('customerSimpan')}}" method="post">{{ csrf_field() }}
								<table class="table">
									<div class="form-group row mb-2 mt-2" style="float: left;">
										<div class="col-sm-10"> <a type="submit" href="{{route('customer')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
										</div>
									</div>
									<tr>
										<td>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Nama customer</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="nama_customer">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Alamat Customer</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="alamat_customer">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Telepon</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="telepon">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Fax</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="fax">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Email</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="email">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Customer CP</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="customer_cp">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Nama</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="nama">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">HP</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="hp">
												</div>
											</div>
											<div class="form-group row">
												<label for="inputtext" class="col-sm-2 col-form-label">Catatan</label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm"  required="required" name="catatan">
												</div>
											</div>
											<div class="form-group row" style="float: right;">
												<label for="inputtext" class="col-sm-2 col-form-label"></label>
												<div class="col-sm-10">
													<button type="submit" class="btn btn-outline-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Tambah</i>
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
