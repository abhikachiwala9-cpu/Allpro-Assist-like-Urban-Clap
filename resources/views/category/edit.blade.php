@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Add Category</h1>

        <form action="{{route('category.update',$category->_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <label for="" class="form-label">Category Name</label>
                <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" id="">
                <span class="text-danger">@error('category_name')
                    {{$message}}
                @enderror</span>
                    <br>
                <label for="" class="form-label">Category Pic</label>
                <input type="file" class="form-control" name="category_pic" id="cpic" placeholder=""/>
                <span class="text-danger">@error('category_pic')
                    {{$message}}
                @enderror</span>
    
                
               
            </div>
            <br>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="/category" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>
@include('footer')