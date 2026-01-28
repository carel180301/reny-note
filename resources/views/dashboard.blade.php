<x-app-layout>
    <div class="container-fluid px-2 px-md-4">
        {{-- HEADER ROW --}}
        <div class="row align-items-center mb-2 position-relative">
            {{-- LEFT: FILTERS --}}
            <div class="col-auto mt-5">
                @if(request('table') === 'bri')
                    <div class="d-flex gap-2 flex-wrap">
                        <!-- Status Filter -->
                        <!-- <div class="dropdown"> -->
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Status
                            </button> -->
                            <!-- <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'terima'])) }}">
                                        Terima
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'tolak'])) }}">
                                        Tolak
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'proses_analisa'])) }}">
                                        Proses Analisa
                                    </a>
                                </li>
                            </ul> -->
                        <!-- </div> -->

                        <!-- Status Sistem Filter -->
                        <!-- <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                Status Sistem
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'done'])) }}">
                                        Done
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'not_done'])) }}">
                                        Not Done
                                    </a>
                                </li>
                            </ul>
                        </div> -->

                        <!-- Reset -->
                        <!-- <a href="{{ route('dashboard', ['table' => 'bri']) }}" class="btn btn-outline-danger">
                            Reset
                        </a> -->
                    </div>
                @endif

                @if(request('table') === 'mandiri')
                    <div class="d-flex gap-2 flex-wrap">
                        <!-- Status Filter -->
                        <!-- <div class="dropdown"> -->
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Status
                            </button> -->
                            <!-- <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'terima'])) }}">
                                        Terima
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'tolak'])) }}">
                                        Tolak
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'proses_analisa'])) }}">
                                        Proses Analisa
                                    </a>
                                </li>
                            </ul> -->
                        <!-- </div> -->

                        <!-- Status Sistem Filter -->
                        <!-- <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                Status Sistem
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'done'])) }}">
                                        Done
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'not_done'])) }}">
                                        Not Done
                                    </a>
                                </li>
                            </ul>
                        </div> -->

                        <!-- Reset -->
                        <!-- <a href="{{ route('dashboard', ['table' => 'bri']) }}" class="btn btn-outline-danger">
                            Reset
                        </a> -->
                    </div>
                @endif

                @if(request('table') === 'bankjatim')
                    <div class="d-flex gap-2 flex-wrap">
                        <!-- Status Filter -->
                        <!-- <div class="dropdown"> -->
                            <!-- <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                Status
                            </button> -->
                            <!-- <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'terima'])) }}">
                                        Terima
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'tolak'])) }}">
                                        Tolak
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status' => 'proses_analisa'])) }}">
                                        Proses Analisa
                                    </a>
                                </li>
                            </ul> -->
                        <!-- </div> -->

                        <!-- Status Sistem Filter -->
                        <!-- <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                Status Sistem
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'done'])) }}">
                                        Done
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item"
                                    href="{{ route('dashboard', array_merge(request()->query(), ['status_sistem' => 'not_done'])) }}">
                                        Not Done
                                    </a>
                                </li>
                            </ul>
                        </div> -->

                        <!-- Reset -->
                        <!-- <a href="{{ route('dashboard', ['table' => 'bri']) }}" class="btn btn-outline-danger">
                            Reset
                        </a> -->
                    </div>
                @endif
            </div>

            {{-- CENTER: TITLE --}}
            @if(request('table'))
                <h2 class="mb-0 position-absolute start-50 translate-middle-x text-center" style="top: 50%; pointer-events: none;">
                    Daftar Klaim <strong>{{ strtoupper(request('table')) }}</strong>
                </h2>
            @endif

            {{-- RIGHT: EMPTY (keeps title centered) --}}
            <div class="col-auto"></div>
        </div>

        <!-- {{-- ACTIVE FILTER BADGES --}} -->
        <!-- @if(request()->except('table'))
            <div class="mb-3">
                <span class="text-muted me-2">Filters:</span>
                @foreach(request()->except('table') as $key => $value)
                    <span class="badge bg-secondary me-1">
                        {{ ucfirst(str_replace('_',' ',$key)) }}: {{ $value }}
                    </span>
                @endforeach
            </div>
        @endif -->

        <div class="bg-white shadow-sm rounded px-1">
            @if(request('table') === 'bri')
                <x-bri-table :bris="$bris" />
            @endif

            @if(request('table') === 'mandiri')
                <x-mandiri-table :mandiris="$mandiris" />
            @endif

            @if(request('table') === 'bankjatim')
                <x-bankjatim-table :bankjatims="$bankjatims" />
            @endif
        </div>
    </div>

    <!-- Add BRI Modal-->
    <div class="modal fade" id="addBriModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Klaim BRI</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('bris.store') }}">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            <div class="mb-3">
                                <label class="form-label">Unit</label>
                                <input name="unit" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cabang Bank</label>
                                <input name="cabang_bank" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama Debitur</label>
                                <input name="nama_debitur" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nomor Rekening</label>
                                <input name="nomor_rekening" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nilai Tuntutan Klaim</label>
                                <input name="nilai_tuntutan_klaim" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Klaim Diterima</label>
                                <input type="date" name="tanggal_klaim_diterima" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tanggal Klaim Masuk Portal</label>
                                <input type="date" name="tanggal_klaim_masuk_portal" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="" disabled selected>Pilih Status</option>
                                    <option value="batal">Batal</option>
                                    <option value="disetujui">Disetujui</option>
                                    <option value="pending">Pending</option>
                                    <option value="regist">Regist</option>
                                    <option value="suspect">Suspect</option>
                                    <option value="tamdat">Tamdat</option>
                                    <option value="tolak">Tolak</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tambahan Data</label>
                                <input name="tambahan_data" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Date Update</label>
                                <input type="date" name="date_update" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">No Box</label>
                                <input name="nomor_box" class="form-control">
                            </div>

                            <!-- <div class="mb-3">
                                <label class="form-label">Tanggal Polis</label>
                                <input type="date" name="tanggal_polis" class="form-control" required>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="" disabled selected>Select status</option>
                                    <option value="terima">Terima</option>
                                    <option value="tolak">Tolak</option>
                                    <option value="proses_analisa">Proses Analisa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Currency</label>
                                <select name="currency" class="form-select">
                                    <option>IDR</option>
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>SGD</option>
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

    <!-- Add Mandiri Modal-->
    <div class="modal fade" id="addMandiriModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Klaim Mandiri</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('mandiris.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Uker</label>
                            <input name="uker" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Debitur</label>
                            <input name="nama_debitur" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Rekening</label>
                            <input name="nomor_rekening" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Tuntutan</label>
                            <input name="tuntutan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">NET Klaim</label>
                            <input name="net_klaim" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Klaim Diajukan</label>
                            <input type="date" name="tanggal_klaim_diajukan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select" required>
                                <option value="" disabled selected>Pilih Status</option>
                                <option value="batal">Batal</option>
                                <option value="disetujui">Disetujui</option>
                                <option value="pending">Pending</option>
                                <option value="regist">Regist</option>
                                <option value="suspect">Suspect</option>
                                <option value="tamdat">Tamdat</option>
                                <option value="tolak">Tolak</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <input name="keterangan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Kekurangan_data</label>
                            <input name="kekurangan_data" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Update</label>
                            <input type="date" name="tanggal_update" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Box</label>
                            <input name="nomor_box" class="form-control">
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Cabang Bank</label>
                            <input name="cabang_bank" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nilai Tuntutan Klaim</label>
                            <input name="nilai_tuntutan_klaim" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Klaim Masuk Portal</label>
                            <input type="date" name="tanggal_klaim_masuk_portal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tambahan Data</label>
                            <input name="tambahan_data" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Date Update</label>
                            <input type="date" name="date_update" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No Box</label>
                            <input name="nomor_box" class="form-control">
                        </div> -->

                        <!-- <div class="mb-3">
                            <label class="form-label">Posisi</label>
                            <select name="posisi" class="form-select" required>
                                <option value="" disabled selected>Pilih Posisi</option>
                                <option value="member">Member</option>
                                <option value="non member">Non Member</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input type="date" name="tanggal_polis" class="form-control" required>
                        </div> -->

                    <div class="modal-footer">
                        <button class="btn btn-primary d-block mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('modals')
    <div class="modal fade" id="addBankjatimModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Klaim Bank Jatim</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('bankjatims.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Cabang Bank</label>
                            <input name="cabang_bank" class="form-control">
                        </div>
                           <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input name="nama" class="form-control">
                        </div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input name="nama" class="form-control">
                    </div> -->

                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endpush



    <!-- Upload AKM Modal -->
    <!-- <div class="modal fade" id="uploadBriModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Upload Excel</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST"
                    action="{{ route('bris.upload') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">File Excel</label>
                            <input type="file"
                                name="file"
                                class="form-control"
                                accept=".xls,.xlsx"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary d-block mx-auto">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->

    <!-- AUTO-FORMAT DATE-->
    <script>
        function formatDateInput(value) {
            value = value.replace(/\D/g, "");

            if (value.length >= 2) value = value.slice(0,2) + "/" + value.slice(2);
            if (value.length >= 5) value = value.slice(0,5) + "/" + value.slice(5,9);

            return value.slice(0, 10);
        }

        function normalizePastedDate(text) {
            text = text.replace(/\D/g, "");
            if (text.length === 8) {
                return text.slice(0,2) + "/" + text.slice(2,4) + "/" + text.slice(4);
            }
            return text;
        }

        document.addEventListener("input", function (e) {
            if (e.target.classList.contains("date-input")) {
                e.target.value = formatDateInput(e.target.value);
            }
        });

        document.addEventListener("paste", function (e) {
            if (e.target.classList.contains("date-input")) {
                e.preventDefault();
                let paste = (e.clipboardData || window.clipboardData).getData("text");
                e.target.value = normalizePastedDate(paste);
                e.target.value = formatDateInput(e.target.value);
            }
        });

        /* LIVE SEARCH */
        (function() {
            let searchTimeout = null;

            function doSearch(q) {
                const table = new URLSearchParams(window.location.search).get('table');

                let url = '/bris/search';

                if (table === 'mandiri') {
                    url = '/mandiris/search';
                } else if (table === 'bankjatim') {
                    url = '/bankjatims/search';
                }

                fetch(url + '?q=' + encodeURIComponent(q))
                    .then(res => res.text())
                    .then(html => {
                        const container = document.getElementById(table + 'Table');
                        if (container) container.outerHTML = html;
                    });
            }

            const desktopInput = document.getElementById('searchInput');
            if (desktopInput) {
                desktopInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => doSearch(this.value), 300);
                });
            }

            const mobileInput = document.getElementById('searchInputMobile');
            if (mobileInput) {
                mobileInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => doSearch(this.value), 300);
                });
            }
        })();
    </script>

    <script>
        function sendEmail(id) {
            if (!confirm("Kirim email reminder untuk klaim ini?")) return;

            fetch(`/bri/${id}/send-email`)
                .then(() => {
                    window.location.reload();
                })
                .catch(err => {
                    alert("Gagal mengirim email");
                    console.error(err);
                });
        }
    </script>

    <script>
    function sendEmail(id) {
        if (!confirm("Kirim email reminder untuk klaim ini?")) return;

        fetch(`/bri/${id}/send-email`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'ok') {
                    window.location.reload();
                }
            })
            .catch(err => {
                alert("Gagal mengirim email");
                console.error(err);
            });
    }
