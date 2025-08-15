<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Suppliers</h2>
        <a href="<?php echo e(route('procurement.create_supplier')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> New Supplier
        </a>
    </div>

    <p class="text-muted mb-4">Manage supplier information</p>

    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center border-primary">
                <div class="card-body">
                    <h6>Total Suppliers</h6>
                    <h4><?php echo e($suppliers->count()); ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-success">
                <div class="card-body">
                    <h6>Active Suppliers</h6>
                    <h4><?php echo e($suppliers->where('Status', 'Active')->count()); ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-secondary">
                <div class="card-body">
                    <h6>Inactive Suppliers</h6>
                    <h4><?php echo e($suppliers->where('Status', 'Inactive')->count()); ?></h4>
                </div>
            </div>
        </div>
    </div>

    
    <ul class="nav nav-tabs mb-3" id="procurementTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('procurement.index')); ?>">Purchase Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo e(route('procurement.supplier')); ?>">Suppliers</a>
        </li>
    </ul>

    
    <div class="table-responsive">
        <table id="supplierTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID Supplier</th>
                    <th>Supplier Name</th>
                    <th>Employee Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($supplier->Id_Supplier); ?></td>
                    <td><?php echo e($supplier->Nama_Supplier); ?></td>
                    <td><?php echo e($supplier->Nama_Pegawai); ?></td>
                    <td><?php echo e($supplier->Email); ?></td>
                    <td><?php echo e($supplier->Kontak); ?></td>
                    <td><?php echo e($supplier->Alamat); ?></td>
                    <td>
                        <span class="badge bg-<?php echo e($supplier->Status == 'Active' ? 'success' : 'secondary'); ?>">
                            <?php echo e($supplier->Status); ?>

                        </span>
                    </td>
                    <td style="white-space: nowrap;">
                        <div class="d-flex justify-content-center gap-1 flex-nowrap">
                            <a href="<?php echo e(route('procurement.show_supplier', ['id' => $supplier->Id_Supplier])); ?>"
                               class="btn btn-sm btn-info" title="Show">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('procurement.edit_supplier', ['id' => $supplier->Id_Supplier])); ?>"
                               class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('procurement.destroy_supplier', ['id' => $supplier->Id_Supplier])); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="text-center text-muted">No suppliers found.</td>
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
        $('#supplierTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search suppliers...",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching suppliers found",
                info: "Showing _START_ to _END_ of _TOTAL_ suppliers",
                infoEmpty: "No suppliers available",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/procurement/supplier.blade.php ENDPATH**/ ?>