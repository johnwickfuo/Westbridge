<?php $__env->startSection('title', 'Edit Trade'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Edit Trade</h4>
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
                        <a href="<?php echo e(route('admin.trades.index')); ?>">Trades</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>

            <!-- Success/Error Messages -->
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i><?php echo e(session('success')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle mr-2"></i><?php echo e(session('error')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><i class="fas fa-exclamation-triangle mr-2"></i>Please fix the following errors:</h6>
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <!-- Edit Trade Form -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <i class="fas fa-edit mr-2"></i>Edit Trade #<?php echo e($trade->id); ?>

                                </h4>
                                <div class="ml-auto">
                                    <a href="<?php echo e(route('admin.trades.index')); ?>" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-arrow-left mr-1"></i>Back to Trades
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Trade User Info -->
                            <div class="row mb-4">
                                <div class="col-md-12">
                                    <div class="alert alert-info">
                                        <h6><i class="fas fa-user mr-2"></i>Trade Owner Information</h6>
                                        <strong>Name:</strong> <?php echo e($trade->user->name ?? 'N/A'); ?><br>
                                        <strong>Email:</strong> <?php echo e($trade->user->email ?? 'N/A'); ?><br>
                                        <strong>Created:</strong> <?php echo e($trade->created_at->format('M d, Y H:i')); ?>

                                    </div>
                                </div>
                            </div>

                            <form method="POST" action="<?php echo e(route('admin.trades.update', $trade->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="assets">Asset <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['assets'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="assets" name="assets" value="<?php echo e(old('assets', $trade->assets)); ?>" required>
                                            <?php $__errorArgs = ['assets'];
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
                                            <label for="symbol">Symbol</label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['symbol'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="symbol" name="symbol" value="<?php echo e(old('symbol', $trade->symbol)); ?>"
                                                   placeholder="e.g., BTC/USD">
                                            <?php $__errorArgs = ['symbol'];
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
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type">Trade Type <span class="text-danger">*</span></label>
                                            <select class="form-control <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="type" name="type" required>
                                                <option value="">Select Type</option>
                                                <option value="Buy" <?php echo e(old('type', $trade->type) == 'Buy' ? 'selected' : ''); ?>>Buy</option>
                                                <option value="Sell" <?php echo e(old('type', $trade->type) == 'Sell' ? 'selected' : ''); ?>>Sell</option>
                                            </select>
                                            <?php $__errorArgs = ['type'];
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
                                            <label for="amount">Amount ($) <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="amount" name="amount" value="<?php echo e(old('amount', $trade->amount)); ?>"
                                                   step="0.01" min="0" required>
                                            <?php $__errorArgs = ['amount'];
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
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="leverage">Leverage</label>
                                            <input type="number" class="form-control <?php $__errorArgs = ['leverage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="leverage" name="leverage" value="<?php echo e(old('leverage', $trade->leverage)); ?>"
                                                   min="1" max="1000">
                                            <small class="form-text text-muted">Leave empty for no leverage</small>
                                            <?php $__errorArgs = ['leverage'];
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
                                            <label for="profit_earned">Profit/Loss ($)</label>
                                            <input type="number" class="form-control <?php $__errorArgs = ['profit_earned'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="profit_earned" name="profit_earned" value="<?php echo e(old('profit_earned', $trade->profit_earned)); ?>"
                                                   step="0.01">
                                            <small class="form-text text-muted">Positive for profit, negative for loss</small>
                                            <?php $__errorArgs = ['profit_earned'];
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
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="active">Status <span class="text-danger">*</span></label>
                                            <select class="form-control <?php $__errorArgs = ['active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="active" name="active" required>
                                                <option value="yes" <?php echo e(old('active', $trade->active) == 'yes' ? 'selected' : ''); ?>>Active</option>
                                                <option value="expired" <?php echo e(old('active', $trade->active) == 'expired' ? 'selected' : ''); ?>>Expired</option>
                                            </select>
                                            <?php $__errorArgs = ['active'];
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
                                            <label for="expire_date">Expiry Date</label>
                                            <input type="datetime-local" class="form-control <?php $__errorArgs = ['expire_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                   id="expire_date" name="expire_date"
                                                   value="<?php echo e(old('expire_date', $trade->expire_date ? \Carbon\Carbon::parse($trade->expire_date)->format('Y-m-d\TH:i') : '')); ?>">
                                            <?php $__errorArgs = ['expire_date'];
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
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group text-right">
                                            <a href="<?php echo e(route('admin.trades.index')); ?>" class="btn btn-secondary mr-2">
                                                <i class="fas fa-times mr-1"></i>Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save mr-1"></i>Update Trade
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-bolt mr-2"></i>Quick Actions
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-success btn-block"
                                            onclick="showAddProfitForm(<?php echo e($trade->id); ?>)">
                                        <i class="fas fa-plus mr-2"></i>Add Profit to User ROI
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-danger btn-block"
                                            onclick="deleteTrade(<?php echo e($trade->id); ?>)">
                                        <i class="fas fa-trash mr-2"></i>Delete This Trade
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Profit Modal -->
<div class="modal fade" id="addProfitModal" tabindex="-1" role="dialog" aria-labelledby="addProfitModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfitModalLabel">
                    <i class="fas fa-plus-circle mr-2"></i>Add Profit to User ROI
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addProfitForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        This will add the specified amount to both the trade's profit_earned and the user's ROI.
                    </div>
                    <div class="form-group">
                        <label for="profit_amount">Profit Amount ($)</label>
                        <input type="number" class="form-control" id="profit_amount" name="profit_amount"
                               step="0.01" required placeholder="Enter amount to add">
                        <small class="form-text text-muted">Use positive numbers for profit, negative for loss</small>
                    </div>
                    <div class="form-group">
                        <label for="profit_note">Note (Optional)</label>
                        <textarea class="form-control" id="profit_note" name="note" rows="3"
                                  placeholder="Add a note about this profit adjustment..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-plus mr-1"></i>Add Profit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<style>
/* Sidebar Toggle Styles */
.sidebar {
    transition: all 0.3s ease;
}

.main-panel {
    transition: all 0.3s ease;
}

/* When sidebar is hidden */
body.sidebar-hide .sidebar {
    transform: translateX(-100%);
}

body.sidebar-hide .main-panel {
    margin-left: 0 !important;
    width: 100% !important;
}

/* Mobile sidebar overlay */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1040;
}

/* Responsive behavior */
@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: -270px;
        z-index: 1050;
    }

    .sidebar.sidebar-show {
        left: 0;
    }

    .main-panel {
        margin-left: 0 !important;
    }
}
</style>

