<?php
if (Auth('admin')->User()->dashboard_style == 'light') {
    $text = 'dark';
    $bg = 'light';
} else {
    $text = 'light';
    $bg = 'dark';
}
?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel ">
        <div class="content ">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 d-inline ">Update Payment method</h1>
                    <div class="d-inline">
                        <div class="float-right btn-group">
                            <a class="btn btn-primary btn-sm" href="<?php echo e(route('paymentview')); ?>"> <i
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
                    <div class="col-md-8 offset-md-2">
                        <?php if($method->name == 'USDT'): ?>
                            <p class="text-<?php echo e($text); ?>">
                                For your users to be able to withdraw via USDT when you use Binance as your merchant and you
                                set withdrawal to automatic, you need to whitelist their ip address, else they will not be
                                able to withdraw. To do that, check users login activities from manage users then collect
                                their IP address and whitelist it on your Binance merchant dashboard.
                            </p>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('updatemethod')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <h6 class="">Name</h6>

                                    <?php if($method->defaultpay == 'yes'): ?>
                                        <input type="text" class="form-control  " name="name"
                                            placeholder="Payment method name" value="<?php echo e($method->name); ?>" readonly>
                                    <?php else: ?>
                                        <input type="text" class="form-control  " name="name"
                                            placeholder="Payment method name" value="<?php echo e($method->name); ?>" required>
                                    <?php endif; ?>
                                    <?php if($method->name == 'Credit Card'): ?>
                                        <small class="">Please ensure you have selected a credit card provider from
                                            the payment preference tab. Please delete paystack and stripe payment option as
                                            this method already makes use of them.</small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Minimum Amount</h6>
                                    <input type="number" value="<?php echo e($method->minimum); ?>" class="form-control  "
                                        name="minimum" id="minamount" required>
                                    <small class="">Required but only applies to withdrawal</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Maximum Amount</h6>
                                    <input type="number" value="<?php echo e($method->maximum); ?>" class="form-control  "
                                        name="maximum" id="maxamount" required>
                                    <small class="">Required but only applies to withdrawal</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Charges</h6>
                                    <input type="number" value="<?php echo e($method->charges_amount); ?>" class="form-control  "
                                        name="charges" id="charges" required>
                                    <small class="">Required but only applies to withdrawal</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Charges Type</h6>
                                    <select name="chargetype" class="form-control  " required>
                                        <option value="<?php echo e($method->charges_type); ?>"><?php echo e($method->charges_type); ?></option>
                                        <option value="percentage">Percentage(%)</option>
                                        <option value="fixed">Fixed(<?php echo e($settings->currency); ?>)</option>
                                    </select>
                                    <small class="">Required but only applies to withdrawal</small>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Type</h6>
                                    <select name="methodtype" id="methodtype" class="form-control  " required>
                                        <option value="<?php echo e($method->methodtype); ?>"><?php echo e($method->methodtype); ?></option>
                                        <option value="currency">Currency</option>
                                        <option value="crypto">Crypto</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Image url</h6>
                                    <input type="text" value="<?php echo e($method->img_url); ?>" class="form-control  "
                                        name="url" id="url">
                                </div>
                                
                                <div class="form-group col-md-6 currency">
                                    <h6 class="">Bank Name</h6>
                                    <input type="text" value="<?php echo e($method->bankname); ?>" class="form-control   currinput"
                                        name="bank" id="bank">
                                </div>
                                <div class="form-group col-md-6 currency">
                                    <h6 class="">Account Name</h6>
                                    <input type="text" value="<?php echo e($method->account_name); ?>"
                                        class="form-control   currinput" name="account_name" id="acnt_name">
                                </div>
                                <div class="form-group col-md-6 currency">
                                    <h6 class="">Account Number</h6>
                                    <input type="number" value="<?php echo e($method->account_number); ?>"
                                        class="form-control   currinput" name="account_number" id="acnt_number">
                                </div>
                                <div class="form-group col-md-6 currency">
                                    <h6 class="">Swift/Other Code</h6>
                                    <input type="text" value="<?php echo e($method->swift_code); ?>"
                                        class="form-control   currinput" name="swift" id="swift">
                                </div>

                                
                                <div class="form-group col-md-6 d-none crypto">
                                    <h6 class="">Wallet Address</h6>
                                    <input type="text" value="<?php echo e($method->wallet_address); ?>"
                                        class="form-control   cryptoinput" name="walletaddress" id="walletaddress">
                                </div>
                                <div class="form-group col-md-6 d-none crypto">
                                    <h6 class="">Barcode</h6>
                                    <input type="file" name="barcode" id=""
                                        class="form-control   cryptoinput">
                                </div>
                                <div class="form-group col-md-6 d-none crypto">
                                    <h6 class="">Wallet Address Network Type</h6>
                                    <input type="text" value="<?php echo e($method->network); ?>"
                                        class="form-control   cryptoinput" name="wallettype" id="wallettype">
                                    <?php if($method->name == 'USDT' or $method->name == 'BUSD'): ?>
                                        <small class="text-<?php echo e($text); ?>">Ensure your network for USDT payment is
                                            always TRC20 and BUSD payment is ERC20 if you set payment option to automatic
                                            and you are using coinpament option. If you want to use manual payment option,
                                            you can use whatever network you prefer.</small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Status</h6>
                                    <select name="status" id="status" class="form-control  " required>
                                        <option value="<?php echo e($method->status); ?>"><?php echo e($method->status); ?></option>
                                        <option value="enabled">Enable</option>
                                        <option value="disabled">Disable</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Type for</h6>
                                    <select name="typefor" id="status" class="form-control  " required>
                                        <option value="<?php echo e($method->type); ?>"><?php echo e($method->type); ?></option>
                                        <option value="withdrawal">Withdrawal</option>
                                        <option value="deposit">Deposit</option>
                                        <option value="both">Both</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <h6 class="">Optional Note</h6>
                                    <input type="text" value="<?php echo e($method->duration); ?>" class="form-control  "
                                        name="note" placeholder="Payment may take up to 24 hours">
                                </div>

                                <input type="hidden" name="id" value="<?php echo e($method->id); ?>">
                                <div class="form-group col-md-12">
                                    <button type="submit" class="px-4 btn btn-primary">Save Changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            let methodtype = document.getElementById('methodtype');
            let currtype = document.querySelectorAll('.currency');
            let currinput = document.querySelectorAll('.currinput');
            let cryptotype = document.querySelectorAll('.crypto');
            let cryptoinput = document.querySelectorAll('.cryptoinput');

            currinput[0].setAttribute('required', '');
            currinput[1].setAttribute('required', '');
            currinput[2].setAttribute('required', '');
            methodtype.addEventListener('change', sortfields);

            if (methodtype.value == 'currency') {
                cryptotype.forEach(element => {
                    element.classList.add('d-none');
                });
                currinput[0].setAttribute('required', '');
                currinput[1].setAttribute('required', '');
                currinput[2].setAttribute('required', '');

                cryptoinput[0].removeAttribute('required', '');
                cryptoinput[2].removeAttribute('required', '');

                currtype.forEach(curr => {
                    curr.classList.remove('d-none');
                });

            } else {
                cryptoinput[0].setAttribute('required', '');
                cryptoinput[2].setAttribute('required', '');

                currinput[0].removeAttribute('required', '');
                currinput[1].removeAttribute('required', '');
                currinput[2].removeAttribute('required', '');

                cryptotype.forEach(element => {
                    element.classList.remove('d-none');
                });

                currtype.forEach(curr => {
                    curr.classList.add('d-none');
                });
            }

            function sortfields() {
                if (methodtype.value == 'currency') {
                    cryptotype.forEach(element => {
                        element.classList.add('d-none');
                    });
                    currinput[0].setAttribute('required', '');
                    currinput[1].setAttribute('required', '');
                    currinput[2].setAttribute('required', '');

                    cryptoinput[0].removeAttribute('required', '');
                    cryptoinput[2].removeAttribute('required', '');

                    currtype.forEach(curr => {
                        curr.classList.remove('d-none');
                    });

                } else {
                    cryptoinput[0].setAttribute('required', '');
                    cryptoinput[2].setAttribute('required', '');

                    currinput[0].removeAttribute('required', '');
                    currinput[1].removeAttribute('required', '');
                    currinput[2].removeAttribute('required', '');

                    cryptotype.forEach(element => {
                        element.classList.remove('d-none');
                    });

                    currtype.forEach(curr => {
                        curr.classList.add('d-none');
                    });
                }
            }
        </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/admin/Settings/PaymentSettings/editpaymethod.blade.php ENDPATH**/ ?>