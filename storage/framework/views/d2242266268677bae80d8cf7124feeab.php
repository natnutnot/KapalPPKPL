

<?php $__env->startSection('title', 'Validasi Hasil Analisis'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0">✅ Validasi Hasil Analisis</h1>
                </div>
                <div class="card-body">
                    <!-- Informasi Inspeksi -->
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
                            <p class="mb-1"><small class="text-muted">Status Ketebalan</small></p>
                            <p class="mb-0">
                                <span
                                    class="badge <?php echo e($inspeksi->status_ketebalan == 'OK' ? 'bg-success' : ($inspeksi->status_ketebalan == 'REPAIR' ? 'bg-warning' : 'bg-danger')); ?>">
                                    <?php echo e($inspeksi->status_ketebalan); ?>

                                </span>
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

                    <!-- Ringkasan Hasil -->
                    <div class="card mb-3 border-0 bg-light">
                        <div class="card-body">
                            <h6 class="card-title fw-bold mb-3">📊 Ringkasan Hasil Analisis</h6>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td width="50%"><small class="text-muted">Ketebalan Desain Awal</small></td>
                                    <td><strong><?php echo e($inspeksi->t_origin); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Nilai Ketebalan Hasil Ukur</small></td>
                                    <td><strong><?php echo e($inspeksi->nilai_ketebalan); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Batas Standar Minimum</small></td>
                                    <td><strong><?php echo e($inspeksi->batas_standar); ?> mm</strong></td>
                                </tr>
                                <tr>
                                    <td><small class="text-muted">Penipisan / Pengurangan</small></td>
                                    <td><strong class="text-danger"><?php echo e($inspeksi->persentase_penipisan); ?>%</strong></td>
                                </tr>
                                <?php if($inspeksi->jenis_cacat && $inspeksi->jenis_cacat != ''): ?>
                                    <tr>
                                        <td><small class="text-muted">Jenis Cacat Terdeteksi</small></td>
                                        <td><strong><?php echo e($inspeksi->jenis_cacat); ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td><small class="text-muted">Status Akseptansi</small></td>
                                        <td>
                                            <span
                                                class="badge <?php echo e($inspeksi->status_akseptansi == 'ACCEPTED' ? 'bg-success' : 'bg-danger'); ?>">
                                                <?php echo e($inspeksi->status_akseptansi); ?>

                                            </span>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>

                    <!-- Instruksi Validasi -->
                    <div class="alert alert-info mb-3">
                        <h6 class="alert-heading">ℹ️ Petunjuk Validasi</h6>
                        <small>
                            Sebagai Inspektur, Anda harus memastikan hasil analisis akurat sebelum dilaporkan.
                            <br><br>
                            <strong>Pilih salah satu:</strong>
                            <ul class="mb-0 mt-2">
                                <li><strong>Validasi:</strong> Jika hasil analisis sudah akurat dan siap dilaporkan</li>
                                <li><strong>Tolak:</strong> Jika ada ketidaksesuaian atau perlu pengukuran ulang</li>
                            </ul>
                        </small>
                    </div>

                    <!-- Form Validasi -->
                    <div class="row g-2 mb-3">
                        <!-- Kolom Validasi -->
                        <div class="col-md-6">
                            <form method="POST"
                                action="<?php echo e(route('ultrasonic.validation.validate', $inspeksi->id_inspeksi)); ?>"
                                class="h-100">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="catatan_validasi_accept" class="form-label">Catatan Validasi
                                        (Opsional)</label>
                                    <textarea class="form-control" id="catatan_validasi_accept" name="catatan_validasi" rows="4"
                                        placeholder="Masukkan catatan atau observasi penting..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2">
                                    <i class="fas fa-check-circle"></i> Validasi Hasil
                                </button>
                            </form>
                        </div>

                        <!-- Kolom Penolakan -->
                        <div class="col-md-6">
                            <form method="POST"
                                action="<?php echo e(route('ultrasonic.validation.reject', $inspeksi->id_inspeksi)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <label for="catatan_validasi_reject" class="form-label">Alasan Penolakan <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control <?php $__errorArgs = ['catatan_validasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="catatan_validasi_reject"
                                        name="catatan_validasi" rows="4" placeholder="Jelaskan alasan penolakan dan tindakan yang diperlukan..."
                                        required></textarea>
                                    <?php $__errorArgs = ['catatan_validasi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 py-2"
                                    onclick="return confirm('Anda yakin ingin menolak hasil analisis ini?')">
                                    <i class="fas fa-times-circle"></i> Tolak & Kembalikan
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="d-grid gap-2">
                        <a href="<?php echo e(route('ultrasonic.analysis.result', $inspeksi->id_inspeksi)); ?>"
                            class="btn btn-secondary">
                            ← Kembali ke Hasil Analisis
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Projek Visual Studio Code\KapalPPKPL\resources\views/ultrasonic/validate.blade.php ENDPATH**/ ?>