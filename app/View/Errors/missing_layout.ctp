<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Layout'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'The layout file %s can not be found or does not exist.', '<em>' . h($file) . '</em>'); ?>
    </p>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Confirm you have created the file: %s', '<em>' . h($file) . '</em>'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
