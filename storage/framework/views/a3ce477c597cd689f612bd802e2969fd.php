<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Bill of Materials</h2>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('inventory.index')); ?>" class="btn btn-outline-secondary">Back to Inventory</a>
            <a href="<?php echo e(route('bill-of-materials.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> New BOM
            </a>
        </div>
    </div>

    <p class="text-muted mb-4">Manage your list of Bill of Materials and its raw materials.</p>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php elseif(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    
    <div class="table-responsive">
        <table id="bomTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>BOM Name</th>
                    <th>Status</th>
                    <th>Total Materials</th>
                    <th>Material List</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $boms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong><?php echo e($bom->Nama_bill_of_material); ?></strong></td>
                        <td>
                            <span class="badge bg-<?php echo e($bom->Status === 'Approved' ? 'success' : 'secondary'); ?>">
                                <?php echo e($bom->Status); ?>

                            </span>
                        </td>
                        <td><?php echo e($bom->barangs->count()); ?></td>
                        <td>
                            <?php if($bom->barangs->isNotEmpty()): ?>
                                <ul class="mb-0 ps-3">
                                    <?php $__currentLoopData = $bom->barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($barang->Nama_Bahan); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <span class="text-muted">No materials linked</span>
                            <?php endif; ?>
                        </td>
                        <td style="white-space: nowrap;">
                            <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                <a href="<?php echo e(route('bill-of-materials.show', $bom->Id_bill_of_material)); ?>" class="btn btn-sm btn-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('bill-of-materials.edit', $bom->Id_bill_of_material)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('bill-of-materials.destroy', $bom->Id_bill_of_material)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this BOM?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">No BOMs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function () {
        $('#bomTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search BOMs...",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching BOMs found",
                info: "Showing _START_ to _END_ of _TOTAL_ BOMs",
                infoEmpty: "No BOMs available",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/bill-of-materials/index.blade.php ENDPATH**/ ?>