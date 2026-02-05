<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="bukopinTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th> -->
                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor CL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Date Update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Memo Permohonan Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Memo Pembayaran Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Pelunasan Di Bagian Keuangan</th> -->
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bukopins as $index => $bukopin)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bukopin->nama_debitur }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBukopinModal{{ $bukopin->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bukopins.destroy', $bukopin) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn p-0 text-danger">
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

<!-- ================ Edit Modals ================= -->
@foreach($bukopins as $bukopin)
<div class="modal fade" id="editBukopinModal{{ $bukopin->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bukopins.update', $bukopin) }}">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $bukopin->nama_debitur }}"></div>
                </div>

                

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
