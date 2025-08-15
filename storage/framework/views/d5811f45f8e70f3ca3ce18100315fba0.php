<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Create Purchase Order</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('procurement.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="supplier_Id_Supplier" class="form-label">Supplier</label>
            <select name="supplier_Id_Supplier" id="supplier_Id_Supplier" class="form-select" required>
                <option value="">-- Select Supplier --</option>
                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($supplier->Id_Supplier); ?>" <?php echo e(old('supplier_Id_Supplier') == $supplier->Id_Supplier ? 'selected' : ''); ?>>
                        <?php echo e($supplier->Nama_Supplier); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <input type="hidden" name="user_Id_User" value="<?php echo e(auth()->user()->Id_User); ?>">

                <div class="mb-3">
            <label for="Status" class="form-label">Status Pesanan</label>
            <select name="Status" id="Status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Pending" <?php echo e(old('Status') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="Approved" <?php echo e(old('Status') == 'Approved' ? 'selected' : ''); ?>>Approved</option>
                <option value="Completed" <?php echo e(old('Status') == 'Completed' ? 'selected' : ''); ?>>Completed</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="Tanggal_Pemesanan" class="form-label">Tanggal Pemesanan</label>
            <input type="date" name="Tanggal_Pemesanan" id="Tanggal_Pemesanan" class="form-control" value="<?php echo e(old('Tanggal_Pemesanan')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="Tanggal_Kedatangan" class="form-label">Tanggal Kedatangan</label>
            <input type="date" name="Tanggal_Kedatangan" id="Tanggal_Kedatangan" class="form-control" value="<?php echo e(old('Tanggal_Kedatangan')); ?>">
        </div>

        <div class="mb-3">
            <label for="Status_Pembayaran" class="form-label">Status Pembayaran</label>
            <select name="Status_Pembayaran" id="Status_Pembayaran" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Pending" <?php echo e(old('Status_Pembayaran') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                <option value="Confirmed" <?php echo e(old('Status_Pembayaran') == 'Confirmed' ? 'selected' : ''); ?>>Confirmed</option>
                <option value="Delivered" <?php echo e(old('Status_Pembayaran') == 'Delivered' ? 'selected' : ''); ?>>Delivered</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="Total_Biaya" class="form-label">Total Biaya (Rp)</label>
            <input type="number" name="Total_Biaya" id="Total_Biaya" class="form-control" value="<?php echo e(old('Total_Biaya')); ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="<?php echo e(route('procurement.index')); ?>" class="btn btn-secondary">Back</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/procurement/create_purchaseOrder.blade.php ENDPATH**/ ?>