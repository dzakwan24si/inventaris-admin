<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register - Sistem Inventaris</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="{{ asset('assets-admin/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-boxes me-2"></i>INVENTARIS</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('auth.register.form') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{ old('nama') }}" required>
                                <label for="nama">Nama Lengkap</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
                                <label for="username">Username</label>
                            </div>
                             <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password" required>
                                <label for="confirm_password">Confirm Password</label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms" required>
                                <label class="form-check-label" for="agree_terms">
                                    I agree to the <a href="#">Terms & Conditions</a>
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                            <p class="text-center mb-0">Already have an Account? <a href="{{ route('auth.login.form') }}">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>
</body>
</html>