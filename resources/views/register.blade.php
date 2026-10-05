<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="Users/img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>ALLPRO ASSIST</title>
    <link rel="icon" href="/assets/img/kaiadmin/title logo.ico" type="image/x-icon" />

	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="Users/css/linearicons.css">
	<link rel="stylesheet" href="Users/css/owl.carousel.css">
	<link rel="stylesheet" href="Users/css/themify-icons.css">
	<link rel="stylesheet" href="Users/css/font-awesome.min.css">
	<link rel="stylesheet" href="Users/css/nice-select.css">
	<link rel="stylesheet" href="Users/css/nouislider.min.css">
	<link rel="stylesheet" href="Users/css/bootstrap.css">
	<link rel="stylesheet" href="Users/css/main.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>
        .login_form_inner h3{
            margin-top: -50px;
        }
        .container{
            margin-top: -100px;
        }
    </style>

</head>

<body>

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
                <div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="Users/img/login1.jpg" alt="">
						<div class="hover">
							<h4>Already Have An Account?</h4>
							<p>If you have already register then you login to our website by clicking on this button</p>
							<a class="primary-btn" href="/">Go To Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Register Admin</h3>
						<form class="row login_form" method="POST" action="/register_user">
							@csrf
							<div class="col-md-12 form-group">
							<span class="input-group-text" id="basic-addon1">@</span>
							<input type="text" value="{{ old('username') }}" class="form-control"   id="name" name="username" placeholder="Username"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
							</div>
							<span class="text-danger">
								@error('username')
									{{ $message }}
								@enderror
							</span>


							<div class="col-md-12 form-group">
								<input type="text" value="{{ old('password') }}" class="form-control" id="pass" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<span class="text-danger">
								@error('password')
									{{ $message }}
								@enderror
							</span>

                            <div class="col-md-12 form-group">
								<input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<span class="text-danger">
								@error('email')
									{{ $message }}
								@enderror
							</span>

                            <div class="col-md-12 form-group">
								<input type="text" value="{{ old('mobileno') }}" class="form-control" id="mob" name="mobileno" placeholder="Mobile No" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile No'">
							</div>
							<span class="text-danger">
								@error('mobileno')
									{{ $message }}
								@enderror
							</span>


							{{-- <label for="" style="margin-left: 20px; font-size:18px; color:rgb(55, 55, 55);">Role </label> --}}
							<div class="col-md-12 form-group">
								<select name="role" id="" class="form-control">
									<option value="">Choose Role</option>
                                    <option value="SuperAdmin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                </select>
							</div>

							{{-- <label for="" style="margin-left: 20px;">Security Question</label> --}}
							<div class="col-md-12 form-group">
								<select name="sec_que" id="" class="form-control">
									<option value="">Choose Security Question</option>
                                    <option value="In what city were you born?">In what city were you born?</option>
                                    <option value="What was the name of your first school?">What was the name of your first school?</option>
                                    <option value="What is your father's middle name?">What is your father's middle name?</option>
                                    <option value="Where did you go on your first vacation?">Where did you go on your first vacation?</option>
                                </select>
							</div>



							<div class="col-md-12 form-group">
								<input type="text" value="{{ old('answer') }}" class="form-control" id="mob" name="answer" placeholder="answer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'answer'">
							</div>
							<span class="text-danger">
								@error('answer')
									{{ $message }}
								@enderror
							</span>


							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Register Now</button>
								
							</div>
						</form>
					</div>
				</div>
                
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>

    @if (Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "{{ Session::get('success') }}",
                showConfirmButton: true,
                timer: 3500
            });
        </script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>



	<script src="Users/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="Users/js/vendor/bootstrap.min.js"></script>
	<script src="Users/js/jquery.ajaxchimp.min.js"></script>
	<script src="Users/js/jquery.nice-select.min.js"></script>
	<script src="Users/js/jquery.sticky.js"></script>
	<script src="Users/js/nouislider.min.js"></script>
	<script src="Users/js/jquery.magnific-popup.min.js"></script>
	<script src="Users/js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="Users/js/gmaps.min.js"></script>
	<script src="Users/js/main.js"></script>
</body>

</html>