</script>

<script>
    function formatCurrencyInput(value) {
        if (value === "") return "";

        // If user starts with comma, convert to "0,"
        if (value.startsWith(",")) {
            value = "0" + value;
        }

        // Split on comma
        let parts = value.split(",", 2);

        // Extract digits in each part
        let intPart = parts[0].replace(/\D/g, "");
        let decPart = parts[1] ? parts[1].replace(/\D/g, "").slice(0, 2) : "";

        // If somehow everything got deleted, return empty
        if (!intPart && !decPart) return "";

        // Add thousand separators to integer part
        if (intPart.length > 0) {
            intPart = intPart.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // If user typed a trailing comma, keep it
        if (value.endsWith(",") && decPart === "") {
            return intPart + ",";
        }

        // Rebuild number
        return decPart ? intPart + "," + decPart : intPart;
    }

    document.addEventListener("input", function(e) {
        if (e.target.classList.contains("outstanding-input")) {
            e.target.value = formatCurrencyInput(e.target.value);
        }
    });

    document.addEventListener("paste", function(e) {
        if (e.target.classList.contains("outstanding-input")) {
            e.preventDefault();
            let paste = (e.clipboardData || window.clipboardData).getData("text");
            e.target.value = formatCurrencyInput(paste);
        }
    });
</script>
</x-app-layout>
