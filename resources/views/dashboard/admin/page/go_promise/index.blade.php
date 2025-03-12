@extends('master')
@section('meta')
    <title>SiAsis - Admin | Permohnan Judul</title>
@endsection
@section('app_content')
    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        <h3 class="fw-bold my-2">Pengajuan Judul
            <span class="fs-6 text-gray-400 fw-semibold ms-1">Tesis dan Pembimbing </span></h3>
        <!--end::Heading-->
        <!--begin::Actions-->
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="m-1">
                <!--begin::Menu toggle-->
                <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>Filter</a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <!--begin::Menu toggle-->
                <!--end::Menu toggle-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_641ac3ffa2ede">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-semibold">Tabel:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <select class="form-select form-select-solid select2-hidden-accessible" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_641ac3ffa2ede" data-allow-clear="true" data-select2-id="select2-data-7-cs0g" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                    <option data-select2-id="select2-data-9-awv5"></option>
                                    <option value="1">Tahun</option>
                                    <option value="2">Mahasiswa</option>
                                    <option value="2">Dosen</option>
                                    <option value="2">Rejected</option>
                                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-lp2j" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-t1rp-container" aria-controls="select2-t1rp-container"><span class="select2-selection__rendered" id="select2-t1rp-container" role="textbox" aria-readonly="true" title="Select option"><span class="select2-selection__placeholder">Select option</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div>
{{--            Search--}}
            <div class="m-1">
                <!--begin::Menu toggle-->
                <a href="#" class="btn btn-sm btn-flex bg-body btn-color-gray-700 btn-active-color-primary fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                    <i class="ki-duotone ki-magnifier fs-6 text-muted me-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>Cari</a>
                <!--end::Menu toggle-->
                <!--begin::Menu 1-->
                <!--begin::Menu toggle-->
                <!--end::Menu toggle-->
                <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_641ac3ffa2ede">
                    <!--begin::Header-->
                    <div class="px-7 py-5">
                        <div class="fs-5 text-dark fw-bold">Pencarian:</div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Menu separator-->
                    <div class="separator border-gray-200"></div>
                    <!--end::Menu separator-->
                    <!--begin::Form-->
                    <div class="px-7 py-5">
                        <!--begin::Input group-->
                        <div class="mb-10">
                            <!--begin::Label-->
                            <label class="form-label fw-semibold">Cari:</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <div>
                                <input type="text" class="form-control" placeholder="Cari..">
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>
                <!--end::Menu 1-->
            </div>
            <!--end::Filter menu-->
        </div>

        <!--end::Actions-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        @foreach($thesis as $thesis_detail)
            <div class="col-md-6 col-xl-4">
                <!--begin::Card-->
                <a href="{{route("AdminGoPromiseGetByID")}}" class="card border-hover-primary _buttons-for-details" data-token="{{csrf_token()}}" data-id="{{$thesis_detail->id}}" data-bs-toggle="modal" data-bs-target="#kt_modal_go_promise">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-9">
                        <!--begin::Card Title-->
                        <div class="card-title m-0">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-50px w-50px bg-light">
                                <img src="{{ Vite::asset('resources/assets/media/svg/brand-logos/plurk.svg') }}" alt="image" class="p-3" />
                            </div>
                            <!--end::Avatar-->
                        </div>
                        <!--end::Car Title-->
                        <!--begin::Card toolbar-->
                        @switch($thesis_detail->status_promise)
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
                        <div class="fs-3 fw-bold text-dark">{{ $thesis_detail->students->name}}</div>
                        <!--end::Name-->
                        <!--begin::Description-->
                        <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">{{ $thesis_detail->student_id}}</p>
                        <!--end::Description-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap mb-5">
                            <!--begin::Due-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <p>{{ $thesis_detail->title_promise}}</p>
                            </div>
                            <!--end::Due-->
                            <!--begin::Budget-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bold">{{ $thesis_detail->promotors->name}}</div>
                                <div class="fw-semibold text-gray-400">{{ $thesis_detail->promotors->nidn}}</div>
                            </div>
                            <!--end::Budget-->
                        </div>
                        <!--end::Info-->
                        <!--begin::Progress-->
                        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
                            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!--end::Progress-->
                        <!--begin::Users-->
                        <div class="text-end">
                            <!--begin::User-->
{{--                            <div class="text-center">--}}
{{--                                <button class="btn btn-bg-primary text-light" data-bs-toggle="modal" data-bs-target="#kt_modal_go_promise">Detail</button>--}}
{{--                                <button class="btn btn-bg-success text-light">Setujui</button>--}}
{{--                            </div>--}}
                            <!--begin::User-->
                        </div>
                        <!--end::Users-->
                    </div>
                    <!--end:: Card body-->
                </a>
                <!--end::Card-->
            </div>
            <!--end::Col-->
        @endforeach

    </div>
    <!--end::Row-->
    <!--begin::Pagination-->
    <div class="d-flex flex-stack flex-wrap pt-10">
        <div class="fs-6 fw-semibold text-gray-700">Showing 1 to 10 of 50 entries</div>
        <!--begin::Pages-->
        <ul class="pagination">
            <li class="page-item previous">
                <a href="#" class="page-link">
                    <i class="previous"></i>
                </a>
            </li>
            <li class="page-item active">
                <a href="#" class="page-link">1</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">2</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">3</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">4</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">5</a>
            </li>
            <li class="page-item">
                <a href="#" class="page-link">6</a>
            </li>
            <li class="page-item next">
                <a href="#" class="page-link">
                    <i class="next"></i>
                </a>
            </li>
        </ul>
        <!--end::Pages-->
    </div>


    <div class="modal fade" id="kt_modal_go_promise" tabindex="-1" aria-hidden="true">
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
                        <h1 id="headerModalDetail" class="mb-3">Pengajuan Judul dan Dosen Pembimbing</h1>
                        {{--                            <div class="text-muted fw-semibold fs-5">If you need more info, please check--}}
                        {{--                                <a href="#" class="link-primary fw-bold">Pricing Guidelines</a>.</div>--}}
                    </div>
                    <!--end::Heading-->
                    <div class="card">
                        <!--begin::Form-->
                        <form id="kt_details_go_promise_form" class="form" action="#" method="post" data-kt-redirect-url="{{route('AdminGoPromise')}}">
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
                                        <input type="hidden" name="h_name" value=" ">
                                        <input type="text" class="form-control form-control-solid disabled" disabled
                                               name="name" value=" "/>
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
                                        <input type="hidden" name="h_nim" value=" ">
                                        <input type="text" class="form-control form-control-solid" disabled name="nim"
                                               value=" "/>
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
                                            <input type="hidden" name="h_promotor" value="">
                                            <input type="hidden" name="key" value="">
                                            <select class="form-select" name="promotor" data-control="select2"  data-placeholder="==== Pilih Dosen Pembimbing====">
                                                @foreach($lectures as $lecture)
                                                    <option value="{{$lecture->nidn}}">{{$lecture->name}} - {{$lecture->jafa}} - Telah Membimbing :
                                                        @foreach($lecture->quotas as $quota)
                                                            @if( $quota->smt_id == $idSmtNow)
                                                                {{$quota->quota_at_smt}}
                                                            @endif
                                                        @endforeach
                                                    </option>
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
                                        <textarea name="title_promise" class="form-control h-100px"></textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Das Sein</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="das_sein" class="form-control h-100px"></textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Das Sollen</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="das_sollen" class="form-control h-100px"></textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Kesenjangan</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="gaps" class="form-control h-100px"></textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Rumusan Masalah</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <textarea name="formulation" class="form-control h-100px"></textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                            {{--                                <button type="submit">kirim</button>--}}
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--begin::Actions-->
                    <div class="d-flex flex-center flex-row-fluid pt-12">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning text-dark me-3" id="kt_revision_go_promise_button" data-kt-send="{{route('AdminGoPromiseRevision')}}">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Revisi</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Mohon Tunggu...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                        <button type="submit" class="btn btn-primary" id="kt_accept_go_promise_button" data-kt-send="{{route('AdminGoPromiseAccept')}}">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Terima</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Mohon Tunggu...
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
@endsection
@section('js')
    @vite('resources/js/page/go_promise/admin_go_promise.js')
@endsection
