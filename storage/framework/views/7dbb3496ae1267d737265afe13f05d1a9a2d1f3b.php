
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 ">Requested Loans</h1>
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
                <div class="col-12 card shadow p-4 ">
                    <div class="table-responsive" data-example-id="hoverable-table">
                        <table id="ShipTable" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>Client name</th>
                
                                    <th>Amount Requested</th>
                                    <th>Duration</th>
                                    <th>Purpose</th>
                                    <th>Credit facility</th>
                                    <th>status</th>
                                    <th> Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                         <?php if(isset( $plan->luser->name ) &&  $plan->luser->name != null): ?> 
                                        <td><?php echo e($plan->luser->name); ?></td>
                                        <?php endif; ?>
                                        
                                        <td><?php echo e($settings->currency); ?><?php echo e(number_format($plan->amount)); ?></td>
                                        <td><?php echo e($plan->duration); ?> Weeks</td>
                                        <td>
                                            <?php echo e($plan->purpose); ?>

                                        </td>
                                        <td>
                                            <?php echo e($plan->facility); ?>

                                        </td>
                                        <?php if($plan->active=='Pending'): ?>
                                        <td class='bg-warning'>
                                            <?php echo e($plan->active); ?>

                                        </td>

                                        <?php else: ?>
                                        <td>
                                            <?php echo e($plan->active); ?>

                                        </td>
                                        <?php endif; ?>
                                        <td><?php echo e($plan->created_at->toDayDateTimeString()); ?></td>
                                        
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-danger"
                                                        href="<?php echo e(route('deleteloan', $plan->id)); ?>">Delete</a>

                                                        <?php if($plan->active == 'Pending'): ?>
                                                        <a href="<?php echo e(route('loanas', ['id' => $plan->id, 'status' => 'Processed'])); ?>"
                                                            class=" dropdown-itemm-1 btn btn-success btn-sm">Mark as Paid</a>
                                                    <?php else: ?>
                                                        <a  href="<?php echo e(route('loanas', ['id' => $plan->id, 'status' => 'Pending'])); ?>"
                                                            class=" dropdown-item m-1 btn btn-danger btn-sm">Mark as Unpaid</a>
                                                    <?php endif; ?>
                                                    <!-- <a class="dropdown-item"
                                                        href="<?php echo e(route('user.plans', $plan->luser->id)); ?>">More actions</a> -->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/admin/Plans/loans.blade.php ENDPATH**/ ?>