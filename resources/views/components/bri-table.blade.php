<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="briTable">
    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Unit</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Klaim Diterima</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tanggal Klaim Masuk Portal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Date Update</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">No Box</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($bris as $index => $bri)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $bri->unit }}</td>
                    <td class="text-center">{{ $bri->cabang_bank }}</td>
                    <td class="text-center">{{ $bri->nama_debitur }}</td>
                    <td class="text-center">{{ $bri->nomor_rekening }}</td>
                    <td class="text-center">{{ $bri->nilai_tuntutan_klaim }}</td>

                    <!-- FIXED DATE FORMAT FOR TABLE -->
                    <td class="text-center">
                        {{ $bri->tanggal_klaim_diterima ? \Carbon\Carbon::parse($bri->tanggal_klaim_diterima)->format('d/m/Y') : '' }}
                    </td>
                    <td class="text-center">
                        {{ $bri->tanggal_klaim_masuk_portal ? \Carbon\Carbon::parse($bri->tanggal_klaim_masuk_portal)->format('d/m/Y') : '' }}
                    </td>

                    <td class="text-center">{{ $bri->status }}</td>
                    <td class="text-center">{{ $bri->tambahan_data }}</td>

                    <td class="text-center">
                        {{ $bri->date_update ? \Carbon\Carbon::parse($bri->date_update)->format('d/m/Y') : '' }}
                    </td>

                    <td class="text-center">{{ $bri->nomor_box }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <button class="btn p-0 text-warning" data-bs-toggle="modal" data-bs-target="#editBriModal{{ $bri->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST" action="{{ route('bris.destroy', $bri) }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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
@foreach($bris as $bri)
<div class="modal fade" id="editBriModal{{ $bri->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('bris.update', $bri) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Unit</label><input name="unit" class="form-control" value="{{ $bri->unit }}"></div>
                    <div class="mb-3"><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $bri->cabang_bank }}"></div>
                    <div class="mb-3"><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $bri->nama_debitur }}"></div>
                    <div class="mb-3"><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $bri->nomor_rekening }}"></div>
                    <div class="mb-3"><label class="form-label">Nilai Tuntutan Klaim</label><input name="nilai_tuntutan_klaim" class="form-control" value="{{ $bri->nilai_tuntutan_klaim }}"></div>

                    <!-- CORRECT HTML DATE FORMAT -->
                    <div class="mb-3"><label class="form-label">Tanggal Klaim Diterima</label>
                        <input type="date" name="tanggal_klaim_diterima" class="form-control" value="{{ $bri->tanggal_klaim_diterima }}">
                    </div>

                    <div class="mb-3"><label class="form-label">Tanggal Klaim Masuk Portal</label>
                        <input type="date" name="tanggal_klaim_masuk_portal" class="form-control" value="{{ $bri->tanggal_klaim_masuk_portal }}">
                    </div>

                    <!-- STATUS DROPDOWN FIX -->
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            @foreach (['batal','disetujui','pending','regist','suspect','tamdat','tolak'] as $s)
                                <option value="{{ $s }}" {{ $bri->status == $s ? 'selected' : '' }}>
                                    {{ ucfirst($s) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3"><label class="form-label">Tambahan Data</label><input name="tambahan_data" class="form-control" value="{{ $bri->tambahan_data }}"></div>

                    <div class="mb-3"><label class="form-label">Date Update</label>
                        <input type="date" name="date_update" class="form-control" value="{{ $bri->date_update }}">
                    </div>

                    <div class="mb-3"><label class="form-label">Nomor Box</label><input name="nomor_box" class="form-control" value="{{ $bri->nomor_box }}"></div>
                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
