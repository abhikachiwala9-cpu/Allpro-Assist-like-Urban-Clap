@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
        <div class="container">

            <h1>Edit Banner</h1>
    
            <form action="{{route('banner.update',$banner->_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
    
                    <label for="" class="form-label">Banner Name</label>
                    <input type="text" name="banner_name" value="{{$banner->banner_name}}" class="form-control" id="">
                    <span class="text-danger">@error('banner_name')
                        {{$message}}
                    @enderror</span>
                        <br>
                    <label for="" class="form-label">Banner Pic</label>
                    <input type="file" class="form-control" name="banner_pic" id="bpic" placeholder=""/>
                    <span class="text-danger">@error('banner_pic')
                        {{$message}}
                    @enderror</span>
                    <br>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
        
                </div>
                
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/banner" class="btn btn-danger">Back</a>
    
        
            </form>
            
        </div>
    </div>
@include('footer')