@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Add Category</h1>

        <form action="{{route('sub_cat.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">

                <label for="" class="form-label">SubCategory Name</label>
                <input type="text" name="s_name" class="form-control" id="">
                <span class="text-danger">@error('s_name')
                    {{$message}}
                @enderror</span>
                    <br>
                <label for="" class="form-label">Category Pic</label>
                <input type="file" class="form-control" name="s_pic" id="scpic" placeholder=""/>
                <span class="text-danger">@error('s_pic')
                    {{$message}}
                @enderror</span>
                    <br>
                {{-- <div class="col-md-12 form-group"> --}}
                    <label for="" class="form-label">Category Id</label>
                    <select name="cat_id" id="" class="form-control">
                        @foreach ($data as $item)
                        <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                            
                        @endforeach
                        
                    </select>
                {{-- </div> --}}
               
            </div>
            <br>

            <button type="submit" class="btn btn-success">Add</button>
            <a href="/sub_cat" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>
@include('footer')