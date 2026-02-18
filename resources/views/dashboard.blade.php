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

            <div class="d-flex justify-content-center mb-0 mt-4 mt-md-5 px-2">
                <form method="GET" action="{{ route('dashboard') }}"
                    class="d-flex flex-wrap justify-content-center gap-2 w-100 w-md-auto">
                    <input type="hidden" name="table" value="pantry">
                    <div class="d-flex gap-2 flex-nowrap">
                    <button class="btn btn-sm btn-primary">Search</button>
                    <a href="{{ route('dashboard', ['table' => 'pantry']) }}" class="btn btn-sm btn-danger">Reset</a>
                    </div>
                </form>
            </div>

        <div class="bg-white shadow-sm rounded px-1 mt-4">

            @switch(request('table'))
                @case('pantry')
                    <x-pantry-table :pantrys="$pantrys" />
                    @break
            @endswitch
        </div>
    </div>


    {{-- ================= MODALS ================= --}}
    {{--Pantry Modal --}}
    <div class="modal fade" id="addPantryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pantry</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" action="{{ route('pantrys.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Produk</label>
                            <input name="produk" class="form-control">
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
                    // bri: '/bris/search',
                    // mandiri: '/mandiris/search',
                    // bankjatim: '/bankjatims/search',
                    // btn: '/btns/search',
                    pantry: '/pantrys/search'
                };

                let url = urlMap[table] ?? '/pantrys/search';

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