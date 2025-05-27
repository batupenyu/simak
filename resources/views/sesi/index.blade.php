<!doctype html>
<html lang="en">

<head>
	<title>Data Pegawai</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

{{-- <div class="bg-img">
    <div class="content">
        <header>Login Form</header>
		<form action=" " method=" ">
            <div class="field">
                <span class="fa fa-user"></span>
                <input type="text" required placeholder="Email or Phone">
            </div>
            <div class="field space">
                <span class="fa fa-lock"></span>
                <input type="password" class="password" required placeholder="Password">

            </div>
            <div class="pass">
                <a href="#">Forgot Password?</a>
            </div>
            <div class="field">
                <input type="submit" value="LOGIN">
            </div>
            <div class="login">Or login with</div>
            <div class="link">
                <div class="facebook">
                    <i class="fab fa-facebook-f"><span>Facebook</span></i>
                </div>
                <div class="instagram">
                    <i class="fab fa-instagram"><span>Instagram</span></i>
                </div>
            </div>
            <div class="signup">Don't have account?
                <a href="#">SignUp Now</a>
            </div>
        </form>
    </div>
</div> --}}

<body>

{{-- <div class="w-50 center border rounded px-3 py-3 mx-auto mt-5">
            <form action="sesi/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ Session::get('email') }}" placeholder="Masukkan email anda" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" placeholder="Masukkan password anda" class="form-control">
                </div>
                <div class="mb-3 d-grid">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
    </div> --}}

{{-- <div class="bg-img"> --}}
	<div class="container "><br>
		<div class="col-md-4 col-md-offset-4 mx-auto">
			<h2 class="text-center">LOGIN</h2>
			@if (session('error'))
				<div class="alert alert-success">
					<b>Opps!</b> {{ session('error') }}
				</div>
			@endif
			<form action="/sesi/login" method="post">
				@csrf
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email" required="">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password" required="">
				</div>
				<button type="submit" class="btn btn-primary btn-block">Log In</button>
				<p class="mt-3 text-center">Belum punya akun? <a href="sesi/register">Register</a> sekarang!</p>
			</form>
		</div>
	</div>
{{-- </div> --}}

<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>
</body>

</html>
