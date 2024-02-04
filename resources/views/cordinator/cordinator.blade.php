<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" > --}}
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link  href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='Data Kordinator'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Kordinator"></x-navbars.navs.auth>
        <!-- End Navbar -->

            <div class="container-fluid py-4">

                <div class="row">
                    {{-- Modal Start --}}
                    <div class="col-md-4">
                        <div class="modal fade show" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form">
                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                {{-- tambahkan onsubmit dan action agar tidak reload --}}
                                <form onSubmit="JavaScript:submitHandler()"  action="javascript:void(0)" class="form-horizontal">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card card-plain">
                                                <div class="card-header pb-0 text-left">
                                                    <input type="hidden" name="id" id="id" class="form-control">
                                                    <h5 class="">Tambah Data Baru</h5>
                                                    <p class="mb-0">Isi Seluruh Kolom di bawah ini secara lengkap</p>
                                                </div>
                                                <div class="card-body pt-0 pb-3">
                                                    <form role="form text-left">
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Nama Lengkap</label>
                                                            <input type="text" name="nama_kordinator" id="nama_kordinator" class="form-control" required autofocus>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Username</label>
                                                            <input type="text"  name="username" id="username" class="form-control">
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Kata Sandi</label>
                                                            <input type="password" name="password" id="password" class="form-control">
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select class="form-select form-select-lg" name="nama_desa" id="nama_desa">
                                                                <option selected>Pilih Kelurahan/Desa</option>
                                                                <option value="1">1. Asembagus</option>
                                                                <option value="2">2. Awar-awar</option>
                                                                <option value="3">3. Bantal</option>
                                                                <option value="4">4. Gudang</option>
                                                                <option value="5">5. Kedunglo</option>
                                                                <option value="6">6. Kertosari</option>
                                                                <option value="7">7. Mojosari</option>
                                                                <option value="8">8. Perante</option>
                                                                <option value="9">9. Trigonco</option>
                                                                <option value="10">10. Wringin Anom</option>
                                                                <option value="11">11. Banyuputih</option>
                                                                <option value="12">12. Sumberejo</option>
                                                                <option value="13">13. Sumberanyar</option>
                                                                <option value="14">14. Sumberwaru</option>
                                                                <option value="15">15. Wonorejo</option>
                                                                <option value="16">16. Agel</option>
                                                                <option value="17">17. Curah Kalak</option>
                                                                <option value="18">18. Gadingan</option>
                                                                <option value="19">19. Jangkar</option>
                                                                <option value="20">20. Kumbangsari</option>
                                                                <option value="18">18. Palangan</option>
                                                                <option value="19">19. Pesanggrahan</option>
                                                                <option value="20">20. Sopet</option>
                                                                </select>
                                                        </div><div class="input-group input-group-outline my-3">
                                                            <label class="form-label">No Telepon</label>
                                                            <input type="number"  name="no_tlpn" id="no_tlpn" class="form-control">
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Keterangan</label>
                                                            <input type="text"  name="keterangan" id="keterangan" class="form-control">
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="button" id="simpan-kordinator" class="btn bg-gradient-primary">Simpan</button>
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
                    {{-- Modal End --}}
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header pb-1">
                                        <h5>Data Kordinator</h5>
                                </div>
                                    <div class="col-12 text-end pt-0 pb-0 pr-5">
                                        <a class="btn btn-info mb-0 me-4" onclick="addForm()">Tambah Kordinator</a>
                                    </div>

                                <div class="card-body pt-3">
                                    <table class="table" id="datatable-kordinator">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                            <th class="text-uppercase text-secondary text-xs text-center font-weight-bolder opacity-7">Action</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Kordinator</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Username</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Password</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Desa</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No. Telepon</th></tr>
                                    </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    </main>

    <x-plugins></x-plugins>

    @push('js')
        <script>
                $(function () {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

                var table = $('.table').DataTable({
                        processing: true,
                        autoWidth: false,
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        scrollX:    true,
                        dom: 'lfrtip',
                        ajax: "{{ route('cordinator.index') }}",
                        columns: [{  data: 'DT_RowIndex',
                        searchable: false},
                        { data: 'action', name: 'action' },
                        { data: 'nama_kordinator', name: 'nama_kordinator' },
                        { data: 'username', name: 'username' },
                        { data: 'password', name: 'password' },
                        { data: 'nama_desa', name: 'nama_desa' },
                        { data: 'no_tlpn', name: 'no_tlpn'}
                    ],
                    order: [[0, 'desc']]
                });

                //save data untuk edit atau create
                $('#simpan-kordinator').click(function(e) {
                    var formdata = $("#modal-form form").serializeArray();
                    var data = {};
                    $(formdata).each(function(index, obj) {
                        data[obj.name] = obj.value;
                    });
                    if (validation(data)) {
                        $.ajax({
                            data: $('#modal-form form').serialize(),
                            url: "{{ route('cordinator.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                $('#modal-form').modal('hide');
                                $('.table').DataTable().draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $('#simpan-kordinator').html('Simpan Perubahan');
                            }
                        });
                    }

                });

                //memunculkan form edit
                $('body').on('click', '.edit-kordinator', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    $.get("{{ route('cordinator.index') }}" + '/' + id + '/edit', function (data) {
                        $('#modal-form').modal('show');
                        $('#id').val(data.id);
                        $('#nama_kordinator').val(data.nama_kordinator);
                        $('#username').val(data.username);
                        $('#password').val(data.password);
                        $('#nama_desa').val(data.nama_desa);
                        $('#no_tlpn').val(data.no_tlpn);
                        $('#keterangan').val(data.keterangan);
                    })
                });

                //delete data
                $('body').on('click', '.hapus-kordinator', function() {
                    var id = $(this).data("id");
                    if (confirm("Anda Yakin Ingin Menghapus Data Kordinator?") == true) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('cordinator.store') }}" + '/' + id,
                                success: function(data) {
                                    $('.table').DataTable().draw();
                                },
                                error: function(data) {
                                    console.log('Error:', data);
                                }
                            });
                        }
                    });


                    //memunculkan form add

                    function addForm() {
                    $("#modal-form").modal('show');
                    $('#id').val('');
                    $('.modal-title').text('Tambah Data Kordinator');
                    $('#modal-form form')[0].reset();
                    $('#modal-form [nama_kordinator=nama_kordinator]').focus();
                }

                //validasi nama Kordinator harus di isi
                function validation(data) {
                    let formIsValid = true;
                    $('span[id^="error"]').text('');
                    if (!data.nama_kordinator) {
                        formIsValid = false;
                        $("#error-nama_kordinator").text('Kolom Nama Kordinator Wajib diisi.')
                    }
                    return formIsValid;
                }

                function submitHandler() {
                    $('#simpan-kordinator').click();
                }



        </script>

    @endpush
</x-layout>
