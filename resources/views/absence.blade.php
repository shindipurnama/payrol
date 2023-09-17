@extends('template.sidebar')
@section('title', 'Staff')

@section('style')
<link href="{{ asset('asset/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<!-- <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> -->
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
                                <li class="breadcrumb-item text-dark">Form Absen</li>
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
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1 skeleton-button" id="divSearch">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-forms-table-filter="search" class="form-control form-control-solid w-250px ps-15 skeleton" placeholder="Cari..." id="inputSearch" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-forms-table-toolbar="base">
                            <button type="button" class="btn btn-primary skeleton skeleton-button" id="btnCheckIn">
                                Absen Masuk
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dataTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Nama</th>
                                <th class="min-w-125px">Tanggal Absen</th>
                                <th class="min-w-70px">Jam Masuk</th>
                                <th class="min-w-70px">Jam Keluar</th>
                                <th class="min-w-70px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="{{ asset('asset/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('asset/plugins/custom/datatables/datatables.bundle.js') }}"></script>

<script>
    "use strict";

    var resultData = [{
            code: "1",
            name: "Muhammad Teguh",
            date_in: "2023-09-16",
            time_in: " 07:29",
            time_out: "16:29",
        },
        {
            code: "2",
            name: "Muhammad Teguh",
            date_in: "2023-09-16",
            time_in: " 07:14",
            time_out: "0",
        },
    ]
    var table

    $("#btnCheckIn").click(function() {
        Swal.fire({
            title: "Absen",
            html: `Apakah anda akan absen masuk ?`,
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Ya, absen!",
            cancelButtonText: "Batal",
            customClass: {
                confirmButton: "btn fw-bold btn-primary",
                cancelButton: "btn fw-bold btn-active-light-primary"
            },
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
                Swal.fire({
                    title: 'Proses!',
                    text: 'Absen masuk',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })

                // $.ajax({
                //     data: {
                //         code: code,
                //         phone: dataLocal.phone
                //     },
                //     url: baseUrl + "forms/delete",
                //     method: 'POST',
                //     success: function(result) {
                //         console.log(JSON.parse(result));
                //         var result = JSON.parse(result);

                //         if (result.success) {
                //             Swal.fire({
                //                 title: "Sukses",
                //                 html: "Anda telah menghapus <span class='text-success'>" + ListName + "</span>!",
                //                 icon: "success",
                //                 timer: 2000,
                //                 showCancelButton: false,
                //                 showConfirmButton: false
                //             }).then(ajax_get());
                //         } else {
                //             Swal.fire({
                //                 title: "Maaf",
                //                 text: "Sepertinya ada beberapa kesalahan yang terdeteksi. Silakan coba lagi.",
                //                 icon: "error",
                //                 buttonsStyling: !1,
                //                 confirmButtonText: "Ok!",
                //                 customClass: {
                //                     confirmButton: "btn btn-primary"
                //                 },
                //             });
                //         }
                //     }
                // });
            }
        });
    })

    function getData() {
        $.ajax({
            data: {
                phone: dataLocal.phone,
            },
            url: baseUrl + "forms/get",
            method: 'POST',
            success: function(result) {
                console.log(JSON.parse(result));
                var result = JSON.parse(result);

                if (result.success) {
                    resultData = [];
                    resultData = result.data;
                    showDataTable()
                }
            }
        });
    }

    function showDataTable() {
        console.log(resultData)
        // table = $("#kt_dataTable").DataTable()
        table = $("#kt_dataTable").DataTable({
            "searchDelay": 500,
            "processing": true,
            "destroy": true,
            "order": [
                [1, 'desc']
            ],
            "data": resultData,
            "columns": [{
                    data: 'name'
                },
                {
                    data: 'date'
                },
                {
                    data: 'time_in'
                },
                {
                    data: 'time_out'
                },
                {
                    data: 'code'
                },
            ],
            "columnDefs": [{
                    targets: 1,
                    render: function(data, type, row) {
                        return `<span>${moment(data).format('DD MMM YYYY')}</span>`
                    }
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    render: function(data, type, row) {
                        if (row.time_out == 0) {
                            return `
                                <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" id="btnAction">
                                    <i class="bi bi-three-dots-vertical fs-3"></i>
                                </button>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <a class="menu-link" data-code="${row.code}" data-name="${row.name}" id="btnCheckOut">
                                            <span class="menu-title">Absen Keluar</span>
                                        </a>
                                    </div>
                                </div>
                            `;
                        } else return ""
                    },
                }
            ],
        })

        table.on('draw', function() {
            console.log('drawed')
            KTMenu.createInstances();
        });
        KTMenu.createInstances();
    }

    // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
    var handleSearchDatatable = function() {
        const filterSearch = document.querySelector('[data-kt-forms-table-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            table.search(e.target.value).draw();
        });
    }

    KTUtil.onDOMContentLoaded(function() {
        showDataTable()
        handleSearchDatatable()
    })

    $(document).ready(function() {
        $(document).on("click", "#btnCheckOut", function(e) {
            e.preventDefault()
            var code = $(this).data('code')
            console.log(code)

            Swal.fire({
                title: "Absen",
                html: `Apakah anda akan absen keluar ?`,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Ya, absen!",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-primary",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                },
                reverseButtons: true
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        title: 'Proses!',
                        text: "Absen keluar",
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading()
                        },
                    })

                    // $.ajax({
                    //     data: {
                    //         code: code,
                    //         phone: dataLocal.phone
                    //     },
                    //     url: baseUrl + "forms/delete",
                    //     method: 'POST',
                    //     success: function(result) {
                    //         console.log(JSON.parse(result));
                    //         var result = JSON.parse(result);

                    //         if (result.success) {
                    //             Swal.fire({
                    //                 title: "Sukses",
                    //                 html: "Anda telah menghapus <span class='text-success'>" + ListName + "</span>!",
                    //                 icon: "success",
                    //                 timer: 2000,
                    //                 showCancelButton: false,
                    //                 showConfirmButton: false
                    //             }).then(ajax_get());
                    //         } else {
                    //             Swal.fire({
                    //                 title: "Maaf",
                    //                 text: "Sepertinya ada beberapa kesalahan yang terdeteksi. Silakan coba lagi.",
                    //                 icon: "error",
                    //                 buttonsStyling: !1,
                    //                 confirmButtonText: "Ok!",
                    //                 customClass: {
                    //                     confirmButton: "btn btn-primary"
                    //                 },
                    //             });
                    //         }
                    //     }
                    // });
                }
            });
        })
    })
</script>

@endsection