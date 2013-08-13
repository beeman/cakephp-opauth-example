<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Datasource Configuration'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'The datasource configuration %1$s was not found in database.php.', '<em>' . h($config) . '</em>'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
