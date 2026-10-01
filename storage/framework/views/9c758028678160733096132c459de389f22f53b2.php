
<?php $__env->startComponent('mail::message'); ?>
# Withdrawal Request - <?php echo e($foramin  ? 'Administrative Review Required' : 'Fund Transfer Update'); ?>


<?php if($foramin): ?>
## Administrative Alert: Withdrawal Request Pending

Dear Administrator,

A withdrawal request has been submitted and requires your immediate attention for review and processing.

**Withdrawal Request Details:**
- **Client:** <?php echo e($user->name); ?>

- **Amount:** <?php echo e($user->currency); ?><?php echo e(number_format($withdrawal->amount, 2)); ?>

- **Request Date:** <?php echo e(now()->format('F j, Y \a\t g:i A')); ?>

- **Status:** Pending Administrative Review
- **Reference ID:** #<?php echo e($withdrawal->id ?? 'WDR'.time()); ?>


**Required Action:** Please review the client's account status, verify compliance requirements, and process the withdrawal request through the admin dashboard.

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/admin/withdrawals']); ?>
Review Withdrawal Request
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::panel'); ?>
**Compliance Check:** Ensure all KYC/AML requirements are met and account verification is complete before processing.
<?php echo $__env->renderComponent(); ?>

<?php else: ?>
## Dear <?php echo e($user->name); ?>,

<?php if($withdrawal->status == 'Processed'): ?>
**Your withdrawal has been successfully processed! 🎉**

We are pleased to confirm that your withdrawal request has been approved and processed. The funds are now on their way to your designated account.

**Transaction Summary:**
- **Amount:** <?php echo e($user->currency); ?><?php echo e(number_format($withdrawal->amount, 2)); ?>

- **Processing Date:** <?php echo e(now()->format('F j, Y \a\t g:i A')); ?>

- **Status:** Successfully Processed
- **Reference ID:** #<?php echo e($withdrawal->id ?? 'WDR'.time()); ?>


<?php $__env->startComponent('mail::panel', ['color' => 'success']); ?>
**Funds Transfer Complete:** Your withdrawal has been sent to your registered account. Depending on your bank or payment method, funds should appear within 1-5 business days.
<?php echo $__env->renderComponent(); ?>

**What to Expect:**
- **Bank Transfers:** 2-5 business days
- **Digital Wallets:** Within 24 hours
- **Cryptocurrency:** 1-3 network confirmations

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/dashboard/transactions']); ?>
View Transaction History
<?php echo $__env->renderComponent(); ?>

**Continue Growing Your Portfolio:**
- Reinvest your profits for compound growth
- Explore our Copy Trading opportunities
- Access premium investment strategies

<?php else: ?>
**Your withdrawal request is being processed - Thank you for your patience**

We have successfully received your withdrawal request and our financial operations team is currently reviewing and processing your transaction.

**Processing Status:**
- **Amount:** <?php echo e($user->currency); ?><?php echo e(number_format($withdrawal->amount, 2)); ?>

- **Status:** Under Review & Processing
- **Reference ID:** #<?php echo e($withdrawal->id ?? 'WDR'.time()); ?>

- **Submitted:** <?php echo e(now()->format('F j, Y \a\t g:i A')); ?>


<?php $__env->startComponent('mail::panel'); ?>
**Processing Timeline:** Withdrawal requests are typically processed within 1-3 business days. Our team conducts thorough security checks to ensure your funds are transferred safely and securely.
<?php echo $__env->renderComponent(); ?>

**Security Verification Process:**
✅ Account verification and compliance check<br>
✅ Anti-fraud and security screening<br>
🔄 **Currently processing your withdrawal**<br>
⏳ Final approval and fund transfer

You will receive an immediate notification once your withdrawal is approved and the funds are transferred to your account.

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/dashboard/withdrawals']); ?>
Track Withdrawal Status
<?php echo $__env->renderComponent(); ?>

<?php endif; ?>
<?php endif; ?>

---

**Important Security Information:**

<?php $__env->startComponent('mail::panel', ['color' => 'warning']); ?>
**Security Reminder:** For your protection, we will never ask for your login credentials via email. If you did not request this withdrawal, please contact our security team immediately.
<?php echo $__env->renderComponent(); ?>

**Need Assistance?**
Our dedicated financial operations team is available to assist you with any questions regarding your withdrawal.

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/support', 'color' => 'success']); ?>
Contact Support Team
<?php echo $__env->renderComponent(); ?>

**Quick Support Options:**
- 24/7 Live Chat Support
- Direct Email: <?php echo e($settings->contact_email); ?>

- Phone: Available during business hours

Best regards,<br>
**The <?php echo e(config('app.name')); ?> Financial Operations Team**<br>
*Secure. Reliable. Trusted.*

<?php $__env->startComponent('mail::subcopy'); ?>
This withdrawal notification is sent for security purposes. <?php echo e(config('app.name')); ?> employs industry-standard security protocols to protect your funds. All withdrawal requests are subject to our standard verification procedures. For more information, visit our [Security Center](<?php echo e(config('app.url')); ?>/terms).
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/emails/withdrawal-status.blade.php ENDPATH**/ ?>