<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
	$bg = "light";
} else {
	$bg = 'dark';
    $text = "light";
}
?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Create Trading Bot</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.bots.index')); ?>">Bot Trading</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Create Bot</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Create New Trading Bot</div>
                    </div>
                    <form action="<?php echo e(route('admin.bots.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <!-- Basic Information -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Bot Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="name" name="name" value="<?php echo e(old('name')); ?>"
                                               placeholder="Enter bot name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bot_type">Trading Market <span class="text-danger">*</span></label>
                                        <select class="form-control <?php $__errorArgs = ['bot_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="bot_type" name="bot_type" required>
                                            <option value="">Select Market</option>
                                            <?php $__currentLoopData = $botTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($key); ?>" <?php echo e(old('bot_type') == $key ? 'selected' : ''); ?>>
                                                    <?php echo e($value); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['bot_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                  id="description" name="description" rows="4"
                                                  placeholder="Enter bot description" required><?php echo e(old('description')); ?></textarea>
                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Investment Settings -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="min_investment">Minimum Investment ($) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['min_investment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="min_investment" name="min_investment" value="<?php echo e(old('min_investment', 100)); ?>"
                                               step="0.01" min="1" required>
                                        <?php $__errorArgs = ['min_investment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_investment">Maximum Investment ($) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['max_investment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="max_investment" name="max_investment" value="<?php echo e(old('max_investment', 10000)); ?>"
                                               step="0.01" min="1" required>
                                        <?php $__errorArgs = ['max_investment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Profit Settings -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_profit_min">Daily Profit Min (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['daily_profit_min'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="daily_profit_min" name="daily_profit_min" value="<?php echo e(old('daily_profit_min', 0.5)); ?>"
                                               step="0.01" min="0" max="100" required>
                                        <?php $__errorArgs = ['daily_profit_min'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daily_profit_max">Daily Profit Max (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['daily_profit_max'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="daily_profit_max" name="daily_profit_max" value="<?php echo e(old('daily_profit_max', 3.0)); ?>"
                                               step="0.01" min="0" max="100" required>
                                        <?php $__errorArgs = ['daily_profit_max'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Bot Performance -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="success_rate">Success Rate (%) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['success_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="success_rate" name="success_rate" value="<?php echo e(old('success_rate', 85)); ?>"
                                               min="50" max="99" required>
                                        <?php $__errorArgs = ['success_rate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="duration_days">Duration (Days) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control <?php $__errorArgs = ['duration_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="duration_days" name="duration_days" value="<?php echo e(old('duration_days', 30)); ?>"
                                               min="1" max="365" required>
                                        <?php $__errorArgs = ['duration_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select class="form-control <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                id="status" name="status" required>
                                            <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                                            <option value="inactive" <?php echo e(old('status') == 'inactive' ? 'selected' : ''); ?>>Inactive</option>
                                            <option value="maintenance" <?php echo e(old('status') == 'maintenance' ? 'selected' : ''); ?>>Maintenance</option>
                                        </select>
                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Bot Image -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Bot Avatar (Optional)</label>
                                        <input type="file" class="form-control-file <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               id="image" name="image" accept="image/*">
                                        <small class="form-text text-muted">Upload an image for the bot (max 2MB)</small>
                                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Trading Pairs -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="trading_pairs">Trading Pairs</label>
                                        <div id="trading-pairs-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="trading_pairs[]"
                                                           placeholder="e.g., EUR/USD, BTC/USD">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button" class="btn btn-primary btn-sm" id="add-pair">
                                                        <i class="fa fa-plus"></i> Add Pair
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted">Add trading pairs that this bot will trade</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-action">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> Create Bot
                            </button>
                            <a href="<?php echo e(route('admin.bots.index')); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add trading pair functionality
    let pairCount = 1;
    document.getElementById('add-pair').addEventListener('click', function() {
        if (pairCount < 10) { // Limit to 10 pairs
            const container = document.getElementById('trading-pairs-container');
            const newRow = document.createElement('div');
            newRow.className = 'row mt-2';
            newRow.innerHTML = `
                <div class="col-md-8">
                    <input type="text" class="form-control" name="trading_pairs[]" placeholder="e.g., EUR/USD, BTC/USD">
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-danger btn-sm remove-pair">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            `;
            container.appendChild(newRow);
            pairCount++;
        }
    });

    // Remove trading pair functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-pair') || e.target.parentElement.classList.contains('remove-pair')) {
            const row = e.target.closest('.row');
            row.remove();
            pairCount--;
        }
    });

    // Validate profit ranges
    document.getElementById('daily_profit_min').addEventListener('change', function() {
        const minVal = parseFloat(this.value);
        const maxInput = document.getElementById('daily_profit_max');
        if (parseFloat(maxInput.value) <= minVal) {
            maxInput.value = (minVal + 0.5).toFixed(2);
        }
    });

    document.getElementById('daily_profit_max').addEventListener('change', function() {
        const maxVal = parseFloat(this.value);
        const minInput = document.getElementById('daily_profit_min');
        if (parseFloat(minInput.value) >= maxVal) {
            minInput.value = (maxVal - 0.5).toFixed(2);
        }
    });

    // Validate investment ranges
    document.getElementById('min_investment').addEventListener('change', function() {
        const minVal = parseFloat(this.value);
        const maxInput = document.getElementById('max_investment');
        if (parseFloat(maxInput.value) <= minVal) {
            maxInput.value = (minVal * 10).toFixed(2);
        }
    });

    document.getElementById('max_investment').addEventListener('change', function() {
        const maxVal = parseFloat(this.value);
        const minInput = document.getElementById('min_investment');
        if (parseFloat(minInput.value) >= maxVal) {
            minInput.value = (maxVal / 10).toFixed(2);
        }
    });
});
</script>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/admin/bots/create.blade.php ENDPATH**/ ?>