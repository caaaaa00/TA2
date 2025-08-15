<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2><strong>Production Management</strong></h2>
    <p>Plan, schedule, and track production orders</p>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php elseif(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    
    <ul class="nav nav-tabs mb-3" id="productionTabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="current-tab" data-bs-toggle="tab" href="#current" role="tab">Current</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="planned-tab" data-bs-toggle="tab" href="#planned" role="tab">Planned</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab">Completed</a>
        </li>
    </ul>

    
    <div class="tab-content" id="productionTabsContent">
        
        <div class="tab-pane fade show active" id="current" role="tabpanel" aria-labelledby="current-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold">Currently Running Production Orders</span>
                                <a href="<?php echo e(route('production.create')); ?>" class="btn btn-primary">New Production Order</a>
            </div>
            <?php echo $__env->make('production.partials.list', ['produksi' => $produksiBerjalan], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <div class="tab-pane fade" id="planned" role="tabpanel" aria-labelledby="planned-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold">Planned Production Orders</span>
                <a href="<?php echo e(route('production.create')); ?>" class="btn btn-primary">New Production Order</a>
            </div>
            <?php echo $__env->make('production.partials.list', ['produksi' => $produksiDirencanakan], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

        
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="fw-semibold">Completed Production Orders</span>
            </div>
            <?php echo $__env->make('production.partials.list', ['produksi' => $produksiSelesai], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <hr>

    
    <h4 class="mt-4">Daftar BOM</h4>
    <?php $__empty_1 = true; $__currentLoopData = $boms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bom): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($bom->Nama_bill_of_material ?? 'BOM #' . $bom->Id_bill_of_material); ?></h5>
                <p class="card-text text-muted">
                    Status:
                    <span class="badge bg-<?php echo e($bom->Status == 'approved' ? 'success' : 
                        ($bom->Status == 'draft' ? 'warning' : 'danger')); ?>">
                        <?php echo e(ucfirst($bom->Status ?? '-')); ?>

                    </span>
                </p>

                <?php if($bom->barang->isEmpty()): ?>
                    <p class="text-muted">Tidak ada bahan baku yang terhubung.</p>
                <?php else: ?>
                    <ul class="list-group list-group-flush mt-2">
                        <?php $__currentLoopData = $bom->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo e($barang->Nama_Bahan); ?>

                                <span class="badge bg-primary rounded-pill">
                                    <?php echo e($barang->pivot->Jumlah ?? 0); ?>

                                </span>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                <?php endif; ?>

                <a href="<?php echo e(route('bill-of-materials.show', $bom->Id_bill_of_material)); ?>" class="btn btn-outline-primary btn-sm mt-3">
                    Lihat Detail BOM
                </a>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">Belum ada data BOM.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/production/index.blade.php ENDPATH**/ ?>