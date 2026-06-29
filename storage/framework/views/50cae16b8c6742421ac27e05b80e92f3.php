

<?php $__env->startSection('title', 'Edit Data Ultrasonic Test'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h1 class="h5 mb-0">✏️ Edit Data Ultrasonic Test</h1>
                </div>
                <div class="card-body">
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

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="alert alert-info mb-3">
                        <small>
                            <i class="fas fa-info-circle"></i>
                            Ubah data pengukuran yang ingin diperbarui, kemudian klik <strong>Perbarui Data</strong>.
                        </small>
                    </div>

                    <form method="POST" action="<?php echo e(route('ultrasonic.update', $inspeksi->id_inspeksi)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-3">
                            <label for="t_origin" class="form-label">Ketebalan Desain Awal (t_origin, mm)</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['t_origin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="t_origin" name="t_origin"
                                value="<?php echo e(old('t_origin', $inspeksi->t_origin)); ?>" required>
                            <?php $__errorArgs = ['t_origin'];
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

                        <div class="mb-3">
                            <label for="metode_t_min" class="form-label">Metode Perhitungan t_min</label>
                            <select class="form-select <?php $__errorArgs = ['metode_t_min'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="metode_t_min"
                                name="metode_t_min" required>
                                <option value="rule_90" <?php if(old('metode_t_min', $inspeksi->metode_perhitungan) === 'rule_90'): echo 'selected'; endif; ?>>Rule 90% (0.9 x t_origin)</option>
                                <option value="bki" <?php if(old('metode_t_min', $inspeksi->metode_perhitungan) === 'bki'): echo 'selected'; endif; ?>>BKI (t_origin - 0.5 x sqrt(t_origin))
                                </option>
                            </select>
                            <?php $__errorArgs = ['metode_t_min'];
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

                        <div class="mb-3">
                            <label for="nilai_ketebalan" class="form-label">Nilai Ketebalan</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['nilai_ketebalan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="nilai_ketebalan"
                                name="nilai_ketebalan" value="<?php echo e(old('nilai_ketebalan', $inspeksi->nilai_ketebalan)); ?>"
                                required>
                            <?php $__errorArgs = ['nilai_ketebalan'];
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

                        <div class="mb-3">
                            <label for="batas_standar" class="form-label">Batas Standar</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['batas_standar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="batas_standar"
                                name="batas_standar" value="<?php echo e(old('batas_standar', $inspeksi->batas_standar)); ?>" required>
                            <?php $__errorArgs = ['batas_standar'];
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

                        <div class="mb-3">
                            <label for="frekuensi_ut" class="form-label">Frekuensi UT</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['frekuensi_ut'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="frekuensi_ut"
                                name="frekuensi_ut" value="<?php echo e(old('frekuensi_ut', $inspeksi->frekuensi_ut)); ?>" required>
                            <?php $__errorArgs = ['frekuensi_ut'];
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="level_pengujian" class="form-label">Level Pengujian ISO 17640</label>
                                <select class="form-select <?php $__errorArgs = ['level_pengujian'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="level_pengujian" name="level_pengujian" required>
                                    <option value="A" <?php if(old('level_pengujian', $inspeksi->level_pengujian) === 'A'): echo 'selected'; endif; ?>>A</option>
                                    <option value="B" <?php if(old('level_pengujian', $inspeksi->level_pengujian) === 'B'): echo 'selected'; endif; ?>>B</option>
                                    <option value="C" <?php if(old('level_pengujian', $inspeksi->level_pengujian) === 'C'): echo 'selected'; endif; ?>>C</option>
                                    <option value="D" <?php if(old('level_pengujian', $inspeksi->level_pengujian) === 'D'): echo 'selected'; endif; ?>>D</option>
                                </select>
                                <?php $__errorArgs = ['level_pengujian'];
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

                            <div class="col-md-6 mb-3">
                                <label for="kelas_area" class="form-label">Kelas Area</label>
                                <select class="form-select <?php $__errorArgs = ['kelas_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kelas_area"
                                    name="kelas_area" required>
                                    <option value="A" <?php if(old('kelas_area', $inspeksi->kelas_area) === 'A'): echo 'selected'; endif; ?>>A (Kritis/Midship)</option>
                                    <option value="B" <?php if(old('kelas_area', $inspeksi->kelas_area) === 'B'): echo 'selected'; endif; ?>>B (Non-Kritis)</option>
                                </select>
                                <?php $__errorArgs = ['kelas_area'];
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
                        </div>

                        <div class="mb-3">
                            <label for="jenis_cacat" class="form-label">Jenis Cacat</label>
                            <input type="text" class="form-control <?php $__errorArgs = ['jenis_cacat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                id="jenis_cacat" name="jenis_cacat"
                                value="<?php echo e(old('jenis_cacat', $inspeksi->jenis_cacat)); ?>" maxlength="255" required>
                            <?php $__errorArgs = ['jenis_cacat'];
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

                        <div class="mb-3">
                            <label for="kedalaman_cacat" class="form-label">Kedalaman Cacat</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['kedalaman_cacat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="kedalaman_cacat"
                                name="kedalaman_cacat" value="<?php echo e(old('kedalaman_cacat', $inspeksi->kedalaman_cacat)); ?>"
                                required>
                            <?php $__errorArgs = ['kedalaman_cacat'];
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

                        <div class="mb-3">
                            <label for="panjang_cacat" class="form-label">Panjang Cacat (mm)</label>
                            <input type="number" step="0.01" min="0"
                                class="form-control <?php $__errorArgs = ['panjang_cacat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="panjang_cacat"
                                name="panjang_cacat" value="<?php echo e(old('panjang_cacat', $inspeksi->panjang_cacat)); ?>"
                                required>
                            <?php $__errorArgs = ['panjang_cacat'];
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

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="amplitudo_gema" class="form-label">Echo Amplitude</label>
                                <input type="number" step="0.01" min="0"
                                    class="form-control <?php $__errorArgs = ['amplitudo_gema'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    id="amplitudo_gema" name="amplitudo_gema"
                                    value="<?php echo e(old('amplitudo_gema', $inspeksi->echo_amplitude)); ?>" required>
                                <?php $__errorArgs = ['amplitudo_gema'];
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

                            <div class="col-md-6 mb-3">
                                <label for="dac_referensi" class="form-label">DAC Referensi</label>
                                <input type="number" step="0.01" min="0.01"
                                    class="form-control <?php $__errorArgs = ['dac_referensi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dac_referensi"
                                    name="dac_referensi" value="<?php echo e(old('dac_referensi', $inspeksi->echo_amplitude)); ?>"
                                    required>
                                <?php $__errorArgs = ['dac_referensi'];
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
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-warning">
                                💾 Perbarui Data
                            </button>
                            <a href="<?php echo e(route('ultrasonic.analysis.result', $inspeksi->id_inspeksi)); ?>"
                                class="btn btn-secondary">
                                ← Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Projek Visual Studio Code\KapalPPKPL\resources\views/ultrasonic/edit.blade.php ENDPATH**/ ?>