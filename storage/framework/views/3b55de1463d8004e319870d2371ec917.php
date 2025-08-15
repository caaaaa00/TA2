<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Inventory Management</h2>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('inventory.create')); ?>" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> New Item
            </a>
            <a href="<?php echo e(route('inventory.exportPdf', request()->query())); ?>" class="btn btn-outline-dark">
                <i class="fas fa-file-pdf me-1"></i> PDF
            </a>
            <a href="<?php echo e(route('bill-of-materials.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-boxes me-1"></i> Kelola Bill of Materials
            </a>
        </div>
    </div>

    <p class="text-muted mb-4">Manage your inventory with EOQ calculations.</p>

    
    <div class="table-responsive">
        <table id="inventoryTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Item Name</th>
                    <th>Jenis</th>
                    <th>Category</th>
                    <th>Stock</th>
                    <th>Reorder Point</th>
                    <th>EOQ</th>
                    <th>Status</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $reorder = $item->Reorder_Point ?? 100;
                        $eoq = $item->EOQ ?? 300;

                        [$status, $badge] = match (true) {
                            $item->Stok <= $reorder / 2 => ['Critical Low', 'danger'],
                            $item->Stok < $reorder => ['Below Reorder Point', 'warning'],
                            default => ['In Stock', 'success'],
                        };
                    ?>
                    <tr>
                        <td><strong><?php echo e($item->Nama_Bahan); ?></strong></td>
                        <td><?php echo e($item->Jenis ?? 'Unknown'); ?></td>
                        <td><?php echo e($item->kategori->Nama_Kategori ?? 'Unknown'); ?></td>
                        <td><?php echo e($item->Stok); ?> unit</td>
                        <td><?php echo e($reorder); ?> unit</td>
                        <td><?php echo e($eoq); ?> unit</td>
                        <td><span class="badge bg-<?php echo e($badge); ?>"><?php echo e($status); ?></span></td>
                        <td style="white-space: nowrap;">
                            <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                <a href="<?php echo e(route('inventory.show', ['inventory' => $item->Id_Bahan])); ?>" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('inventory.edit', ['inventory' => $item->Id_Bahan])); ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('inventory.destroy', ['inventory' => $item->Id_Bahan])); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">No items found.</td>
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
        $('#inventoryTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search table...",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching items found",
                info: "Showing _START_ to _END_ of _TOTAL_ items",
                infoEmpty: "No items available",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/inventory/index.blade.php ENDPATH**/ ?>