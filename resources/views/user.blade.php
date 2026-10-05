@include('header')

<body>

    <div class="card" style="width: 970px; margin:10px; padding:10px">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
        <div class="container">
            {{-- <a href="{{ route('coupon.store') }}" class="btn btn-primary mb-5"><i class="fa-solid fa-circle-plus"></i> Add
                People</a>
            @if (Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-primary  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Username</th>
                            <th scope="col">Mobile No</th>
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Pincode</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            @php
                                $imagePath = public_path('img/' . $item->coupon_pic);

                                if (file_exists($imagePath)) {
                                    $src = asset('img/' . $item->coupon_pic);
                                } else {
                                    $src = asset('img/no_img.png');
                                }
                            @endphp
                            <tr class="">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->coupon_desc }}</td>
                                <td>{{ $item->mobileno }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->pincode }}</td>
                               
                                
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links() }}
            </div>

        </div> --}}
            <h2 style="text-align:center">All Users</h2>
            <div class="row">
                    @foreach ($data as $item)
                <div class="col-4">

                        <div class="card">
                            <img src="/assets/img/profile.jpg" height="220" width="210" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Username : {{ $item->username }}</h5>
                                <p class="card-text"> <span style="font-weight: 900" > Email </span> : {{ $item->email }} <br> 
                                    <span style="font-weight: 900" > Mobile No </span> : {{ $item->mobileno }} <br>
                                    <span style="font-weight: 900" > Password </span> : {{ $item->password }} <br>
                                    <span style="font-weight: 900" > Address </span> : {{ $item->address }}  </p>
                                {{-- <a href="#" class="btn btn-primary">Edit Profile</a> --}}
                            </div>
                        </div>
                </div>

                    @endforeach
            </div>
            {{-- {{ $data->links() }} --}}

        </div>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
        <script>
            function confirmDelete(event) {
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit(); // Submit the form after confirmation
                    }
                });
            }
        </script>
</body>
<br><br>
@include('footer')
