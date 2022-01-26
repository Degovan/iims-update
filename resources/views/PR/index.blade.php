@extends('shared.base')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Data PR</h7>
    </div>

    <div class="card-body">
        <nav class="navbar navbar-light bg-light justify-content-between mb-2" style="margin-top: -13px;"> <a class="navbar-brand" style="font-size: 13px;">Data ini selalu di update pada periode tertentu</a>
            <form action="{{route('purchase')}}" class="form-inline" method="GET">
                <a href="{{route('createPr')}}" class="btn btn-outline-primary mr-sm-2 my-2 my-sm-0 btn-sm"><i class="fas fa-plus-square"></i>&nbsp;Tambah</a>
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
                        <th>No PR</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th class="center-dt">Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No PR</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($pr as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$data -> no_pr}}</td>
                            <td>{{$data -> tanggal}}</td>
                            <td>{{$data -> total}}</td>
                            <td>{{$data -> status == 0 ? 'Aktif' : 'Selesai'}}</td>
                            <td class="center-dt">
                                <button class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#modalDetail{{ $data->id }}" style="font-size: 10px">
                                    <i class="fas fa-exclamation-circle"></i>&nbsp;Detail
                                </button>
                                <a href="{{ route('updatePr',$data->id) }}" class="btn btn-outline-success btn-sm" style="font-size: 10px;"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</a>
                                <a href="{{ URL::to('purchase/cetak/'.$data->id.'/pr') }}" class="btn btn-outline-primary btn-sm" style="font-size: 10px;" target="_blank"><i class="fa fa-print"></i>&nbsp;Print</a>
                                <a href="purchase/hapus/{{$data->id}}" class="btn btn-outline-danger btn-sm" style="font-size: 10px;"><i class="fas fa-trash-alt"></i>&nbsp;Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Detail Form --}}
@foreach ($pr as $p)
<div class="modal fade" id="modalDetail{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data PR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row my-3">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">No. PR</span>
                            </div>
                            <input type="text" name="nomor_pr" class="form-control form-control-sm" value="{{ $p->no_pr }}" readonly>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Tanggal</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" value="{{ $p->tanggal }}" readonly>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Req. By</span>
                            </div>
                            <input type="text" class="form-control form-control-sm"  value="{{ $p->created_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Acc. By</span>
                            </div>
                            <input type="text" class="form-control form-control-sm"  value="{{ $p->acc_name ?? '-' }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="vendor_wrap" data-number="0">
                    <table class="table" id="productTable0" data-number="0">
                        <thead>
                            <th width="3%">No</th>
                            <th width="20%">Produk</th>
                            <th width="7%">Qty</th>
                            <th>Harga</th>
                            <th>Catatan</th>
                        </thead>
                        <tbody class="product_wrap" data-number="0" data-vendor="0">
                            @foreach($p->products as $product)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" value="{{ $product->nama_produk }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" value="{{ $product->qty }}" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" value="{{ $product->harga }}" readonly>
                                </td>
                                <td>
                                    <textarea class="form-control form-control-sm" readonly>{{ $product->note }}</textarea>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="main_note" class="col-sm-2 col-form-label">Catatan Utama</label>
                        <textarea class="form-control" readonly>{{ $p->note }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
