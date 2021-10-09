@extends('shared.base')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Data Delivery Order</h7>
    </div>
    <div class="card-body">
        <nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;">
            <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
            <form action="{{route('deliveryOrder')}}" class="form-inline" method="GET">
                <a href="{{route('deliveryCreate')}}" class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0 btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>
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
                        <th>No DO</th>
                        <th>Tanggal</th>
                        <th>Nama Customer</th>
                        <th>Customer CP</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Catatan</th>
                        <th>Created By</th>
                        <th class="center-dt">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No DO</th>
                        <th>Tanggal</th>
                        <th>Nama Customer</th>
                        <th>Customer CP</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Catatan</th>
                        <th>Created By</th>
                        <th class="center-dt">Aksi</th>
                    </tr>
                </tfoot>
                <tbody>@php $i = 1; @endphp @foreach ($do as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->no_do}}</td>
                        <td>{{$data->tanggal_do}}</td>
                        <td>{{$data->nama_customer}}</td>
                        <td>{{$data->telepon}}</td>
                        <td>{{$data->nama_produk}}</td>
                        <td>{{$data->qty}}</td>
                        <td>{{$data->catatan}}</td>
                        <td>{{$data->created_by}}</td>
                        <td class="center-dt">
                            <a href="{{ route('deliveryUpdate',$data->id) }}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                            <a href="{{ URL::to('delivery_order/cetak/'.$data->id.'/do') }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px;" target="_blank"><i class="fa fa-print"></i>&nbsp;Print</a>                      
                            <!-- <a href="{{ route('viewPr',$data->id) }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px;"><i class="fas fa-eye-alt"></i>&nbsp;View</a> -->
                            <a href="delivery_order/hapus/{{$data->id}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>
                        </td>
                    </tr>@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection