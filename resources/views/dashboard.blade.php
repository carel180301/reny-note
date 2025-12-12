<x-app-layout>

    <div class="container-fluid px-2 px-md-4">

        <h2 class="text-center sticky-header pt-4">
            Daftar Piutang
        </h2>

        <div class="bg-white shadow-sm rounded px-1">
            <x-piutang-table :piutangs="$piutangs" />
        </div>

    </div>


    <!-- ADD PIUTANG MODAL (Required for the + button) -->
    <div class="modal fade" id="addPiutangModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Piutang</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('piutang.store') }}">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">COB</label>
                            <input name="cob" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polis</label>
                            <input name="nomor_polis" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Polis</label>
                            <input name="tanggal_polis" class="form-control date-input" placeholder="dd/mm/yyyy">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Broker</label>
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

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary d-block mx-auto">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- AUTO-FORMAT DATE SCRIPT -->
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

        /* LIVE SEARCH FIX */
        (function() {
            let searchTimeout = null;

            function doSearch(q) {
                fetch(`/piutang/search?q=` + encodeURIComponent(q))
                    .then(res => res.text())
                    .then(html => {
                        const container = document.getElementById('piutangTable');
                        if (container) container.outerHTML = html;
                    })
                    .catch(() => console.log("Search failed"));
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
            if (!confirm("Kirim email reminder untuk piutang ini?")) return;

            fetch(`/piutang/${id}/send-email`)
                .then(() => {
                    // NO MORE ALERT — PAGE RELOADS AND SHOWS SUCCESS ALERT FROM SESSION
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
        if (!confirm("Kirim email reminder untuk piutang ini?")) return;

        fetch(`/piutang/${id}/send-email`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'ok') {
                    // Reload so session('success') can show in the blade alert
                    window.location.reload();
                }
            })
            .catch(err => {
                alert("Gagal mengirim email");
                console.error(err);
            });
    }
</script>
<!-- <script>
    function sendEmail(id) {
        // ❌ removed confirm()
        // now email sends instantly

        fetch(`/piutang/${id}/send-email`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'ok') {
                    // Reload so session('success') can show in the blade alert
                    window.location.reload();
                }
            })
            .catch(err => {
                alert("Gagal mengirim email");
                console.error(err);
            });
    }
</script> -->

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
