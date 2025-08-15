<?php $__env->startSection('content'); ?>
<div class="container">
    <h4 class="fw-bold">Reports & Analytics</h4>
    <p class="text-muted">Generate and view reports for different business areas</p>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Inventory Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Production Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Procurement Reports</a>
        </li>
    </ul>

    

<?php $__env->startSection('content'); ?>
<div class="container">
    <h4 class="fw-bold">Reports & Analytics</h4>
    <p class="text-muted">Generate and view reports for different business areas</p>

    
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Inventory Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Production Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Procurement Reports</a>
        </li>
    </ul>

    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Stock Value</h6>
                    <h4 class="text-primary">$<?php echo e(number_format($data['stockValue'])); ?></h4>
                    <small class="text-success">▲ <?php echo e($data['inventoryGrowth']); ?>% from last month</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Items Below ROP</h6>
                    <h4 class="text-warning"><?php echo e($data['itemsBelowROP']); ?></h4>
                    <small class="text-danger">Critical: <?php echo e($data['criticalItems']); ?> items need immediate order</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Inventory Turns</h6>
                    <h4 class="text-success"><?php echo e($data['inventoryTurns']); ?></h4>
                    <small class="text-success">▲ 0.5 from last quarter</small>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header">Inventory Value by Category</div>
        <div class="card-body text-center">
            <img src="https://images.pexels.com/photos/6801648/pexels-photo-6801648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1" alt="Inventory value chart" class="img-fluid mb-3 rounded-3 shadow-sm" style="width: 20%; height: 20%;">
            <div class="row">
                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <strong><?php echo e($cat['name']); ?></strong><br>
                        $<?php echo e(number_format($cat['value'])); ?><br>
                        <small><?php echo e($cat['percentage']); ?>% of total</small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">EOQ Analysis Summary</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Annual Demand</th>
                        <th>Optimal Order Qty</th>
                        <th>Reorder Point</th>
                        <th>Annual Holding Cost</th>
                        <th>Annual Order Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['eoqSummary']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item['material']); ?></td>
                        <td><?php echo e($item['demand']); ?></td>
                        <td><?php echo e($item['qty']); ?></td>
                        <td><?php echo e($item['rop']); ?></td>
                        <td><?php echo e($item['holding']); ?></td>
                        <td><?php echo e($item['orderCost']); ?></td>
                        <td><?php echo e($item['total']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Stock Value</h6>
                    <h4 class="text-primary">$<?php echo e(number_format($data['stockValue'])); ?></h4>
                    <small class="text-success">▲ <?php echo e($data['inventoryGrowth']); ?>% from last month</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Items Below ROP</h6>
                    <h4 class="text-warning"><?php echo e($data['itemsBelowROP']); ?></h4>
                    <small class="text-danger">Critical: <?php echo e($data['criticalItems']); ?> items need immediate order</small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Inventory Turns</h6>
                    <h4 class="text-success"><?php echo e($data['inventoryTurns']); ?></h4>
                    <small class="text-success">▲ 0.5 from last quarter</small>
                </div>
            </div>
        </div>
    </div>

    
    <div class="card mb-4">
        <div class="card-header">Inventory Value by Category</div>
        <div class="card-body text-center">
            <img src="https://images.pexels.com/photos/6801648/pexels-photo-6801648.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1260&amp;h=750&amp;dpr=1" alt="Inventory value chart" class="img-fluid mb-3 rounded-3 shadow-sm" style="width: 20%; height: 20%;">
            <div class="row">
                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3">
                        <strong><?php echo e($cat['name']); ?></strong><br>
                        $<?php echo e(number_format($cat['value'])); ?><br>
                        <small><?php echo e($cat['percentage']); ?>% of total</small>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    
    <div class="card">
        <div class="card-header">EOQ Analysis Summary</div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Material</th>
                        <th>Annual Demand</th>
                        <th>Optimal Order Qty</th>
                        <th>Reorder Point</th>
                        <th>Annual Holding Cost</th>
                        <th>Annual Order Cost</th>
                        <th>Total Cost</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $data['eoqSummary']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item['material']); ?></td>
                        <td><?php echo e($item['demand']); ?></td>
                        <td><?php echo e($item['qty']); ?></td>
                        <td><?php echo e($item['rop']); ?></td>
                        <td><?php echo e($item['holding']); ?></td>
                        <td><?php echo e($item['orderCost']); ?></td>
                        <td><?php echo e($item['total']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/aisyahazzahra/Documents/GitHub/TA/resources/views/reports/index.blade.php ENDPATH**/ ?>