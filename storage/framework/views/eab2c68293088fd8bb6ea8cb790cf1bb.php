

<?php $__env->startSection('title', 'Customers'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Customers</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add Customer
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <!-- Search Bar -->
        <form method="GET" action="<?php echo e(route('customers.index')); ?>" class="mb-3">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Search customers by name or email..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary w-100">Search</button>
                </div>
            </div>
        </form>

        <!-- Customers Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($customer->id); ?></td>
                            <td><?php echo e($customer->name); ?></td>
                            <td><?php echo e($customer->email); ?></td>
                            <td><?php echo e($customer->phone); ?></td>
                            <td><?php echo e(strlen($customer->address) > 30 ? substr($customer->address, 0, 30) . '...' : $customer->address); ?></td>
                            <td>
                                <a href="<?php echo e(route('customers.show', $customer)); ?>" class="btn btn-sm btn-info">View</a>
                                <a href="<?php echo e(route('customers.edit', $customer)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <form action="<?php echo e(route('customers.destroy', $customer)); ?>" method="POST" style="display:inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">No customers found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($customers->hasPages()): ?>
            <nav class="mt-4">
                <?php echo e($customers->links()); ?>

            </nav>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\Zoro\Luffy\Projects\impact-guru-crm\resources\views/customers/index.blade.php ENDPATH**/ ?>