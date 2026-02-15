<x-app-layout>
    <div class="container-fluid px-2 px-md-4">
        {{-- HEADER ROW --}}
        <div class="row align-items-center mb-0 position-relative">
            @if(request('table'))
                <h2 class="mb-0 text-center w-100 mt-3 mt-md-0">
                    Daftar Klaim <strong>{{ strtoupper(request('table')) }}</strong>
                </h2>
            @endif
            <div class="col-auto"></div>
        </div>

        {{-- ================= STATUS FILTER ================= --}}
        @if(request('table') === 'bri')
            <!-- <div class="d-flex flex-wrap gap-2 mb-1 mt-5"> -->
            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
                <form method="GET" action="{{ route('dashboard') }}" class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">
                    <input type="hidden" name="table" value="bri">

                    {{-- STATUS --}}
                    <select name="status" class="form-select form-select-sm" style="width:160px;">
                        <option value="">Semua Status</option>
                        @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>

                    @php
$intervals = [
    '' => 'Semua Waktu',

    // ===== BELAKANGAN =====
    '-7' => '7 hari belakangan',
    '-14' => '14 hari belakangan',
    '-21' => '21 hari belakangan',
    '-30' => '30 hari belakangan',
    '-90' => '90 hari belakangan',
    '-180' => '180 hari belakangan',
    '-365' => '365 hari belakangan',

    // ===== KE DEPAN =====
    '7' => '7 hari ke depan',
    '14' => '14 hari ke depan',
    '21' => '21 hari ke depan',
    '30' => '30 hari ke depan',
    '90' => '90 hari ke depan',
    '180' => '180 hari ke depan',
    '365' => '365 hari ke depan',
];
@endphp


                    {{-- Tanggal Klaim Diterima --}}
                    <select name="diterima" class="form-select form-select-sm" style="width:150px;">
                        @foreach($intervals as $val => $label)
                            <option value="{{ $val }}" {{ request('diterima') == $val ? 'selected' : '' }}>
                            Diterima: {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Tanggal Klaim Masuk Portal --}}
                    <select name="portal" class="form-select form-select-sm" style="width:150px;">
                        @foreach($intervals as $val => $label)
                            <option value="{{ $val }}" {{ request('portal') == $val ? 'selected' : '' }}>
                        Masuk Portal: {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Date Update --}}
                    <select name="update" class="form-select form-select-sm" style="width:150px;">
                        @foreach($intervals as $val => $label)
                            <option value="{{ $val }}" {{ request('update') == $val ? 'selected' : '' }}>
                                Date Update: {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    <div class="d-flex gap-2 flex-nowrap">
                        <button class="btn btn-sm btn-primary">Search</button>

                        <a href="{{ route('dashboard', ['table' => 'bri']) }}"
                        class="btn btn-sm btn-danger">
                            Reset
                        </a>
                    </div>

                </form>
            </div>
        @endif

        @if(request('table') === 'mandiri')
            @php
                $intervals = [
                    '' => 'Semua Waktu',
                    '7' => '7 Hari',
                    '14' => '14 Hari',
                    '21' => '21 Hari',
                    '30' => '1 Bulan',
                    '90' => '3 Bulan',
                    '180' => '6 Bulan',
                    '365' => '1 tahun'
                ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
                <form method="GET" action="{{ route('dashboard') }}"
                    class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">

                    <input type="hidden" name="table" value="mandiri">

                    {{-- STATUS --}}
                    <select name="status" class="form-select form-select-sm" style="width:160px;">
                        <option value="">Semua Status</option>
                        @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>
                                {{ ucfirst($s) }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Tanggal Klaim D
                    diajukan --}}
                    <select name="diajukan" class="form-select form-select-sm" style="width:150px;">
                        @foreach($intervals as $val => $label)
                            <option value="{{ $val }}" {{ request('diajukan') == $val ? 'selected' : '' }}>
                                Diajukan: {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    {{-- Tanggal Update --}}
                    <select name="update" class="form-select form-select-sm" style="width:150px;">
                        @foreach($intervals as $val => $label)
                            <option value="{{ $val }}" {{ request('update') == $val ? 'selected' : '' }}>
                                Tanggal Update: {{ $label }}
                            </option>
                        @endforeach
                    </select>

                    {{-- BUTTONS (always side-by-side) --}}
                    <div class="d-flex gap-2 flex-nowrap">
                        <button class="btn btn-sm btn-primary">Search</button>

                        <a href="{{ route('dashboard', ['table' => 'mandiri']) }}"
                        class="btn btn-sm btn-danger">
                            Reset
                        </a>
                    </div>
                </form>
            </div>
        @endif

        @if(request('table') === 'bankjatim')
            @php
            $intervals = [
                '' => 'Semua Waktu',
                '7' => '7 Hari',
                '14' => '14 Hari',
                '21' => '21 Hari',
                '30' => '1 Bulan',
                '90' => '3 Bulan',
                '180' => '6 Bulan',
                '365' => '1 tahun'
            ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
            <form method="GET" action="{{ route('dashboard') }}"
                class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">

            <input type="hidden" name="table" value="bankjatim">

            <select name="status" class="form-select form-select-sm" style="width:160px;">
            <option value="">Semua Status</option>
            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
            </select>

            <select name="dokumen_diterima" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('dokumen_diterima') == $val ? 'selected' : '' }}>
            Dokumen Diterima: {{ $label }}
            </option>
            @endforeach
            </select>

            <select name="disetujui" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('disetujui') == $val ? 'selected' : '' }}>
            Tanggal Disetujui: {{ $label }}
            </option>
            @endforeach
            </select>

            <div class="d-flex gap-2 flex-nowrap">
            <button class="btn btn-sm btn-primary">Search</button>
            <a href="{{ route('dashboard', ['table' => 'bankjatim']) }}" class="btn btn-sm btn-danger">Reset</a>
            </div>

            </form>
            </div>
        @endif

        @if(request('table') === 'bukopin')
            @php
            $intervals = [
                '' => 'Semua Waktu',
                '7' => '7 Hari',
                '14' => '14 Hari',
                '21' => '21 Hari',
                '30' => '1 Bulan',
                '90' => '3 Bulan',
                '180' => '6 Bulan',
                '365' => '1 tahun'
            ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
            <form method="GET" action="{{ route('dashboard') }}" class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">

            <input type="hidden" name="table" value="bukopin">

            <select name="status" class="form-select form-select-sm" style="width:160px;">
            <option value="">Semua Status</option>
            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
            </select>

            <select name="jw_awal" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('jw_awal') == $val ? 'selected' : '' }}>
            JW Awal: {{ $label }}
            </option>
            @endforeach
            </select>

            <select name="jw_akhir" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('jw_akhir') == $val ? 'selected' : '' }}>
            JW Akhir: {{ $label }}
            </option>
            @endforeach
            </select>

            <select name="diterima" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('diterima') == $val ? 'selected' : '' }}>
            Tanggal Diterima: {{ $label }}
            </option>
            @endforeach
            </select>

            <select name="tanggal_cl" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_cl') == $val ? 'selected' : '' }}>
            CL: {{ $label }}
            </option>
            @endforeach
            </select>

            <div class="d-flex gap-2 flex-nowrap">
            <button class="btn btn-sm btn-primary">Search</button>
            <a href="{{ route('dashboard', ['table' => 'bankjatim']) }}" class="btn btn-sm btn-danger">Reset</a>
            </div>

            </form>
            </div>
        @endif

        @if(request('table') === 'btn')
            @php
            $intervals = [
                '' => 'Semua Waktu',
                '7' => '7 Hari',
                '14' => '14 Hari',
                '21' => '21 Hari',
                '30' => '1 Bulan',
                '90' => '3 Bulan',
                '180' => '6 Bulan',
                '365' => '1 tahun'
            ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
            <form method="GET" action="{{ route('dashboard') }}"
                class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">

            <input type="hidden" name="table" value="btn">

            <select name="status" class="form-select form-select-sm" style="width:160px;">
            <option value="">Semua Status</option>
            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
            </select>

            <select name="dokumen_diterima" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('dokumen_diterima') == $val ? 'selected' : '' }}>Dokumen Diterima: {{ $label }}</option>
            @endforeach
            </select>

            <select name="update" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('update') == $val ? 'selected' : '' }}>Date Update: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_memo" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_memo') == $val ? 'selected' : '' }}>Tanggal Memo: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pembayaran_klaim" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pembayaran_klaim') == $val ? 'selected' : '' }}>Pembayaran Klaim: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pelunasan" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pelunasan') == $val ? 'selected' : '' }}>Pelunasan: {{ $label }}</option>
            @endforeach
            </select>

            <div class="d-flex gap-2 flex-nowrap">
            <button class="btn btn-sm btn-primary">Search</button>
            <a href="{{ route('dashboard', ['table' => 'btn']) }}" class="btn btn-sm btn-danger">Reset</a>
            </div>

            </form>
            </div>
        @endif

        @if(request('table') === 'bni')
            @php
            $intervals = [
                '' => 'Semua Waktu',
                '7' => '7 Hari',
                '14' => '14 Hari',
                '21' => '21 Hari',
                '30' => '1 Bulan',
                '90' => '3 Bulan',
                '180' => '6 Bulan',
                '365' => '1 tahun'
            ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
            <form method="GET" action="{{ route('dashboard') }}" class="w-100">

            <div class="d-flex flex-wrap justify-content-center gap-2">

            <input type="hidden" name="table" value="bni">

            <select name="status" class="form-select form-select-sm" style="width:160px;">
            <option value="">Semua Status</option>
            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
            </select>

            <select name="dokumen_diterima" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('dokumen_diterima') == $val ? 'selected' : '' }}>Dokumen Diterima: {{ $label }}</option>
            @endforeach
            </select>

            <select name="jw_awal" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('jw_awal') == $val ? 'selected' : '' }}>JW Awal: {{ $label }}</option>
            @endforeach
            </select>

            <select name="jw_akhir" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('jw_akhir') == $val ? 'selected' : '' }}>JW Akhir: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_cl" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_cl') == $val ? 'selected' : '' }}>CL: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_memo" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_memo') == $val ? 'selected' : '' }}>Memo: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pembayaran_klaim" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pembayaran_klaim') == $val ? 'selected' : '' }}>Pembayaran: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pelunasan" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pelunasan') == $val ? 'selected' : '' }}>Pelunasan: {{ $label }}</option>
            @endforeach
            </select>

            </div>

            <div class="d-flex justify-content-center gap-2 mt-2 flex-nowrap">
            <button class="btn btn-sm btn-primary">Search</button>
            <a href="{{ route('dashboard', ['table' => 'bni']) }}" class="btn btn-sm btn-danger">Reset</a>
            </div>

            </form>
            </div>
        @endif

        @if(request('table') === 'bjb')
            @php
            $intervals = [
                '' => 'Semua Waktu',
                '7' => '7 Hari',
                '14' => '14 Hari',
                '21' => '21 Hari',
                '30' => '1 Bulan',
                '90' => '3 Bulan',
                '180' => '6 Bulan',
                '365' => '1 tahun'
            ];
            @endphp

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
            <form method="GET" action="{{ route('dashboard') }}"
                class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">

            <input type="hidden" name="table" value="bjb">

            <select name="status" class="form-select form-select-sm" style="width:160px;">
            <option value="">Semua Status</option>
            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
            <option value="{{ $s }}" {{ request('status') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
            </select>

            <select name="diterima" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('diterima') == $val ? 'selected' : '' }}>Diterima: {{ $label }}</option>
            @endforeach
            </select>

            <select name="update" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('update') == $val ? 'selected' : '' }}>Date Update: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_memo" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_memo') == $val ? 'selected' : '' }}>Memo: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pembayaran_klaim" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pembayaran_klaim') == $val ? 'selected' : '' }}>Pembayaran: {{ $label }}</option>
            @endforeach
            </select>

            <select name="tanggal_pelunasan" class="form-select form-select-sm" style="width:150px;">
            @foreach($intervals as $val => $label)
            <option value="{{ $val }}" {{ request('tanggal_pelunasan') == $val ? 'selected' : '' }}>Pelunasan: {{ $label }}</option>
            @endforeach
            </select>

            <div class="d-flex gap-2 flex-nowrap">
            <button class="btn btn-sm btn-primary">Search</button>
            <a href="{{ route('dashboard', ['table' => 'bjb']) }}" class="btn btn-sm btn-danger">Reset</a>
            </div>

            </form>
            </div>
        @endif

        <div class="bg-white shadow-sm rounded px-1 mt-4">

            @switch(request('table'))
                @case('datapantry')
                    <x-datapantry-table :datapantries="$datapantries" />
                    @break
            @endswitch
        </div>
    </div>


    {{-- ================= MODALS ================= --}}
    {{-- BJB MODAL --}}
    <div class="modal fade" id="addDatapantryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pantry</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('datapantries.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Cabang Bank</label>
                            <input name="cabang_bank" class="form-control">
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Tanggal Dokumen Diterima</label>
                            <input type="date" name="tanggal_dokumen_diterima" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                @foreach (['batal','setuju','pending','regist','suspect','tamdat','tolak'] as $s)
                                    <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                                @endforeach
                            </select>
                        </div> -->
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary d-block mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
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