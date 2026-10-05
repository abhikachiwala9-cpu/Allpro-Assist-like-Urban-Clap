@include('header')

<div class="container">
    <div class="card" style="margin:20px; padding:20px;">
        <div class="row">
            <div class="col-6">
                <img src="{{ $coupon->c_pic }}" alt="" height="200px" width="500px" style="border-radius: 20px; margin-top:70px;">
            </div>
            <div class="col-6 pt-3">
                <h4 class="card-title">Coupon Code : {{ $coupon->c_code }}</h4>
                <hr>
                <p class="card-text"><strong>Coupon Title : </strong>{{ $coupon->c_title }}</p>
                <p class="card-text"><strong>Coupon Discription : </strong> {{ $coupon->c_desc }}</p>
                <p class="card-text"><strong>Coupon Discount : </strong>{{ $coupon->c_discount }}</p>
                <p class="card-text"><strong>Max Amount : </strong>{{ $coupon->c_maxamt }}</p>
                <p class="card-text"><strong>Status : </strong>
                    @if ($coupon->status)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Deactive</span>
                    @endif  </p>
                <br><br>
                <a href="/coupon" class="btn btn-danger">Back</a>
            </div>
        </div>
    </div>
</div>

@include('footer')
