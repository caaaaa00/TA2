<?php $__env->startSection('content'); ?>
<div class="container">
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Pelanggan</h2>
        <a href="<?php echo e(route('pelanggan.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Pelanggan
        </a>
    </div>

    <p class="text-muted mb-4">Kelola data pelanggan yang terdaftar di sistem.</p>

    
    <div class="table-responsive">
        <table id="pelangganTable" class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Nomor Telp</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $pelanggan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($p->Id_Pelanggan); ?></td>
                        <td><?php echo e($p->Nama_Pelanggan); ?></td>
                        <td><?php echo e($p->Nomor_Telp); ?></td>
                        <td><?php echo e($p->Alamat); ?></td>
                        <td>
                            <form action="<?php echo e(route('pelanggan.toggle-status', $p->Id_Pelanggan)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PATCH'); ?>
                                <button type="submit" class="badge border-0
                                    <?php echo e($p->Status === 'Aktif' ? 'bg-success' : 'bg-secondary text-white'); ?>"
                                    style="cursor: pointer;">
                                    <?php echo e($p->Status ?? 'Tidak Aktif'); ?>

                                </button>
                            </form>
                        </td>
                        <td style="white-space: nowrap;">
                            <div class="d-flex justify-content-center gap-1 flex-nowrap">
                                <a href="<?php echo e(route('pelanggan.edit', $p->Id_Pelanggan)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="<?php echo e(route('pelanggan.destroy', $p->Id_Pelanggan)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?');" class="d-inline">
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
                        <td colspan="6" class="text-center text-muted">Tidak ada data pelanggan.</td>
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
        $('#pelangganTable').DataTable({
            pageLength: 10,
            responsive: true,
            autoWidth: false,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Cari pelanggan...",
                lengthMenu: "Tampilkan _MENU_ entri per halaman",
                zeroRecords: "Tidak ditemukan data yang sesuai",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ pelanggan",
                infoEmpty: "Tidak ada data pelanggan",
                paginate: {
                    previous: "‹",
                    next: "›"
                }
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/pelanggan/index.blade.php ENDPATH**/ ?>