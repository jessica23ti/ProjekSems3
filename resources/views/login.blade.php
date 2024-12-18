<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Sign Up</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--  Icon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <div class="bg-overlay"></div>
    <div class="form-structor">
        <div class="signup">
            <h1 class="form-title" id="signup">Sign up</h1>
            @error('success')
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @enderror
            <div class="form-holder">
                <form action="{{ route('LogicRegrister') }}" method="POST" style="height: 230px">
                    @csrf
                    <div class="row">
                        <div class="col-auto">
                            <label for="name"><i class="bi bi-person-circle"></i> Name : </label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" />
                            @error('name')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div> <br><br><br>
                        <div class="col-auto">
                            <label for="Username"><i class="bi bi-person-circle"></i> Username : </label>
                            <input type="text" name="username" id="Username" value="{{ old('Username') }}" />
                            @error('Username')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-auto">
                            <label for="email"><i class="bi bi-envelope-at-fill"></i> Email : </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <br><br><br>
                        <div class="col-auto ">
                            <label for="password"><i class="bi bi-lock-fill"></i> Password : </label>

                            <input type="password" name="password" id="password" value="{{ old('password') }}" />

                            @error('password')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-auto ">
                            <label for="alamat"><i class="bi bi-house-add-fill"></i> Alamat : </label>

                            <input type="text" name="alamat" id="alamat" value="{{ old('alamat') }}" />
                            @error('alamat')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-auto ">
                            <label for="no_hp"><i class="bi bi-telephone-fill"></i> No Handphone :
                            </label>

                            <input type="number" name="no_hp" id="no_hp" />
                            @error('no_hp')
                                <div class="error" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <br><br><br>

                    </div>



            </div>
            <button class="submit-btn" type="submit">Sign up</button>
            </form>
        </div>
        {{-- Login side --}}
        <div class="login slide-up">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                @error('email1')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <form action="{{ route('LogicLogin') }}" method="POST">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100"> <i class="bi bi-people-fill"></i> Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100"><i class="bi bi-eye-fill"></i> Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your password">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <br>
                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="login100-social-item bg2">
                            <i class="bi bi-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="bi bi-google"></i>
                        </a>
                    </div>

                </form>
            </div>
            <button class="submit-btn">Log in</button>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Letakkan script ini sebelum penutupan </body> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script>
            @if (session('success'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        </script> --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
