<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
} else {
    $text = 'light';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1  d-inline"> <?php echo e($user->name); ?> Clients Trades</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('viewuser', $user->id)); ?>"> <i
                                    class="fa fa-arrow-left"></i> back</a>
                        </div>
                    </div>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mb-5 row">
                    <div class="col card p-3 shadow ">
                        <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table">
                            <span style="margin:3px;">
                                <table id="ShipTable" class="table table-hover ">
                                    <thead>
                                        <tr>
                                            
                                            <th>Assets</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Leverage</th>
                                            <th>Trade Type</th>
                                            <th>Duration</th>
                                            <th>Created on</th>
                                            <th>Expire At</th>
                                            <th>Profit/Loss</th>
                                            <th>Option</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                
                                                <td><?php echo e($plan->assets); ?></td>
                                                <td><?php echo e($user->currency); ?><?php echo e(number_format($plan->amount)); ?></td>
                                                <td>
                                                    <?php if($plan->active == 'yes'): ?>
                                                        <span class="badge badge-success"><?php echo e($plan->active); ?></span>
                                                    <?php else: ?>
                                                        <span class="badge badge-danger"><?php echo e($plan->active); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>1:<?php echo e($plan->leverage); ?></td>
                                                <?php if($plan->type=='Buy'): ?>
                                                <td >
                                                    <span class='badge badge-success'><?php echo e($plan->type); ?></span>
                                                </td>
                                                <?php else: ?>
                                                <td>
                                                    <span class="badge badge-danger"><?php echo e($plan->type); ?></span>
                                                </td>
                                                   
                                                <?php endif; ?>
                                                
                                                <td><?php echo e($plan->inv_duration); ?></td>
                                                <td><?php echo e(\Carbon\Carbon::parse($plan->created_at)->toDayDateTimeString()); ?>

                                                </td>
                                                <td><?php echo e(\Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString()); ?>

                                                </td>

                                                <td>
                                                
                                                    <?php if($plan->active == 'yes'): ?>
                                                    <a href="<?php echo e(route('markprofit', $plan->id)); ?>"
                                                        class="m-1 btn btn-success btn-sm"> Mark as Profit</a>
                                                        <a href="<?php echo e(route('markloss', $plan->id)); ?>"
                                                            class="m-1 btn btn-danger btn-sm"> Mark as loss</a>
                                                            <?php endif; ?>
                                            </td>
                                                <td>
                                                    
                                                    <?php if($plan->active == 'yes'): ?>
                                                        <a href="<?php echo e(route('markas', ['id' => $plan->id, 'status' => 'expired'])); ?>"
                                                            class="m-1 btn btn-danger btn-sm">Mark as expired</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(route('markas', ['id' => $plan->id, 'status' => 'yes'])); ?>"
                                                            class="m-1 btn btn-success btn-sm">Mark as active</a>
                                                    <?php endif; ?>

                                                    <a href="<?php echo e(route('deleteplan', $plan->id)); ?>"
                                                        class="m-1 btn btn-info btn-sm"> Delete Trade</a>  
                                                </td>

                                            
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/admin/Users/user_plans.blade.php ENDPATH**/ ?>