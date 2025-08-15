<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Sales Order</h2>
        <a href="<?php echo e(route('pesanan_produksi.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Pesanan Baru
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    
    <div class="table-responsive">
        <table id="pesananProduksiTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Pelanggan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>SPP</th>
                    <th style="width: 220px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pesanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($item->Id_Pesanan); ?></td>
                        <td><?php echo e($item->user->name ?? '-'); ?></td>
                        <td><?php echo e($item->pelanggan->Nama_Pelanggan ?? '-'); ?></td>
                        <td><?php echo e($item->Jumlah_Pesanan); ?></td>
                        <td><?php echo e($item->Tanggal_Pesanan ? \Carbon\Carbon::parse($item->Tanggal_Pesanan)->format('d M Y') : '-'); ?></td>
                        <td>
                            <?php
                                $badgeClass = match($item->Status) {
                                    'Menunggu' => 'warning',
                                    'Diproses' => 'primary',
                                    'Selesai' => 'success',
                                    default    => 'secondary',
                                };
                            ?>
                            <span class="badge bg-<?php echo e($badgeClass); ?>"><?php echo e($item->Status); ?></span>
                        </td>
                        <td>
                            <?php if($item->Surat_Perintah_Produksi): ?>
                                <a href="<?php echo e(asset('storage/'.$item->Surat_Perintah_Produksi)); ?>" target="_blank" class="btn btn-sm btn-secondary">
                                    Lihat
                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                        <td style="white-space: nowrap;">
                            <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                <a href="<?php echo e(route('pesanan_produksi.show', $item->Id_Pesanan)); ?>" class="btn btn-sm btn-info" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('pesanan_produksi.edit', $item->Id_Pesanan)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('pesanan_produksi.destroy', $item->Id_Pesanan)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesanan ini?');" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center text-muted">Tidak ada pesanan produksi.</td>
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
        $('#pesananProduksiTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari pesanan...",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                zeroRecords: "Tidak ada pesanan yang cocok",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ pesanan",
                infoEmpty: "Tidak ada data pesanan",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/pesanan_produksi/index.blade.php ENDPATH**/ ?>