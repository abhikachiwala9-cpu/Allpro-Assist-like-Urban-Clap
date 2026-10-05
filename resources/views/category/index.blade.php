@include('header')

<body>

    <div class="card" style=" margin:50px; padding:30px">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
        <div class="container">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-5"><i class="fa-solid fa-circle-plus"></i>
                Add Category</a>
            {{-- @if (Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif --}}
            <div class="table-responsive">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Pic</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            @php
                                $imagePath = public_path('img/' . $item->category_pic);

                                if (file_exists($imagePath)) {
                                    $src = asset('img/' . $item->category_pic);
                                } else {
                                    $src = asset('img/no_img.png');
                                }
                            @endphp
                            <tr class="">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->category_name }}</td>
                                {{-- <td><img height="70px" width="90px" src="/img/{{$item->category_pic}}" alt="" ></td> --}}

                                @if (file_exists(public_path($item->category_pic)))
                                    <td><img src="{{ $item->category_pic }}" height="80px" width="100px"
                                            alt="/img/no_image.jpg"></td>
                                @else
                                    <td><img src="/img/no_image.jpg" height="100" width="100" alt=""></td>
                                @endif

                                <form onsubmit="confirmDelete(event)" class="d-inline"
                                    action="{{ route('category.destroy', $item->_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td><a href="{{ route('category.edit', $item->_id) }}" class="btn btn-warning"><i
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
