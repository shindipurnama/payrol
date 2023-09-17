@extends('template.sidebar')
@section('title', 'Staff')

@section('style')
<link href="{{ asset('asset/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')

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
                                <li class="breadcrumb-item text-dark">Form Izin Cuti</li>
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
                            <button type="button" class="btn btn-primary skeleton skeleton-button" data-bs-toggle="modal" data-bs-target="#modal_add_data">
                                <i class="fas fa-plus fs-3 me-2"></i>Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_dataTable">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Nama</th>
                                <th class="min-w-125px">Dari</th>
                                <th class="min-w-70px">Sampai</th>
                                <th class="min-w-125px">Jumlah Cuti</th>
                                <th class="min-w-125px">Tipe</th>
                                <th class="min-w-125px">Keterangan</th>
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
<div class="modal fade" id="modal_add_data" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" action="#" id="modal_add_data_form">
                <div class="modal-header" id="modal_add_data_header">
                    <h2 class="fw-bolder">Form Tambah Cuti</h2>
                    <div id="modal_add_data_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <label class="required fs-6 fw-bold mb-2">Tipe</label>
                        <select class="form-select form-select-solid select-type" id="cbTypeInsert" data-control="select2" data-hide-search="true" data-placeholder="Pilih Jenis Kelamin">
                            <option value="1">Cuti</option>
                            <option value="0">Tidak Masuk</option>
                        </select>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Dari</label>
                        <input type="date" onfocus="this.showPicker()" class="form-control form-control-solid" placeholder="" id="txtDateFromInsert" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Sampai</label>
                        <input type="date" onfocus="this.showPicker()" class="form-control form-control-solid" placeholder="" id="txtDateToInsert" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Jumlah Cuti</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" id="txtPermissionInsert" autocomplete="off" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Keterangan</label>
                        <textarea class="form-control form-control-solid" placeholder="" id="txtNotesInsert" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="modal_add_data_cancel" class="btn btn-light me-3">Batal</button>
                    <button type="submit" id="modal_add_data_submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
                        <span class="indicator-progress">Loading...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_update_data" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" action="#" id="modal_update_data_form">
                <div class="modal-header" id="modal_update_data_header">
                    <h2 class="fw-bolder">Form Ubah Cuti</h2>
                    <div id="modal_update_data_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <label class="required fs-6 fw-bold mb-2">Tipe</label>
                        <select class="form-select form-select-solid select-type" id="cbTypeUpdate" data-control="select2" data-hide-search="true" data-placeholder="Pilih Jenis Kelamin">
                            <option value="1">Cuti</option>
                            <option value="0">Tidak Masuk</option>
                        </select>
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Dari</label>
                        <input type="date" onfocus="this.showPicker()" class="form-control form-control-solid" placeholder="" id="txtDateFromUpdate" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Sampai</label>
                        <input type="date" onfocus="this.showPicker()" class="form-control form-control-solid" placeholder="" id="txtDateToUpdate" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Jumlah Cuti</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" id="txtPermissionUpdate" autocomplete="off" oninput="this.value=this.value.replace(/[^0-9]/g,'');" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Keterangan</label>
                        <textarea class="form-control form-control-solid" placeholder="" id="txtNotesUpdate" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="modal_update_data_cancel" class="btn btn-light me-3">Batal</button>
                    <button type="submit" id="modal_update_data_submit" class="btn btn-primary">
                        <span class="indicator-label">Simpan</span>
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
            date_from: "2023-09-05",
            date_to: "2023-09-07",
            duration: "2",
            type: "0",
            notes: "Acara keluarga",
        },
        {
            code: "2",
            name: "Muhammad Teguh",
            date_from: "2023-09-08",
            date_to: "2023-09-08",
            duration: "1",
            type: "1",
            notes: "Keluar kota",
        },
    ]
    var table

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
                    data: 'date_from'
                },
                {
                    data: 'date_to'
                },
                {
                    data: 'duration'
                },
                {
                    data: 'type'
                },
                {
                    data: 'notes'
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
                    targets: 2,
                    render: function(data, type, row) {
                        return `<span>${moment(data).format('DD MMM YYYY')}</span>`
                    }
                },
                {
                    targets: 3,
                    render: function(data, type, row) {
                        return `<span>${number_format(parseInt(data), 0, ',', '.')} Hari</span>`
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, row) {
                        if(data == 0) return `<span>Tidak Masuk</span>`
                        else if(data == 1) return `<span>Cuti</span>`
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
                                <a class="menu-link" data-row="${btoa(JSON.stringify(row))}" id="optionEdit">
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
                        </div>
                    `;
                    },
                }
            ],
        })

        table.on('draw', function() {
            console.log('drawed')
            KTMenu.createInstances();
            handleDeleteRows()
        });
        KTMenu.createInstances();
        handleDeleteRows()
    }

    var handleSearchDatatable = function() {
        const filterSearch = document.querySelector('[data-kt-forms-table-filter="search"]');
        filterSearch.addEventListener('keyup', function(e) {
            table.search(e.target.value).draw();
        });
    }

    var handleDeleteRows = () => {
        // Select all delete buttons
        const deleteButtons = document.querySelectorAll('[data-kt-forms-table-filter="delete_row"]');

        deleteButtons.forEach(d => {
            // Delete button on click
            d.addEventListener('click', function(e) {
                var code = $(this).data('code')
                e.preventDefault();

                // Select parent row
                const parent = e.target.closest('tr');

                // Get customer name
                const ListName = parent.querySelectorAll('td')[1].childNodes[0].textContent;

                // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                Swal.fire({
                    title: "Hapus",
                    text: "Apakah Anda yakin? Anda tidak dapat mengembalikan data yang terhapus.",
                    icon: "warning",
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    },
                    reverseButtons: true
                }).then(function(result) {
                    if (result.value) {
                        Swal.fire({
                            title: 'Proses!',
                            html: "Menghapus data",
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
        });
    }

    KTUtil.onDOMContentLoaded(function() {
        showDataTable()
        handleSearchDatatable()
        handleDeleteRows()
    })

    $(document).ready(function() {
        $(document).on("click", "#optionEdit", function(e) {
            e.preventDefault()
            var row = JSON.parse(atob($(this).data('row')));
            console.log(row)
            $("#txtDateFromUpdate").val(row.date_from)
            $("#txtDateToUpdate").val(row.date_to)
            $("#txtPermissionUpdate").val(row.duration)
            $("#cbTypeUpdate").val(row.type).change()
            $("#txtNotesUpdate").val(row.notes)
            $("#modal_update_data").modal("show")
        })
    })
</script>

@endsection