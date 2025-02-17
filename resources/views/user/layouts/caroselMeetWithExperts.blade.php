{{-- <div class="col-lg-8"> --}}
    <div class="container swiper">
        <div class="slider-wrapper">
          <div class="card-list swiper-wrapper">
            @foreach ($expert as $expert_item)
            <div class="card-item swiper-slide">
                <img src="{{ asset('admin/adminAndExpertProfileImg/roar67af4230ea009DALL·E 2025-01-25 21.10.26 - A cute anime-style chubby girl kneeling in prayer, with her hands clasped together and eyes closed, exuding a peaceful and serene vibe. She has soft f') }}" alt="User Image" class="user-image">
                <h2 class="user-name">{{$expert_item->display_name}}</h2>
                <p class="user-profession">Roar Speaking Expert</p>
                <p class=" text-black-50">{{ $truncated = Str::limit($expert_item->about, 100, ' ...'); }}</p>
                <p class=" text-muted">Trained Student : {{$expert_item->trained_student}}</p>
                <a href="{{ route('aptDetail', $expert_item->user_id ) }}" class="message-button">Take An Appointment</a>
            </div>
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-slide-button swiper-button-prev"></div>
          <div class="swiper-slide-button swiper-button-next"></div>
        </div>
      </div>
</div>
