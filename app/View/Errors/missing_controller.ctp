<?php $pluginDot = empty($plugin) ? null : $plugin . '.'; ?>
<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Controller'); ?></h4>
    </div>

    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', '%s could not be found.', '<em>' . h($pluginDot . $class) . '</em>'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
