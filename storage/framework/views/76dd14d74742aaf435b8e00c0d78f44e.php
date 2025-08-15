<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tambah Pelanggan</h1>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Oops!</strong> Ada kesalahan pada input:<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('pelanggan.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="Nama_Pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" name="Nama_Pelanggan" class="form-control" value="<?php echo e(old('Nama_Pelanggan')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <textarea name="Alamat" class="form-control" required><?php echo e(old('Alamat')); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="Nomor_Telp" class="form-label">No Telepon</label>
            <input type="text" name="Nomor_Telp" class="form-control" value="<?php echo e(old('Nomor_Telp')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" class="form-control" required>
                <option value="Aktif" <?php echo e(old('Status') == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                <option value="Tidak Aktif" <?php echo e(old('Status') == 'Tidak Aktif' ? 'selected' : ''); ?>>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('pelanggan.index')); ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/pelanggan/edit.blade.php ENDPATH**/ ?>