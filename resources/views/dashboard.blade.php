<x-app-layout>
    <div class="container-fluid px-2 px-md-4">
        <!-- <h2 class="text-center sticky-header pt-4">Daftar Klaim</h2> -->

        {{-- HEADER ROW --}}
        <div class="row align-items-center mb-2 position-relative">

            {{-- LEFT: FILTERS --}}
            <div class="col-auto mt-5">
                @if(request('table') === 'akm')
                    <div class="d-flex gap-2 flex-wrap">

                        <!-- Status Filter -->
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                Status
                            </button>
                            <ul class="dropdown-menu">
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
                            </ul>
                        </div>

                        <!-- Status Sistem Filter -->
                        <div class="dropdown">
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
                        </div>

                        <!-- Reset -->
                        <a href="{{ route('dashboard', ['table' => 'akm']) }}"
                        class="btn btn-outline-danger">
                            Reset
                        </a>

                    </div>
                @endif
            </div>

            {{-- CENTER: TITLE --}}
            @if(request('table'))
                <h2 class="mb-0 position-absolute start-50 translate-middle-x text-center"
                style="top: 50%; pointer-events: none;">

                    Daftar Klaim <strong>{{ strtoupper(request('table')) }}</strong>
                </h2>
            @endif

            {{-- RIGHT: EMPTY (keeps title centered) --}}
            <div class="col-auto"></div>

        </div>

        {{-- ACTIVE FILTER BADGES --}}
        @if(request()->except('table'))
            <div class="mb-3">
                <span class="text-muted me-2">Filters:</span>
                @foreach(request()->except('table') as $key => $value)
                    <span class="badge bg-secondary me-1">
                        {{ ucfirst(str_replace('_',' ',$key)) }}: {{ $value }}
                    </span>
                @endforeach
            </div>
        @endif

        <div class="bg-white shadow-sm rounded px-1">
            @if(request('table') === 'akm')
                <x-akm-table :akms="$akms" />
            @endif

            @if(request('table') === 'asum')
                <x-asum-table :asums="$asums" />
            @endif
        </div>

    </div>

    <!-- Add AKM Modal-->
    <div class="modal fade" id="addAkmModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Klaim AKM</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('akms.store') }}">
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
                            <label class="form-label">Nama Debitur</label>
                            <input name="nama_debitur" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cabang Bank</label>
                            <input name="cabang_bank" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Rekening</label>
                            <input name="nomor_rekening" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input name="nomor_polis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input type="date" name="tanggal_polis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor STGR</label>
                            <input name="nomor_stgr" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal STGR</label>
                            <input type="date" name="tanggal_stgr" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Bulan STGR</label>
                            <input name="bulan_stgr" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal DOL</label>
                            <input type="date" name="tanggal_dol" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu Awal</label>
                            <input type="date" name="jangka_waktu_awal" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Jangka Waktu Akhir</label>
                            <input type="date" name="jangka_waktu_akhir" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penyebab Klaim</label>
                            <input name="penyebab_klaim" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Plafond</label>
                            <input name="plafond" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nilai Tuntutan Klaim</label>
                            <input name="nilai_tuntutan_klaim" class="form-control" required>
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
                            <label class="form-label">Tindak Lanjut</label>
                            <input name="tindak_lanjut" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Surat Tambahan Data</label>
                            <input name="nomor_surat_tambahan_data" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Surat Tambahan Data</label>
                            <input type="date" name="tanggal_surat_tambahan_data" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Register Sistem</label>
                            <input name="nomor_register_sistem" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Register Sistem</label>
                            <input type="date" name="tanggal_register_sistem" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status Sistem</label>
                            <select name="status_sistem" class="form-select"  required>
                                <option value="" disabled selected>Select status</option>
                                <option value="done">Done</option>
                                <option value="not_done">Not Done Yet</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Keterangan / Feedback Pemutus</label>
                            <input name="keterangan" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Surat Persetujuan atau Penolakan</label>
                            <input name="nomor_surat_persetujuan_atau_penolakan" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Surat Persetujuan atau Penolakan</label>
                            <input type="date" name="tanggal_surat_persetujuan_atau_penolakan" class="form-control" required>
                        </div>



                        <!-- <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input name="nomor_polis" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input name="tanggal_polis" class="form-control date-input" placeholder="dd/mm/yyyy">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Agen / Broker / Ceding</label>
                            <input name="broker" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Tertanggung</label>
                            <input name="nama_tertanggung" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">WPC</label>
                            <input name="wpc" class="form-control date-input" placeholder="dd/mm/yyyy">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select name="currency" class="form-select">
                                <option>IDR</option>
                                <option>USD</option>
                                <option>EUR</option>
                                <option>SGD</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Outstanding</label>
                            <input name="outstanding" class="form-control outstanding-input">

                        </div> -->

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary d-block mx-auto">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add ASUM Modal-->
    <div class="modal fade" id="addAsumModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Klaim ASUM</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('asums.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Tertanggung</label>
                        <input name="nama_tertanggung" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <select name="posisi" class="form-select" required>
                            <option value="" disabled selected>Pilih Posisi</option>
                            <option value="member">Member</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">COB</label>
                        <input name="cob" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Pekerjaan</label>
                        <input name="nama_pekerjaan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Polis</label>
                        <input name="nomor_polis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Polis</label>
                        <input name="tanggal_polis" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor STGR</label>
                        <input name="nomor_stgr" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal STGR</label>
                        <input name="tanggal_stgr" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bulan STGR</label>
                        <input name="bulan_stgr" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal DOL</label>
                        <input name="tanggal_dol" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jangka Waktu Awal</label>
                        <input name="jangka_waktu_awal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jangka Waktu Akhir</label>
                        <input name="jangka_waktu_akhir" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Penyebab Klaim</label>
                        <input name="penyebab_klaim" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai TSI</label>
                        <input name="nilai_tsi" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Share ASK</label>
                        <input name="share_ask" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Share ASK</label>
                        <input name="nilai_share_ask" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nilai Tuntutan Klaim</label>
                        <input name="nilai_tuntutan_klaim" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="tambahan data">Tambahan Data</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tindak Lanjut</label>
                        <input name="tindak_lanjut" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Surat Tambahan Data</label>
                        <input name="nomor_surat_tambahan_data" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Surat Tambahan Data</label>
                        <input name="tanggal_surat_tambahan_data" class="form-control" required>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Nomor Register Sistem</label>
                        <input name="nomor_register_sistem" class="form-control" required>
                    </div>

                     <div class="mb-3">
                        <label class="form-label">Tanggal Register Sistem</label>
                        <input name="tanggal_register_sistem" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Sistem</label>
                        <select name="status_sistem" class="form-select" required>
                            <option value="" disabled selected>Pilih Status Sistem</option>
                            <option value="">-</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Keterangan / Feedback Pemutus</label>
                        <input name="nilai_tuntutan_klaim" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Persetujuan</label>
                        <input name="tanggal_persetujuan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Claim Settlement</label>
                        <input name="nomor_claim_settlement" class="form-control" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary d-block mx-auto">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Upload AKM Modal -->
    <!-- <div class="modal fade" id="uploadAkmModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Upload Excel</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST"
                    action="{{ route('akms.upload') }}"
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

                let url = '/akms/search';
                // if (table === 'asum') {
                //     url = '/asums/search';
                // }

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

            fetch(`/akm/${id}/send-email`)
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

        fetch(`/akm/${id}/send-email`)
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
