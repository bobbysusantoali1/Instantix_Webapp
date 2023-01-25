@extends('MainBody')
@section('title', $title)
@section('active_about', ($active == 'About Us') ? 'active' : '')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Tentang Kami</h1>
    <p style="font-size: 28pt">
        Kami menyadari kenyamanan dan keamanan saat pembelian tiket adalah hal yang krusial dalam kelancaran aktivitas Anda. Untuk itu, kami, Instantix hadir untuk membantu Anda.    </p>
    <p style="font-size: 28pt">
        Instantix adalah sebuah web application yang memfasilitasi proses jual-beli tiket antara event organizers dengan masyarakat (calon pembeli).
    </p>
    <h1>Kontak Kami</h1>
    <div style="font-size: 20pt">
        <div>Alamat : Jalan Harjamukti Kidul III No. 19A Jakarta Utara</div>
        <div>Telp : 021-3824910239123911</div>
        <div>Email : instantixinstantix@gmail.com</div>

        <a href="https://goo.gl/maps/p4sgmQgtbyuvSCcF7">
            <button type="button" class="btn btn-info" style="font-size: 20pt">
                Klik Di Sini Untuk Melihat Lokasi Kami
            </button>

        </a>
    </div>
</body>
</html>
{{-- @include('Components.ImagePage') --}}
</section>
@endsection
