<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="akmTable">

    <!-- ================= TABLE ================= -->
    <div class="table-responsive">
        <table class="table table-hover w-100 align-middle">
            <thead>
                <tr class="text-center">
                    <th class="text-white" style="background:#2a3d5e; min-width:100px;">No.</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Nama Debitur</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Cabang Bank</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor Rekening</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor STGR</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal STGR</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Bulan STGR</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal DOL</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Jangka Waktu Awal</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Jangka Waktu Akhir</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Penyebab Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Plafond</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Status</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:300px;">Tindak Lanjut</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Status Sistem</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Nomor Surat Persetujuan / Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Tanggal Surat Persetujuan / Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e; min-width:200px;">Action</th>
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
                            <span class="badge bg-danger">Tolak</span>
                        @elseif($status === 'terima')
                            <span class="badge bg-success">Terima</span>
                        @elseif($status === 'proses_analisa')
                            <span class="badge bg-primary">Proses Analisa</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
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
                            <span class="badge bg-danger">Not Done Yet</span>
                        @endif
                    </td>

                    <td class="text-center">{{ $akm->keterangan }}</td>
                    <td class="text-center">{{ $akm->nomor_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $akm->tanggal_surat_persetujuan_atau_penolakan }}</td>

                    <td class="text-center">
                        <div class="d-inline-flex gap-2">
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
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- ================= EDIT MODALS (ORDER MATCHES THEAD) ================= -->
@foreach($akms as $akm)
<div class="modal fade" id="editAkmModal{{ $akm->id }}" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Edit Klaim</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form method="POST" action="{{ route('akms.update', $akm) }}">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="mb-3"><label class="form-label">Nama Debitur</label><input name="nama_debitur" class="form-control" value="{{ $akm->nama_debitur }}" required></div>
                    <div class="mb-3"><label class="form-label">Cabang Bank</label><input name="cabang_bank" class="form-control" value="{{ $akm->cabang_bank }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Rekening</label><input name="nomor_rekening" class="form-control" value="{{ $akm->nomor_rekening }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Polis</label><input name="nomor_polis" class="form-control" value="{{ $akm->nomor_polis }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal Polis</label><input type="date" name="tanggal_polis" class="form-control" value="{{ $akm->tanggal_polis }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor STGR</label><input name="nomor_stgr" class="form-control" value="{{ $akm->nomor_stgr }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal STGR</label><input type="date" name="tanggal_stgr" class="form-control" value="{{ $akm->tanggal_stgr }}" required></div>
                    <div class="mb-3"><label class="form-label">Bulan STGR</label><input name="bulan_stgr" class="form-control" value="{{ $akm->bulan_stgr }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal DOL</label><input type="date" name="tanggal_dol" class="form-control" value="{{ $akm->tanggal_dol }}" required></div>
                    <div class="mb-3"><label class="form-label">Jangka Waktu Awal</label><input type="date" name="jangka_waktu_awal" class="form-control" value="{{ $akm->jangka_waktu_awal }}" required></div>
                    <div class="mb-3"><label class="form-label">Jangka Waktu Akhir</label><input type="date" name="jangka_waktu_akhir" class="form-control" value="{{ $akm->jangka_waktu_akhir }}" required></div>
                    <div class="mb-3"><label class="form-label">Penyebab Klaim</label><input name="penyebab_klaim" class="form-control" value="{{ $akm->penyebab_klaim }}" required></div>
                    <div class="mb-3"><label class="form-label">Plafond</label><input name="plafond" class="form-control" value="{{ $akm->plafond }}" required></div>
                    <div class="mb-3"><label class="form-label">Nilai Tuntutan Klaim</label><input name="nilai_tuntutan_klaim" class="form-control" value="{{ $akm->nilai_tuntutan_klaim }}" required></div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select" required>
                            <option value="terima" {{ $akm->status=='terima'?'selected':'' }}>Terima</option>
                            <option value="tolak" {{ $akm->status=='tolak'?'selected':'' }}>Tolak</option>
                            <option value="proses_analisa" {{ $akm->status=='proses_analisa'?'selected':'' }}>Proses Analisa</option>
                        </select>
                    </div>

                    <div class="mb-3"><label class="form-label">Tindak Lanjut</label><input name="tindak_lanjut" class="form-control" value="{{ $akm->tindak_lanjut }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Surat Tambahan Data</label><input name="nomor_surat_tambahan_data" class="form-control" value="{{ $akm->nomor_surat_tambahan_data }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal Surat Tambahan Data</label><input type="date" name="tanggal_surat_tambahan_data" class="form-control" value="{{ $akm->tanggal_surat_tambahan_data }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Register Sistem</label><input name="nomor_register_sistem" class="form-control" value="{{ $akm->nomor_register_sistem }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal Register Sistem</label><input type="date" name="tanggal_register_sistem" class="form-control" value="{{ $akm->tanggal_register_sistem }}"></div>

                    <div class="mb-3">
                        <label class="form-label">Status Sistem</label>
                        <select name="status_sistem" class="form-select" required>
                            <option value="done" {{ $akm->status_sistem=='done'?'selected':'' }}>Done</option>
                            <option value="not_done" {{ $akm->status_sistem=='not_done'?'selected':'' }}>Not Done Yet</option>
                        </select>
                    </div>

                    <div class="mb-3"><label class="form-label">Keterangan</label><input name="keterangan" class="form-control" value="{{ $akm->keterangan }}" required></div>
                    <div class="mb-3"><label class="form-label">Nomor Surat Persetujuan / Penolakan</label><input name="nomor_surat_persetujuan_atau_penolakan" class="form-control" value="{{ $akm->nomor_surat_persetujuan_atau_penolakan }}" required></div>
                    <div class="mb-3"><label class="form-label">Tanggal Surat Persetujuan / Penolakan</label><input type="date" name="tanggal_surat_persetujuan_atau_penolakan" class="form-control" value="{{ $akm->tanggal_surat_persetujuan_atau_penolakan }}" required></div>

                </div>

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endforeach
