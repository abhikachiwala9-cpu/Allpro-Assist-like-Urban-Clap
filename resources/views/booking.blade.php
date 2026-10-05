@include('header')
<body>
    <div class="card" style="margin: 20px;">
        <div class="container">
            <ul class="nav nav-pills nav-primary" id="bookingTabs" style="margin-top:10px; margin-left:40px; margin-bottom:15px;">
                <li class="nav-item nav-color-warning">
                    <a class="nav-link active" data-bs-toggle="tab" href="#pending">Pending</a>
                </li>
                <li class="nav-item nav-color-warning">
                    <a class="nav-link" data-bs-toggle="tab" href="#assign">Assign</a>
                </li>
                <li class="nav-item nav-success">
                    <a class="nav-link" data-bs-toggle="tab" href="#confirm">Confirm</a>
                </li>
            </ul>
            
            
            <div class="tab-content">
                <div id="pending" class="tab-pane fade show active">
                    <table class="table table-primary table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Discount</th> --}}
                                <th scope="col">Date</th>
                                <th scope="col">C/O</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->pname }}</td>
                                    <td>
                                        <img src="{{ file_exists(public_path($item->pic1)) ? asset($item->pic1) : asset('/img/no_image.jpg') }}" height="70px" width="70px">
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    {{-- <td>{{ $item->c_discount }}</td> --}}
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->c_o }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->pincode }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <div id="assign" class="tab-pane fade">
                    <table class="table table-primary table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Discount</th> --}}
                                <th scope="col">Date</th>
                                <th scope="col">C/O</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assign as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->pname }}</td>
                                    <td>
                                        <img src="{{ file_exists(public_path($item->pic1)) ? asset($item->pic1) : asset('/img/no_image.jpg') }}" height="70px" width="70px">
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    {{-- <td>{{ $item->c_discount }}</td> --}}
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->c_o }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->pincode }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            
                <div id="confirm" class="tab-pane fade">
                    <table class="table table-primary table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Amount</th>
                                {{-- <th scope="col">Discount</th> --}}
                                <th scope="col">Date</th>
                                <th scope="col">C/O</th>
                                <th scope="col">Status</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($confirm as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->pname }}</td>
                                    <td>
                                        <img src="{{ file_exists(public_path($item->pic1)) ? asset($item->pic1) : asset('/img/no_image.jpg') }}" height="70px" width="70px">
                                    </td>
                                    <td>{{ $item->amount }}</td>
                                    {{-- <td>{{ $item->c_discount }}</td> --}}
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->c_o }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->pincode }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
</body>
@include('footer')
