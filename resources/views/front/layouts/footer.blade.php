<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div
                    class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="m-0 text-white">{{array_key_exists('general_nama_app', $settings) ? ($settings['general_nama_app'] ? $settings['general_nama_app'] : 'Compro') : 'Compro'}}</h1>
                    </a>
                    <p class="mt-3 mb-4">{{ array_key_exists('about_frontpage_footer', $settings) ? ($settings['about_frontpage_footer'] ? $settings['about_frontpage_footer'] : '-') : '' }}</p>
                    {{-- <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control border-white p-3" placeholder="Your Email">
                            <button class="btn btn-dark">Sign Up</button>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Get In Touch</h3>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-geo-alt text-primary me-2"></i>
                            <p class="mb-0">
                                {{ array_key_exists('address', $contact) ? $contact['address'] : '123 Street, Food, Konoha' }}
                            </p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-envelope-open text-primary me-2"></i>
                            <p class="mb-0">
                                {{ array_key_exists('email', $contact) ? $contact['email'] : 'info@example.com' }}</p>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-telephone text-primary me-2"></i>
                            <p class="mb-0">
                                {{ array_key_exists('telepon', $contact) ? $contact['telepon'] : '+62 345 6789' }}</p>
                        </div>
                        <div class="d-flex mt-4">
                            @php
                                $sosmed = array_key_exists('general_sosmed', $settings) ? json_decode($settings['general_sosmed']) : null;
                            @endphp

                            @if (!empty($sosmed))
                                @foreach ($sosmed as $key => $item)
                                    @if (!empty($item))
                                        <a class="btn btn-primary btn-square me-2" href="{{ $item->url_sosmed }}"><i
                                                class="fab fa-{{ $item->nama_sosmed }} fw-normal"></i></a>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Quick Links</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            @php
                            $link = array_key_exists('link_frontpage_footer', $settings) ? json_decode($settings['link_frontpage_footer']) : null;
                        @endphp
                        @if (!empty($link))
                            @foreach ($link as $key => $item)
                                @if (!empty($item->url_link))
                                    <a class="text-light mb-2" href="{{ $item->url_link }}"><i
                                        class="bi bi-arrow-right text-primary me-2"></i>{{ $item->nama_link }}</a>
                                @endif
                            @endforeach
                        @endif
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="text-light mb-0">Popular Links</h3>
                        </div>
                        <div class="link-animated d-flex flex-column justify-content-start">
                            <a class="text-light mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                            <a class="text-light mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>About Us</a>
                            <a class="text-light mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Our Services</a>
                            <a class="text-light mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Meet The Team</a>
                            <a class="text-light mb-2" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Latest Blog</a>
                            <a class="text-light" href="#"><i
                                    class="bi bi-arrow-right text-primary me-2"></i>Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid text-white" style="background: #061429;">
    <div class="container text-center">
        <div class="row justify-content-end">
            <div class="col-lg-8 col-md-6">
                <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                    <p class="mb-0">&copy; <a class="text-white border-bottom" href="{{route('web.index')}}">{{array_key_exists('general_nama_app', $settings) ? ($settings['general_nama_app'] ? $settings['general_nama_app'] : 'Compro') : 'Compro'}}</a>. All
                        Rights Reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
