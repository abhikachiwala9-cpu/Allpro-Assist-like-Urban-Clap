@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Add Pincode</h1>

        <form action="{{route('pincode.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">

                <label for="" class="form-label">Pincode</label>
                <input type="text" name="pincode" class="form-control" id="">
                <span class="text-danger">@error('pincode')
                    {{$message}}
                @enderror</span>

                <label for="" class="form-label">Locality</label>
                <input type="text" name="locality" class="form-control" id="">
                <span class="text-danger">@error('locality')
                    {{$message}}
                @enderror</span>
            </div>
            <br>

            <button type="submit" class="btn btn-success" >Add</button>
            <a href="/pincode" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>


@include('footer')