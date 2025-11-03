<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Inventaris Aset</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="logo" style="text-align: center; margin-bottom: 1rem;">
                        <a href="{{ route('dashboard') }}">
                            <img style="width: 350px; height: auto; max-width: 90%;"
                                 src="{{ asset('assets-admin/images/logo/logo-baru.png') }}" alt="Logo">
                        </a>
                    </div>
                    <h1 class="auth-title">Sistem Inventaris Aset</h1>
                    <p class="auth-subtitle mb-5">Silakan masuk untuk mengelola data aset.</p>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('auth.login') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email"
                                name="email" value="{{ old('email') }}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" id="rememberMe" name="remember">
                            <label class="form-check-label text-gray-600" for="rememberMe">
                                Ingat saya
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum punya akun? <a href="{{ route('auth.register') }}"
                                class="font-bold">Sign up</a>.</p>
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan (Gambar Background) --}}
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"
                    style="
                    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('assets-admin/images/bg/inventaris-bg.jpg') }}');
                    background-size: cover;
                    background-position: center;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    padding: 2rem;
                    text-align: center;
                    color: white;
                ">
                    <h2>Manajemen Aset Digital</h2>
                    <p style="font-size: 1.2rem;">
                        Kelola semua aset Anda dengan mudah, terpusat, dan efisien.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>