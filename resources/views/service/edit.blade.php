@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Edit Service</h1>

        <form action="{{route('service.update',$service->_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <label for="" class="form-label">Service Name</label>
                <input type="text" name="sr_name" value="{{$service->sr_name}}" class="form-control" id="">
                <span class="text-danger">@error('sr_name')
                    {{$message}}
                @enderror</span>
                    <br>
                <label for="" class="form-label">Service Pic 1</label>
                <input type="file" class="form-control" name="sr_pic1" id="srpic1" placeholder=""/>
                <span class="text-danger">@error('sr_pic1')
                    {{$message}}
                @enderror</span>
                <br>
                <label for="" class="form-label">Service Pic 2</label>
                <input type="file" class="form-control" name="sr_pic2" id="srpic2" placeholder=""/>
                <span class="text-danger">@error('sr_pic2')
                    {{$message}}
                @enderror</span>
                <br>
                <label for="" class="form-label">Service Pic 3</label>
                <input type="file" class="form-control" name="sr_pic3" id="srpic3" placeholder=""/>
                <span class="text-danger">@error('sr_pic3')
                    {{$message}}
                @enderror</span>

                <br>
                <label for="" class="form-label">Service Video</label>
                <input type="file" class="form-control" name="sr_video" id="srvideo" placeholder=""/>
                <span class="text-danger">@error('sr_video')
                    {{$message}}
                @enderror</span>

                <br>

                <label for="" class="form-label">Duration</label>
                <select name="sr_duration" id="" class="form-select">
                    <option value="30 min">30 min</option>
                    <option value="45 min">45 min</option>
                    <option value="1 hr">1 hr</option>
                    <option value="1.5 hr">1.5 hr</option>
                    <option value="2 hr">2 hr</option>
                </select>

                
                

                <br>
                <label for="" class="form-label">Gender</label>
                <br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" checked type="radio" name="gender" id="inlineRadio1" value="male">
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>


                <br>
                <label for="" class="form-label">Description</label>
                <textarea name="description" cols="20" rows="5" class="form-control">value="{{$service->description}}"</textarea>
                <span class="text-danger">@error('description')
                    {{$message}}
                @enderror</span>


                <br>
                <label for="" class="form-label">Price</label>
                <input type="number" name="sr_price" id="" value="{{$service->sr_price}}" class="form-control" placeholder=" XXX">

                <br>
                <label for="" class="form-label">Discount</label>
                <input type="number" name="discount" value="{{$service->discount}}" class="form-control">

                    <br>
                {{-- <div class="col-md-12 form-group"> --}}
                    <label for="" class="form-label">Sub Category</label>
                    <select name="sub_id" id="" class="form-control">
                        @foreach ($data as $item)
                        @if ($item->s_name==$service->sub_id)
                        <option value="{{$item->s_name}}" selected>{{$item->s_name}}</option>

                        @else
                        <option value="{{$item->s_name}}">{{$item->s_name}}</option>
                            
                        @endif
                            
                        @endforeach
                        
                    </select>
                {{-- </div> --}}
               
            </div>
            <br>

            <button type="submit" class="btn btn-success">Add</button>
            <a href="/service" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>
@include('footer')