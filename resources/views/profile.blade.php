<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALLPRO ASSIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
        }
        .profile-container {
            display: flex;
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .sidebar {
            width: 250px;
            background: #007bff;
            color: #fff;
            padding: 30px;
            text-align: center;
        }
        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
        }
        .sidebar h4 {
            margin-top: 15px;
            font-size: 20px;
        }
        .profile-details {
            flex: 1;
            padding: 30px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-edit {
            width: 100%;
            margin-top: 20px;
        }
        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    @php
        $user = Session::get('user');
    @endphp

<div class="container">
    
    <div class="profile-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <img src="assets/img/profile.jpg" alt="Profile Image" class="profile-pic">
            <h4>{{ $user->username }}</h4>
            <p> {{ $user->role }} </p>
        </div>

        <!-- Profile Details -->
        <div class="profile-details">
            <h4 class="mb-3">Admin Profile</h4>
            <form>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" disabled class="form-control" value="{{ $user->username }}" id="username" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" disabled class="form-control" value="{{ $user->email }}" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Mobile Number</label>
                    <input type="mobile_no" disabled class="form-control" value="{{ $user->mobileno }}" id="phone" placeholder="Enter your mobile number">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <input type="mobile_no" disabled class="form-control" value="{{ $user->role }}" id="phone" placeholder="Enter your mobile number">
                </div>
                {{-- <div class="mb-3">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode">
                </div> --}}
                <a href="/" class="btn btn-primary form-control">Back</a>    
            </form>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>