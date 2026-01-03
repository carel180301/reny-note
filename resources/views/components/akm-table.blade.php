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
                    <th class="text-white" style="background:#2a3d5e;">No.</th>
                    <th class="text-white" style="background:#2a3d5e;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e;">Cabang Bank</th>
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
                    <th class="text-white" style="background:#2a3d5e;">Keterangan / feedback pemutus</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Persetujuan atau Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Persetujuan atau Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($akms as $index => $akm)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $akm->nama_debitur }}</td>
                    <td class="text-center">{{ $akm->cabang_bank }}</td>
                    <td class="text-center">{{ $akm->nomor_rekening }}</td>
                    <td class="text-center">{{ $akm->nomor_polis }}</td>
                    <td class="text-center">{{ $akm->tanggal_polis }}</td>
                    <td class="text-center">{{ $akm->nomor_stgr }}</td>
                    <td class="text-center">{{ $akm->tanggal_stgr }}</td>
                    <td class="text-center">{{ $akm->bulan_stgr }}</td>
                    <td class="text-center">{{ $akm->tanggal_dol }}</td>
                    <td class="text-center">{{ $akm->jangka_waktu_awal }}</td>
                    <td class="text-center">{{ $akm->jangka_waktu_akhir }}</td>
                    <td class="text-center">{{ $akm->penyebab_klaim }}</td>
                    <td class="text-center">{{ $akm->plafond }}</td>
                    <td class="text-center">{{ $akm->nilai_tuntutan_klaim }}</td>

                    <td class="text-center">
                        @php $status = strtolower(trim($akm->status)); @endphp
                        @if($status === 'tolak')
                            <span class="badge bg-danger">tolak</span>
                        @elseif($status === 'terima')
                            <span class="badge bg-success">terima</span>
                        @elseif($status === 'proses analisa')
                            <span class="badge bg-primary">proses analisa</span>
                        @else
                            <span class="badge bg-secondary">unknown</span>
                        @endif
                    </td>

                    <td class="text-center">{{ $akm->tindak_lanjut }}</td>
                    <td class="text-center">{{ $akm->nomor_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $akm->tanggal_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $akm->nomor_register_sistem }}</td>
                    <td class="text-center">{{ $akm->tanggal_register_sistem }}</td>

                    <td class="text-center">
                        @if($akm->status_sistem === 'done')
                            <span class="badge bg-success">Done</span>
                        @else
                            <span class="badge bg-danger">Not done yet</span>
                        @endif
                    </td>

                    <td class="text-center">{{ $akm->keterangan }}</td>
                    <td class="text-center">{{ $akm->nomor_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $akm->tanggal_surat_persetujuan_atau_penolakan }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
                            <!-- ✅ FIX: EDIT LINK -->
                            <button class="btn p-0 text-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editAkmModal{{ $akm->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>


                            <form method="POST"
                                  action="{{ route('akms.destroy', $akm) }}"
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
                <!-- EDIT AKM MODAL -->
<div class="modal fade" id="editAkmModal{{ $akm->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('akms.update', $akm) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Nama Debitur</label>
                        <input name="nama_debitur"
                               class="form-control"
                               value="{{ $akm->nama_debitur }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cabang Bank</label>
                        <input name="cabang_bank"
                               class="form-control"
                               value="{{ $akm->cabang_bank }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Rekening</label>
                        <input name="nomor_rekening"
                               class="form-control"
                               value="{{ $akm->nomor_rekening }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Polis</label>
                        <input name="nomor_polis"
                               class="form-control"
                               value="{{ $akm->nomor_polis }}"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="terima" {{ $akm->status == 'terima' ? 'selected' : '' }}>Terima</option>
                            <option value="tolak" {{ $akm->status == 'tolak' ? 'selected' : '' }}>Tolak</option>
                            <option value="proses_analisa" {{ $akm->status == 'proses_analisa' ? 'selected' : '' }}>Proses Analisa</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Sistem</label>
                        <select name="status_sistem" class="form-select" required>
                            <option value="done" {{ $akm->status_sistem == 'done' ? 'selected' : '' }}>Done</option>
                            <option value="not_done" {{ $akm->status_sistem == 'not_done' ? 'selected' : '' }}>Not Done Yet</option>
                        </select>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>

            @endforeach
            </tbody>
        </table>
    </div>
</div>
