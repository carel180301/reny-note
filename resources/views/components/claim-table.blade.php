<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="claimTable">
    <div class="table-responsive">

        <table class="table table-hover w-100 align-middle">
            <thead class="bg-primary-dark">
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e;">No.</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Rekening</th>
                    <!-- <th class="text-white" style="background:#2a3d5e;">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Agen / Broker / Ceding</th>
                    <th class="text-white" style="background:#2a3d5e;">Nama Tertanggung</th>
                    <th class="text-white" style="background:#2a3d5e;">WPC</th>
                    <th class="text-white" style="background:#2a3d5e;">E-mail</th>
                    <th class="text-white" style="background:#2a3d5e;">Currency</th>
                    <th class="text-white" style="background:#2a3d5e;">Outstanding</th>
                    <th class="text-white" style="background:#2a3d5e;">Status</th> -->
                    <th class="text-white" style="background:#2a3d5e;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($claims as $index => $claim)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $claim->nomor_rekening }}</td>

                        <div class="d-flex gap-2 justify-content-center">
                            {{-- EDIT --}}
                            <button class="btn p-0 text-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editClaimModal{{ $claim->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            {{-- DELETE --}}
                            <form method="POST" action="{{ route('claim.destroy', $claim) }}" class="delete-form">
                                @csrf
                                @method('delete')
                                <button class="btn p-0 text-danger delete-btn">
                                    <i class="bi bi-trash-fill fs-5"></i>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

{{-- EDIT MODALS --}}
@foreach($claims as $claim)
<div class="modal fade" id="editClaimModal{{ $claim->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('claim.update', $claim) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input class="form-control" name="nomor_rekening" value="{{ $claim->nomor_rekening }}">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach

<script>
document.addEventListener("click", function(e) {
    if (e.target.closest(".delete-btn")) {
        e.preventDefault();
        if (confirm("Yakin ingin menghapus claim ini?")) {
            e.target.closest("form").submit();
        }
    }
});
</script>
