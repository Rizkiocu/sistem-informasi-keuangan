<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>As-Salam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ url('Source/src/font/iconsmind-s/css/iconsminds.css') }}" />
    <link rel="stylesheet" href="{{ url('Source/src/font/simple-line-icons/css/simple-line-icons.css') }}" />

    <link rel="stylesheet" href="{{ url('Source/src/css/vendor/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('Source/src/css/vendor/bootstrap.rtl.only.min.css') }}" />
    <link rel="stylesheet" href="{{ url('Source/src/css/vendor/bootstrap-float-label.min.css') }}" />
    <link rel="stylesheet" href="{{ url('Source/src/css/main.css') }}" />
</head>

<body class="background no-footer">
    <div class="fixed-background" src></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card">
                        <div class="position-relative image-side ">

                            <p class=" text-white h2">Sistem Keuangan Pondok Pesantren As-Salam Naga Beralih</p>

                        </div>

                        <div class="form-side">
                            <a href="Dashboard.Default.html">
                                <img class="mx-auto d-block" src="{{ asset('assets/images/lambang.png') }}" alt="Card image cap" style="width:100px">
                            </a>
                            <br>
                            @if ($message = session('gagal'))
                            <div class="alert alert-warning alert-dismissible fade show rounded mb-0" role="alert">
                                <strong>Gagal Login !!</strong> Username atau Password salah !!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div><br><br>
                            @endif
                            <form method="post" action="login/login">
                                {{ csrf_field() }}
                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="email" name="email" id="email" placeholder="Masukkan E-mail" required />
                                    <span>E-mail</span>
                                </label>

                                <label class="form-group has-float-label mb-4">
                                    <input class="form-control" type="password" placeholder="" name="password" id="password" placeholder="Masukkan Password" required />
                                    <span>Password</span>
                                </label>
                                <div class="d-flex justify-content-between align-items-center">

                                    <button class="btn btn-primary btn-lg btn-shadow" type="submit">LOGIN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ url('Source/src/js/vendor/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ url('Source/src/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('Source/src/js/dore.script.js') }}"></script>
    <script src="{{ url('Source/src/js/scripts.js') }}"></script>
</body>

</html>