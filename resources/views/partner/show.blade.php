@include('header')

<div class="container">
    <div class="card" style="margin:20px; padding:20px;">
        <div class="row">
            <div class="col-6">
                <img src="{{ $partner->partner_pic }}" alt="" height="400px" width="400px" style="border-radius: 20px">
            </div>
            <div class="col-6 pt-3">
                <h4 class="card-title"><strong><i class="fa-solid fa-user"></i> Partner Name </strong>: {{ $partner->partner_name }}</h4>
                <hr>
                <p class="card-text"><strong><i class="fa-solid fa-envelope"></i> Partner Email : </strong> {{ $partner->partner_email }}</p>
                <p class="card-text"><strong><i class="fa-solid fa-phone"></i> Mobile Number : </strong>{{ $partner->partner_mob }}</p>
                <p class="card-text"><strong><i class="fa-solid fa-house"></i> Address : </strong> <br> {{ $partner->address }}</p>
                <p class="card-text"><strong>Aadharcard number : </strong>{{ $partner->aadharcard }}</p>
                
                <br><br>
                <a href="/partner" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>

@include('footer')
