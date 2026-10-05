@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
        <div class="container">

            <h1>Edit Coupon</h1>
    
            <form action="{{route('coupon.update',$coupon->_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
    
                    <label for="" class="form-label">Coupon Code</label>
                    <input type="text" name="c_code" value="{{$coupon->c_code}}" class="form-control" id="">
                    <span class="text-danger">@error('c_code')
                        {{$message}}
                    @enderror</span>

                    <label for="" class="form-label">Coupon Description</label>
                    <input type="text" name="c_desc" value="{{$coupon->c_desc}}" class="form-control" id="">
                    <span class="text-danger">@error('c_desc')
                        {{$message}}
                    @enderror</span>

                    <label for="" class="form-label">Title</label>
                    <input type="text" name="c_title" value="{{$coupon->c_title}}" class="form-control" id="">
                    <span class="text-danger">@error('c_title')
                        {{$message}}
                    @enderror</span>

                    <label for="" class="form-label">Discount</label>
                    <input type="text" name="c_discount" value="{{$coupon->c_discount}}" class="form-control" id="">
                    <span class="text-danger">@error('c_discount')
                        {{$message}}
                    @enderror</span>

                    <label for="" class="form-label">Max Amount</label>
                    <input type="text" name="c_maxamt" value="{{$coupon->c_maxamt}}" class="form-control" id="">
                    <span class="text-danger">@error('c_maxamt')
                        {{$message}}
                    @enderror</span>

                        <br>
                    <label for="" class="form-label">Coupon Picture</label>
                    <input type="file" class="form-control" name="c_pic" id="cppic" placeholder=""/>
                    <span class="text-danger">@error('c_pic')
                        {{$message}}
                    @enderror</span>
                    <br>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Status</label>
                        <input class="form-check-input" name="status" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
                    </div>
        
                </div>
                
                <button type="submit" class="btn btn-success">Update</button>
                <a href="/coupon" class="btn btn-danger">Back</a>
    
        
            </form>
            
        </div>
    </div>
@include('footer')