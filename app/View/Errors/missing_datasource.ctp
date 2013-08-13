<?php $pluginDot = empty($plugin) ? null : $plugin . '.'; ?>
<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Datasource'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Datasource class %s could not be found.', '<em>' . h($pluginDot . $class) . '</em>'); ?>
        <?php if (isset($message)): ?>
            <?php echo h($message); ?>
        <?php endif; ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
