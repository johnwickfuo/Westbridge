
<?php $__env->startComponent('mail::message'); ?>
# <?php echo e($salutaion ? $salutaion : "Important Update"); ?> <?php echo e($recipient); ?>,

<?php if($attachment != null): ?>
    <?php $__env->startComponent('mail::panel'); ?>
    **Document Attached:** Please review the attached document for additional details regarding this notification.
    <?php echo $__env->renderComponent(); ?>
    <div style="text-align: center; margin: 24px 0;">
        <img src="<?php echo e($message->embed(asset('storage/'. $attachment))); ?>" style="max-width: 100%; border-radius: 8px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);" alt="Attachment">
    </div>
<?php endif; ?>

## Account Notification

<?php echo $body; ?>


---

### 📞 **Need Assistance?**

If you have any questions regarding this notification or need clarification on any investment-related matters, our professional support team is here to help.

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/support', 'color' => 'success']); ?>
Contact Support Team
<?php echo $__env->renderComponent(); ?>

**Quick Support Options:**
- **24/7 Live Chat:** Instant assistance through your dashboard
- **Email Support:** <?php echo e($settings->contact_email); ?>

- **Phone Support:** Available during business hours
- **Investment Advisory:** Schedule a consultation with our experts

### 🔔 **Notification Preferences**

You can manage your notification preferences and choose which updates you'd like to receive through your account settings.

<?php $__env->startComponent('mail::button', ['url' => config('app.url').'/dashboard/settings']); ?>
Manage Notifications
<?php echo $__env->renderComponent(); ?>

### 📊 **Stay Informed**

**Keep track of your investment journey:**
- Portfolio performance updates
- Market insights and analysis
- Trading opportunities and alerts
- Account security notifications
- Platform updates and new features

---

### 🛡️ **Security Notice**

<?php $__env->startComponent('mail::panel', ['color' => 'warning']); ?>
**Important:** <?php echo e(config('app.name')); ?> will never ask for your login credentials, passwords, or sensitive account information via email. If you receive any suspicious communications, please contact our security team immediately.
<?php echo $__env->renderComponent(); ?>

**Best regards,**<br>
**The <?php echo e(config('app.name')); ?> Team**<br>
*Your Trusted Investment Partner*

---

<?php $__env->startComponent('mail::subcopy'); ?>
This notification was sent to you as part of your <?php echo e(config('app.name')); ?> account communications. If you believe you received this email in error or have concerns about your account security, please contact our support team immediately.

You can update your communication preferences or unsubscribe from certain notifications through your [Account Settings](<?php echo e(config('app.url')); ?>/dashboard/settings). For important security and account-related notifications, we recommend keeping notifications enabled.

© <?php echo e(date('Y')); ?> <?php echo e($settings->site_name); ?>. All rights reserved. | [Privacy Policy](<?php echo e($settings->site_address); ?>/privacy) | [Terms of Service](<?php echo e($settings->site_address); ?>/terms) 
<?php echo $__env->renderComponent(); ?>

<?php echo $__env->renderComponent(); ?>

<?php /**PATH /home/admin/web/assethub.live/public_html/resources/views/emails/NewNotification.blade.php ENDPATH**/ ?>