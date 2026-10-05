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
            <img src="/assets/img/ansh_profile.jpeg" alt="Profile Image" class="profile-pic">
            <h4>{{ $user->username }}</h4>
            <p> {{ $user->role }} </p>
        </div>

        <!-- Profile Details -->
        <div class="profile-details">
            <h4 class="mb-3">Change Password</h4>
            <form action="/changepassword" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $user->username }}"  id="opass" placeholder="Enter your username">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Old Password</label>
                    <input type="text" class="form-control" name="opass"  id="opass" placeholder="Enter Password">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="password"  id="email" placeholder="Enter New Password">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Re-Enter Password </label>
                    <input type="password" class="form-control" name="rpass" id="phone" placeholder="Re-Enter Password">
                </div>
                {{-- <div class="mb-3">
                    <label for="" class="form-label">Role</label>
                    <select class="form-select" name="role">
                        @if (strcmp($user->role,"Admin")==0)
                        <option value="Admin" selected>ADMIN</option>
                        @else
                        <option value="Admin" >ADMIN</option>
                            
                        @endif

                        @if (strcmp($user->role,"SuperAdmin")==0)
                        <option value="SuperAdmin" selected>SUPER ADMIN</option>
                        @else
                        <option value="SuperAdmin" >SUPER ADMIN</option>
                            
                        @endif

                        @if (strcmp($user->role,"Manager")==0)
                        <option value="Manager" selected>MANAGER</option>
                        @else
                        <option value="Manager" >MANAGER</option>
                            
                        @endif

                    </select>
                </div> --}}
                {{-- <div class="mb-3">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="pincode" placeholder="Enter your pincode">
                </div> --}}
                <div class="row">
                    <div class="col-6">
                        <a href="/" class="btn btn-primary form-control">Back</a>
                    </div>
                    <div class="col-6">
                        
                <button type="submit" class="btn btn-primary form-control">Change Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>