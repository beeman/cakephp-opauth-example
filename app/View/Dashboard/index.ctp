<?php ?>
<h1>Welcome <?php echo AuthComponent::user('username'); ?>!</h1>

<?php if (AuthComponent::user('lastlogin') != ''): ?>
    <h2><small>Your last login was <?php echo $this->Time->niceShort(AuthComponent::user('lastlogin')); ?></small></h2>
<?php endif; ?>
