<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="asumTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e;">No.</th>
                    <th class="text-white" style="background:#2a3d5e;">Nama Tertanggung</th>
                    <!-- <th class="text-white" style="background:#2a3d5e;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Bulan STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal DOL</th>
                    <th class="text-white" style="background:#2a3d5e;">Jangka Waktu Awal</th>
                    <th class="text-white" style="background:#2a3d5e;">Jangka Waktu Akhir</th>
                    <th class="text-white" style="background:#2a3d5e;">Penyebab Klaim</th>
                    <th class="text-white" style="background:#2a3d5e;">Plafond</th>
                    <th class="text-white" style="background:#2a3d5e;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e;">Status</th>
                    <th class="text-white" style="background:#2a3d5e;">Tindak Lanjut</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Status Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Persetujuan / Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Persetujuan / Penolakan</th> -->
                    <th class="text-white" style="background:#2a3d5e;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($asums as $index => $asum)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $asum->nama_tertanggung }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editAsumModal{{ $asum->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST"
                                  action="{{ route('asums.destroy', $asum) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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

<!-- ================= EDIT MODALS (ORDER MATCHES THEAD) ================= -->
@foreach($asums as $asum)
<div class="modal fade" id="editAsumModal{{ $asum->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('asums.update', $asum) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nama Tertanggung</label><input name="nama_tertanggung" class="form-control" value="{{ $asum->nama_tertanggung }}" required></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
