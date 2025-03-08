@extends('master')
@section('app_content')
    <!--begin::Toolbar-->
    <div class="d-flex flex-wrap flex-stack mb-6">
        <!--begin::Heading-->
        <h3 class="fw-bold my-2">My Projects
            <span class="fs-6 text-gray-400 fw-semibold ms-1">Active</span></h3>
        <!--end::Heading-->
        <!--begin::Actions-->
        <div class="d-flex flex-wrap my-2">
            <div class="me-4">
                <!--begin::Select-->
                <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body w-125px">
                    <option value="Active" selected="selected">Active</option>
                    <option value="Approved">In Progress</option>
                    <option value="Declined">To Do</option>
                    <option value="In Progress">Completed</option>
                </select>
                <!--end::Select-->
            </div>
            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_create_project">New Project</a>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Row-->
    <div class="row g-6 g-xl-9">
        <!--begin::Col-->
        <div class="col-md-6 col-xl-4">
            <!--begin::Card-->
            <a href="../../demo1/dist/apps/projects/project.html" class="card border-hover-primary">
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
                        <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end:: Card header-->
                <!--begin:: Card body-->
                <div class="card-body p-9">
                    <!--begin::Name-->
                    <div class="fs-3 fw-bold text-dark">Fitnes App</div>
                    <!--end::Name-->
                    <!--begin::Description-->
                    <p class="text-gray-400 fw-semibold fs-5 mt-1 mb-7">CRM App application to HR efficiency</p>
                    <!--end::Description-->
                    <!--begin::Info-->
                    <div class="d-flex flex-wrap mb-5">
                        <!--begin::Due-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">Sep 22, 2023</div>
                            <div class="fw-semibold text-gray-400">Due Date</div>
                        </div>
                        <!--end::Due-->
                        <!--begin::Budget-->
                        <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                            <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                            <div class="fw-semibold text-gray-400">Budget</div>
                        </div>
                        <!--end::Budget-->
                    </div>
                    <!--end::Info-->
                    <!--begin::Progress-->
                    <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="This project 50% completed">
                        <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end::Progress-->
                    <!--begin::Users-->
                    <div class="symbol-group symbol-hover">
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                            <img alt="Pic" src="{{ Vite::asset('resources/assets/media/avatars/300-6.jpg') }}" />
                        </div>
                        <!--begin::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rudy Stone">
                            <img alt="Pic" src="{{ Vite::asset('resources/assets/media/avatars/300-1.jpg') }}" />
                        </div>
                        <!--begin::User-->
                        <!--begin::User-->
                        <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
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
@endsection
@section('js')
    @vite('resources/js/page/articles/table.js')
@endsection
