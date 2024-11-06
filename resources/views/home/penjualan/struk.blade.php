<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png')}}" href="{{ asset('assets/img/favicon.png') }}">
    <title>
        Struk
    </title>
    <!--     Fonts and icons     -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" /> --}}
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/sweetalert2-11.14.4/package/dist/sweetalert2.min.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('assets/js/font-awesome.js') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />
    <style>
        .body {
            border-spacing: 20px;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="page-header min-vh-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-auto col-lg-5 col-md-7 d-flex flex-column mx-auto"
                    style="border: 1px solid #000; border-radius: 8px;">
                    <div class="card-body card-plain">
                        <div class="card-header pb-0 text-center">
                            <h4 class="font-weight-bolder">Triangle Mart</h4>
                        </div>
                        <div class="card-body">
                        </div>
                        <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-4 text-l mx-auto">
                                Jl. Pamentasan Barat laut <br>
                                <b>Nama Admin: {{$penjualan->user->name}}</b><br>
                                <b>Nama Pelanggan: {{$penjualan->pelanggan->nama_pelanggan}}</b>
                            </p>
                        </div>
                        <div class="container-fluid py-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0 text-center" >
                                            <h6>Daftar Pembelian</h6>
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                No.</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Nama Produk</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Jumlah</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Subtotal</th>
                                                            <th class="text-secondary opacity-7"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($detailpenjualan as $detailpenjualan)
                                                        <tr>
                                                            <td class="align-middle text-center text-sm">
                                                            <a class="text-xs text-secondary mb-0">{{$loop->iteration}}</a>
                                                            </td>
                                                            <td class=" text-center text-sm">
                                                                <a class="text-xs text-secondary mb-0">{{$detailpenjualan->produk->nama_produk}}</a>
                                                            </td>
                                                            <td class=" text-center text-sm">
                                                                <a class="text-xs text-secondary mb-0">{{number_format($detailpenjualan->jml)}}</a>
                                                            </td>
                                                            <td class=" text-center text-sm">
                                                                <a class="text-xs text-secondary mb-0">{{number_format($detailpenjualan->total)}}</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="card-header pb-0" >
                                                    <h6>Total Harga: Rp. {{number_format($total)}}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
