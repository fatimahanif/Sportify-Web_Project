<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/fba9e5900a.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Secular+One&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/admin_style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/adminPanel.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/blog.css') }}">

    <script src="{{ URL::asset('scripts/adminPanel.js') }}" defer></script>
    <script src="{{ URL::asset('scripts/adminValidation.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body>
    <!-- ################### NAVBAR ##################### -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="adminNavbar">
        <a class="btn navbar-brand" href="#" role="button" id="menuBarAdmin"><i class="fa-solid fa-bars"></i></a>

        <ul class="nav w-100">
            <li class="nav-item">
                <a class="nav-link mt-1" href="/index">HOME</a>
            </li>
            {{-- <li class="nav-item searchfeatureAdmin">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 adminNavSearch" type="search" placeholder="Search"
                        aria-label="Search" />
                    <button class="btn btn-outline-primary my-2 my-sm-0 d-none d-lg-inline" type="submit">
                        Search
                    </button>
                </form>
            </li> --}}

            <li class="nav-item ml-auto">
                @isset($customer)
                    <img src="{{ url('storage/images/') }}/{{ $customer->image }}" alt="" class="img-small">
                @endisset
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2" id="adminVerticalNavbar">
                <ul class="list-group vericalAdminBar pt-3">
                    <li class="list-group-item d-flex align-items-center">
                        <a href="@yield('linkOne')" class="list-group-link">
                            {{-- fa-house --}}
                            <i class="fa-solid @yield('linkOneIcon')"></i>
                            <span class="pl-2">@yield('linkTitleOne')</span>
                        </a>
                    </li>


                    <li class="list-group-item d-flex align-items-center">
                        <a href="@yield('linkTwo')" class="list-group-link">
                            {{-- fa-square-rss --}}
                            <i class="fa-solid @yield('linkTwoIcon')"></i>
                            <span class="pl-2">@yield('linkTitleTwo')</span>
                        </a>
                    </li>

                    <li class="list-group-item d-flex align-items-center">
                        <a href="@yield('linkThree')" class="list-group-link">
                            {{-- fa-square-rss --}}
                            <i class="fa-solid @yield('linkThreeIcon')"></i>
                            <span class="pl-2">@yield('linkTitleThree')</span>
                        </a>
                    </li>

                    <li class="list-group-item d-flex align-items-center">
                        {{-- fa-message --}}
                        <i class="fa-solid @yield('linkFourIcon')"></i>
                        <span class="pl-2">@yield('linkTitleFour')</span>
                    </li>

                    <li class="list-group-item d-flex align-items-center">
                        {{-- fa-user --}}
                        <i class="fa-solid @yield('linkFiveIcon')"></i>
                        <span class="pl-2">@yield('linkTitleFive')</span>
                    </li>
                </ul>
            </div>

            @yield('page-content')
            <!-- ############# ROW ENDS HERE ################## -->
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    @yield('scriptOne')
    @yield('scriptTwo')
</body>

</html>
