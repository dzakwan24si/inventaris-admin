<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.admin.css')
    <style>
        .sidebar-wrapper .logo img {
            height: 55px !important;
            width: auto !important;
        }
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 30px;
            right: 30px;
            background-color: #25D366; /* Warna hijau WhatsApp */
            color: #FFF;
            border-radius: 50%;
            text-align: center;
            font-size: 30px; /* Ukuran icon */
            line-height: 70px; /* Pusatkan icon secara vertikal */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 100;
            transition: 0.3s;
        }

        .whatsapp-float:hover {
            background-color: #128C7E; /* Warna hijau lebih gelap */
            color: #FFF;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('layouts.admin.sidebar')
        <div id="main">
            @include('layouts.admin.header')

            @yield('content')

            @include('layouts.admin.footer')
        </div>
    </div>
    @include('layouts.admin.js')
    <a href="https://wa.me/628982124281?text=Halo%20Admin,%20saya%20mau%20bertanya..."
       class="whatsapp-float"
       target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>
</body>
</html>

