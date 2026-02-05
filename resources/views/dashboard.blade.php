<x-app-layout>
    <div class="container-fluid px-2 px-md-4">

        {{-- HEADER ROW --}}
        <div class="row align-items-center mb-2 position-relative">
            @if(request('table'))
                <h2 class="mb-0 position-absolute start-50 translate-middle-x text-center" style="top: 50%; pointer-events: none;">
                    Daftar Klaim <strong>{{ strtoupper(request('table')) }}</strong>
                </h2>
            @endif
            <div class="col-auto"></div>
        </div>

        <div class="bg-white shadow-sm rounded px-1 mt-4">

            @switch(request('table'))
                @case('bri')
                    <x-bri-table :bris="$bris" />
                    @break

                @case('mandiri')
                    <x-mandiri-table :mandiris="$mandiris" />
                    @break

                @case('bankjatim')
                    <x-bankjatim-table :bankjatims="$bankjatims" />
                    @break

                @case('btn')
                    <x-btn-table :btns="$btns" />
                    @break

                @case('bukopin')
                    <x-bukopin-table :bukopins="$bukopins" />
                    @break
            @endswitch
        </div>
    </div>


    {{-- ================= MODALS ================= --}}

    {{-- BRI MODAL --}}
    <div class="modal fade" id="addBriModal">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim BRI</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bris.store') }}">
                @csrf
                <div class="modal-body">
                    @foreach ([
                        'unit' => 'Unit',
                        'cabang_bank' => 'Cabang Bank',
                        'nama_debitur' => 'Nama Debitur',
                        'nomor_rekening' => 'Nomor Rekening',
                        'nilai_tuntutan_klaim' => 'Nilai Tuntutan Klaim',
                        'tambahan_data' => 'Tambahan Data',
                        'nomor_box' => 'No Box'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    @foreach ([
                        'tanggal_klaim_diterima' => 'Tanggal Klaim Diterima',
                        'tanggal_klaim_masuk_portal' => 'Tanggal Klaim Masuk Portal',
                        'date_update' => 'Date Update'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input type="date" name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                                <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div></div>
    </div>


    {{-- MANDIRI MODAL --}}
    <div class="modal fade" id="addMandiriModal" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim Mandiri</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('mandiris.store') }}">
                @csrf
                <div class="modal-body">
                    @foreach ([
                        'uker' => 'Uker',
                        'nama_debitur' => 'Nama Debitur',
                        'nomor_rekening' => 'Nomor Rekening',
                        'tuntutan' => 'Tuntutan',
                        'net_klaim' => 'NET Klaim',
                        'keterangan' => 'Keterangan',
                        'kekurangan_data' => 'Kekurangan Data',
                        'nomor_box' => 'Nomor Box'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label">Tanggal Klaim Diajukan</label>
                        <input type="date" name="tanggal_klaim_diajukan" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Update</label>
                        <input type="date" name="tanggal_update" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                                <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div></div>
    </div>


    {{-- BANK JATIM MODAL --}}
    <div class="modal fade" id="addBankjatimModal" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim Bank Jatim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bankjatims.store') }}">
                @csrf
                <div class="modal-body">
                    @foreach ([
                        'cabang_bank' => 'Cabang Bank',
                        'nama' => 'Nama',
                        'nomor_rekening' => 'Nomor Rekening',
                        'nilai_tuntutan' => 'Nilai Tuntutan',
                        'net_klaim' => 'NET Klaim',
                        'tambahan_data' => 'Tambahan Data'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    @foreach ([
                        'tanggal_dokumen_diterima' => 'Tanggal Dokumen Diterima',
                        'tanggal_disetujui' => 'Tanggal Disetujui'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input type="date" name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                                <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div></div>
    </div>


    {{-- BTN MODAL --}}
    <div class="modal fade" id="addBtnModal" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim BTN</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('btns.store') }}">
                @csrf
                <div class="modal-body">
                    @foreach ([
                        'cabang_bank' => 'Cabang Bank',
                        'nama_debitur' => 'Nama Debitur',
                        'nomor_rekening' => 'Nomor Rekening',
                        'nilai_tuntutan_klaim' => 'Nilai Tuntutan Klaim',
                        'net_klaim' => 'NET Klaim',
                        'keterangan' => 'Keterangan',
                        'nomor_cl' => 'Nomor CL',
                        'nomor_memo' => 'Nomor Memo'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    @foreach ([
                        'tanggal_dokumen_diterima' => 'Tanggal Dokumen Diterima',
                        'date_update' => 'Date Update',
                        'tanggal_memo' => 'Tanggal Memo',
                        'tanggal_pembayaran_klaim' => 'Tanggal Pembayaran Klaim',
                        'tanggal_pelunasan' => 'Tanggal Pelunasan'
                    ] as $name => $label)
                        <div class="mb-3">
                            <label class="form-label">{{ $label }}</label>
                            <input type="date" name="{{ $name }}" class="form-control">
                        </div>
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                                <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div></div>
    </div>


    {{-- BUKOPIN MODAL --}}
    <div class="modal fade" id="addBukopinModal" tabindex="-1">
        <div class="modal-dialog"><div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim Bukopin</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bukopins.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Debitur</label>
                        <input name="nama_debitur" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input name="nomor_rekening" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cabang Bank</label>
                        <input name="cabang_bank" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Tuntutan</label>
                        <input name="nilai_tuntutan" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai NET Klaim</label>
                        <input name="nilai_net_klaim" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">JW Awal</label>
                        <input type="date" name="jw_awal" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">JW Akhir</label>
                        <input type="date" name="jw_akhir" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div></div>
    </div>


    {{-- ================= SCRIPTS ================= --}}

    <script>
        (function() {
            let searchTimeout = null;

            function doSearch(q) {
                const table = new URLSearchParams(window.location.search).get('table');

                let urlMap = {
                    bri: '/bris/search',
                    mandiri: '/mandiris/search',
                    bankjatim: '/bankjatims/search',
                    btn: '/btns/search',
                    bukopin: '/bukopins/search'
                };

                let url = urlMap[table] ?? '/bris/search';

                fetch(url + '?q=' + encodeURIComponent(q))
                    .then(res => res.text())
                    .then(html => {
                        const container = document.getElementById(table + 'Table');
                        if (container) container.outerHTML = html;
                    });
            }

            ['searchInput', 'searchInputMobile'].forEach(id => {
                const el = document.getElementById(id);
                if (!el) return;

                el.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => doSearch(this.value), 300);
                });
            });
        })();
    </script>

</x-app-layout>