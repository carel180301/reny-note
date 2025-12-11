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

    <div class="container-fluid px-2 px-md-4">

        <h2 class="text-center sticky-header pt-4">
            Daftar Piutang
        </h2>

        <div class="bg-white shadow-sm rounded px-1">
            <x-piutang-table :piutangs="$piutangs" />
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

    <!-- Unified Search -->
    <script>
    (function() {
        let searchTimeout = null;

        function doSearch(q) {
            fetch(`/piutang/search?q=` + encodeURIComponent(q))
                .then(res => res.text())
                .then(html => {
                    const container = document.getElementById('piutangTable');
                    if (container) container.innerHTML = html;
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

</x-app-layout>
