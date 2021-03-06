@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Add Data DO</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('deliverySave')}}" method="post">{{ csrf_field() }}
            <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
            <div class="form-group row mb-2 mt-2" style="float: left;">
                <div class="col-sm-10"> <a type="submit" href="{{route('deliveryOrder')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">No. DO</span>
                        </div>
                        <input type="text" class="form-control form-control-sm" required="required" id="nomor_do" name="nomor_do">
                      </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tanggal</span>
                        </div>
                        <input type="datetime-local" class="form-control form-control-sm" required="required" id="tanggal_do" name="tanggal_do" required>
                      </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Order By</span>
                        </div>
                        <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
                        <input type="text" class="form-control form-control-sm"  value="{{Auth::user()->name}}" readonly>
                    </div>
                </div>
            </div>
            <div class="vendor_wrap" data-number="0">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3 d-none" id="cp-element">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Nama Customer</span>
                            </div>
                            <select name="customer_id" class="form-control" id="customer_id" required onchange="getVendor('customer')">
                                <option value=""></option>
                                @foreach ($customer as $v)
                                    <option value="{{$v->id_customer}}">{{$v->nama_customer}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Contact Person</span>
                            </div>
                            <input type="text" class="form-control form-control-sm cp_vendor" name="cp_customer" id="cp_customer" readonly>
                            <button type="button" class="btn btn-primary" id="btn-add-cp">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Produk</th>
                            <th class="text-left" width="10%">Qty</th>
                            <th class="text-left">Harga Satuan</th>
                            <th class="text-left">Harga Total</th>
                            <th class="text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="prod-show" class="d-none">
                            <td>1</td>
                            <td>
                                <select name="produk_id" id="produk_id" class="form-control form-control-sm" required onchange="getVendor('produk')">
                                    <option value="">--- PILIH PRODUK ---</option>
                                    @foreach ($produk as $p)
                                    <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" required="required" name="qty" id="qty" readonly>
                            </td>
                            <td>
                                <input type="number" id="harga-satuan" class="form-control" readonly>
                            </td>
                            <td>
                                <input type="number" id="harga-total" class="form-control" readonly>
                            </td>
                            <td>
                                <button class="btn btn-danger" id="btn-rm-product" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </td>
                        </tr>
                        <tr id="prod-hide">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-primary" id="btn-add-product" type="button">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <textarea rows="4"  name="catatan" id="catatan" class="form-control form-control-sm" required> </textarea>
                </div>
            </div>
            <div class="form-group row" style="float: right;">
                <label for="inputtext" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-outline-success btn-sm" value="Update Data"><i class="fas fa-pen-alt">&nbsp;Tambah</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        // $('#customer_id').select2();
        // $('#produk_id').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#btn-add-product').click(function(e) {
        e.preventDefault();

        $('#prod-show').removeClass('d-none');
        $('#prod-hide').addClass('d-none');
    });

    $('#btn-add-cp').click(function(e) {
        const button = $(this);

        $('#cp-element').toggleClass('d-none');
        button.toggleClass('btn-primary');
        button.toggleClass('btn-danger');

        if(button.hasClass('btn-danger')) {
            button.html(`
                <i class="fas fa-times"></i>
            `);
        } else {
            button.html(`
                <i class="fas fa-plus"></i>
            `);
        }

        $('#cp_customer').val('');
        $('#customer_id').val('');
    });

    $('#btn-rm-product').click(function(e) {
        e.preventDefault();

        // Reset all value
        $('#produk_id').val('');
        $('#qty').val('');
        $('#harga-satuan').val('');
        $('#harga-total').val('');

        $('#prod-hide').removeClass('d-none');
        $('#prod-show').addClass('d-none');
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
                        $('#harga-satuan').val(data.harga);
                        $('#harga-total').val(data.harga * data.qty);
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

