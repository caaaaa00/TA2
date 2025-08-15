<?php $__env->startSection('content'); ?>
<div class="container">
    <h2 class="mb-4">Add New Bill of Material</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Please fix the following issues:<br><br>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('bill-of-materials.store')); ?>">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
            <label for="Nama_bill_of_material" class="form-label">BOM Name</label>
            <input type="text" name="Nama_bill_of_material" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Status" class="form-label">Status</label>
            <select name="Status" class="form-select" required>
                <option value="">-- Select Status --</option>
                <option value="Approved">Approved</option>
                <option value="Draft">Draft</option>
            </select>
        </div>

        <hr>
        <h5>Select Raw Materials</h5>

        <div class="table-responsive mb-3">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th style="width: 5%">✔</th>
                        <th>Material Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="bahan_baku[<?php echo e($barang->Id_Bahan); ?>][selected]" value="1">
                            </td>
                            <td><?php echo e($barang->Nama_Bahan); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="2" class="text-center">No raw materials available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between">
            <a href="<?php echo e(route('bill-of-materials.index')); ?>" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Save BOM</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/bill-of-materials/create.blade.php ENDPATH**/ ?>