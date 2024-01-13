<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                @foreach ($client as $row)
                <img src="{{ img_src($row->img_url, 'client') }}" alt="{{$row->nama}}">
                @endforeach
            </div>
        </div>
    </div>
</div>
