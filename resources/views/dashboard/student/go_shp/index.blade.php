@extends('master-student')
@section('meta')
    <title>SiAsis -  Seminar Hasil Penelitian</title>
@endsection
@section('app_content')
    @if($hasThesis)
        @foreach($thesis as $thesis_detail)
            <div class="row g-12 g-xl-12 mt-4">
                <!--begin::Col-->
                <div class="col-md-12 col-xl-12">
                    <!--begin::Card-->
                    <a href="#" class="card border-hover-primary">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-9">
                            <!--begin::Card Title-->
                            <div class="card-title m-0">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px w-50px bg-light">
                                    <img src="{{ Vite::asset('resources/assets/media/svg/brand-logos/plurk.svg') }}"
                                         alt="image" class="p-3"/>
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::Car Title-->

                            @switch($thesis_detail->status_shp)
                                @case(1)
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <span class="badge badge-light-info fw-bold me-auto px-4 py-3">Penugasan</span>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    @break

                                @case(2)
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Review</span>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    @break
                                @case(3)
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <span class="badge badge-light-dark fw-bold me-auto px-4 py-3">Revisi</span>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    @break
                                @case(4)
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Diterima</span>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    @break
                                @default
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <span class="badge badge-secondary fw-bold me-auto px-4 py-3">Tidak Dketahui</span>
                                    </div>
                                    <!--begin::Card toolbar-->
                            @endswitch

                            <!--end::Card toolbar-->
                        </div>
                        <!--end:: Card header-->
                        <!--begin:: Card body-->
                        <div class="card-body p-9">
                            <!--begin::Name-->
                            <div class="fs-3 fw-bold text-dark">{{$thesis_detail->students->name}}</div>
                            <!--end::Name-->
                            <!--begin::Description-->
                            <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">NPM. {{$thesis_detail->students->nim}}</p>
                            <!--end::Description-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap mb-5">
                                <!--begin::Due-->
                                <div
                                    class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                    <p data-bs-toggle="modal" data-bs-target="#kt_modal_detail">{{$thesis_detail->title_shp}}</p>
                                </div>
                                <!--end::Due-->
                                <!--begin::Budget-->
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bold">{{$thesis_detail->promotors->name}}</div>
                                    <div class="fw-semibold text-gray-400">NIDN. {{$thesis_detail->promotors->nidn}}</div>
                                </div>
                                <!--end::Budget-->
                            </div>
                            <!--end::Info-->
                            <!--begin::Progress-->
                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip"
                                 title="This project 50% completed">
                                <div class="bg-primary rounded h-4px" role="progressbar" style="width: 100%"
                                     aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end:: Card body-->
                    </a>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Row-->

            <div class="modal fade" id="kt_modal_detail" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-xl">
                    <!--begin::Modal content-->
                    <div class="modal-content rounded">
                        <!--begin::Modal header-->
                        <div class="modal-header justify-content-end border-0 pb-0">
                            <!--begin::Close-->
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                            <!--end::Close-->
                        </div>
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body pt-0 pb-15 px-5 px-xl-20">
                            <!--begin::Heading-->
                            <div class="mb-13 text-center">
                                <h1 class="mb-3"> {{$thesis_detail->students->name}} - Judul : {{$thesis_detail->title_shp}}</h1>
                                {{--                            <div class="text-muted fw-semibold fs-5">If you need more info, please check--}}
                                {{--                                <a href="#" class="link-primary fw-bold">Pricing Guidelines</a>.</div>--}}
                            </div>
                            <!--end::Heading-->
                            <div class="card">
                                <!--begin::Form-->
                                <form id="kt_go_sh_detail" class="form" action="#" method="post" data-kt-redirect-url="{{route('StudentGoSHP')}}">
                                    @csrf
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Nama</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <input type="hidden" name="h_name" value="{{auth()->user()->student->name}}">
                                                <input type="text" class="form-control form-control-solid disabled" disabled
                                                       name="name" value="{{auth()->user()->student->name}}"/>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">NPM</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <input type="hidden" name="h_nim" value="{{auth()->user()->student->nim}}">
                                                <input type="text" class="form-control form-control-solid" disabled name="nim"
                                                       value="{{auth()->user()->student->nim}}"/>
                                            </div>
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->

                                            <!--begin::Col-->
                                            <div class="row mb-8">
                                                <!--begin::Col-->
                                                <div class="col-xl-3">
                                                    <div class="fs-6 fw-semibold mt-2 mb-3">Dosen Pembimbing</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-9 fv-row">
                                                    <select

                                                        @if($thesis_detail->disabled_shp== 1)
                                                            disabled
                                                        @endif

                                                        class="form-select" name="promotor" data-control="select2" data-placeholder="==== Pilih Dosen Pembimbing====">
                                                        @foreach($lectures as $lecture)
                                                            @if($lecture->nidn == $thesis_detail->promotor)
                                                                <option selected value="{{$lecture->nidn}}">{{$lecture->name}} - {{$lecture->jafa}} - Telah Membimbing :
                                                                    @foreach($lecture->quotas as $quota)
                                                                        @if( $quota->smt_id == $idSmtNow)
                                                                            {{$quota->quota_at_smt}}
                                                                        @endif
                                                                    @endforeach

                                                                </option>
                                                            @else
                                                                <option value="{{$lecture->nidn}}">{{$lecture->name}} - {{$lecture->jafa}} - Telah Membimbing :
                                                                    @foreach($lecture->quotas as $quota)
                                                                        @if( $quota->smt_id == $idSmtNow)
                                                                            {{$quota->quota_at_smt}}
                                                                        @endif
                                                                    @endforeach
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Row-->

                                        <!--begin::Row-->
                                        <div class="row mb-8">
                                            <!--begin::Col-->
                                            <div class="col-xl-3">
                                                <div class="fs-6 fw-semibold mt-2 mb-3">Judul</div>
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-xl-9 fv-row">
                                                <textarea
                                                    @if($thesis_detail->disabled_shp== 1)
                                                        disabled
                                                    @endif
                                                    name="title_shp" class="form-control h-100px">{{$thesis_detail->title_shp}}</textarea>
                                            </div>
                                            <!--begin::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <!--end::Card body-->
                                </form>
                                <!--end:Form-->
                            </div>
                            <!--begin::Actions-->
                            <div class="d-flex flex-center flex-row-fluid pt-12">
                                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                                <button
                                    @if($thesis_detail->disabled_shp== 1)
                                        disabled
                                    @endif
                                    type="submit" class="btn btn-primary" id="kt_edit_go_shp_button">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Simpan</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!--end::Modal - Upgrade plan-->
        @endforeach

    @else
        <div class="card-body p-0">
            <!--begin::Wrapper-->
            <div class="card-px text-center py-20 my-10">
                <!--begin::Title-->
                <h2 class="fs-2x fw-bold mb-10">Selamat Datang</h2>
                <!--end::Title-->
                <!--begin::Description-->
                <p class="text-gray-400 fs-4 fw-semibold mb-10">Kamu belum pernah mengajukan Judul ke Prodi
                    <br>Klik tombol dibawah ini untuk mengajukan judul</p>
                <!--end::Description-->
                <!--begin::Action-->
                <a href="{{route('StudentGoPromise')}}"  class="btn btn-primary">Ajukan Judul</a>
                <!--end::Action-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Illustration-->
            <div class="text-center px-4">
                <img class="mw-100 mh-300px" alt="" src="{{ Vite::asset('resources/assets/media/illustrations/sketchy-1/5.png') }}">
            </div>
            <!--end::Illustration-->
        </div>
    @endif



@endsection
@section('js')
@endsection
