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
    <br>

    <div class="flex-grow">
        <div class="w-full h-full">
            <div class="bg-white shadow-sm h-full">
                <h2 class="text-center sticky-header">Daftar Piutang</h2>

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
                        {{-- <input type="date" class="form-control" name="tanggal_polis"> --}}
                        <input type="text" name="tanggal_polis" class="form-control" placeholder="dd/mm/yyyy">
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
                        {{-- <input type="date" class="form-control" name="wpc"> --}}
                        <input type="text" name="wpc" class="form-control" placeholder="dd/mm/yyyy">
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

<script>
function formatNumberInput(input) {
    let value = input.value;

    // detect if user just typed a comma at the end
    const endsWithComma = value.endsWith(',');

    // remove everything except digits and comma
    value = value.replace(/[^\d,]/g, '');

    // split integer and decimal part
    let parts = value.split(',');

    let integerPart = parts[0];
    let decimalPart = parts[1] || '';

    // format thousands on integer part
    integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

    // if user is still typing decimal comma
    if (endsWithComma && decimalPart.length === 0) {
        input.value = integerPart + ',';
        return;
    }

    // rebuild value fully
    if (decimalPart.length > 0) {
        input.value = integerPart + ',' + decimalPart;
    } else {
        input.value = integerPart;
    }
}

// apply formatter on all fields with name="outstanding"
document.addEventListener('input', function(e) {
    if (e.target.name === 'outstanding') {
        formatNumberInput(e.target);
    }
});
</script>

<script>
function formatDateInput(input) {
    let value = input.value.replace(/[^\d]/g, '');

    // auto insert slashes: dd/mm/yyyy
    if (value.length >= 5) {
        value = value.substring(0,2) + '/' + value.substring(2,4) + '/' + value.substring(4,8);
    } else if (value.length >= 3) {
        value = value.substring(0,2) + '/' + value.substring(2,4);
    }

    input.value = value;
}

document.addEventListener('input', function(e) {
    if (e.target.name === 'tanggal_polis' || e.target.name === 'wpc') {
        formatDateInput(e.target);
    }
});
</script>

<script>
let searchTimeoutMobile = null;

document.getElementById('searchInputMobile').addEventListener('input', function() {
    clearTimeout(searchTimeoutMobile);

    const q = this.value;

    searchTimeoutMobile = setTimeout(() => {

        fetch(`/piutang/search?q=` + encodeURIComponent(q))
            .then(res => res.text())
            .then(html => {
                document.getElementById('piutangTable').innerHTML = html;
            })
            .catch(() => console.log("Mobile search failed"));

    }, 300);
});
</script>


</x-app-layout>


