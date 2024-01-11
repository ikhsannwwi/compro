@extends('administrator.layouts.main')

@section('content')
    @push('section_header')
        <h1>Team</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('admin.team') }}">Team</a></div>
            <div class="breadcrumb-item">Detail</div>
        </div>
    @endpush
    @push('section_title')
        Team
    @endpush
    <!-- Basic Tables start -->
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form action="{{ route('admin.team.update') }}" method="post" enctype="multipart/form-data" class="form"
                    id="form" data-parsley-validate>
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="inputId" value="{{$data->id}}">

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" id="inputNama" class="form-control" placeholder="Masukan Nama" value="{{$data->nama}}"
                                    name="nama" autocomplete="off" data-parsley-required="true" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group mandatory">
                                <label for="inputJabatan" class="form-label">Jabatan</label>
                                <input type="text" id="inputJabatan" class="form-control" placeholder="Masukan Jabatan" value="{{$data->jabatan}}"
                                    name="jabatan" autocomplete="off" data-parsley-required="true" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="gambarLainnyaInputFile" class="form-label">Image</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    
                                    <div class="fileinput-preview-image thumbnail mb20">
                                        <img width="200px"
                                            src="{{ $data->img_url ? img_src($data->img_url, 'team') : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 col-12">
                            <div id="sosmed">

                                <div class="sosmed-list" index-element="{{count($data->sosial_media)}}">
                                    @foreach ($data->sosial_media as $key => $row)
                                    <input type="hidden" name="sosmed[{{$key}}][id]" id="inputIdSosmed_{{$key}}" value="{{$row->id}}">
                                    <div class="row rowSosmed_{{$key}}" index-element="{{$key}}">
                                        <div class="col-md-5 col-11">
                                            <div class="form-group">
                                                <label for="inputNamaSosmed_{{$key}}" class="form-label">Sosial Media</label>
                                                <input type="text" name="sosmed[{{$key}}][nama]" class="form-control" id="inputNamaSosmed_{{$key}}" value="{{$row->nama}}"
                                                    data-parsley-required="true" placeholder="ex : 'instagram'" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-11">
                                            <div class="form-group">
                                                <label for="inputUrlSosialMedia_{{$key}}" class="form-label">Url Sosial
                                                    Media</label>
                                                <input type="text" name="sosmed[{{$key}}][url]" class="form-control" id="inputUrlSosialMedia_{{$key}}" value="{{$row->url}}"
                                                    data-parsley-required="true" placeholder="ex : 'https://instagram.com/username'" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-1">
                                            <button class="btn btn-danger btn-sm delete-sosmed" style="{{$key === 0 ? 'display: none' : ''}}" data-index="{{$key}}" data-sosmed="{{$row->id}}"
                                                type="button"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="jumlah_sosmed" value="{{count($data->sosial_media)}}" id="jumlah_sosmed">
                                <!-- Cloned sosmed-list will be inserted here -->
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 d-flex justify-content-end">
                            <a href="{{ route('admin.team') }}" class="btn btn-danger me-1 mb-1">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
