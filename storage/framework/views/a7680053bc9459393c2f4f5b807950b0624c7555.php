<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">User Trades Management</h4>
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
                        <a href="#">Management</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Trades</a>
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

            <!-- Trades Statistics -->
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                        <i class="fas fa-chart-line"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Trades</p>
                                        <h4 class="card-title"><?php echo e(number_format($stats['total'] ?? 0)); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-warning bubble-shadow-small">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Active Trades</p>
                                        <h4 class="card-title"><?php echo e(number_format($stats['active'] ?? 0)); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                        <i class="fas fa-check-circle"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Completed</p>
                                        <h4 class="card-title"><?php echo e(number_format($stats['expired'] ?? 0)); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-icon">
                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                </div>
                                <div class="col col-stats ml-3 ml-sm-0">
                                    <div class="numbers">
                                        <p class="card-category">Total Volume</p>
                                        <h4 class="card-title">$<?php echo e(number_format($stats['total_volume'] ?? 0, 2)); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters and Search -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <i class="fas fa-filter mr-2"></i>Filters & Search
                                </h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="collapse" data-target="#filtersCollapse" aria-expanded="false">
                                    <i class="fas fa-search"></i>
                                    Toggle Filters
                                </button>
                            </div>
                        </div>
                        <div class="collapse" id="filtersCollapse">
                            <div class="card-body">
                                <form method="GET" action="<?php echo e(route('admin.trades.index')); ?>">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="search">Search User</label>
                                                <input type="text" class="form-control" id="search" name="search"
                                                       value="<?php echo e(request('search')); ?>" placeholder="Username or Email">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="">All</option>
                                                    <option value="yes" <?php echo e(request('status') == 'yes' ? 'selected' : ''); ?>>Active</option>
                                                    <option value="expired" <?php echo e(request('status') == 'expired' ? 'selected' : ''); ?>>Expired</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="type">Trade Type</label>
                                                <select class="form-control" id="type" name="type">
                                                    <option value="">All</option>
                                                    <option value="Buy" <?php echo e(request('type') == 'Buy' ? 'selected' : ''); ?>>Buy</option>
                                                    <option value="Sell" <?php echo e(request('type') == 'Sell' ? 'selected' : ''); ?>>Sell</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="asset">Asset</label>
                                                <input type="text" class="form-control" id="asset" name="asset"
                                                       value="<?php echo e(request('asset')); ?>" placeholder="Asset name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>&nbsp;</label>
                                                <div>
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        <i class="fas fa-search mr-1"></i>Filter
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trades Table -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">
                                    <i class="fas fa-table mr-2"></i>User Trades (<?php echo e($trades->total()); ?> records)
                                </h4>
                                <div class="ml-auto">
                                    <!-- Test URL Button -->
                                    <button type="button" class="btn btn-info btn-sm mr-2" onclick="testRoutes()">
                                        <i class="fas fa-bug mr-1"></i>Test Routes
                                    </button>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-download mr-1"></i>Export
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo e(route('admin.trades.export', ['format' => 'csv'] + request()->all())); ?>">
                                                <i class="fas fa-file-csv mr-2"></i>CSV
                                            </a>
                                            <a class="dropdown-item" href="<?php echo e(route('admin.trades.export', ['format' => 'excel'] + request()->all())); ?>">
                                                <i class="fas fa-file-excel mr-2"></i>Excel
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tradesTable" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Asset</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Leverage</th>
                                            <th>Profit/Loss</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Expires</th>
                                            <th class="no-sort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $trades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-secondary">#<?php echo e($trade->id); ?></span>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar avatar-sm mr-2">
                                                            <i class="fas fa-user-circle fa-2x text-muted"></i>
                                                        </div>
                                                        <div>
                                                            <strong><?php echo e($trade->user->name ?? 'N/A'); ?></strong><br>
                                                            <small class="text-muted"><?php echo e($trade->user->email ?? 'N/A'); ?></small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info"><?php echo e($trade->assets ?? 'N/A'); ?></span>
                                                    <?php if($trade->symbol): ?>
                                                        <br><small class="text-muted"><?php echo e($trade->symbol); ?></small>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($trade->type): ?>
                                                        <span class="badge <?php echo e($trade->type == 'Buy' ? 'badge-success' : 'badge-danger'); ?>">
                                                            <i class="fas <?php echo e($trade->type == 'Buy' ? 'fa-arrow-up' : 'fa-arrow-down'); ?> mr-1"></i>
                                                            <?php echo e($trade->type); ?>

                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary">N/A</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <strong>$<?php echo e(number_format($trade->amount, 2)); ?></strong>
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning">1:<?php echo e($trade->leverage ?? 'N/A'); ?></span>
                                                </td>
                                                <td>
                                                    <?php if($trade->profit_earned): ?>
                                                        <?php if($trade->profit_earned > 0): ?>
                                                            <span class="text-success">
                                                                <i class="fas fa-arrow-up mr-1"></i>
                                                                +$<?php echo e(number_format($trade->profit_earned, 2)); ?>

                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-danger">
                                                                <i class="fas fa-arrow-down mr-1"></i>
                                                                $<?php echo e(number_format($trade->profit_earned, 2)); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <span class="text-muted">$0.00</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($trade->active == 'yes'): ?>
                                                        <span class="badge badge-warning">
                                                            <i class="fas fa-clock mr-1"></i>Active
                                                        </span>
                                                    <?php elseif($trade->active == 'expired'): ?>
                                                        <span class="badge badge-success">
                                                            <i class="fas fa-check mr-1"></i>Completed
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="badge badge-secondary"><?php echo e(ucfirst($trade->active ?? 'N/A')); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <small><?php echo e($trade->created_at->format('M d, Y')); ?></small><br>
                                                    <small class="text-muted"><?php echo e($trade->created_at->format('H:i')); ?></small>
                                                </td>
                                                <td>
                                                    <?php if($trade->expire_date): ?>
                                                        <small><?php echo e(\Carbon\Carbon::parse($trade->expire_date)->format('M d, Y')); ?></small><br>
                                                        <small class="text-muted"><?php echo e(\Carbon\Carbon::parse($trade->expire_date)->format('H:i')); ?></small>
                                                    <?php else: ?>
                                                        <span class="text-muted">N/A</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="<?php echo e(route('admin.trades.edit', $trade->id)); ?>"
                                                           class="btn btn-link btn-primary btn-lg"
                                                           data-original-title="Edit Trade"
                                                           title="Edit Trade">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <button type="button" class="btn btn-link btn-success btn-lg"
                                                                onclick="showAddProfitForm(<?php echo e($trade->id); ?>)"
                                                                data-original-title="Add Profit"
                                                                title="Add Profit">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-link btn-danger"
                                                                onclick="deleteTrade(<?php echo e($trade->id); ?>)"
                                                                data-original-title="Delete"
                                                                title="Delete Trade">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="11" class="text-center py-4">
                                                    <div class="empty-state" style="padding: 40px;">
                                                        <div class="empty-state-icon">
                                                            <i class="fas fa-chart-line fa-4x text-muted mb-3"></i>
                                                        </div>
                                                        <div class="empty-state-title">
                                                            <h3 class="text-muted">No trades found</h3>
                                                        </div>
                                                        <div class="empty-state-subtitle text-muted">
                                                            Try adjusting your filters or search criteria.
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php if($trades->hasPages()): ?>
                                <div class="d-flex justify-content-center">
                                    <?php echo e($trades->appends(request()->query())->links()); ?>

                                </div>
                            <?php endif; ?>
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
// Test Routes function
window.testRoutes = function() {
    console.log('Testing routes...');
    const baseUrl = '<?php echo e(url('/')); ?>';
    const routes = [
        baseUrl + '/admin/trades',
        baseUrl + '/admin/trades/1',
        baseUrl + '/admin/trades/1/edit'
    ];

    routes.forEach(url => {
        fetch(url, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log(`Route ${url}: Status ${response.status}`);
        })
        .catch(error => {
            console.log(`Route ${url}: Error ${error.message}`);
        });
    });
};

