<div class="row g-5">
    @foreach ($data as $row)
    @php
        $jsonParse = json_decode($row->img_url);
    @endphp
        <div class="col-md-6 " data-wow-delay="0.1s">
            <div class="blog-item bg-light rounded overflow-hidden">
                <div class="blog-img position-relative overflow-hidden">
                    <img class="img-fluid" src="{{ img_src($jsonParse[0], 'blog') }}" alt="">
                    <a class="position-absolute top-0 start-0 bg-main text-white rounded-end mt-5 py-2 px-4"
                        href="">{{$row->tags[0]->kategori->nama}}</a>
                </div>
                <div class="p-4">
                    <div class="d-flex mb-3">
                        <small class="me-3"><i class="far fa-user text-main me-2"></i>{{$row->user->name}}</small>
                        <small><i class="far fa-calendar-alt text-main me-2"></i>{{ date('d F, Y', strtotime($row->tanggal_posting)) }}</small>
                    </div>
                    <h4 class="mb-3">{{ $row->judul }}</h4>
                    <p>{{ Str::limit(strip_tags($row->isi), 100) }}</p>
                    <a class="text-uppercase" href="{{ route('web.blog.slug', $row->slug) }}">Read More <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @endforeach
    
    <div class="col-12" data-wow-delay="0.1s">
        {{ $data->links('front.layouts.pagination.index') }}
    </div>
</div>