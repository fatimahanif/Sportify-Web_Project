<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login or Register to Sportify</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Bootstrap + Styles -->
    <link rel="stylesheet" href="css/app.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Stylesheet (accountCheck.css) -->
    <link rel="stylesheet" href="css/accountCheck.css" />
    <script src="scripts/accountCheck.js" defer></script>
</head>

<body>
    <div class="mainContainer">
        <div class="formsContainer">
            <div class="forms">
                <!-- Sign Up form -->
                {{-- /signup/check/{$email}/{$username}/{$password}/{$confirmpassword} --}}
                <form action="{{ route('customer.store') }}" method="POST" class="signUpForm">
                    @csrf
                    <h2 class="formTitle">Sign Up</h2>

                    <!-- For email -->
                    <div class="inputContainer">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" />
                    </div>

                    <!-- For the user name -->
                    <div class="inputContainer">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" />
                    </div>

                    <!-- For the password field -->
                    <div class="inputContainer">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" />
                    </div>

                    <!-- For confirm password field -->
                    <div class="inputContainer">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="confirmpassword" />
                    </div>

                    <input type="submit" value="Sign Up" class="formBtn" />

                    <p class="socialText">Or sign in with your social accounts</p>

                    <!-- All the social icons -->
                    <div class="socialIcons">
                        <a href="#" class="socialIcon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <!-- Sign IN form -->
                {{-- /login/check/{$username}/{$password} --}}
                <form action="{{ route('customer.login') }}" method="POST" class="signInForm">
                    @csrf
                    <h2 class="formTitle">Sign In</h2>

                    <!-- For the user name -->
                    <div class="inputContainer">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Username" name="username" />
                    </div>

                    <!-- For the password field -->
                    <div class="inputContainer">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" />
                    </div>

                    <input type="submit" value="Sign In" class="formBtn" />

                    <p class="socialText">Or sign in with your social accounts</p>

                    <!-- All the social icons -->
                    <div class="socialIcons">
                        <a href="#" class="socialIcon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="socialIcon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panelsContainer">
            <div class="panel leftPanel">
                <div class="panelContent">
                    <h3>Newbie ?</h3>
                    <p>Join Sportify and buy quality products at lowest price.</p>
                    <button class="btn panelBtn formBtn" id="signUpBtn">Sign up</button>
                </div>
                <img src="img/log.svg" class="panelImage" alt="" />
            </div>
            <div class="panel rightPanel">
                <div class="panelContent">
                    <h3>Already Joined ?</h3>
                    <p>
                        Sign In to sportify and see your items in carts and order items and much more!
                    </p>
                    <button class="btn panelBtn formBtn" id="signInBtn">Sign in</button>
                </div>
                <img src="img/register.svg" class="panelImage" alt="" />
            </div>
        </div>
    </div>
</body>

</html>
