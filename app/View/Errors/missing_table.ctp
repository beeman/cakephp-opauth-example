<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Database Table'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Table %1$s for model %2$s was not found in datasource %3$s.', '<em>' . h($table) . '</em>', '<em>' . h($class) . '</em>', '<em>' . h($ds) . '</em>'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>