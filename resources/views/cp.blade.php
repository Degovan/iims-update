@extends('shared.base')

@section('content')

<div class="card shadow mb-4 mt-2">

	<div class="card-header py-1" style="text-align: center; background-color: #f4f4f4;">

		<h7 class="m-0 font-weight-bold text-primary">Data Cp Vendor {{ $name }}</h7>

	</div>

	<div class="card-body">

		<nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>

			<form action="{{route('cpCari', $id_vendor)}}" class="form-inline" method="GET">

				<a href="{{route('cpTambah', $id_vendor)}}" class="btn btn-primary mr-sm-2 my-2 my-sm-0 btn-sm "><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>

				<input class="form-control mr-sm-2 form-control-sm" type="search" name="cari" placeholder="Cari data ..." aria-label="Cari data ...">

				<button class="btn btn-secondary my-2 my-sm-0  btn-sm" type="submit"><i class="fas fa-search"></i>&nbsp;Cari</button>

			</form>

		</nav>

		<div class="table-responsive">

			<table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">

				<thead class="thead-light">

					<tr>

						<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Email</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No. HP</th>

						<th class="center-dt" style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</thead>

				<tfoot>

					<tr>

						<th style="font-size: 10px;text-align: left;padding: 6px; margin: 4px;">No</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Nama</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Email</th>

						<th style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">No. HP</th>

						<th class="center-dt" style="font-size: 10px;text-align: left;padding: 4px; margin: 2px;">Aksi</th>

					</tr>

				</tfoot>

                <tbody>
                    @foreach($cp as $row)
                        <tr>

                            <td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{ $loop->iteration }}</td>

                            <td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$row->nama}}</td>

                            <td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$row->email}}</td>

                            <td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;">{{$row->hp}}</td>

                            <td style="font-size: 10px;text-align: left;padding: 1px; margin: 2px;"> 

                                <a href="{{route('cpEdit',$row->id_cp)}}" class="btn btn-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>

                                <a href="{{route('cpHapus',$row->id_cp)}}" class="btn btn-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>

			</table>

		</div>

	</div>

</div>

@endsection