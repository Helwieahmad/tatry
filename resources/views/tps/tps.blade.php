<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link  href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='Data TPS'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data TPS"></x-navbars.navs.auth>
        <!-- End Navbar -->

            <div class="container-fluid py-4">

                <div class="row">


                    {{-- Modal TPS Start --}}
                    <div class="col-md-4">
                        <div class="modal fade show" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                {{-- tambahkan onsubmit dan action agar tidak reload --}}
                                <form onSubmit="JavaScript:submitHandler()"  action="javascript:void(0)" class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <h5 class="">Tambah TPS Baru</h5>
                                                    <p class="mb-0">Silahkan isi Semua Kolom di bawah ini</p>
                                                </div>
                                                <div class="card-body pb-3">
                                                    <form role="form text-left">
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">No TPS</label>
                                                            <input type="hidden" name="id" id="id" class="form-control"> 
                                                            <input type="text" name="no_tps" id="no_tps" class="form-control" required autofocus>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Lokasi TPS</label>
                                                            <input type="text"  name="lokasi_tps" id="lokasi_tps" class="form-control">
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Keterangan</label>
                                                            <input type="text"  name="keterangan" id="keterangan" class="form-control">
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="button" id="simpan-tps" class="btn bg-gradient-primary">Simpan</button>
                                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- Modal TPS End --}}
                    </div>


                    {{-- Tabel TPS Start --}}
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header pb-1">
                                        <h5>Data TPS</h5>
                                </div>
                                    <div class="col-12 text-end pt-0 pb-0 pr-5">
                                        <a class="btn btn-info mb-0 me-4" onclick="addForm()">Tambah TPS</a>
                                    </div>

                                <div class="card-body pt-3">
                                    <table class="table" id="datatable-tps">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama TPS</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Lokasi TPS</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Keterangan</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Tabel TPS End --}}

                </div>

            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    </main>

    <x-plugins></x-plugins>

    @push('js')
        <script>
                $(document).ready( function () {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('.table').DataTable({
                        processing: true,
                        autoWidth: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        scrollX:    true,
                        dom: 'lfrtip',
                        ajax: "{{ route('tps.index') }}",
                        columns: [{  data: 'DT_RowIndex',
                        searchable: false},
                        { data: 'no_tps', name: 'no_tps' },
                        { data: 'lokasi_tps', name: 'lokasi_tps' },
                        { data: 'keterangan', name: 'keterangan' },
                        { data: 'action', name: 'action', orderable: false},
                    ],
                    order: [[0, 'desc']]
                });

                 //Close Modal
                $('.close-btn').click(function(e) {
                    $('.modal').modal('hide')
                });

                //delete data
                $('body').on('click', '.hapus-tps', function() {
                    var id = $(this).data("id");
                    if (confirm("Anda Yakin Ingin Menghapus Data TPS?") == true) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('tps.store') }}" + '/' + id,
                                success: function(data) {
                                    $('.table').DataTable().draw();
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    });
                });

                //save data untuk edit atau create
                $('#simpan-tps').click(function(e) {
                    var formdata = $("#modal-form form").serializeArray();
                    var data = {};
                    $(formdata).each(function(index, obj) {
                        data[obj.name] = obj.value;
                    });
                    if (validation(data)) {
                        $.ajax({
                            data: $('#modal-form form').serialize(),
                            url: "{{ route('tps.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                $('#modal-form').modal('hide');
                                $('.table').DataTable().draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $('#simpan-tps').html('Simpan Perubahan');
                            }
                        });
                    }

                });

                //memunculkan form edit
                $('body').on('click', '.edit-tps', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    $.get("{{ route('tps.index') }}" + '/' + id + '/edit', function(data) {
                        $('.modal-title').text('Edit TPS');
                        $('#modal-form').modal('show');
                        $('#id').val(data.id);
                        $('#no_tps').val(data.no_tps);
                        $('#lokasi_tps').val(data.lokasi_tps);
                        $('#keterangan').val(data.keterangan);
                    })
                });

                //memunculkan form add
                function addForm() {
                    $("#modal-form").modal('show');
                    $('#id').val('');
                    $('.modal-title').text('Tambah Data TPS');
                    $('#modal-form form')[0].reset();
                    $('#modal-form [no_tps=no_tps]').focus();
                }

                //validasi name harus di isi
                function validation(data) {
                    let formIsValid = true;
                    $('span[id^="error"]').text('');
                    if (!data.no_tps) {
                        formIsValid = false;
                        $("#error-no_tps").text('Kolom No TPS Wajib diisi.')
                    }
                    return formIsValid;
                }

                function submitHandler() {
                    $('#simpan-tps').click();
                }
        </script>
    @endpush
</x-layout>
