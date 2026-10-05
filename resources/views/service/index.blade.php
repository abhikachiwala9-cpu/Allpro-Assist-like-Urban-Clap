@include('header')

<body>

    <div class="card" style="margin:20px; padding:10px">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
        <div class="container">
            <a href="{{ route('service.create') }}" class="btn btn-primary mb-5"><i class="fa-solid fa-circle-plus"></i>
                Add Service</a>
            @if (Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">service Name</th>
                            <th scope="col">Pic 1</th>
                            {{-- <th scope="col">Pic 2</th>
                            <th scope="col">Pic 3</th>
                            <th scope="col">Video</th> --}}
                            {{-- <th scope="col">Duration</th> --}}
                            {{-- <th scope="col">Gender</th> --}} 
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Price</th>
                            {{-- <th scope="col">Discount</th> --}}
                            <th scope="col">Sub_Category</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            @php
                                $imagePath = public_path('img/' . $item->sr_pic1);

                                if (file_exists($imagePath)) {
                                    $src = asset('img/' . $item->sr_pic1);
                                } else {
                                    $src = asset('img/no_img.png');
                                }

                                $imagePath = public_path('img/' . $item->sr_pic2);

                                if (file_exists($imagePath)) {
                                    $src = asset('img/' . $item->sr_pic2);
                                } else {
                                    $src = asset('img/no_img.png');
                                }

                                $imagePath = public_path('img/' . $item->sr_pic3);

                                if (file_exists($imagePath)) {
                                    $src = asset('img/' . $item->sr_pic3);
                                } else {
                                    $src = asset('img/no_img.png');
                                }

                                $imagePath = public_path('video/' . $item->sr_video);

                                if (file_exists($imagePath)) {
                                    $src = asset('video/' . $item->sr_video);
                                } else {
                                    $src = asset('img/no_img.png');
                                }


                            @endphp
                            <tr class="">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->sr_name }}</td>
                                <td><img src="{{ $item->sr_pic1 }}" height="70px" width="70px" alt="/img/no_image.jpg"></td>
                                {{-- <td><img src="{{ $item->sr_pic2 }}" height="70px" width="70px" alt="/img/no_image.jpg"></td> --}}
                                {{-- <td><img src="{{ $item->sr_pic3 }}" height="70px" width="70px" alt="/img/no_image.jpg"></td> --}}
                                {{-- <td><video autoplay width="100" height="100" src="{{ $item->sr_video }}"></td> --}}
                                {{-- <td>{{ $item->sr_duration }}</td> --}}
                                {{-- <td>{{ $item->gender }}</td> --}}
                                {{-- <td>{{ $item->description }}</td> --}}
                                <td>{{ $item->sr_price }}</td>
                                {{-- <td>{{ $item->discount }}</td> --}}
                                <td>{{ $item->sub_id }}</td>
                                {{-- <td><img height="70px" width="90px" src="/img/{{$item->category_pic}}" alt="" ></td> --}}

                                
                                <form onsubmit="confirmDelete(event)" class="d-inline"
                                    action="{{ route('service.destroy', $item->_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                    <a href="{{route('service.show',$item->_id)}}" class="btn btn-info" ><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('service.edit', $item->_id) }}" class="btn btn-warning"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $data->links() }}
            </div>

        </div>
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
