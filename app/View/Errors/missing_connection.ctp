<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Database Connection'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'A Database connection using "%s" was missing or unable to connect. ', h($class)); ?>
        <br />
        <?php
        if (isset($message)):
            echo __d('cake_dev', 'The database server returned this error: %s', h($message));
        endif;
        ?>
    </p>
    <?php if (!$enabled) : ?>
        <p class="alert alert-danger">
            <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
            <?php echo __d('cake_dev', '%s driver is NOT enabled', h($class)); ?>
        </p>
    <?php endif; ?>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
