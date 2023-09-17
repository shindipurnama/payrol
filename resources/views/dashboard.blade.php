@extends('template.sidebar')
@section('title', 'Dashboard')

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_app_toolbar" class="app-toolbar pb-3 pb-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl">
                <!--begin::Page title-->
                <div class="page-title justify-content-center">
                    <!--begin::Title-->
                    <div class="row flex-stack align-items-center">
                        <!--begin::User-->
                        <div class="col-12 col-md-6">
                            <ol class="breadcrumb text-muted fs-6 fw-bold">
                                <li class="breadcrumb-item text-dark">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <div id="kt_content_container" class="container-xxl">
            <div class="row g-5 g-xl-8">
                <div class="col-md-4">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-primary card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="fas fa-users text-gray-100 fs-1"></i>
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5 w-75"><span id="txtMessageFull" class="d-flex w-100">300</span></div>
                            <div class="fw-bold text-gray-100">Jumlah Staff</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-md-4">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-success card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="fas fa-solid fa-user-minus text-gray-100 fs-1"></i>
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5 w-75"><span id="txtMessageSent" class="d-flex w-100">45</span></div>
                            <div class="fw-bold text-gray-100">Staff Izin / Cuti</div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <div class="col-md-4">
                    <!--begin::Statistics Widget 5-->
                    <a href="#" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8" id="failedCard">
                        <!--begin::Body-->
                        <div class="card-body">
                            <i class="fas fa-solid fa-user-plus text-gray-100 fs-1"></i>
                            <div class="text-gray-100 fw-bolder fs-2 mb-2 mt-5 w-75"><span id="txtMessageFail" class="d-flex w-100">19</span></div>
                            <div class="fw-bold text-gray-100">Staff Lembur</div>
                        </div>
                        <!--end::Body-->
                    </a>
                    <!--end::Statistics Widget 5-->
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->

<script src="{{ asset('asset/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>

@endsection