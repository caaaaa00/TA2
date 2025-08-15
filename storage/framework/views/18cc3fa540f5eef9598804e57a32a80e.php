<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Add New Inventory Item</h2>

    <form action="<?php echo e(route('inventory.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label>Item Name</label>
            <input type="text" name="Nama_Bahan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <select name="kategori_Id_Kategori" class="form-select" required>
                <option value="">-- Select Category --</option>
                <?php $__currentLoopData = $kategori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($kat->Id_Kategori); ?>"><?php echo e($kat->Nama_Kategori); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <select name="Jenis" class="form-select" required>
                <option value="">-- Select Jenis --</option>
                <option value="Bahan_Baku">Bahan Baku</option>
                <option value="Produk">Produk</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="Status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Stock</label>
            <input type="number" name="Stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Reorder Point</label>
            <input type="number" name="Reorder_Point" class="form-control">
        </div>

        <div class="mb-3">
            <label>EOQ</label>
            <input type="number" name="EOQ" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?php echo e(route('inventory.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/inventory/create.blade.php ENDPATH**/ ?>