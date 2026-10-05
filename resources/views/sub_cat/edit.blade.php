@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Add Category</h1>

        <form action="{{route('sub_cat.update',$sub_cat->_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <label for="" class="form-label">Sub Category Name</label>
                <input type="text" name="s_name" value="{{$sub_cat->s_name}}" class="form-control" id="">
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
                    <label for="" class="form-label">Category Id</label>
                    <select name="cat_id" id="" class="form-control">
                        @foreach ($data as $item)
                        @if ($item->category_name==$sub_cat->cat_id)
                        <option value="{{$item->category_name}}" selected>{{$item->category_name}}</option>

                        @else
                        <option value="{{$item->category_name}}">{{$item->category_name}}</option>
                            
                        @endif
                            
                        @endforeach
                        
                    </select>
    
                
               
            </div>
            <br>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="/category" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>
@include('footer')