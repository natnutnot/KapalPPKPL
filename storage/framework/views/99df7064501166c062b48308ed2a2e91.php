

<?php $__env->startSection('title', 'Input Data Ultrasonic Test'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h1 class="h5 mb-0">Form Input Ultrasonic Test</h1>
                </div>
                <div class="card-body">
                    <div class="row mb-4 pb-3 border-bottom">
                        <div class="col-md-6">
                            <p class="mb-1"><small class="text-muted">ID Inspeksi</small></p>
                            <p class="mb-0"><strong><?php echo e($idInspeksi); ?></strong></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><small class="text-muted">Jenis Kapal</small></p>
                            <p class="mb-0"><strong><?php echo e($shipType); ?></strong></p>
                        </div>
                        <div class="col-md-6 mt-2">
                            <p class="mb-1"><small class="text-muted">Area Kapal</small></p>
                            <p class="mb-0"><strong><?php echo e($shipArea); ?></strong></p>
                        </div>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
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

                    <form method="POST" action="<?php echo e(route('ultrasonic.store', $idInspeksi)); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="t_origin" class="form-label">Ketebalan Desain Awal (t_origin, mm)</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="t_origin" name="t_origin" value="<?php echo e(old('t_origin')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="metode_t_min" class="form-label">Metode Perhitungan t_min</label>
                            <select class="form-select" id="metode_t_min" name="metode_t_min" required>
                                <option value="rule_90" <?php if(old('metode_t_min') === 'rule_90'): echo 'selected'; endif; ?>>Rule 90% (0.9 x t_origin)</option>
                                <option value="bki" <?php if(old('metode_t_min') === 'bki'): echo 'selected'; endif; ?>>BKI (t_origin - 0.5 x sqrt(t_origin))</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nilai_ketebalan" class="form-label">Nilai Ketebalan</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="nilai_ketebalan" name="nilai_ketebalan" value="<?php echo e(old('nilai_ketebalan')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="batas_standar" class="form-label">Batas Standar</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="batas_standar" name="batas_standar" value="<?php echo e(old('batas_standar')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="frekuensi_ut" class="form-label">Frekuensi UT</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="frekuensi_ut" name="frekuensi_ut" value="<?php echo e(old('frekuensi_ut')); ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="level_pengujian" class="form-label">Level Pengujian ISO 17640</label>
                                <select class="form-select" id="level_pengujian" name="level_pengujian" required>
                                    <option value="A" <?php if(old('level_pengujian') === 'A'): echo 'selected'; endif; ?>>A</option>
                                    <option value="B" <?php if(old('level_pengujian', 'B') === 'B'): echo 'selected'; endif; ?>>B</option>
                                    <option value="C" <?php if(old('level_pengujian') === 'C'): echo 'selected'; endif; ?>>C</option>
                                    <option value="D" <?php if(old('level_pengujian') === 'D'): echo 'selected'; endif; ?>>D</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="kelas_area" class="form-label">Kelas Area</label>
                                <select class="form-select" id="kelas_area" name="kelas_area" required>
                                    <option value="A" <?php if(old('kelas_area') === 'A'): echo 'selected'; endif; ?>>A (Kritis/Midship)</option>
                                    <option value="B" <?php if(old('kelas_area', 'B') === 'B'): echo 'selected'; endif; ?>>B (Non-Kritis)</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_cacat" class="form-label">Jenis Cacat</label>
                            <input type="text" class="form-control" id="jenis_cacat" name="jenis_cacat" value="<?php echo e(old('jenis_cacat')); ?>" maxlength="255" required>
                        </div>

                        <div class="mb-3">
                            <label for="kedalaman_cacat" class="form-label">Kedalaman Cacat</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="kedalaman_cacat" name="kedalaman_cacat" value="<?php echo e(old('kedalaman_cacat')); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="panjang_cacat" class="form-label">Panjang Cacat (mm)</label>
                            <input type="number" step="0.01" min="0" class="form-control" id="panjang_cacat" name="panjang_cacat" value="<?php echo e(old('panjang_cacat')); ?>" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="amplitudo_gema" class="form-label">Echo Amplitude</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="amplitudo_gema" name="amplitudo_gema" value="<?php echo e(old('amplitudo_gema')); ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="dac_referensi" class="form-label">DAC Referensi</label>
                                <input type="number" step="0.01" min="0.01" class="form-control" id="dac_referensi" name="dac_referensi" value="<?php echo e(old('dac_referensi')); ?>" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Projek Visual Studio Code\KapalPPKPL\resources\views/ultrasonic/create.blade.php ENDPATH**/ ?>