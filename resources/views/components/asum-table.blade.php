<!-- SUCCESS ALERT -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div id="asumTable">
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
                    <th class="text-white" style="background:#2a3d5e;">Keterangan / Feedback Pemutus</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Persetujuan</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Claim Settlement</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Claim Settlement</th>
                    <th class="text-white" style="background:#2a3d5e;">Nomor Surat Persetujuan / Penolakan</th>
                    <th class="text-white" style="background:#2a3d5e;">Tanggal Surat Persetujuan / Penolakan</th>
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
                    <td class="text-center">{{ $asum->posisi }}</td>
                    <td class="text-center">{{ $asum->cob }}</td>
                    <td class="text-center">{{ $asum->nama_pekerjaan }}</td>
                    <td class="text-center">{{ $asum->nomor_polis }}</td>
                    <td class="text-center">{{ $asum->tanggal_polis }}</td>
                    <td class="text-center">{{ $asum->nomor_stgr }}</td>
                    <td class="text-center">{{ $asum->tanggal_stgr }}</td>
                    <td class="text-center">{{ $asum->bulan_stgr }}</td>
                    <td class="text-center">{{ $asum->tanggal_dol }}</td>
                    <td class="text-center">{{ $asum->jangka_waktu_awal }}</td>
                    <td class="text-center">{{ $asum->jangka_Waktu_akhir }}</td>
                    <td class="text-center">{{ $asum->penyebab_klaim }}</td>
                    <td class="text-center">{{ $asum->nilai_tsi }}</td>
                    <td class="text-center">{{ $asum->share_ask }}</td>
                    <td class="text-center">{{ $asum->nilai_share_ask }}</td>
                    <td class="text-center">{{ $asum->nilai_tuntutan_klaim }}</td>
                    <td class="text-center">{{ $asum->status }}</td>
                    <td class="text-center">{{ $asum->tindak_lanjut }}</td>
                    <td class="text-center">{{ $asum->nomor_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $asum->tanggal_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $asum->nomor_register_sistem }}</td>
                    <td class="text-center">{{ $asum->tanggal_register_sistem }}</td>
                    <td class="text-center">{{ $asum->status_sistem }}</td>
                    <td class="text-center">{{ $asum->keterangan_atau_feedback_pemutus }}</td>
                    <td class="text-center">{{ $asum->tanggal_persetujuan }}</td>
                    <td class="text-center">{{ $asum->nomor_claim_Settelement }}</td>
                    <td class="text-center">{{ $asum->tanggal_claim_settelement }}</td>
                    <td class="text-center">{{ $asum->nomor_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $asum->tanggal_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $asum->nomor_memo_permintaan_dana }}</td>
                    <td class="text-center">{{ $asum->tanggal_memo_permintaan_dana }}</td>
                    <td class="text-center">{{ $asum->status_pembayaran }}</td>
                    <!-- <td class="text-center">{{ $akm->status }}</td> -->

                 <!-- <td class="text-center">
                    @php
                        $status = strtolower(trim($asum->status));
                    @endphp

                    @if($status === 'tolak')
                        <span class="badge bg-danger text-white">
                            tolak
                        </span>
                    @elseif($status === 'terima')
                        <span class="badge bg-success text-white">
                            terima
                        </span>
                    @elseif($status === 'proses analisa')
                        <span class="badge bg-primary text-white">
                            proses analisa
                        </span>
                    @else
                        <span class="badge bg-secondary text-white">
                            {{ $akm->status_sistem ?? 'unknown' }}
                        </span>
                    @endif
                </td> -->


                    <!-- <td class="text-center">{{ $akm->tindak_lanjut }}</td>
                    <td class="text-center">{{ $akm->nomor_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $akm->tanggal_surat_tambahan_data }}</td>
                    <td class="text-center">{{ $akm->nomor_register_sistem }}</td>
                    <td class="text-center">{{ $akm->tanggal_register_sistem }}</td> -->

                    <!-- <td class="text-center">
                        @if($akm->status_sistem === 'done')
                            <span class="badge bg-success text-white">
                                Done
                            </span>
                        @else
                            <span class="badge bg-danger text-white">
                                Not done yet
                            </span>
                        @endif
                    </td> -->

                    <!-- <td class="text-center">{{ $akm->keterangan }}</td>
                    <td class="text-center">{{ $akm->nomor_surat_persetujuan_atau_penolakan }}</td>
                    <td class="text-center">{{ $akm->tanggal_surat_persetujuan_atau_penolakan }}</td> -->

                    <td class="text-center">
                        <div class="d-inline-flex align-items-center gap-2">
                            <button class="btn p-0 text-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editAsumModal{{ $asum->id }}">
                                <i class="bi bi-pencil-fill fs-5"></i>
                            </button>

                            <form method="POST"
                                  action="{{ route('asums.destroy', $asum) }}"
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
