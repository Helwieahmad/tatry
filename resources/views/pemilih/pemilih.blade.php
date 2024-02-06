<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link  href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='Data Pemilih'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Data Pemilih"></x-navbars.navs.auth>
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
                                                            <label class="form-label">Nama Lengkap Pemilih</label>
                                                            <input type="text" name="nama_pemilih" id="nama_pemilih" class="form-control" required autofocus>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label"></label>
                                                            <select name="id_kabupaten" id="id_kabupaten" class="form-control">
                                                                    <option disabled selected>Pilih Kabupaten</option>
                                                                        @foreach($kabupaten as $kab)
                                                                                <option value="{{ $kab->id }}"> {{ $kab->nama_kabupaten }} </option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                                                <option disabled selected>Pilih Kecamatan</option>
                                                                    @foreach($kecamatan as $kec)
                                                                            <option value="{{ $kec->id }}"> {{ $kec->nama_kecamatan }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_desa" id="id_desa" class="form-control">
                                                                <option disabled selected>Pilih Desa</option>
                                                                    @foreach($desa as $desa)
                                                                            <option value="{{ $desa->id }}"> {{ $desa->nama_desa }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_rt" id="id_rt" class="form-control">
                                                                <option disabled selected>Pilih No RT</option>
                                                                    @foreach($rt as $rt)
                                                                            <option value="{{ $rt->id }}"> {{ $rt->no_rt }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_rw" id="id_rw" class="form-control">
                                                                    <option disabled selected>Pilih No RW</option>
                                                                        @foreach($rw as $rw)
                                                                                <option value="{{ $rw->id }}"> {{ $rw->no_rw }}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_tps" id="id_tps" class="form-control">
                                                                <option disabled selected>Pilih No TPS</option>
                                                                    @foreach($tps as $tps)
                                                                            <option value="{{ $tps->id }}"> {{ $tps->no_tps }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <select name="id_kordinator" id="id_kordinator" class="form-control">
                                                                <option disabled selected>Pilih Kordinator</option>
                                                                    @foreach($kordinator as $kordinator)
                                                                            <option value="{{ $kordinator->id }}"> {{ $kordinator->nama_kordinator }}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group input-group-outline my-3">
                                                            <label class="form-label">Keterangan</label>
                                                            <input type="text" name="keterangan" id="keterangan" class="form-control">
                                                        </div>

                                                        <div class="text-right">
                                                            <button type="button" id="simpan-pemilih" class="btn bg-gradient-primary">Simpan</button>
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
                                        <h5>Data Pemilih</h5>
                                </div>
                                    <div class="col-12 text-end pt-0 pb-0 pr-5">
                                        <a class="btn btn-info mb-0 me-4" onclick="addForm()">Tambah Pemilih</a>
                                    </div>

                                <div class="card-body pt-3">
                                    <table class="table" id="datatable-pemilih">
                                        <thead>
                                            <tr>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Pemilih</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kabupaten</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kecamatan</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Desa/Kelurahan</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">RT</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">RW</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">TPS</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama Kordinator</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Keterangan</th>
                                            </tr>
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
                        ajax: "{{ route('pemilih.index') }}",
                        columns: [
                                    {data: 'DT_RowIndex', searchable: false, orderable: false},
                                    { data: 'action', name: 'action' },
                                    { data: 'nama_pemilih', name: 'nama_pemilih' },
                                    { data: 'kabupaten.nama_kabupaten', name: 'kabupaten.nama_kabupaten' },
                                    { data: 'kecamatan.nama_kecamatan', name: 'kecamatan.nama_kecamatan' },
                                    { data: 'desa.nama_desa', name: 'desa.nama_desa' },
                                    { data: 'rt.no_rt', name: 'rt.no_rt' },
                                    { data: 'rw.no_rw', name: 'rw.no_rw' },
                                    { data: 'tps.no_tps', name: 'tps.no_tps' },
                                    { data: 'kordinator.nama_kordinator', name: 'kordinator.nama_kordinator'},
                                    { data: 'keterangan', name: 'keterangan'}
                                ],
                    order: [[0, 'desc']]

                });

                //save data untuk edit atau create
                $('#simpan-pemilih').click(function(e) {
                    var formdata = $("#modal-form form").serializeArray();
                    var data = {};
                    $(formdata).each(function(index, obj) {
                        data[obj.name] = obj.value;
                    });
                    if (validation(data)) {
                        $.ajax({
                            data: $('#modal-form form').serialize(),
                            url: "{{ route('pemilih.store') }}",
                            type: "POST",
                            dataType: 'json',
                            success: function(data) {
                                $('#modal-form').modal('hide');
                                $('.table').DataTable().draw();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                                $('#simpan-pemilih').html('Simpan Perubahan');
                            }
                        });
                    }

                });

                //memunculkan form edit
                $('body').on('click', '.edit-pemilih', function() {
                    var id = $(this).data('id');
                    console.log(id);
                    $.get("{{ route('pemilih.index') }}" + '/' + id + '/edit', function (data) {
                        $('#modal-form').modal('show');
                        $('#id').val(data.id);
                        $('#nama_pemilih').val(data.nama_pemilih);
                        $('#id_kabupaten').val(data.id_kabupaten);
                        $('#id_kecamatan').val(data.id_kecamatan);
                        $('#id_desa').val(data.id_desa);
                        $('#id_rt').val(data.id_rt);
                        $('#id_rw').val(data.id_rw);
                        $('#id_tps').val(data.id_tps);
                        $('#id_kordinator').val(data.id_kordinator);
                        $('#keterangan').val(data.keterangan);
                    })
                });

                //delete data
                $('body').on('click', '.hapus-pemilih', function() {
                    var id = $(this).data("id");
                    if (confirm("Anda Yakin Ingin Menghapus Data Pemilih?") == true) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('pemilih.store') }}" + '/' + id,
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
                    $('.modal-title').text('Tambah Data Pemilih');
                    $('#modal-form form')[0].reset();
                    $('#modal-form [nama_pemilih=nama_pemilih]').focus();
                }

                //validasi nama Kordinator harus di isi
                function validation(data) {
                    let formIsValid = true;
                    $('span[id^="error"]').text('');
                    if (!data.nama_pemilih) {
                        formIsValid = false;
                        $("#error-nama_pemilih").text('Kolom Nama Pemilih Wajib diisi.')
                    }
                    return formIsValid;
                }

                function submitHandler() {
                    $('#simpan-pemilih').click();
                }

        </script>

    @endpush
</x-layout>
