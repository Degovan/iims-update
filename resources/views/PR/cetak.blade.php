<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data->title ?></title>
    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }        

        html {
            margin: 10px 20px
        }

        .center {
            margin-left: auto;
            margin-right: auto;
        }

        .ft0 {
            font: 19px 'Arial';
            line-height: 22px;
        }

        .ft1 {
            font: 16px 'Arial';
            line-height: 18px;
        }

        .p0 {
            text-align: left;
            padding-left: 80px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p1 {
            text-align: left;
            padding-left: 70px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .img-responsive {
            max-width: 500px;
            height: auto;
        }

        table {
            border-collapse: collapse;
        }

        .tb-border tr td,
        .tb-border tr th {
            /* font-size: 10pt; */
            border: 1px solid black;
            border-collapse: collapse;
            /* padding-left: 2px; */
            text-align: left;
            padding: 0.5em;
        }

        .tb-no-border {
            border-left: 3px solid #fff !important;
            border-right: 3px solid #fff !important;
            margin-left: -5px;
        }

        .tb-no-border tr th {
            height: 20px;
        }

        .page-break {
            page-break-after: always;
        }

        .border-rb {
            border-bottom: 1px solid black;
            border-right: 1px solid black;
        }

        .td-center {
            text-align: center !important;
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(-1 * var(--bs-gutter-y));
            margin-right: calc(-0.5 * var(--bs-gutter-x));
            margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .row > * {
            box-sizing: border-box;
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * 0.5);
            padding-left: calc(var(--bs-gutter-x) * 0.5);
            margin-top: var(--bs-gutter-y);
        }

        .col-6 {
            flex: 0 0 auto;
            width: 50%;
        }
        .my-1 {
            margin-top: 0.25rem !important;
            margin-bottom: 0.25rem !important;
        }
        .my-3 {
            margin-top: 1rem !important;
            margin-bottom: 1rem !important;
        }
        .container {
            width: 100%;
            padding-right: var(--bs-gutter-x, 0.75rem);
            padding-left: var(--bs-gutter-x, 0.75rem);
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <hr>
    <center>
        <h5 style="font-size: 20px; font-weight: bold;">{{ $data->title }}</h5>
    </center>

    @php
        $vendors = App\PurchaseRequestProduct::join('vendor', 'vendor.id_vendor', '=', 'purchase_request_products.vendor_id')
            ->distinct()
            ->where('purchase_request_products.pr_id', $data->id)
            ->select([
                'vendor.*'
            ])
            ->get();

        $created_by = App\User::where('id', $data->created_by)
            ->first()
            ->name;

        if($data->acc_by) {
            $acc_by = App\User::where('id', $data->acc_by)
                ->first()
                ->name;
        } else {
            $acc_by = "-";
        }
    @endphp

    <body>
        @if($data->jenis == 'pr')
            <div class="row my-1">
                <div class="col-6">
                    <span>No. PR : {{$data->no_pr}}</span>
                </div>
                <div class="col-6">
                    <span>Tanggal : <?= date("j F Y", strtotime($data->tanggal)) ?></span>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-6">
                    <span>Req. By : {{ $created_by }}</span>
                </div>
                <div class="col-6">
                    <span>Apprv. By : {{ $acc_by }}</span>
                </div>
            </div>
            @foreach($vendors as $vendor)
                @php
                    $products = App\PurchaseRequestProduct::join('produk', 'produk.id_produk', '=', 'purchase_request_products.product_id')
                        ->where('purchase_request_products.pr_id', $data->id)
                        ->where('purchase_request_products.vendor_id', $vendor->id_vendor)
                        ->select([
                            'purchase_request_products.qty', 'produk.nama_produk', 'produk.harga',
                            'purchase_request_products.note'
                        ])
                        ->get();
                @endphp
                <div class="row my-1">
                    <div class="col-6">
                        <span>Vendor : {{ $vendor->nama_vendor }}</span>
                    </div>
                    <div class="col-6">
                        <span>Contact Person : {{ $vendor->telp }}</span>
                    </div>
                </div>
                <table style="width: 100%;" class="tb-border my-3">
                    <thead>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Catatan</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>Rp. {{ number_format(($product->qty * $product->harga)) }}</td>
                                <td>{{ $product->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
            <h4>Catatan Utama</h4>
            <div class="container">
                {{ $data->note }}
            </div>
        @endif
        @if($data->jenis =='itr')
            <div class="row my-1">
                <div class="col-6">
                    <span>No. ITR : {{$data->no_itr}}</span>
                </div>
                <div class="col-6">
                    <span>Status : {{$data->flag == 1 ? 'Approved' : 'Active'}}</span>
                </div>
                <div class="col-6">
                    <span>No. PR : {{$data->no_pr}}</span>
                </div>
                <div class="col-6">
                    <span>Tanggal : <?= date("j F Y", strtotime($data->tanggal)) ?></span>
                </div>
            </div>
            <div class="row my-1">
                <div class="col-6">
                    <span>Req. By : {{ $created_by }}</span>
                </div>
                <div class="col-6">
                    <span>Apprv. By : {{ $acc_by }}</span>
                </div>
            </div>
            @foreach($vendors as $vendor)
                @php
                    $products = App\PurchaseRequestProduct::join('produk', 'produk.id_produk', '=', 'purchase_request_products.product_id')
                        ->where('purchase_request_products.pr_id', $data->id)
                        ->where('purchase_request_products.vendor_id', $vendor->id_vendor)
                        ->select([
                            'purchase_request_products.qty', 'produk.nama_produk', 'produk.harga',
                            'purchase_request_products.note'
                        ])
                        ->get();
                @endphp
                <div class="row my-1">
                    <div class="col-6">
                        <span>Vendor : {{ $vendor->nama_vendor }}</span>
                    </div>
                    <div class="col-6">
                        <span>Contact Person : {{ $vendor->telp }}</span>
                    </div>
                </div>
                <table style="width: 100%;" class="tb-border my-3">
                    <thead>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Qty</th>
                        <th>Harga</th>
                        <th>Catatan</th>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->nama_produk }}</td>
                                <td>{{ $product->qty }}</td>
                                <td>Rp. {{ number_format(($product->qty * $product->harga)) }}</td>
                                <td>{{ $product->note ?? '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
            <h4>Catatan Utama</h4>
            <div class="container">
                {{ $data->note }}
            </div>
        @endif
        <script>
            window.addEventListener("load", window.print());
        </script>
    </body>

</html>