<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Database Connection'); ?></h4>
    </div>

    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Scaffold requires a database connection'); ?>
    </p>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Confirm you have created the file: %s', APP_DIR . DS . 'Config' . DS . 'database.php'); ?>
    </p>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
