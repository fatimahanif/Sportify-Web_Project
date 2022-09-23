<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sportify</title>
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap + Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


    <script src="{{ URL::asset('scripts/admin_login_validation.js') }}" defer></script>
</head>


<body>
    <div class="container-fluid ">

        <div class="row align-self-center text-center" id="loginForm">
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-4 offset-lg-4" id="loginCol">
                <h3 class="text-center">Admin Login</h3>
                {{-- /login/checkAdmin/{$username}/{$password} --}}
                <form action="/admin/login/checkAdmin/{$username}/{$password}" id="admin_form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-form-label" for="userName">Username: </label>
                                <input id="userName" name="username" type="text" class="form-control" required
                                    autocomplete="off">
                                <label for="userName" id="userValid"></label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group row">
                                <label class="col-form-label" for="password">Password: </label>
                                <input id="password" name="password" type="password" class="form-control" required
                                    autocomplete="off">
                                <label for="password" id="passValid"></label>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <input class="btn btn-primary submitBtn" id="loginBtn" type="submit" value="Login">
                    </div>

                </form>
            </div>
        </div>

    </div>
</body>

</html>
