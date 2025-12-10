

<?php $__env->startSection('title', $customer->name); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-8">
        <h2><?php echo e($customer->name); ?></h2>
    </div>
    <div class="col-md-4 text-end">
        <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-warning">Edit</a>
        <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-secondary">Back</a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="mb-0">Customer Information</h5>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> <?php echo e($customer->email); ?></p>
                <p><strong>Phone:</strong> <?php echo e($customer->phone); ?></p>
                <p><strong>Address:</strong> <?php echo e($customer->address); ?></p>
                <p><strong>Created:</strong> <?php echo e($customer->created_at->format('M d, Y H:i')); ?></p>
            </div>
        </div>

        <!-- Orders Section -->
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="mb-0">Orders</h5>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="<?php echo e(route('orders.create', ['customer_id' => $customer->id])); ?>" class="btn btn-sm btn-primary">Create Order</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $customer->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><strong><?php echo e($order->order_number); ?></strong></td>
                                <td>$<?php echo e(number_format($order->amount, 2)); ?></td>
                                <td><span class="badge <?php echo e(strtolower($order->status)); ?>"><?php echo e($order->status); ?></span></td>
                                <td><?php echo e($order->created_at->format('M d, Y')); ?></td>
                                <td><a href="<?php echo e(route('orders.show', $order)); ?>" class="btn btn-sm btn-info">View</a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No orders yet</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <?php if($customer->profile_image): ?>
            <div class="card">
                <img src="<?php echo e(asset('storage/' . $customer->profile_image)); ?>" class="card-img-top" alt="Profile">
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Zoro\Luffy\Projects\impact-guru-crm\resources\views/customers/show.blade.php ENDPATH**/ ?>