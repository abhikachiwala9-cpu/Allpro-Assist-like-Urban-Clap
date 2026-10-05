@include('header')
<div class="card" style="width: 900px; margin:40px; padding-top:30px; padding-right:400px; padding-left:50px; padding-bottom:50px">
    <div class="container">

        <h1>Add Category</h1>

        <form action="{{route('partner.update',$partner->_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">

                <label for="" class="form-label">Partner Name</label>
                <input type="text" name="partner_name" value="{{$partner->partner_name}}" class="form-control" id="">
                <span class="text-danger">@error('partner_name')
                    {{$message}}
                @enderror</span>

                <label for="" class="form-label">Partner Email</label>
                <input type="email" name="partner_email" value="{{$partner->partner_email}}" class="form-control" id="">
                <span class="text-danger">@error('partner_email')
                    {{$message}}
                @enderror</span>

                <label for="" class="form-label">Partner Mobile Number</label>
                <input type="text" name="partner_mob" value="{{$partner->partner_mob}}" class="form-control" id="">
                <span class="text-danger">@error('partner_mob')
                    {{$message}}
                @enderror</span>

                <label for="" class="form-label">Address</label>
                <textarea name="address" cols="20" rows="5" value="" class="form-control">{{$partner->address}}</textarea>
                <span class="text-danger">@error('address')
                    {{$message}}
                @enderror</span>
                    <br>
                <label for="" class="form-label">Aadharcard Number </label>
                <input type="text" name="aadharcard" placeholder="XXXX  XXXX  XXXX" value="{{$partner->aadharcard}}" class="form-control" id="">
                <span class="text-danger">@error('aadharcard')
                    {{$message}}
                @enderror</span>
                    <br>
                    <label for="" class="form-label">Partner Pic</label>
                    <input type="file" class="form-control" name="partner_pic" id="ptpic" placeholder=""/>
                    <span class="text-danger">@error('partner_pic')
                        {{$message}}
                    @enderror</span>
    
                
               
            </div>
            <br>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="/partner" class="btn btn-danger">Back</a>

    
        </form>
        
    </div>
</div>
@include('footer')