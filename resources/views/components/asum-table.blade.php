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
                    <th class="text-white" style="background:#2a3d5e;">Posisi</th>
                    <th class="text-white" style="background:#2a3d5e;">COB</th>
                    <th class="text-white" style="background:#2a3d5e;">Nama Pekerjaan</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Polis</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Bulan STGR</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal DOL</th>
                    <th class="text-white" style="background:#2a3d5e;">Jangka Waktu Awal</th>
                    <th class="text-white" style="background:#2a3d5e;">Jangka Waktu Akhir</th>
                    <th class="text-white" style="background:#2a3d5e;">Penyebab Klaim</th>
                    <th class="text-white" style="background:#2a3d5e;">Nilai TSI</th>
                    <th class="text-white" style="background:#2a3d5e;">Share ASK</th>
                    <th class="text-white" style="background:#2a3d5e;">Nilai Share ASK</th>
                    <th class="text-white" style="background:#2a3d5e;">Nilai Tuntutan Klaim</th>
                    <th class="text-white" style="background:#2a3d5e;">Status</th>
                    <th class="text-white" style="background:#2a3d5e;">Tindak Lanjut</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Tambahan Data</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Register Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Status Sistem</th>
                    <th class="text-white" style="background:#2a3d5e;">Keterangan</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Persetujuan</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Claim Settlement</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Claim Settlement</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Persetujuan atau Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Persetujuan atau Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Memo Permintaan Dana</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Memo Permintaan Dana</th>
                    <th class="text-white" style="background:#2a3d5e;">Status Pembayaran</th>
                    <th class="text-white" style="background:#2a3d5e;">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($asums as $index => $asum)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td class="text-center">{{ $asum->nama_tertanggung }}</td>

                    <!-- <td class="text-center">
                        @if($asum->posisi === 'member')
                            <span class="badge bg-danger">Member</span>
                        {{--
                        @else
                            <span class="badge bg-danger">Not Done Yet</span>
                        --}}
                        @endif
                    </td>

                    <td class="text-center">{{ $asum->cob }}</td>
                    <td class="text-center">{{ $asum->nama_pekerjaan }}</td>
                    <td class="text-center">{{ $asum->nomor_polis }}</td>
                    <td class="text-center">{{ $asum->tanggal_polis }}</td>
                    <td class="text-center">{{ $asum->nomor_stgr }}</td>
                    <td class="text-center">{{ $asum->tanggal_stgr }}</td>
                    <td class="text-center">{{ $asum->bulan_stgr }}</td>
                    <td class="text-center">{{ $asum->tanggal_dol }}</td>
                    <td class="text-center">{{ $asum->jangka_waktu_awal }}</td>
                    <td class="text-center">{{ $asum->jangka_waktu_akhir }}</td>
                    <td class="text-center">{{ $asum->penyebab_klaim }}</td>
                    <td class="text-center">{{ $asum->nilai_tsi }}</td>
                    <td class="text-center">{{ $asum->share_ask }}</td>
                    <td class="text-center">{{ $asum->nilai_share_ask }}</td>
                    <td class="text-center">{{ $asum->nilai_tuntutan_klaim }}</td>

                    <td class="text-center">
                        @if($asum->status === 'tambahan data')
                            <span class="badge bg-warning">Tambahan Data</span>
                        {{--
                        @else
                            <span class="badge bg-primary">Not Done Yet</span>
                        --}}
                        @endif
                    </td>
                    
                    <td class="text-center">{{ $asum->tindak_lanjut }}</td>
                    <td class="text-center">{{ $asum->nomor_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $asum->tanggal_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $asum->nomor_register_sistem }}</td>
                    <td class="text-center">{{ $asum->tanggal_register_sistem }}</td>

                    <td class="text-center">
                        @if($asum->status === '-')
                            <span class="badge bg-warning">-</span>
                        {{--
                        @else
                            <span class="badge bg-primary">Not Done Yet</span>
                        --}}
                        @endif
                    </td>

                    <td class="text-center">{{ $asum->keterangan }}</td>
                    <td class="text-center">{{ $asum->tanggal_persetujuan }}</td>
                    <td class="text-center">{{ $asum->nomor_claim_settlement }}</td>
                    <td class="text-center">{{ $asum->tanggal_claim_settlement }}</td>
                    <td class="text-center">{{ $asum->nomor_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $asum->tanggal_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $asum->nomor_memo_permintaan_dana }}</td>
                    <td class="text-center">{{ $asum->tanggal_memo_permintaan_dana }}</td>

                    <td class="text-center">
                        @if($asum->status_pembayaran === 'a')
                            <span class="badge bg-warning">-</span>
                        {{--
                        @else
                            <span class="badge bg-primary">Not Done Yet</span>
                        --}}
                        @endif
                    </td> -->

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

