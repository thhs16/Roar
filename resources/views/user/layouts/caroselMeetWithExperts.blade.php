
<div class="container swiper">
    <div class="slider-wrapper">
        <div class="card-list swiper-wrapper">
            @foreach ($expert as $expert_item)
                <div class="card-item swiper-slide">

                    <img src="{{ $expert_item->image ? asset('admin/adminAndExpertProfileImg/' . $expert_item->image) : asset('admin/img/user.jpg') }}"
    alt="User Image"
    class="user-image img-fluid"
    style="width: 150px; height: 150px; object-fit: cover; object-position: top; border-top-left-radius: 50%; border-top-right-radius: 50%;">



                    <h2 class="user-name">{{ $expert_item->display_name }}</h2>
                    <p class="user-profession">Roar Speaking Expert</p>
                    <p class=" text-black-50">{{ $truncated = Str::limit($expert_item->about, 100, ' ...') }}</p>
                    <p class=" text-muted">Trained Student : {{ $expert_item->trained_student }}</p>
                    <a href="{{ route('aptDetail', $expert_item->user_id) }}" class="message-button">Take An
                        Appointment</a>
                </div>
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-slide-button swiper-button-prev"></div>
        <div class="swiper-slide-button swiper-button-next"></div>
    </div>
</div>
</div>
