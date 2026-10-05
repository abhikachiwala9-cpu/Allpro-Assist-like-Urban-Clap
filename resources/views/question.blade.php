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

	<style>
        
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
						<img class="img-fluid" src="Users/img/login1.jpg"  alt="">
						<div class="hover">
							<h4>Go To The Login Page</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="/login">Login</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3 style="margin-top:100px; font-size:30px; text-align:left;margin-left:100px; ">Answer The <br> Question</h3>
						<form class="row login_form" action="/questions" method="POST">
							@csrf
							<div class="col-md-12 form-group">
								<input type="hidden" name="email" value="{{$data->email}}">
								<input type="text" name="sec_que" value="{{$data->sec_que}}">
							</div>
							
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control"  id="" name="answer" placeholder="answer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'answer'">
							</div>
							
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Next</button>
								
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
                // icon: "error",
                title: "{{ Session::get('success') }}",
                showConfirmButton: true,
                timer: 2500
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