<x-app-layout>
    <style>
        .navbar-collapse {
            display: flex !important;
            flex-basis: auto !important;
        }
        .navbar-toggler {
            z-index: 2000;
        }
    </style>

    <div class="flex-grow">
        <div class="w-full h-full">
            <div class="bg-white shadow-sm h-full">
                <h2 class="text-center">Daftar Piutang</h2>
                {{-- <div class="p-6 text-gray-900"></div> --}}
                    <x-piutang-table :piutangs="$piutangs" />

                    {{-- <br>
                    <a href="{{ route('piutang.index') }}" class="text-blue-500 hover:text-blue-950">Piutang Page</a>
                 --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <!-- SEND EMAIL FUNCTION -->
    <script>
        function sendEmail(id) {
            fetch(`/piutang/${id}/send-email`)
                .then(res => res.text())
                .then(msg => alert(msg))
                .catch(() => alert("Failed to send email"));
        }
    </script>

    <script>
        $(document).on('click', '.editBtn', function () {
            let id = $(this).data('id');
            $('#id').val(id);
            $('#updateBtn').prop('disabled', false);
        });
    </script>

    {{-- <script>
    let searchTimeout = null;

    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(searchTimeout);

        const q = this.value;

        searchTimeout = setTimeout(() => {

            fetch(`/piutang/search?q=` + encodeURIComponent(q))
                .then(res => res.text())
                .then(html => {
                    document.getElementById('piutangTable').innerHTML = html;
                })
                .catch(() => console.log("Search failed"));

        }, 300);
    });
</script> --}}


    <script>
    let searchTimeout = null; 

    document.getElementById('searchInput').addEventListener('input', function() {
        clearTimeout(searchTimeout);

        const q = this.value;

        searchTimeout = setTimeout(() => {

            fetch(`/piutang/search?q=` + encodeURIComponent(q))
                .then(res => res.text())
                .then(html => {
                    document.getElementById('piutangTable').innerHTML = html;
                })
                .catch(() => console.log("Search failed"));

        }, 300);
    });
</script>

<!-- ADD PIUTANG MODAL -->
<div class="modal fade" id="addPiutangModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Add New Piutang</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('piutang.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">COB</label>
                        <input class="form-control" name="cob">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Polis</label>
                        <input class="form-control" name="nomor_polis">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Polis</label>
                        <input type="date" class="form-control" name="tanggal_polis">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Broker</label>
                        <input class="form-control" name="broker">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Tertanggung</label>
                        <input class="form-control" name="nama_tertanggung">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">WPC</label>
                        <input type="date" class="form-control" name="wpc">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Currency</label>
                        <select class="form-select" name="currency">
                            <option value="IDR">IDR</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="SGD">SGD</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Outstanding</label>
                        <input class="form-control" name="outstanding">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</x-app-layout>


