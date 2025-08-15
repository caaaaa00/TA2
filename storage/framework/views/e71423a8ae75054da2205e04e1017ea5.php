<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2><strong>Buat Pesanan Produksi</strong></h2>
    <p>Form untuk menambahkan pesanan produksi baru</p>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Periksa kembali inputan:</strong>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('pesanan_produksi.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-3">
            <label for="user_Id_User" class="form-label">User</label>
            <select name="user_Id_User" id="user_Id_User" class="form-select" required>
                <option value="">-- Pilih User --</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->Id_User); ?>" <?php echo e(old('user_Id_User') == $user->Id_User ? 'selected' : ''); ?>>
                        <?php echo e($user->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="mb-3">
            <label for="pelanggan_Id_Pelanggan" class="form-label">Pelanggan</label>
            <select name="pelanggan_Id_Pelanggan" id="pelanggan_Id_Pelanggan" class="form-select" required>
                <option value="">-- Pilih Pelanggan --</option>
                <?php $__currentLoopData = $pelanggans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelanggan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($pelanggan->Id_Pelanggan); ?>" <?php echo e(old('pelanggan_Id_Pelanggan') == $pelanggan->Id_Pelanggan ? 'selected' : ''); ?>>
                        <?php echo e($pelanggan->Nama_Pelanggan); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="mb-3">
            <label for="Jumlah_Pesanan" class="form-label">Jumlah Pesanan</label>
            <input type="number" name="Jumlah_Pesanan" id="Jumlah_Pesanan" class="form-control" 
                   value="<?php echo e(old('Jumlah_Pesanan')); ?>" required min="1">
        </div>

        
        <div class="mb-3">
            <label for="Tanggal_Pesanan" class="form-label">Tanggal Pesanan</label>
            <input type="date" name="Tanggal_Pesanan" id="Tanggal_Pesanan" class="form-control" 
                   value="<?php echo e(old('Tanggal_Pesanan')); ?>" required>
        </div>

        
        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" id="Status" class="form-select" required>
                <option value="Menunggu" <?php echo e(old('Status') == 'Menunggu' ? 'selected' : ''); ?>>Menunggu</option>
                <option value="Diproses" <?php echo e(old('Status') == 'Diproses' ? 'selected' : ''); ?>>Diproses</option>
                <option value="Selesai" <?php echo e(old('Status') == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
            </select>
        </div>

        
        <div class="mb-3">
            <label for="Surat_Perintah_Produksi" class="form-label">Surat Perintah Produksi</label>
            <input type="file" name="Surat_Perintah_Produksi" id="Surat_Perintah_Produksi" class="form-control" accept=".pdf,.jpg,.png">
            <small class="text-muted">Opsional. Format: PDF, JPG, atau PNG</small>
        </div>

        
        <div class="d-flex justify-content-end">
            <a href="<?php echo e(route('pesanan_produksi.index')); ?>" class="btn btn-secondary me-2">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/pesanan_produksi/create.blade.php ENDPATH**/ ?>