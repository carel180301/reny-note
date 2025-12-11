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
                            <input name="tanggal_polis" class="form-control" placeholder="dd/mm/yyyy">
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
                            <input name="wpc" class="form-control" placeholder="dd/mm/yyyy">
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
                            <input name="outstanding" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


</x-app-layout>
