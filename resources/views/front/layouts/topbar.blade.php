<div class="container-fluid bg--dark px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>{{array_key_exists('address', $contact) ? $contact['address'] : '123 Street, Food, Konoha';}}</small>
                <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i>{{array_key_exists('telepon', $contact) ? $contact['telepon'] : '+62 345 6789';}}</small>
                <small class="text-light"><i class="fa fa-envelope-open me-2"></i>{{array_key_exists('email', $contact) ? $contact['email'] : 'info@example.com';}}</small>
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                @php
                    $sosmed = array_key_exists('general_sosmed', $settings) ? json_decode($settings['general_sosmed']) : null;
                @endphp

                @if (!empty($sosmed))
                    @foreach ($sosmed as $key => $item)
                        @if (!empty($item))
                            <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2"
                                href="{{ $item->url_sosmed }}"><i
                                    class="fab fa-{{ $item->nama_sosmed }} fw-normal"></i></a>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
