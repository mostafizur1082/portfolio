

<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Register | Portfolio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('backend') }}/assetsassets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="{{ asset('backend') }}/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('backend') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('backend') }}/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('logo') }}/logo.jpg" height="100" class="logo-dark mx-auto" alt="" style="border-radius: 50%;">
                                    <img src="{{ asset('logo') }}/logo.jpg" height="100" class="logo-light mx-auto" alt="" style="border-radius: 50%;">
                                </a>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>
    
                        <div class="p-3">
                            <form class="form-horizontal mt-3" action="{{ route('register') }}" method="post">
                                @csrf
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('name') is-invalid @enderror" type="text" required="" placeholder="Name" name="name" value="{{ old('name') }}">
                                    </div>

                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>


                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('username') is-invalid @enderror" type="text" required="" placeholder="Username" name="username" value="{{ old('username') }}">
                                    </div>

                                @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>


                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('email') is-invalid @enderror" type="email" required="" placeholder="email" name="email" value="{{ old('email') }}">
                                    </div>

                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" required="" placeholder="Password" name="password">
                                    </div>

                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                </div>

                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password" required="" placeholder="Confirm Password" name="password_confirmation">
                                    </div>

                                @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-2">
                                    
                                    <div class="col-sm-5 mt-3">
                                        <a href="{{ route('login') }}" class="text-muted"><i class="mdi mdi-account-circle"></i> Already registered?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

        <script src="{{ asset('backend') }}/assets/js/app.js"></script>

    </body>
</html>


