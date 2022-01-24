@extends('shared.base')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-1" style="text-align: center;">
        <h7 class="m-0 font-weight-bold text-primary">Add Data PR</h7>
    </div>
    <div class="card-body" style="margin-top: -20px;">
        <form action="{{route('purchaseSimpan')}}" method="post">{{ csrf_field() }}
            <input type="hidden" name="id_pembuat" id="id_pembuat" value="{{Auth::user()->id}}">
            <div class="form-group row mb-2 mt-2" style="float: left;">
                <div class="col-sm-10"> <a type="submit" href="{{route('purchase')}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row my-3">
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">No. PR</span>
                        </div>
                        <input type="text" name="nomor_pr" class="form-control form-control-sm" id="nomor_pr" required>
                      </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Tanggal</span>
                        </div>
                        <input type="datetime-local" class="form-control form-control-sm" required="required" id="tanggal_pr" name="tanggal_pr" required>
                      </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Req. By</span>
                        </div>
                        <input type="text" class="form-control form-control-sm"  value="{{Auth::user()->name}}" readonly>
                    </div>
                </div>
            </div>
            <div class="vendor_wrap" data-number="0">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Nama Vendor</span>
                            </div>
                            <select name="vendor_id[]" class="form-control form-control-sm vendorId" data-number="0" id="vendor_id0" required>
                                <option value=""></option>
                                @foreach ($data['vendor'] as $v)
                                    <option value="{{$v->id_vendor}}">{{$v->nama_vendor}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Contact Person</span>
                            </div>
                            <input type="text" class="form-control form-control-sm cp_vendor" name="cp_vendor" id="cp_vendor0" data-number="0" readonly>
                            <button type='button' class="add_item btn_xs btn btn-primary mb-1 float-right" id="buttonAddVendor" data-number="0">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
                <table class="table" id="productTable0" data-number="0">
                    <thead>
                        <th width="3%">No</th>
                        <th width="20%">Produk</th>
                        <th width="7%">Qty</th>
                        <th>Harga</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody class="product_wrap" data-number="0" data-vendor="0">
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="produk_id[0][]" id="produk00" class="form-control form-control-sm" required onchange="getProduk('00')" data-number="00">
                                    <option value="" selected disabled>--- PILIH PRODUK ---</option>
                                    @foreach ($data['produk'] as $p )
                                    <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control form-control-sm" required="required" name="qty[0][]" id="qty00">
                            </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" required="required" name="harga[0][]" id="harga00" readonly>
                            </td>
                            <td>
                                <textarea name="note[0][]" id="note00" class="form-control form-control-sm"></textarea>
                            </td>
                            <td>
                                <button type='button' class="add_item btn_xs btn btn-primary" id="buttonAddProduct">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label for="main_note" class="col-sm-2 col-form-label">Catatan Utama</label>
                    <textarea name="main_note" id="main_note" class="form-control"></textarea>
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
    // add product
    const addVendor = () => {
        var wrapper = $(".vendor_wrap");

        var add_button = $("#buttonAddVendor");

        x = wrapper.data('number');

        $(add_button).click(function(e) {
            e.preventDefault();

            x++;
            $(wrapper).append(`
                <div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Nama Vendor</span>
                                </div>
                                <select name="vendor_id[]" class="form-control form-control-sm vendorId" data-number="${x}" id="vendor_id${x}" required>
                                    <option value=""></option>
                                    @foreach ($data['vendor'] as $v)
                                        <option value="{{$v->id_vendor}}">{{$v->nama_vendor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Contact Person</span>
                                </div>
                                <input type="text" class="form-control form-control-sm cp_vendor" name="cp_vendor" id="cp_vendor${x}" data-number="${x}" readonly>
                                <button type='button' class="remove_vendor btn_xs btn btn-danger">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <table class="table" id="productTable${x}" data-number="${x}">
                        <thead>
                            <th width="3%">No</th>
                            <th width="20%">Produk</th>
                            <th width="7%">Qty</th>
                            <th>Harga</th>
                            <th>Catatan</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody class="product_wrap${x}" data-number="0" data-vendor="${x}">
                            <tr>
                                <td>1</td>
                                <td>
                                    <select name="produk_id[${x}][]" id="produk${x}0" class="form-control form-control-sm" required onchange="getProduk('${x}0')" data-number="${x}0">
                                        <option value="" selected disabled>--- PILIH PRODUK ---</option>
                                        @foreach ($data['produk'] as $p )
                                        <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm" required="required" name="qty[${x}][]" id="qty${x}0">
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm" required="required" name="harga[${x}][]" id="harga${x}0" readonly>
                                </td>
                                <td>
                                    <textarea name="note[${x}][]" id="note${x}0" class="form-control form-control-sm"></textarea>
                                </td>
                                <td>
                                    <button type='button' class="add_product btn_xs btn btn-primary" id="buttonAddProduct${x}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `);

        });

        function getProduk(number) {
            var id = $("#produk"+number).val();

            if (id != "") {
                $.ajax({
                    url: "{{ url ('ajax_dynamic') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        table: 'produk',
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        $("#harga"+number).val(data.harga);
                        $("#qty"+number).val(data.qty);
                    },
                    error: function(e) {
                        console.log(e);
                    },
                });
            } else {
                return false;
            }
        }

        $(wrapper).on("click", `.add_product`, function(e) {
            y = $(`.product_wrap${x}`).data('number');

            y++;

            $(`.product_wrap${x}`).append(`
                <tr>
                    <td>${y + 1}</td>
                    <td>
                        <select name="produk_id[${x}][]" id="produk${x}${y}" class="form-control form-control-sm" required onchange="getProduk('${x}${y}')" data-number="${x}${y}">
                            <option value="" selected disabled>--- PILIH PRODUK ---</option>
                            @foreach ($data['produk'] as $p )
                            <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-sm" required="required" name="qty[${x}][]" id="qty${x}${y}">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" required="required" name="harga[${x}][]" id="harga${x}${y}" readonly>
                    </td>
                    <td>
                        <textarea name="note[${x}][]" id="note${x}${y}" class="form-control form-control-sm"></textarea>
                    </td>
                    <td>
                        <button type='button' class="remove_product btn_xs btn btn-danger">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            `);
        });
        
        $(wrapper).on("click", ".remove_product", function(e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            y--;
        });

        $(wrapper).on("click", ".remove_vendor", function(e) {
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').parent('div').remove();
            x--;
        });

        $(wrapper).on("change", ".vendorId", function(e) {
            e.preventDefault();

            var id      = $(this).val();
            var number  = $(this).data('number');

            $.ajax({
                url: "{{ url ('ajax_dynamic') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    table: 'vendor',
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    $(`#cp_vendor${number}`).val(data.telp);
                },
                error: function(e) {
                    console.log(e);
                },
            });
        });
    }
    
    // add product
    const addProduct = () => {
        var wrapper = $(".product_wrap");

        var add_button = $("#buttonAddProduct");

        v = wrapper.data('vendor');
        w = wrapper.data('number');

        $(add_button).click(function(e) {
            e.preventDefault();

            w++;
            $(wrapper).append(`
                <tr>
                    <td>${w + 1}</td>
                    <td>
                        <select name="produk_id[0][]" id="produk${v}${w}" class="form-control form-control-sm" required onchange="getProduk('${v}${w}')" data-number="${v}${w}">
                            <option value="" selected disabled>--- PILIH PRODUK ---</option>
                            @foreach ($data['produk'] as $p )
                            <option value="{{$p->id_produk}}">{{$p->nama_produk}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-sm" required="required" name="qty[0][]" id="qty${v}${w}">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" required="required" name="harga[0][]" id="harga${v}${w}" readonly>
                    </td>
                    <td>
                        <textarea name="note[0][]" id="note${v}${w}" class="form-control form-control-sm"></textarea>
                    </td>
                    <td>
                        <button type='button' class="remove_product btn_xs btn btn-danger">
                            <i class="fas fa-times"></i>
                        </button>
                    </td>
                </tr>
            `);
        });

        $(wrapper).on("click", ".remove_product", function(e) {
            e.preventDefault();
            $(this).parent('td').parent('tr').remove();
            w--;
        });

        function getProduk(number) {
            var id = $("#produk"+number).val();

            if (id != "") {
                $.ajax({
                    url: "{{ url ('ajax_dynamic') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        id: id,
                        table: 'produk',
                        _token: "{{csrf_token()}}"
                    },
                    success: function(data) {
                        $("#harga"+number).val(data.harga);
                        $("#qty"+number).val(data.qty);
                    },
                    error: function(e) {
                        console.log(e);
                    },
                });
            } else {
                return false;
            }
        }
    }

    function getProduk(number) {
        var id = $("#produk"+number).val();

        console.log(id);

        if (id != "") {
            $.ajax({
                url: "{{ url ('ajax_dynamic') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    table: 'produk',
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    $("#harga"+number).val(data.harga);
                    $("#qty"+number).val(data.qty);
                },
                error: function(e) {
                    console.log(e);
                },
            });
        } else {
            return false;
        }
    }

    $(document).ready(function() {
        addProduct();
        addVendor();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.vendorId').change(function (e) { 
            e.preventDefault();

            var id      = $(this).val();
            var number  = $(this).data('number');

            $.ajax({
                url: "{{ url ('ajax_dynamic') }}",
                type: "POST",
                dataType: 'json',
                data: {
                    id: id,
                    table: 'vendor',
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    $(`#cp_vendor${number}`).val(data.telp);
                },
                error: function(e) {
                    console.log(e);
                },
            });
        });

        
    });
</script>
@endsection

