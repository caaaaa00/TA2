<?php $__empty_1 = true; $__currentLoopData = $produksi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="card mb-3">
        <div class="card-body">
            
            <h5 class="card-title">Produksi: <?php echo e($order->Hasil_Produksi ?? '-'); ?></h5>

            
            <p class="card-text mb-1">
                <i class="bi bi-calendar"></i>
                <?php echo e($order->Tanggal_Produksi ? \Carbon\Carbon::parse($order->Tanggal_Produksi)->format('d M Y') : '-'); ?>

                &nbsp; • &nbsp; Batch ID: <?php echo e($order->Id_Produksi); ?>

            </p>

            
            <p class="card-text mb-1 text-muted">
                <i class="bi bi-diagram-3"></i> Status: <?php echo e(ucfirst($order->Status)); ?>

            </p>

            
            <?php if($order->pesananProduksi): ?>
                <p class="card-text mb-1">
                    <strong>Pesanan:</strong>
                    <?php echo e($order->pesananProduksi->Jumlah_Pesanan); ?> unit -
                    <?php echo e($order->pesananProduksi->Tanggal_Pesanan
                        ? \Carbon\Carbon::parse($order->pesananProduksi->Tanggal_Pesanan)->format('d M Y')
                        : '-'); ?>

                </p>
            <?php endif; ?>

            
            <?php if($order->jadwal): ?>
                <p class="card-text mb-1">
                    <strong>Jadwal:</strong>
                    <?php echo e($order->jadwal->Tanggal_Mulai ? \Carbon\Carbon::parse($order->jadwal->Tanggal_Mulai)->format('d M') : '-'); ?>

                    -
                    <?php echo e($order->jadwal->Tanggal_Selesai ? \Carbon\Carbon::parse($order->jadwal->Tanggal_Selesai)->format('d M Y') : '-'); ?>

                    (<?php echo e($order->jadwal->Status ?? '-'); ?>)
                </p>
            <?php endif; ?>

            
            <?php if($order->bom): ?>
                <div class="mt-3">
                    <strong>BOM: <?php echo e($order->bom->Nama_bill_of_material ?? 'BOM #' . $order->bom->Id_bill_of_material); ?></strong>
                    <p class="text-muted mb-1">
                        Status:
                        <span class="badge bg-<?php echo e($order->bom->Status == 'approved' ? 'success' : 
                            ($order->bom->Status == 'draft' ? 'warning' : 'danger')); ?>">
                            <?php echo e(ucfirst($order->bom->Status ?? '-')); ?>

                        </span>
                    </p>

                    <?php if($order->bom->barang->isEmpty()): ?>
                        <p class="text-muted">Tidak ada bahan baku dalam BOM.</p>
                    <?php else: ?>
                        <ul class="list-group list-group-sm list-group-flush">
                            <?php $__currentLoopData = $order->bom->barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo e($barang->Nama_Bahan); ?> (<?php echo e($barang->Jenis); ?>)
                                    <span class="badge bg-primary rounded-pill"><?php echo e($barang->pivot->Jumlah ?? 0); ?></span>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            
            <span class="badge bg-light text-primary border border-primary mt-2"><?php echo e(ucfirst($order->Status)); ?></span>

            
            <?php
                $jumlahBerhasil = $order->Jumlah_Berhasil ?? 0;
                $jumlahGagal = $order->Jumlah_Gagal ?? 0;
                $totalProduksi = $jumlahBerhasil + $jumlahGagal;
                $progress = $totalProduksi > 0 ? ($jumlahBerhasil / $totalProduksi) * 100 : 0;

                $barColor = 'bg-primary';
                if ($progress < 30) $barColor = 'bg-danger';
                elseif ($progress < 70) $barColor = 'bg-warning';
            ?>

            <div class="progress mt-2" style="height: 6px;">
                <div class="progress-bar <?php echo e($barColor); ?>" role="progressbar"
                     style="width: <?php echo e($progress); ?>%; transition: width 0.6s ease;"
                     aria-valuenow="<?php echo e($jumlahBerhasil); ?>"
                     aria-valuemin="0"
                     aria-valuemax="<?php echo e($totalProduksi); ?>">
                </div>
            </div>
            <small class="text-muted"><?php echo e(round($progress)); ?>% Complete</small>

            
            <div class="dropdown mt-3">
                <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Aksi
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('production.edit', $order->Id_Produksi)); ?>">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="<?php echo e(route('production.show', $order->Id_Produksi)); ?>">
                            <i class="bi bi-eye"></i> View Details
                        </a>
                    </li>
                    <?php if($order->Status !== 'Selesai'): ?>
                        <li>
                            <form method="POST" action="<?php echo e(route('production.update-status', $order->Id_Produksi)); ?>" class="px-3">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="Status" value="Selesai">
                                <button type="submit" class="dropdown-item text-success p-0 mt-2">
                                    <i class="bi bi-check-circle"></i> Mark Complete
                                </button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p class="text-muted">Tidak ada data produksi.</p>
<?php endif; ?>
<?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/production/partials/list.blade.php ENDPATH**/ ?>