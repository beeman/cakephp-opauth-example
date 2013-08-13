<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Private Method in %s', $controller); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', '%s%s cannot be accessed directly.', '<em>' . h($controller) . '::</em>', '<em>' . h($action) . '()</em>'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