<script>
$(document).ready(function() {
    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

    // Atlantis Theme Sidebar Toggle Functionality
    $('.toggle-sidebar').on('click', function(e) {
        e.preventDefault();
        console.log('Sidebar toggle clicked');

        // Toggle sidebar classes
        $('body').toggleClass('sidebar-hide');
        $('.sidebar').toggleClass('sidebar-show');
        $('.main-panel').toggleClass('full-height');

        // Check if sidebar is now hidden/shown
        if ($('body').hasClass('sidebar-hide')) {
            console.log('Sidebar hidden');
        } else {
            console.log('Sidebar shown');
        }
    });

    // Mobile sidebar toggle (sidenav-toggler)
    $('.sidenav-toggler').on('click', function(e) {
        e.preventDefault();
        console.log('Mobile sidebar toggle clicked');

        // For mobile, use different classes
        $('.sidebar').toggleClass('sidebar-show');
        $('body').toggleClass('sidebar-show');

        // Add overlay for mobile
        if ($('.sidebar').hasClass('sidebar-show')) {
            if (!$('.sidebar-overlay').length) {
                $('<div class="sidebar-overlay"></div>').appendTo('body');
            }
        } else {
            $('.sidebar-overlay').remove();
        }
    });

    // Close sidebar when clicking overlay (mobile)
    $(document).on('click', '.sidebar-overlay', function() {
        $('.sidebar').removeClass('sidebar-show');
        $('body').removeClass('sidebar-show');
        $(this).remove();
    });

    // Make functions globally available
    window.showAddProfitForm = showAddProfitForm;
    window.deleteTrade = deleteTrade;

    console.log('Functions assigned to window:', {
        showAddProfitForm: typeof window.showAddProfitForm,
        deleteTrade: typeof window.deleteTrade
    });
});// Simple function to show add profit modal
function showAddProfitForm(tradeId) {
    console.log('Opening add profit form for trade ID:', tradeId);

    // Set form action
    var profitUrl = '<?php echo e(url("/admin/trades")); ?>/' + tradeId + '/add-profit';
    $('#addProfitForm').attr('action', profitUrl);

    // Clear form
    $('#profit_amount').val('');
    $('#profit_note').val('');

    // Show the modal
    $('#addProfitModal').modal('show');
}

// Delete Trade Function
function deleteTrade(tradeId) {
    console.log('Delete Trade ID:', tradeId);

    var deleteUrl = '<?php echo e(url("/admin/trades")); ?>/' + tradeId;
    console.log('Delete URL:', deleteUrl);

    swal({
        title: "Delete Trade?",
        text: "This action cannot be undone. The trade record will be permanently deleted.",
        type: "warning",
        buttons: {
            cancel: {
                visible: true,
                text: "Cancel",
                className: "btn btn-secondary"
            },
            confirm: {
                text: "Yes, delete it!",
                className: "btn btn-danger"
            }
        }
    }).then((willDelete) => {
        if (willDelete) {
            console.log('Deleting trade with URL:', deleteUrl);

            // Create and submit form with proper Laravel URL
            var form = $('<form method="POST" action="' + deleteUrl + '">' +
                        '<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">' +
                        '<input type="hidden" name="_method" value="DELETE">' +
                        '</form>');
            $('body').append(form);
            form.submit();
        }
    });
}
</script>

<style>
/* Sidebar Toggle Styles */
.sidebar {
    transition: all 0.3s ease;
}

.main-panel {
    transition: all 0.3s ease;
}

/* When sidebar is hidden */
body.sidebar-hide .sidebar {
    transform: translateX(-100%);
}

body.sidebar-hide .main-panel {
    margin-left: 0 !important;
    width: 100% !important;
}

/* Mobile sidebar overlay */
.sidebar-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1040;
}

/* Responsive behavior */
@media (max-width: 768px) {
    .sidebar {
        position: fixed;
        left: -270px;
        z-index: 1050;
    }

    .sidebar.sidebar-show {
        left: 0;
    }

    .main-panel {
        margin-left: 0 !important;
    }
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u203026461/domains/remedyalgotradescript.sbs/public_html/resources/views/admin/trades/edit.blade.php ENDPATH**/ ?>