<!-- ================= EDIT MODALS ================= -->
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

                <!-- <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Posisi</label><input name="posisi" class="form-control" value="{{ $asum->posisi }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">COB</label><input name="cob" class="form-control" value="{{ $asum->cob }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nama Pekerjaan</label><input name="nama_pekerjaan" class="form-control" value="{{ $asum->nama_pekerjaan }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Polis</label><input name="nomor_polis" class="form-control" value="{{ $asum->nomor_polis }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Polis</label><input name="tanggal_polis" class="form-control" value="{{ $asum->tanggal_polis }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor STGR</label><input name="nomor_stgr" class="form-control" value="{{ $asum->nomor_stgr }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal STGR</label><input name="tanggal_stgr" class="form-control" value="{{ $asum->tanggal_stgr }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Bulan STGR</label><input name="bulan_stgr" class="form-control" value="{{ $asum->bulan_stgr }}" required></div>
                </div>
                
                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal DOL</label><input name="tanggal_dol" class="form-control" value="{{ $asum->tanggal_dol }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Jangka Waktu Awal</label><input name="jangka_waktu_awal" class="form-control" value="{{ $asum->jangka_waktu_awal }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Jangka Waktu Akhir</label><input name="jangka_waktu_akhir" class="form-control" value="{{ $asum->jangka_waktu_akhir }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Penyebab Klaim</label><input name="penyebab_klaim" class="form-control" value="{{ $asum->penyebab_klaim }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nilai TSI</label><input name="nilai_tsi" class="form-control" value="{{ $asum->nilai_tsi }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Share ASK</label><input name="share_ask" class="form-control" value="{{ $asum->share_ask }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nilai Share ASK</label><input name="nilai_share_ask" class="form-control" value="{{ $asum->nilai_share_ask }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nilai Tuntutan Klaim</label><input name="nilai_tuntutan_klaim" class="form-control" value="{{ $asum->nilai_tuntutan_klaim }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Status</label><input name="status" class="form-control" value="{{ $asum->status }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tindak Lanjut</label><input name="tindak_lanjut" class="form-control" value="{{ $asum->tindak_lanjut }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Surat Tambahan Data</label><input name="nomor_surat_tambahan_data" class="form-control" value="{{ $asum->nomor_surat_tambahan_data }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Surat Tambahan Data</label><input name="tanggal_surat_tambahan_data" class="form-control" value="{{ $asum->tanggal_surat_tambahan_data }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Register Sistem</label><input name="nomor_register_sistem" class="form-control" value="{{ $asum->nomor_register_sistem }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Register Sistem</label><input name="tanggal_register_sistem" class="form-control" value="{{ $asum->tanggal_register_sistem }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Status Sistem</label><input name="status_sistem" class="form-control" value="{{ $asum->status_sistem }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Keterangan / Feedback Pemutus</label><input name="keterangan" class="form-control" value="{{ $asum->keterangan }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Persetujuan</label><input name="tanggal_persetujuan" class="form-control" value="{{ $asum->tanggal_persetujuan }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Claim Settlement</label><input name="nomor_claim_settlement" class="form-control" value="{{ $asum->nomor_claim_settlement }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Claim Settlement</label><input name="tanggal_claim_settlement" class="form-control" value="{{ $asum->tanggal_claim_settlement }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Surat Persetujuan atau Penolakan</label><input name="nomor_surat_persetujuan_atau_penolakan" class="form-control" value="{{ $asum->nomor_surat_persetujuan_atau_penolakan }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Surat Persetujuan atau Penolakan</label><input name="tanggal_surat_persetujuan_atau_penolakan" class="form-control" value="{{ $asum->tanggal_surat_persetujuan_atau_penolakan }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Nomor Memo Permintaan Dana</label><input name="nomor_memo_permintaan_dana" class="form-control" value="{{ $asum->nomor_memo_permintaan_dana }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Tanggal Memo Permintaan Dana</label><input name="tanggal_memo_permintaan_dana" class="form-control" value="{{ $asum->tanggal_memo_permintaan_dana }}" required></div>
                </div>

                <div class="modal-body">
                    <div class="mb-3"><label class="form-label">Status Pembayaran</label><input name="status_pembayaran" class="form-control" value="{{ $asum->status_pembayaran }}" required></div>
                </div> -->

                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
