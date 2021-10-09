@extends('shared.base')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Data ITR</h7>
    </div>
    <div class="card-body">
        <nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;">
            <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
            <a class="navbar-brand" style="font-size: 12px;"></a>
            <form action="{{route('itr')}}" class="form-inline" method="GET">
                <a href="{{route('createItr')}}" class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0 btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>
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
            <table class="table table-bordered table-sm" style="font-size: 11px;" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>No ITR</th>
                        <th>No PR</th>
                        <th>Tanggal</th>
                        <th>Nama Vendor</th>
                        <th>Vendor CP</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th class="center-dt">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No ITR</th>
                        <th>No PR</th>
                        <th>Tanggal</th>
                        <th>Nama Vendor</th>
                        <th>Vendor CP</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>@php $i = 1; @endphp @foreach ($itr as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->no_itr}}</td>
                        <td>{{$data->no_pr}}</td>
                        <td>{{$data->tanggal}}</td>
                        <td>{{$data->nama_vendor}}</td>
                        <td>{{$data->telp}}</td>
                        <td>{{$data->nama_produk}}</td>
                        <td>{{$data->qty}}</td>
                        <td>{{$data->harga}}</td>
                        <td>{{$data->flag == 0 ? 'Aktif' : 'Approve'}}</td>
                        <td class="center-dt">
                            @if ($data->flag == 0)
                            <a href="{{ route('updateItr',$data->id) }}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                            @else
                            <a href="{{ URL::to('purchase/cetak/'.$data->id.'/itr') }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px;" target="_blank"><i class="fa fa-print"></i>&nbsp;Print</a>

                            <!-- <a href="{{ route('updateItr',$data->id) }}" class="btn btn-outline-success btn-sm disabled" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a> -->
                            @endif
                            <a href="itr/hapus/{{$data->id}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection