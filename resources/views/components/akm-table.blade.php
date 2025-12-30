<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="akmTable">
    <div class="table-responsive">

        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e;">
                        No.
                    </th>
                    <th class="text-white" style="background:#2a3d5e;">
                        Nama Debitur
                    </th>
                    <th class="text-white" style="background:#2a3d5e;">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
            @foreach($akms as $index => $akm)
                <tr>
                    <td class="text-center">
                        {{ $index + 1 }}
                    </td>

                    <td class="text-center">
                        {{ $akm->nama_debitur }}
                    </td>

                    <td class="text-center">
                        <div class="d-inline-flex align-items-center gap-2">
                            {{-- EDIT --}}
                            <button class="btn p-0 text-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editAkmModal{{ $akm->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            {{-- DELETE --}}
                            <form method="POST"
                                  action="{{ route('akms.destroy', $akm) }}"
                                  class="m-0">
                                @csrf
                                @method('DELETE')
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
@foreach($akms as $akm)
<div class="modal fade" id="editAkmModal{{ $akm->id }}">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('akms.update', $akm) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Debitur</label>
                        <input class="form-control"
                               name="nama_debitur"
                               value="{{ $akm->nama_debitur }}">
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">
                            Update
                        </button>
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
        if (confirm("Yakin ingin menghapus AKM ini?")) {
            e.target.closest("form").submit();
        }
    }
});
</script>
