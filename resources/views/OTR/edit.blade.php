@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Update Data Outgoing Transaction</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('otrSave')}}" method="post">{{ csrf_field() }}
            <table class="table">
                <div class="form-group row mb-2 mt-2" style="float: left;">
                    <div class="col-sm-10"> <a type="submit" href="{{route('otr')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                    </div>
                </div>
                <tr>
                    <td>
                        <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
                        <input type="hidden" name="id_otr" id="id_otr" value="{{ $otr->id }}">

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nomor OTR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" id="nomor_otr" name="nomor_otr" value="{{$otr->no_otr}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nomor DO</label>
                            <div class="col-sm-10">
                                <select name="id_do" id="id_do" class="form-control form-control-sm" required onchange="getDataDo()">
                                    <option value=""></option>
                                    @foreach($do as $d)
                                    @if($otr->id_do == $d->id)
                                    <option value="{{ $d->id }}" selected>{{ $d->no_do}}</option>
                                    @else
                                    <option value="{{ $d->id }}">{{ $d->no_do}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                <!-- <input type="text" class="form-control form-control-sm" required="required" id="nomor_do" name="nomor_do"> -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Permintaan Oleh</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pembuat" id="nama_pembuat" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_1" value="valid_1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Tanggal DO</label>
                            <div class="col-sm-9">
                                <input type="datetime-local" class="form-control form-control-sm" required="required" id="tanggal_do" name="tanggal_do" required>
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_2" value="valid_2">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Nama customer</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_customer" id="nama_customer" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_3" value="valid_3">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Customer CP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="cp_customer" id="cp_customer">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_4" value="valid_4">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control form-control-sm">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_5" value="valid_5">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control form-control-sm" name="qty" id="qty">
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_6" value="valid_6">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">Catatan</label>
                            <div class="col-sm-9">
                                <textarea rows="4" name="catatan" id="catatan" class="form-control form-control-sm" required> </textarea>
                                <!-- <input type="textarea" class="form-control form-control-sm" required="required" name="catatan" id="catatan" required> -->
                            </div>
                            <div class="col-sm-1 pt-8">
                                <input type="checkbox" class="checkValidasi" name="valid_otr[]" id="valid_7" value="valid_7">
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
        $('#customer_id').select2();
        $('#produk_id').select2();
        $('#id_do').select2();
        isCheked();
        getDataDo();
        cekboxValid();

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

    function cekboxValid() {
        var isValid = <?php echo json_encode($otr->valid_otr); ?>;
        console.log(isValid);
        if (isValid.length > 0) {            
            for (let i = 0; i < isValid.length; i++) {
                for (let k = 1; k < 8; k++) {
                    if (isValid[i] == 'valid_' + k) {
                        $("#valid_"+k).prop("checked", true);
                    }
                }
            }
        }
    }


    function getDataDo() {
        var id = $("#id_do").val();
        var table = "deliveri_order";
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
                    $("#qty").val(data.qty);
                    $("#harga").val(data.harga);
                    $("#catatan").val(data.catatan);
                    $("#tanggal_do").val(data.tanggal_do);
                    $("#nama_customer").val(data.nama_customer);
                    $("#cp_customer").val(data.telepon);
                    $("#nama_produk").val(data.nama_produk);
                    $("#nama_pembuat").val(data.created_by);
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