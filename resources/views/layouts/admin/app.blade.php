<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.admin.css')
    
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

