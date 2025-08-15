<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Purchase Orders</h2>
        <a href="<?php echo e(route('procurement.create_purchaseOrder')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> New Purchase Order
        </a>
    </div>

    <p class="text-muted mb-4">Manage your purchase order records below.</p>

    
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center border-primary">
                <div class="card-body">
                    <h6>Total Orders</h6>
                    <h4><?php echo e($orders->count()); ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-warning">
                <div class="card-body">
                    <h6>Pending Orders</h6>
                    <h4><?php echo e($orders->where('Status', 'Pending')->count()); ?></h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-success">
                <div class="card-body">
                    <h6>Completed Orders</h6>
                    <h4><?php echo e($orders->where('Status', 'Completed')->count()); ?></h4>
                </div>
            </div>
        </div>
    </div>

    
    <ul class="nav nav-tabs mb-3" id="procurementTabs">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo e(route('procurement.index')); ?>">Purchase Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('procurement.supplier')); ?>">Suppliers</a>
        </li>
    </ul>

    
    <div class="table-responsive">
        <table id="purchaseOrderTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID PO</th>
                    <th>Supplier</th>
                    <th>Nama Barang</th>
                    <th>Tgl Pemesanan</th>
                    <th>Tgl Kedatangan</th>
                    <th>Total Biaya</th>
                    <th>Status</th>
                    <th>Pembayaran</th>
                    <th style="width: 140px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><strong>PO-<?php echo e($order->Id_Pembelian); ?></strong></td>
                        <td><?php echo e($order->supplier->Nama_Supplier ?? 'Unknown'); ?></td>
                        <td>
                            <?php if($order->barangs && $order->barangs->count()): ?>
                                <ul class="mb-0 ps-3">
                                    <?php $__currentLoopData = $order->barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($barang->Nama_Bahan); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($order->Tanggal_Pemesanan ? \Carbon\Carbon::parse($order->Tanggal_Pemesanan)->format('d M Y') : '-'); ?></td>
                        <td><?php echo e($order->Tanggal_Kedatangan ? \Carbon\Carbon::parse($order->Tanggal_Kedatangan)->format('d M Y') : '-'); ?></td>
                        <td>Rp <?php echo e(number_format($order->Total_Biaya, 0, ',', '.')); ?></td>
                        <td>
    <form action="<?php echo e(route('procurement.toggle_status', $order->Id_Pembelian)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <button type="submit" class="badge border-0 
            <?php echo e($order->Status == 'Pending' ? 'bg-warning text-dark' : 'bg-success'); ?>"
            style="cursor: pointer;">
            <?php echo e($order->Status); ?>

        </button>
    </form>
</td>



<td>
    <form action="<?php echo e(route('procurement.toggle_payment', $order->Id_Pembelian)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <button type="submit" class="badge border-0 
            <?php if($order->Status_Pembayaran == 'Pending'): ?> bg-warning text-dark
            <?php elseif($order->Status_Pembayaran == 'Confirmed'): ?> bg-info text-white
            <?php else: ?> bg-secondary text-white
            <?php endif; ?>"
            style="cursor: pointer;">
            <?php echo e($order->Status_Pembayaran); ?>

        </button>
    </form>
</td>

                        <td style="white-space: nowrap;">
                            <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                <a href="<?php echo e(route('procurement.show_po', $order->Id_Pembelian)); ?>" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('procurement.edit_purchaseOrder', $order->Id_Pembelian)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('procurement.destroy_purchaseOrder', $order->Id_Pembelian)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus PO ini?');" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center text-muted">No purchase orders found.</td>
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
        $('#purchaseOrderTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search orders...",
                lengthMenu: "Show _MENU_ entries per page",
                zeroRecords: "No matching orders found",
                info: "Showing _START_ to _END_ of _TOTAL_ orders",
                infoEmpty: "No orders available",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/procurement/index.blade.php ENDPATH**/ ?>