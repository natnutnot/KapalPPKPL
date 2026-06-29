

<?php $__env->startSection('title', 'Hasil Analisis Ultrasonic Test'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0">📊 Hasil Analisis Ultrasonic Test</h1>
                </div>
                <div class="card-body">
                    <!-- Informasi Inspeksi (sama seperti di form) -->
                    <div class="row mb-4 pb-3 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-1"><small class="text-muted">ID Inspeksi</small></p>
                            <p class="mb-0"><strong><?php echo e($inspeksi->id_inspeksi); ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><small class="text-muted">Jenis Kapal</small></p>
                            <p class="mb-0"><strong><?php echo e($inspeksi->jenis_kapal); ?></strong></p>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-1"><small class="text-muted">Area Kapal</small></p>
                            <p class="mb-0"><strong><?php echo e($inspeksi->area_kapal); ?></strong></p>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-1"><small class="text-muted">Metode Perhitungan</small></p>
                            <p class="mb-0">
                                <strong><?php echo e($inspeksi->metode_perhitungan == 'rule_90' ? 'Rule 90% (0.9 x t_origin)' : 'Rule 85% (0.85 x t_origin)'); ?></strong>
                            </p>
                        </div>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('warning')): ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo e(session('warning')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('info')): ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <?php echo e(session('info')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    <?php endif; ?>

                    <!-- Status Validasi (US4) -->
                    <div
                        class="card mb-3 border-0 
                        <?php if($inspeksi->status_validasi === 'validated' && $inspeksi->is_locked): ?> bg-success bg-opacity-10
                        <?php elseif($inspeksi->status_validasi === 'rejected'): ?>
                            bg-danger bg-opacity-10
                        <?php else: ?>
                            bg-warning bg-opacity-10 <?php endif; ?>
                    ">
                        <div class="card-body py-2">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <p class="mb-1"><small class="text-muted">Status Validasi</small></p>
                                    <p class="mb-0">
                                        <?php if($inspeksi->status_validasi === 'validated' && $inspeksi->is_locked): ?>
                                            <span class="badge bg-success fs-6">✅ TERVALIDASI</span>
                                            <small class="text-muted ms-2">
                                                (<?php echo e($inspeksi->validated_at?->format('d/m/Y H:i')); ?>)
                                            </small>
                                        <?php elseif($inspeksi->status_validasi === 'rejected'): ?>
                                            <span class="badge bg-danger fs-6">❌ DITOLAK</span>
                                            <small class="text-muted ms-2">
                                                (<?php echo e($inspeksi->validated_at?->format('d/m/Y H:i')); ?>)
                                            </small>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark fs-6">⏳ BELUM DIVALIDASI</span>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <?php if($inspeksi->status_validasi !== 'validated' || !$inspeksi->is_locked): ?>
                                        <a href="<?php echo e(route('ultrasonic.validation.show', $inspeksi->id_inspeksi)); ?>"
                                            class="btn btn-sm btn-primary w-100">
                                            Validasi Sekarang
                                        </a>
                                    <?php else: ?>
                                        <span class="badge bg-success p-2">
                                            🔒 Data Terkunci
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if($inspeksi->catatan_validasi): ?>
                                <hr class="my-2">
                                <small class="text-muted">
                                    <strong>Catatan:</strong> <?php echo e($inspeksi->catatan_validasi); ?>

                                </small>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Hasil Analisis Ketebalan -->
                    <div class="card mb-3 border-0 shadow-none">
                        <div class="card-header bg-success text-white py-2">
                            <h6 class="mb-0">📏 Analisis Ketebalan</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <td width="45%"><small class="text-muted">Ketebalan Desain Awal (t_origin)</small>
                                    </td>
                                    <td width="10%">:</td>
                                    <td><strong><?php echo e($inspeksi->t_origin); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Nilai Ketebalan Hasil Ukur</small></td>
                                    <td>:</td>
                                    <td><strong><?php echo e($inspeksi->nilai_ketebalan); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Batas Standar Minimum</small></td>
                                    <td>:</td>
                                    <td><strong><?php echo e($inspeksi->batas_standar); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Pengurangan / Penipisan</small></td>
                                    <td>:</td>
                                    <td>
                                        <strong
                                            class="text-danger"><?php echo e(number_format($inspeksi->t_origin - $inspeksi->nilai_ketebalan, 2)); ?>

                                            mm</strong>
                                        <span
                                            class="badge <?php echo e($inspeksi->persentase_penipisan > 25 ? 'bg-danger' : ($inspeksi->persentase_penipisan > 10 ? 'bg-warning' : 'bg-success')); ?> ms-2">
                                            <?php echo e($inspeksi->persentase_penipisan); ?>%
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Status Ketebalan</small></td>
                                    <td>:</td>
                                    <td>
                                        <span
                                            class="badge <?php echo e($inspeksi->status_ketebalan == 'OK' ? 'bg-success' : ($inspeksi->status_ketebalan == 'REPAIR' ? 'bg-warning' : 'bg-danger')); ?> fs-6">
                                            <?php echo e($inspeksi->status_ketebalan); ?>

                                        </span>
                                    </td>
                                </tr>
                            </table>

                            <div class="alert alert-info mt-3 mb-0 py-2">
                                <small>
                                    📌
                                    <?php if($inspeksi->status_ketebalan == 'OK'): ?>
                                        Plat dalam kondisi baik, aman untuk operasional.
                                    <?php elseif($inspeksi->status_ketebalan == 'REPAIR'): ?>
                                        Plat mengalami penipisan signifikan, perlu perbaikan.
                                    <?php else: ?>
                                        Plat sudah sangat menipis, tidak aman. WAJIB GANTI PLAT!
                                    <?php endif; ?>
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- Hasil Analisis Cacat (jika ada) -->
                    <?php if($inspeksi->jenis_cacat && $inspeksi->jenis_cacat != ''): ?>
                        <div class="card mb-3 border-0 shadow-none">
                            <div class="card-header bg-warning text-dark py-2">
                                <h6 class="mb-0">🔍 Analisis Cacat</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td width="45%"><small class="text-muted">Jenis Cacat</small></td>
                                        <td width="10%">:</td>
                                        <td><strong><?php echo e($inspeksi->jenis_cacat); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><small class="text-muted">Klasifikasi</small></td>
                                        <td>:</td>
                                        <td><strong><?php echo e($inspeksi->klasifikasi_cacat ?? 'Belum diklasifikasi'); ?></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><small class="text-muted">Kedalaman Cacat</small></td>
                                        <td>:</td>
                                        <td><strong><?php echo e($inspeksi->kedalaman_cacat); ?> mm</strong></td>
                                    </tr>
                                    <tr>
                                        <td><small class="text-muted">Panjang Cacat</small></td>
                                        <td>:</td>
                                        <td><strong><?php echo e($inspeksi->panjang_cacat); ?> mm</strong></td>
                                    </tr>
                                    <tr>
                                        <td><small class="text-muted">Status Akseptansi</small></td>
                                        <td>:</td>
                                        <td>
                                            <span
                                                class="badge <?php echo e($inspeksi->status_akseptansi == 'ACCEPTED' ? 'bg-success' : 'bg-danger'); ?> fs-6">
                                                <?php echo e($inspeksi->status_akseptansi ?? 'Belum ditentukan'); ?>

                                            </span>
                                        </td>
                                    </tr>
                                </table>

                                <div class="alert alert-secondary mt-3 mb-0 py-2">
                                    <small>
                                        🎯 Rekomendasi:
                                        <?php if($inspeksi->status_akseptansi == 'ACCEPTED'): ?>
                                            Cacat masih dalam batas toleransi, aman digunakan.
                                        <?php elseif($inspeksi->status_akseptansi == 'REJECTED'): ?>
                                            Cacat melebihi batas toleransi, WAJIB DIPERBAIKI sebelum operasional!
                                        <?php else: ?>
                                            Tidak ada cacat signifikan yang terdeteksi.
                                        <?php endif; ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- FINAL VERDICT -->
                    <div class="card mb-4 border-0 shadow-none">
                        <div class="card-header bg-dark text-white py-2">
                            <h6 class="mb-0">⚖️ FINAL VERDICT</h6>
                        </div>
                        <div class="card-body text-center">
                            <?php
                                $finalStatus = 'PASS';
                                $finalColor = 'success';
                                $finalMessage = 'Inspeksi LULUS. Kapal aman untuk beroperasi.';

                                if ($inspeksi->status_ketebalan == 'REPAIR') {
                                    $finalStatus = 'CONDITIONAL';
                                    $finalColor = 'warning';
                                    $finalMessage = 'Inspeksi DITERIMA DENGAN CATATAN. Perlu perbaikan terjadwal.';
                                } elseif (
                                    $inspeksi->status_ketebalan == 'RENEW' ||
                                    $inspeksi->status_akseptansi == 'REJECTED'
                                ) {
                                    $finalStatus = 'FAIL';
                                    $finalColor = 'danger';
                                    $finalMessage =
                                        'Inspeksi TIDAK LULUS. Kapal tidak aman, perbaikan wajib dilakukan.';
                                }
                            ?>

                            <span class="display-6 fw-bold text-<?php echo e($finalColor); ?>">
                                <?php echo e($finalStatus); ?>

                            </span>
                            <p class="mt-3 mb-0"><?php echo e($finalMessage); ?></p>
                        </div>
                    </div>

                    <!-- Tombol Generate Laporan PDF (Tugas 3.5) -->
                    <?php if($inspeksi->status_validasi === 'validated' && $inspeksi->is_locked): ?>
                        <div class="card mb-3 border-0 bg-info bg-opacity-10">
                            <div class="card-body py-2">
                                <p class="mb-2"><small class="text-muted">📄 Laporan PDF:</small></p>
                                <div id="reportStatus" style="display: none;">
                                    <div class="spinner-border spinner-border-sm text-primary me-2" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <span id="reportMessage">Sedang membuat laporan PDF...</span>
                                </div>
                                <div id="reportSuccess" style="display: none;">
                                    <div class="alert alert-success py-1 px-2 mb-0">
                                        <small>✅ Laporan berhasil di-generate! <a href="#" id="downloadLink" class="alert-link">Download PDF</a></small>
                                    </div>
                                </div>
                                <div id="reportError" style="display: none;">
                                    <div class="alert alert-danger py-1 px-2 mb-0">
                                        <small id="errorMessage">❌ Terjadi kesalahan saat membuat laporan</small>
                                    </div>
                                </div>
                                <button type="button" id="generateBtn" class="btn btn-sm btn-primary mt-2">
                                    📋 Generate Laporan PDF
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Tombol Aksi -->
                    <div class="d-flex gap-2 mt-3">
                        <?php if($inspeksi->is_locked): ?>
                            <button class="btn btn-warning" disabled title="Data terkunci, tidak dapat diedit">
                                ✏️ Edit Data (Terkunci)
                            </button>
                        <?php else: ?>
                            <a href="<?php echo e(route('ultrasonic.edit', $inspeksi->id_inspeksi)); ?>" class="btn btn-warning">
                                ✏️ Edit Data
                            </a>
                        <?php endif; ?>

                        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">
                            🏠 Kembali ke Home
                        </a>
                        <a href="<?php echo e(route('ultrasonic.analysis.index')); ?>" class="btn btn-primary">
                            🔬 Inspeksi Baru
                        </a>
                    </div>

                    <!-- Script untuk Generate Laporan PDF -->
                    <?php if($inspeksi->status_validasi === 'validated' && $inspeksi->is_locked): ?>
                        <script>
                            document.getElementById('generateBtn').addEventListener('click', async function() {
                                const btn = this;
                                const statusDiv = document.getElementById('reportStatus');
                                const successDiv = document.getElementById('reportSuccess');
                                const errorDiv = document.getElementById('reportError');

                                // Reset display
                                successDiv.style.display = 'none';
                                errorDiv.style.display = 'none';
                                statusDiv.style.display = 'block';

                                // Disable button
                                btn.disabled = true;

                                try {
                                    const response = await fetch('/reports/<?php echo e($inspeksi->id_inspeksi); ?>/generate', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                            'Accept': 'application/json'
                                        }
                                    });

                                    // Coba parse response as JSON
                                    let data;
                                    try {
                                        data = await response.json();
                                    } catch (e) {
                                        console.error('Response is not JSON:', e);
                                        throw new Error('Server returned invalid response (not JSON)');
                                    }

                                    if (response.ok && data.success) {
                                        // SUCCESS
                                        statusDiv.style.display = 'none';
                                        successDiv.style.display = 'block';
                                        document.getElementById('downloadLink').href = `/reports/${data.report_id}/download`;
                                        btn.style.display = 'none';
                                    } else {
                                        // ERROR
                                        statusDiv.style.display = 'none';
                                        errorDiv.style.display = 'block';
                                        document.getElementById('errorMessage').textContent = 
                                            '❌ ' + (data.message || 'Terjadi kesalahan saat membuat laporan');
                                        btn.disabled = false;
                                    }
                                } catch (error) {
                                    console.error('Error:', error);
                                    statusDiv.style.display = 'none';
                                    errorDiv.style.display = 'block';
                                    document.getElementById('errorMessage').textContent = 
                                        '❌ Error: ' + error.message;
                                    btn.disabled = false;
                                }
                            });
                        </script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Projek Visual Studio Code\KapalPPKPL\resources\views/ultrasonic/result.blade.php ENDPATH**/ ?>