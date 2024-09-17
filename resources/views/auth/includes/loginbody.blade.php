<body class="registeration-wrapper"
	style="background-image: linear-gradient(rgba(255, 255, 255, 0.735), rgba(0, 0, 0, 0.5))">

	<div class="container my-5 bg-white rounded-3">
		<div class="row">
			<div class="col-md-5 d-none d-md-block img-wrapper">
				<img src="{{asset('assets/admin/images/rear-view-young-college-student.jpg')}}" alt="">
			</div>
			<div class="col-md-7">
				<form action="{{ route('login') }}" method="POST" class="text-center h-100 px-3 d-flex flex-column justify-content-center">
                    @csrf
					<h3 class="fw-semibold mb-5">LOGIN FORM</h3>
					<div class="input-group mb-3">
						<input type="text" placeholder="Username" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>
                        @error('userName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
						<img src="{{asset('assets/admin/images/user-svgrepo-com.svg')}}" alt="" class="input-group-text">
					</div>
					<div class="input-group mb-3">
						<input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                       @enderror
						<img src="{{asset('assets/admin/images/password-svgrepo-com.svg')}}" alt="" class="input-group-text">
					</div>
					<button class="btn btn-dark px-5 mb-2">
						LOGIN
						<img src="{{asset('assets/admin/images/arrow-sm-right-svgrepo-com.svg')}}" alt="">
					</button>
					<a href="{{ route('register') }}" class="fw-semibold fs-6 text-decoration-none text-dark">New User?</a>
				</form>
			</div>
		</div>
	</div>

