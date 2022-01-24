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
                        <!-- <input type="hidden" name="harga_temp" id="harga_temp"> -->
                        <input type="hidden" name="id_itr" id="id_itr" value="{{$data['itr']->id}}">

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">No ITR</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" required="required" id="nomor_itr" name="nomor_itr" value="{{$data['itr']->no_itr}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputtext" class="col-sm-2 col-form-label">No PR</label>
                            <div class="col-sm-10">
                                <select name="nomor_pr" id="nomor_pr" class="form-control form-control-sm" onchange="getDetailPr()" required>
                                    <option value=""></option>
                                    @foreach($data['pr'] as $k)
                                    @if($data['itr']->id_pr == $k->id)
                                    <option value="{{$k->id}}" selected>{{$k->no_pr}}</option>
                                    @else
                                    <option value="{{$k->id}}">{{$k->no_pr}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div id="prReview">
                            <table class="table">
                                <thead>
                                    <th>No.</th>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Harga</th>
                                    <th>Catatan</th>
                                    <th>Vendor</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody id="listPr">
                                    @foreach($data['prList'] as $pr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pr->nama_produk }}</td>
                                            <td>{{ $pr->qty }}</td>
                                            <td>{{ $pr->qty * $pr->harga }}</td>
                                            <td>{{ $pr->note }}</td>
                                            <td>{{ $pr->nama_vendor }}</td>
                                            @if($pr->is_checked == 1)
                                                <td>
                                                    <input type="checkbox" class="checkValidasi" name="prr_id[]" value="{{ $pr->id }}" checked>
                                                </td>
                                            @else
                                                <td>
                                                    <input type="checkbox" class="checkValidasi" name="prr_id[]" value="{{ $pr->id }}" >
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group row" style="float: right;">
                            <label for="inputtext" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-4" style="padding-right: 50px;">
                                <button type="submit" class="btn btn-outline-primary btn-sm" value="0" name="simpan" id="btn-simpan"><i class="fas fa-save">&nbsp;Simpan</i></button>
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
        $('#nomor_pr').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function getDetailPr() {

        var table = "list_pr";
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
                    $('#prReview').html();

                    $('#prReview').append(`
                        <table class="table">
                            <thead>
                                <th>No.</th>
                                <th>Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Catatan</th>
                                <th>Vendor</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody id="listPr"></tbody>
                        </table>
                    `);

                    $.each(data, function(index, key) {
                        if(key.is_checked == 1) {
                            var is_checked = `<input type="checkbox" class="checkValidasi" name="prr_id[]" value="${key.id}" checked>`;
                        } else {
                            var is_checked = `<input type="checkbox" class="checkValidasi" name="prr_id[]" value="${key.id}">`;
                        }

                        $('#listPr').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${key.nama_produk}</td>
                                <td>${key.qty}</td>
                                <td>${key.qty * key.harga}</td>
                                <td>${key.note}</td>
                                <td>${key.nama_vendor}</td>
                                <td>${is_checked}</td>
                            </tr>
                        `);
                    })
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