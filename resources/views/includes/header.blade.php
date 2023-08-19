<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <title>Elfayez</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>

    <header>
        <div class="bg-layer">

            <nav>
                <div class="logo img-fluid">
                    <img src="{{ asset('img/logo-light.jpeg') }}" width="70" alt="" srcset="">
                </div>
                <div class="links">
                    <i class="fa fa-store text-light fa-2xl m-2"></i>
                    <a class="btn btn-danger" href="">تسجيل دخول</a>
                    <a class="btn btn-outline-success text-light" href="">حساب جديد</a>
                </div>
            </nav>

            <div class="categories">
                @foreach (DB::table('majors')->get() as $major)
                    <a href="" class="text-light text-decoration-none">{{ $major->name }}</a>
                @endforeach
            </div>

            @yield('headerContent')
        </div>
    </header>
