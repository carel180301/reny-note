<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="bankjatimTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">NET Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Dokumen Diterima</th>

                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tuntutan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Net Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Klaim Diajukan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Kekurangan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">tanggal update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Box</th> -->

                    <!-- <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Klaim Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Klaim Masuk Portal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Date Update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">No Box</th> -->
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bankjatims as $index => $bankjatim)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bankjatim->cabang_bank }}</td>
                    <td class="text-center">{{ $bankjatim->nama }}</td>
                    <td class="text-center">{{ $bankjatim->nomor_rekening }}</td>
                    <td class="text-center">{{ $bankjatim->nilai_tuntutan }}</td>
                    <td class="text-center">{{ $bankjatim->net_klaim }}</td>
                    <td class="text-center">{{ $bankjatim->tanggal_dokumen_diterima }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBankJatimModal{{ $bankjatim->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bankjatims.destroy', $bankjatim) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($bankjatims as $bankjatim)
<div class="modal fade" id="editBankJatimModal{{ $bankjatim->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bankjatims.update', $bankjatim) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bankjatim->cabang_bank }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nama</label><input name="nama" class="form-control" value="{{ $bankjatim->nama }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $bankjatim->nomor_rekening }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Nilai Tuntutan</label><input name="nilai_tuntutan" class="form-control" value="{{ $bankjatim->nilai_tuntutan }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">NET Klaim</label><input name="net_klaim" class="form-control" value="{{ $bankjatim->net_klaim }}"></div>
                </div>

                <div class="modal-body">
                    <div><label class="form-label">Tanggal Dokumen Diterima</label><input name="tanggal_dokumen_diterima" class="form-control" value="{{ $bankjatim->tanggal_dokumen_diterima }}"></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
