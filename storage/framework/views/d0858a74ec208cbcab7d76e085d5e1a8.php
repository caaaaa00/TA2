<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2><strong>Tambah Produksi</strong></h2>
    <p>Input pesanan, jadwal, dan produksi dalam satu halaman</p>

    
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('production.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        
        <ul class="nav nav-tabs mb-3" id="productionFormTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pesanan-tab" data-bs-toggle="tab" href="#pesanan" role="tab">Pesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="jadwal-tab" data-bs-toggle="tab" href="#jadwal" role="tab">Jadwal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="produksi-tab" data-bs-toggle="tab" href="#produksi" role="tab">Produksi</a>
            </li>
        </ul>

        
        <div class="tab-content" id="productionFormTabsContent">
            
            <div class="tab-pane fade show active" id="pesanan" role="tabpanel">
                <?php if(isset($pesanan)): ?>
                    <input type="hidden" name="id_pesanan" value="<?php echo e($pesanan->Id_Pesanan); ?>">
                    <div class="mb-3">
                        <label>ID Pesanan</label>
                        <input type="text" class="form-control" value="<?php echo e($pesanan->Id_Pesanan); ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label>Pelanggan</label>
                        <input type="text" class="form-control" value="<?php echo e($pesanan->pelanggan->Nama_Pelanggan ?? '-'); ?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label>Jumlah Pesanan</label>
                        <input type="number" name="Jumlah_Pesanan" class="form-control" value="<?php echo e($pesanan->Jumlah_Pesanan); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Pesanan</label>
                        <input type="date" name="Tanggal_Pesanan" class="form-control" value="<?php echo e($pesanan->Tanggal_Pesanan); ?>" required>
                    </div>
                <?php else: ?>
                    <div class="mb-3">
                        <label>Jumlah Pesanan</label>
                        <input type="number" name="Jumlah_Pesanan" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Tanggal Pesanan</label>
                        <input type="date" name="Tanggal_Pesanan" class="form-control" required>
                    </div>
                <?php endif; ?>
                <div class="mb-3">
                    <label>Surat Perintah Produksi</label>
                    <input type="text" name="Surat_Perintah_Produksi" class="form-control">
                </div>
            </div>

            
            <div class="tab-pane fade" id="jadwal" role="tabpanel">
                <div class="mb-3">
                    <label>Tanggal Mulai</label>
                    <input type="date" name="Tanggal_Mulai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Selesai</label>
                    <input type="date" name="Tanggal_Selesai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status Jadwal</label>
                    <select name="Status_Jadwal" class="form-control">
                        <option value="Direncanakan">Direncanakan</option>
                        <option value="Berjalan">Berjalan</option>
                        <option value="Tertunda">Tertunda</option>
                    </select>
                </div>
            </div>

            
            <div class="tab-pane fade" id="produksi" role="tabpanel">
                <div class="mb-3">
                    <label>Hasil Produksi</label>
                    <input type="text" name="Hasil_Produksi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Status Produksi</label>
                    <select name="Status" class="form-control" required>
                        <option value="Menunggu">Menunggu</option>
                        <option value="Berjalan">Berjalan</option>
                        <option value="Selesai">Selesai</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Keterangan</label>
                    <textarea name="Keterangan" class="form-control" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label>Bill of Material</label>
                    <select name="bill_of_material_Id_bill_of_material" class="form-control" required>
                        <?php $__currentLoopData = $boms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($bom->Id_bill_of_material); ?>"><?php echo e($bom->Nama_bill_of_material); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Bahan Baku</label>
                    <select name="bahan_baku_Id_Bahan" class="form-control">
                        <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($b->Id_Bahan); ?>"><?php echo e($b->Nama_Bahan); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>

        
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Produksi</button>
            <a href="<?php echo e(route('production.index')); ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/production/create.blade.php ENDPATH**/ ?>