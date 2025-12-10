<?php $__env->startSection('title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Orders</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?php echo e(route('orders.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Order
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Filters -->
        <form method="GET" action="<?php echo e(route('orders.index')); ?>" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <select name="status" class="form-control">
                        <option value="">All Status</option>
                        <option value="Pending" <?php echo e(request('status') == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="Completed" <?php echo e(request('status') == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                        <option value="Cancelled" <?php echo e(request('status') == 'Cancelled' ? 'selected' : ''); ?>>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by order number or customer..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <!-- Orders Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><strong><?php echo e($order->order_number); ?></strong></td>
                            <td><?php echo e($order->customer->name ?? 'N/A'); ?></td>
                            <td>Rs.<?php echo e(number_format($order->amount, 2)); ?></td>
                            <td>
                                <span class="badge <?php echo e(strtolower($order->status)); ?>"><?php echo e($order->status); ?></span>
                            </td>
                            <td><?php echo e($order->order_date->format('M d, Y')); ?></td>
                            <td>
                                <a href="<?php echo e(route('orders.show', $order)); ?>" class="btn btn-sm btn-info">View</a>
                                <a href="<?php echo e(route('orders.edit', $order)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('orders.destroy', $order)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No orders found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($orders->hasPages()): ?>
            <nav class="mt-4">
                <?php echo e($orders->links()); ?>

            </nav>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Zoro\Luffy\Projects\impact-guru-crm\resources\views/orders/index.blade.php ENDPATH**/ ?>