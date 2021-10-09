@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Update Data PR</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('purchaseSimpan')}}" method="post">{{ csrf_field() }}
            <table class="table">
                <div class="form-group row mb-2 mt-2" style="float: left;">
                    <div class="col-sm-10"> <a type="submit" href="{{route('purchase')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                    </div>
                </div>
                <tr>
                    <td>
                        <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_pr" id="id_pr" value="{{$data['pr']->id}}">
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">No PR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" id="nomor_pr" name="nomor_pr" value="{{ $data['pr']->no_pr }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="datetime-local"  value="{{ $data['pr']->tanggal}}" class="form-control form-control-sm" required="required" id="tanggal_pr" name="tanggal_pr">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nama Vendor</label>
                            <div class="col-sm-10">
                                <select name="vendor_id" class="form-control form-control-sm" id="vendor_id" onchange="getVendor('vendor');">
                                    <option value=""></option>
                                    @foreach ($data['vendor'] as $v)
                                    @if($data['pr']->vendor_id == $v->id_vendor)
                                    <option value="{{$v->id_vendor}}" selected>{{$v->nama_vendor}}</option>
                                    @else
                                    <option value="{{$v->id_vendor}}">{{$v->nama_vendor}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control form-control-sm" required="required" name="nama_vendor"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Vendor CP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="cp_vendor" id="cp_vendor" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-10">
                                <select name="produk_id" id="produk_id" class="form-control form-control-sm" required onchange="getVendor('produk')">
                                    <option value=""></option>
                                    @foreach ($data['produk'] as $p )
                                    @if($data['pr']->produk_id == $p->id_produk)
                                    <option value="{{$p->id_produk}}" selected>{{$p->nama_produk}}</option>
                                    @else
                                    <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" name="qty" id="qty" value="{{ $data['pr']->qty }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" name="harga" id="harga" readonly>
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
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#vendor_id').select2();
        $('#produk_id').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        getVendor('vendor');

        setTimeout(() => {
            getVendor('produk');            
        }, 800);     

    //    var d =  $("#tanggal_pr").val();
    //     $("#tanggal_pr").val(d.toISOString().slice(0,16));
        
    });

    function getVendor(table) {
        var id;
        if (table == 'vendor') {
            id = $("#vendor_id").val();

        } else {
            id = $("#produk_id").val();
        }

        if (id != "") {
            $.ajax({
                url: "{{ url ('ajax_dynamic') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    table: table,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    console.log(data);
                    if (table == 'vendor') {
                        $("#cp_vendor").val(data.telp);
                    }

                    if (table == 'produk') {
                        $("#harga").val(data.harga);
                        // $("#qty").val(data.qty);
                    }
                },
                error: function(e) {
                    console.log(e);
                },
            });
        } else {
            return false;
        }
    }
</script>
@endsection