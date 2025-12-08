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
            <div class="bg-white overflow-hidden shadow-sm h-full">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <x-piutang-table :piutangs="$piutangs" />

                    {{-- <br>
                    <a href="{{ route('piutang.index') }}" class="text-blue-500 hover:text-blue-950">Piutang Page</a>
                 --}}
                </div>
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
        let searchTimeout = null;

        document.getElementById('searchInput').addEventListener('keyup', function() {
            clearTimeout(searchTimeout);

            const q = this.value;

            searchTimeout = setTimeout(() => {

                fetch(`/piutang/search?q=` + encodeURIComponent(q))
                    .then(res => res.text())
                    .then(html => {
                        document.querySelector('x-piutang-table').outerHTML = html;
                    })
                    .catch(() => console.log("Search failed"));

            }, 300); // wait 300ms to reduce spam
        });
    </script>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
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
</x-app-layout>


