@include('header')

<body>

    <div class="card" style="margin:20px; padding:10px">

        <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
        <div class="container">
            <a href="{{ route('pincode.create') }}" class="btn btn-primary mb-5"><i class="fa-solid fa-circle-plus"></i>
                Add Pincode</a>
            {{-- @if (Session::get('success'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif --}}
            <div class="table-responsive">
                <table class="table table-primary table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Pincode</th>
                            <th scope="col">Locality</th>
                            {{-- <th scope="col">Address</th> --}}
                            {{-- <th scope="col">Aadharcard No</th> --}}
                            <th scope="col">Opration</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($data as $item)
                            <tr class="">
                                <td scope="row">{{ $loop->index + 1 }}</td>
                                <td>{{ $item->pincode }}</td>
                                <td>{{ $item->locality }}</td>
                                {{-- <td>{{ $item->aadharcard }}</td> --}}
                                

                                <form onsubmit="confirmDelete(event)" class="d-inline"
                                    action="{{ route('pincode.destroy', $item->_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <td>
                                        <a href="{{ route('pincode.edit', $item->_id) }}" class="btn btn-warning"><i
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