$(document).ready(function() {
    // Debug button clicks
    $('button[data-toggle="modal"]').on('click', function() {
        console.log('Modal button clicked:', $(this).data());
        console.log('Button target:', $(this).data('target'));
    });

    // Test onclick buttons
    $('button[onclick]').on('click', function() {
        console.log('Onclick button clicked:', this.getAttribute('onclick'));
    });

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

    // Initialize DataTable with responsive design
    $('#tradesTable').DataTable({
        "pageLength": 25,
        "responsive": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            { "orderable": false, "targets": [-1] } // Disable ordering on Actions column
        ],
        "language": {
            "emptyTable": "No trades found"
        }
    });    // Auto-dismiss alerts after 5 seconds
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 5000);

    // Debug: Log base URL
    console.log('Base URL: <?php echo e(url("/")); ?>');
    console.log('Admin Trades URL: <?php echo e(url("/admin/trades")); ?>');

    // Make functions globally available
    window.showAddProfitForm = showAddProfitForm;
    window.deleteTrade = deleteTrade;

    console.log('Functions assigned to window:', {
        showAddProfitForm: typeof window.showAddProfitForm,
        deleteTrade: typeof window.deleteTrade
    });
});

// Simple function to show add profit modal
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u203026461/domains/remedyalgotradescript.sbs/public_html/resources/views/admin/trades/index.blade.php ENDPATH**/ ?>