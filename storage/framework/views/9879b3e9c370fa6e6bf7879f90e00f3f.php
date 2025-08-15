<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Edit Inventory Item</h2>

    <form action="<?php echo e(route('inventory.update', $item->Id_Bahan)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="Nama_Bahan" class="form-control"
                   value="<?php echo e(old('Nama_Bahan', $item->Nama_Bahan)); ?>" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="kategori_Id_Kategori" class="form-select" required>
                <option value="">-- Select Category --</option>
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kat->Id_Kategori); ?>" 
                        <?php echo e(old('kategori_Id_Kategori', $item->kategori_Id_Kategori) == $kat->Id_Kategori ? 'selected' : ''); ?>>
                        <?php echo e($kat->Nama_Kategori); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="Jenis" class="form-select" required>
                <option value="">-- Select Jenis --</option>
                <option value="Bahan_Baku" <?php echo e(old('Jenis', $item->Jenis) == 'Bahan_Baku' ? 'selected' : ''); ?>>Bahan Baku</option>
                <option value="Produk" <?php echo e(old('Jenis', $item->Jenis) == 'Produk' ? 'selected' : ''); ?>>Produk</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="Status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Aktif" <?php echo e(old('Status', $item->Status) == 'Aktif' ? 'selected' : ''); ?>>Aktif</option>
                <option value="Tidak Aktif" <?php echo e(old('Status', $item->Status) == 'Tidak Aktif' ? 'selected' : ''); ?>>Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="Stok" class="form-control"
                   value="<?php echo e(old('Stok', $item->Stok)); ?>" required>
        </div>

        <div class="mb-3">
            <label>Reorder Point</label>
            <input type="number" name="Reorder_Point" class="form-control"
                   value="<?php echo e(old('Reorder_Point', $item->Reorder_Point)); ?>">
        </div>

        <div class="mb-3">
            <label>EOQ</label>
            <input type="number" name="EOQ" class="form-control"
                   value="<?php echo e(old('EOQ', $item->EOQ)); ?>">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('inventory.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/inventory/edit.blade.php ENDPATH**/ ?>