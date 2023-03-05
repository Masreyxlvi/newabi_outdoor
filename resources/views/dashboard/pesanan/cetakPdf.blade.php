<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    {{-- <script src="/vendor/fontawesome-free/js/all.min.js"></script> --}}
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Roboto', sans-serif;
        color: #484b51;
    }

    #logo {
        font-size: 1.5rem;
        text-transform: uppercase;

        font-weight: 400;

    }

    hr {
        border-color: #dce9f0;
        margin-bottom: 0.5rem;
    }

    .container {
        width: 100%;
        height: auto;
    }

    .customer {
        float: left;
        max-width: 65%;
        /* height: 80%; */
        /* background-color: #cc6633; */
    }

    p {
        font-size: 1rem;
        color: #888a8d;
        margin-bottom: 2px !important;
        margin: 10px;
        padding: 0;
    }

    .servis {
        margin-left: 10%;
        max-width: 35%;
        float: left;

        /* height: 80%; */
        /* background-color: #3366cc; */
    }

    .servis ul li {

        margin: -15px -10px;
        padding: 0;
        color: #478fcc;
        font-size: 1.5rem;
    }

    table {
        width: 100%;
        margin-top: 180px;
    }

    th {
        text-align: left;
        padding: 5px;
        color: #fff;
        background-color: rgba(121, 169, 197, 0.92);
    }


    td {
        padding: 15px 10px;
        color: #728299
    }

    .total-price {
        text-align: right;
        float: right;
    }

    .total-price .price {
        width: 100%;
        max-width: 450px;
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 3px solid rgba(0, 0, 0, 0.1);
    }

    .delivery {
        width: 100%;
        max-width: 450px;
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 3px solid rgba(0, 0, 0, 0.1);
    }

    td:last-child {
        text-align: right;
    }

    th:last-child {
        text-align: right;
    }
</style>

<body>
    <center>

        <img src="{{ public_path('assets/img/logo/logo.png') }}" alt="" width="60px" />
        <span id="logo">Newabi Outdoor</span>
    </center>
    <hr>

    <div class="container">
        <div class="customer">
            <p>Kepada : <span style="color:#478fcc;  ">{{ $pesanan->user->name }}</span></p>
            @if ($pesanan->pickup == 'jasa_antar')
                <p>{{ $pesanan->user->alamat_detail }} <br> {{ $pesanan->user->alamat }} </p>
            @else
                <p>
                    Jln Baros, Gg H Sulaeman, RT 01, RW 05
                    <br>
                    Sukataris, Karangtengah, Cianjur
                </p>
            @endif
            <p><i class="fa-solid fa-phone"></i>+62 {{ $pesanan->user->no_hp }} </p>
        </div>
        <div class="servis">
            <p>Invoice</p>

            <ul>
                <li>
                    <p> ID: {{ $pesanan->kode_pesanan }}</p>
                </li>
                <li>
                    <p>Jaminan: <span style="text-transform: uppercase">{{ $pesanan->jaminan }}</span></p>
                </li>
                <li>
                    <p>Layanan: @if ($pesanan->pickup == 'jasa_antar')
                            Jasa Antar
                        @else
                            Datang Ke Lokasi
                        @endif
                    </p>
                </li>
            </ul>

        </div>

        <table border="0" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th width="140">SubTotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan->detailPesanan as $dp)
                    <tr>
                        <td>
                            <small style="display:block">
                                <b> Pickup : </b>
                                {{ date('d/M/Y', strtotime($dp->tgl_pesan)) }}
                                at
                                {{ date('H:i', strtotime($dp->tgl_pesan)) }}
                            </small>
                            <small style="display:block">
                                <b> Dropoff :
                                </b>{{ date('d/M/Y', strtotime($dp->batas_waktu)) }} at
                                {{ date('H:i', strtotime($dp->batas_waktu)) }}
                            </small>
                            <small>
                                <b> Total Hari : </b>{{ $dp->lama_pesan }} hari
                            </small>

                        </td>
                        <td>{{ $dp->produk->nama_produk }}</td>
                        <td>{{ $dp->qty }}</td>
                        <td>Rp. {{ number_format($dp->produk->harga) }}</td>
                        <td>Rp. {{ number_format($dp->jumlah_harga) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="total-price">
            <table class="price">
                <tr align="right">
                    @if (empty($pesanan->ongkir) && $pesanan->pickup == 'jasa_antar')
                        <td style="color:#484b51; font-size: 110% !important;"> Ongkir </td>
                        <td style="color:#484b51; font-size: 1.5rem !important;">
                            -
                        </td>
                    @else
                        <td style="color:#484b51; font-size: 110% !important;">Ongkir </td>
                        <td style="color:#484b51; font-size: 1.5rem !important;">
                            Rp. {{ number_format($pesanan->ongkir) }}
                        </td>
                    @endif
                </tr>

                <tr class="delivery" align="right">
                    <td style="color:#484b51; font-size:110% !important;">Total Pembayaran </td>
                    <td style="color:#484b51; font-size: 1.5rem !important;">
                        Rp. {{ number_format($pesanan->total_bayar) }}
                    </td>
                </tr>
            </table>
        </div>
        <div style="margin-top: 150px;">
            <hr>
            <span style="color:#484b51; font-size:1rem">Thank you for your business</span>
        </div>
    </div>
</body>

</html>
