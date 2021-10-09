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
    </style>
</head>

<body>
    <hr>
    <center>
        <h5 style="font-size: 20px; font-weight: bold;">{{ $data->title }}</h5>
    </center>

    <body>
        @if($data->jenis == 'pr')
        <table style="width: 100%;" class="tb-border">
            <tr>
                <th>No PR</th>
                <td colspan="3">{{$data->no_pr}}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td colspan="3"><?= date("j F Y", strtotime($data->tanggal)) ?></td>
            </tr>
            <tr>
                <th> Nama Vendor</th>
                <td colspan="3">{{$data->nama_vendor}}</td>
            </tr>
            <tr>
                <th>Vendor CP</th>
                <td colspan="3">{{$data->telp}}</td>
            </tr>
            <tr>
                <th rowspan="2">Produk</th>
                <td class="td-center">Nama</td>
                <td class="td-center">Qty</td>
                <td class="td-center">Harga</td>
            </tr>
            <tr>
                <td class="td-center">{{$data->nama_produk}}</td>
                <td class="td-center">{{$data->qty}}</td>
                <td class="td-center">{{$data->harga}}</td>
            </tr>
        </table>
        @endif
        @if($data->jenis =='itr')
        <table style="width: 100%;" class="tb-border">
            <tr>
                <th>No ITR</th>
                <td colspan="3">{{$data->no_itr}}</td>
            </tr>
            <tr>
                <th>No PR</th>
                <td colspan="3">{{$data->no_pr}}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td colspan="3"><?= date("j F Y", strtotime($data->tanggal)) ?></td>
            </tr>
            <tr>
                <th> Nama Vendor</th>
                <td colspan="3">{{$data -> nama_vendor}}</td>
            </tr>
            <tr>
                <th>Vendor CP</th>
                <td colspan="3">{{$data -> telp}}</td>
            </tr>
            <tr>
                <th rowspan="2">Produk</th>
                <td class="td-center">Nama</td>
                <td class="td-center">Qty</td>
                <td class="td-center">Harga</td>
            </tr>
            <tr>
                <td class="td-center">{{$data ->nama_produk}}</td>
                <td class="td-center">{{$data -> qty}}</td>
                <td class="td-center">{{$data -> harga}}</td>
            </tr>
        </table>
        @endif
        <script>
            window.addEventListener("load", window.print());
        </script>
    </body>

</html>