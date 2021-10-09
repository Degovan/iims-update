@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Add Data PR</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('simpanItr')}}" method="post">{{ csrf_field() }}
            <table class="table">
                <div class="form-group row mb-2 mt-2" style="float: left;">
                    <div class="col-sm-10"> <a type="submit" href="{{route('purchase')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                    </div>
                </div>
                <tr>
                    <td>
                        <input type="hidden" name="id_validator" id="id_validator" value="{{Auth::user()->id}}">
                        <input type="hidden" name="qty_temp" id="qty_temp">
                        <input type="hidden" name="harga_temp" id="harga_temp">
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">No ITR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" id="nomor_itr" name="nomor_itr">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">No PR</label>
                            <div class="col-sm-10">
                                <select name="nomor_pr" id="nomor_pr" class="form-control form-control-sm" onchange="getDetailPr()" required>
                                    <option value=""></option>
                                    @foreach($data['pr'] as $k)
                                    <option value="{{$k->id}}">{{$k->no_pr}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Tanggal ITR</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" class="form-control form-control-sm" required="required" id="tanggal_itr" name="tanggal_itr">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nama Vendor</label>
                            
                            <div class="col-sm-9">
                                <input type="text" name="vendor_name" id="vendor_name" class="form-control form-control-sm">
                            </div>

                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_itr[]" value="valid_1" id="valid_vendor_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Vendor CP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="cp_vendor" id="cp_vendor">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_itr[]" value="valid_2" id="valid_vendor_cp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="produk_name" id="produk_name" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_itr[]" value="valid_3" id="valid_produk">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" required="required" name="qty" id="qty">
                            </div>
                            <div class="col-sm-1" style="padding-top: 8px;">
                                <input type="checkbox" class="checkValidasi" name="valid_itr[]" value="valid_4" id="valid_qty">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" required="required" name="harga" id="harga">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_itr[]" value="valid_5" id="valid_harga">
                            </div>
                        </div>
                        <div class="form-group row" style="float: right;">
                            <label for="inputtext" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4" style="padding-right: 50px;">
                                <button type="submit" class="btn btn-outline-primary btn-sm" value="0" name="simpan" id="btn-simpan"><i class="fas fa-save">&nbsp;Simpan</i></button>
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-outline-success btn-sm" value="1" name="simpan" id="btn-approve"><i class="fas fa-check-circle">&nbsp;Approve</i></button>
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
        $("#btn-approve").attr("disabled", true);
        $('#nomor_pr').select2();
        $('#produk_id').select2();
        isCheked();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function isCheked() {
        $(".checkValidasi").change(function() {
            if ($('.checkValidasi:checked').length == $('.checkValidasi').length) {
                $("#btn-approve").attr("disabled", false);
                $("#btn-simpan").attr("disabled", true);
            } else {
                $("#btn-approve").attr("disabled", true);
                $("#btn-simpan").attr("disabled", false);
            }
        });
    }

    function getDetailPr() {

        var table = "purchase_request";
        var id = $("#nomor_pr").val();

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
                    $("#cp_vendor").val(data.telp);
                    $("#vendor_name").val(data.nama_vendor);
                    $("#produk_name").val(data.nama_produk);
                    
                    $("#harga").val(data.harga);
                    $("#harga_temp").val(data.harga);

                    $("#qty").val(data.qty);
                    $("#qty_temp").val(data.qty);

                },
                error: function(e) {
                    console.log(e);
                },
            });
        } else {
            return false;
        }
    }

    function cekValidasi() {

        var qty = $("#qty").val();
        var qty_temp = $("#qty_temp").val();
        
        var harga = $("#harga").val();
        var harga_temp = $("#harga_temp").val();

        
        if (qty != qty_temp) {
            $("#valid_qty").attr("disabled", true);
            $("#valid_qty").prop('checked', false);                    
        } else {
            $("#valid_qty").attr("disabled", false);
        }
        
        if (harga != harga_temp) {
            $("#valid_harga").attr("disabled", true);
            $("#valid_harga").prop('checked', false);                    
        } else {
            $("#valid_harga").attr("disabled", false);
        }

    }
</script>
@endsection