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
                                <li class="breadcrumb-item text-dark">Form Penggajian</li>
                            </ol>
                        </div>
                        <div class="col-12 col-md-6 d-flex justify-content-end">
                            <div class="d-flex justify-content-end" data-kt-forms-table-toolbar="base">
                                <button type="button" class="btn btn-primary skeleton skeleton-button" data-bs-toggle="modal" data-bs-target="#modal_generate_data">
                                    Generate Penggajian
                                </button>
                            </div>
                            <!-- <input type="month" class="form-control form-control-sm w-200px" placeholder="" id="FilterDatePayroll" autocomplete="off" /> -->
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
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dataTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Nama</th>
                                <th class="min-w-125px">TTL</th>
                                <th class="min-w-70px">L / P</th>
                                <th class="min-w-125px">Jabatan</th>
                                <th class="min-w-125px">Status</th>
                                <th class="min-w-125px">Gaji Pokok</th>
                                <th class="min-w-125px">Tunjangan</th>
                                <th class="min-w-125px">BPJS</th>
                                <th class="min-w-125px">Tgl. Masuk</th>
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

<!-- Modal -->
<div class="modal fade" id="modal_generate_data" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" action="#" id="modal_generate_data_form">
                <div class="modal-header" id="modal_generate_data_header">
                    <h2 class="fw-bolder">Form Generate Gaji</h2>
                    <div id="modal_generate_data_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-10">
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Pilih Bulan</label>
                        <input type="month" onfocus="this.showPicker()" class="form-control form-control-solid" placeholder="" id="txtDateInsert" autocomplete="off" />
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="modal_generate_data_cancel" class="btn btn-light me-3">Batal</button>
                    <button type="submit" id="modal_generate_data_submit" class="btn btn-primary">
                        <span class="indicator-label">Generate</span>
                        <span class="indicator-progress">Loading...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
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
            place_birth: "Gresik",
            date_birth: "2000-01-30",
            gender: "L",
            position: "Supervisor",
            status: "Tetap",
            basic_salary: "7000000",
            subsidy: "3000000",
            bpjs: "5000000",
            date_join: "2020-03-03",
        },
        {
            code: "2",
            name: "Shindi Purnama",
            place_birth: "Surabaya",
            date_birth: "2000-03-03",
            gender: "P",
            position: "Staff",
            status: "Kontrak",
            basic_salary: "5000000",
            subsidy: "1000000",
            bpjs: "2000000",
            date_join: "2021-09-05",
        },
    ]
    var table
    var start = moment().startOf('month')
    var end = moment()
    var dateStart, dateEnd;
    moment.locale('id')

    $("#kt_daterangepicker_1").daterangepicker({
        "startDate": start,
        "endDate": end,
        "maxDate": end,
        "maxSpan": {
            "days": 31
        },
        "locale": {
            "format": "DD MMM YYYY",
            "applyLabel": "Gunakan",
            "cancelLabel": "Batal",
            "fromLabel": "Dari",
            "toLabel": "Sampai",
            "customRangeLabel": "Custom",
        },
        "ranges": {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            '7 Hari Lalu': [moment().subtract(7, 'days'), moment()],
            '30 Hari Lalu': [moment().subtract(30, 'days'), moment()],
            'Minggu Ini': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Minggu Lalu': [moment().subtract(1, 'week').startOf('isoWeek'), moment().subtract(1, 'week').endOf('isoWeek')],
            'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
        },
    }, function(start, end, label) {
        showDataTable()
    });

    function getData() {
        let start = $('#kt_daterangepicker_1').data('daterangepicker').startDate.format('YYYY-MM-DD')
        let end = $('#kt_daterangepicker_1').data('daterangepicker').endDate.format('YYYY-MM-DD')
        dateStart = moment(start).format('DD MMMM YYYY');
        dateEnd = moment(end).format('DD MMMM YYYY');

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
                [8, 'desc']
            ],
            "data": resultData,
            "columns": [{
                    data: 'name'
                },
                {
                    data: 'place_birth'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'position'
                },
                {
                    data: 'status'
                },
                {
                    data: 'basic_salary'
                },
                {
                    data: 'subsidy'
                },
                {
                    data: 'bpjs'
                },
                {
                    data: 'date_join'
                },
                {
                    data: 'code'
                },
            ],
            "columnDefs": [{
                    targets: 1,
                    render: function(data, type, row) {
                        return `<span>${data}, ${moment(row.date_birth).format('DD MMM YYYY')}</span>`
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, row) {
                        return `<span>${moment(data).format('DD MMM YYYY')}</span>`
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, row) {
                        return `<span>${number_format(parseInt(data), 0, ',', '.')}</span>`
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, row) {
                        return `<span>${number_format(parseInt(data), 0, ',', '.')}</span>`
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, row) {
                        return `<span>${number_format(parseInt(data), 0, ',', '.')}</span>`
                    }
                },
                {
                    targets: -1,
                    orderable: false,
                    searchable: false,
                    className: 'text-center',
                    render: function(data, type, row) {
                        return `
                        <button type="button" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" id="btnAction">
                            <i class="bi bi-three-dots-vertical fs-3"></i>
                        </button>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                            <div class="menu-item px-3">
                                <a class="menu-link" data-code="${row.code}" data-name="${row.name}" id="optionEdit">
                                    <span class="fas fa-pen fs-3 menu-icon"></span>
                                    <span class="menu-title">Ubah</span>
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link" data-kt-forms-table-filter="delete_row" data-code="${row.code}" >
                                    <span class="fas fa-trash fs-3 menu-icon"></span>
                                    <span class="menu-title">Hapus</span>
                                </a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link" data-kt-forms-table-filter="copy_row" data-row="${btoa(unescape(encodeURIComponent(JSON.stringify(row))))}" >
                                    <span class="fas fa-copy fs-3 menu-icon"></span>
                                    <span class="menu-title">Salin</span>
                                </a>
                            </div>
                        </div>
                    `;
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
</script>

@endsection