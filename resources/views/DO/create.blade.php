@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Add Data Delivery Order</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('deliverySave')}}" method="post">{{ csrf_field() }}
            <table class="table">
                <div class="form-group row mb-2 mt-2" style="float: left;">
                    <div class="col-sm-10"> <a type="submit" href="{{route('deliveryOrder')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                    </div>
                </div>
                <tr>
                    <td>
                        <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nomor DO</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" id="nomor_do" name="nomor_do">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Tanggal DO</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control form-control-sm" required="required" id="tanggal_do" name="tanggal_do" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nama customer</label>
                            <div class="col-sm-10">
                                <select name="customer_id" class="form-control form-control-sm" id="customer_id" required onchange="getVendor('customer')">
                                    <option value=""></option>
                                    @foreach ($customer as $v)
                                    <option value="{{$v->id_customer}}">{{$v->nama_customer}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Customer CP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" name="cp_customer" id="cp_customer" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-10">
                                <select name="produk_id" id="produk_id" class="form-control form-control-sm" required onchange="getVendor('produk')">
                                    <option value=""></option>
                                    @foreach ($produk as $p)
                                    <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control form-control-sm" required="required" name="qty" id="qty" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-10">
                            <textarea rows="4"  name="catatan" id="catatan" class="form-control form-control-sm" required> </textarea>
                                <!-- <input type="textarea" class="form-control form-control-sm" required="required" name="catatan" id="catatan" required> -->
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

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('#customer_id').select2();
        $('#produk_id').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function getVendor(table) {
        var id;

        if (table == 'customer') {
            id = $("#customer_id").val();

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
                    if (table == 'customer') {
                        $("#cp_customer").val(data.telepon);
                    }
                    if (table == 'produk') {
                        //  $("#harga").val(data.harga);
                        $("#qty").val(data.qty);
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
