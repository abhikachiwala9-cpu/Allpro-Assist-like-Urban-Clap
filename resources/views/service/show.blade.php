@include('header')

<div class="container">
    <div class="card" style="margin:20px; padding:20px;">
        <div class="row">
            <div class="col-5">
                <video src="{{ $service->sr_video }}" autoplay controls alt="" height="450px" width="330px" style="border-radius: 20px">
            </div>
            <div class="col-2">
                <img src="{{ $service->sr_pic1 }}" alt="" height="130px" width="130px" style="border-radius: 20px"><br><br>
                <img src="{{ $service->sr_pic2 }}" alt="" height="130px" width="130px" style="border-radius: 20px"><br><br>
                <img src="{{ $service->sr_pic3 }}" alt="" height="130px" width="130px" style="border-radius: 20px">
            </div>
            <div class="col-5 pt-3">
                <h4 class="card-title">Service Name : {{ $service->sr_name }}</h4>
                <hr>
                <p class="card-text"><strong>Gender : </strong>{{ $service->gender }}</p>
                <p class="card-text"><strong>Service Duration : </strong>{{ $service->sr_duration }}</p>
                <p class="card-text"><strong>Service Discription : </strong> {{ $service->description }}</p>
                <p class="card-text"><strong>Service Price : </strong>{{ $service->sr_price }}</p>
                <p class="card-text"><strong>Service Discount : </strong>{{ $service->discount }}</p>
                <p class="card-text"><strong>Sub-Category : </strong>{{ $service->sub_id }}</p>

                <a href="/service" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>

@include('footer')
