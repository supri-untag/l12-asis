@extends('master-student')
@section('app_content')
    <!--begin::Row-->
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
                            <img src="{{ Vite::asset('resources/assets/media/svg/brand-logos/plurk.svg') }}" alt="image" class="p-3" />
                        </div>
                        <!--end::Avatar-->
                    </div>
                    <!--end::Car Title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">Mengajukan</span>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end:: Card header-->
                <!--begin:: Card body-->
                <div class="card-body p-9">
                    <!--begin::Name-->
                    <div class="fs-3 fw-bold text-dark">Supriyanto</div>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">231003741011341</p>
                    <!--end::Description-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap mb-5">
                        <!--begin::Due-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <p>TANGGUNG JAWAB DOKTER DALAM OPERASI BIBIR SUMBING PADA PELAYANAN BAKTI SOSIAL YANG DISELENGGARAKAN OLEH RUMAH SAKIT</p>
                        </div>
                        <!--end::Due-->
                        <!--begin::Budget-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">Sabtu, 8 Maret 2025</div>
                            <div class="fw-semibold text-gray-400">Dr. Bambang Joyosupeno, SH., M.Hum</div>
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
                        <div class="text-center">
                            <button class="btn btn-bg-primary text-light" data-bs-toggle="modal" data-bs-target="#kt_modal_detail">Detail</button>
                            <button class="btn btn-bg-success text-light">Setujui</button>
                        </div>
                        <!--begin::User-->
                    </div>
                    <!--end::Users-->
                </div>
                <!--end:: Card body-->
            </a>
            <!--end::Card-->
        </div>
        <!--end::Col-->
    </div>

    <div class="modal bg-body fade" tabindex="-1" id="kt_modal_detail">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                        <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Form-->
                        <form id="kt_detail_form" class="form">
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
                                        <input type="text" class="form-control form-control-solid disabled" disabled name="name" value="Supriyanto" />
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
                                        <input type="text" class="form-control form-control-solid" disabled name="type" value="231003741011341" />
                                    </div>
                                </div>
                                <!--end::Row-->
                                <!--begin::Row-->
                                <div class="row mb-8">
                                    <!--begin::Col-->
                                    <div class="col-xl-3">
                                        <div class="fs-6 fw-semibold mt-2 mb-3">Pengajuan Dosbing</div>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-xl-9 fv-row">
                                        <input type="text" class="form-control form-control-solid" disabled name="type" value="Dr. Bambang Joyosupeno, SH., M.Hum" />
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
                                        <textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
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
                                        <textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
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
                                        <textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
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
                                        <textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
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
                                        <textarea name="description" class="form-control form-control-solid h-100px">Organize your thoughts with an outline. Here’s the outlining strategy I use. I promise it works like a charm. Not only will it make writing your blog post easier, it’ll help you make your message</textarea>
                                    </div>
                                    <!--begin::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Card body-->
                        </form>
                        <!--end:Form-->
                    </div>
                    <!--end::Card-->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    {{--    @vite('resources/js/page/articles/table.js')--}}
@endsection
