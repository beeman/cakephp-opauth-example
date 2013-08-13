<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Fatal Error'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo h($error->getMessage()); ?>
        <br>

        <strong><?php echo __d('cake_dev', 'File'); ?>: </strong>
        <?php echo h($error->getFile()); ?>
        <br>

        <strong><?php echo __d('cake_dev', 'Line'); ?>: </strong>
        <?php echo h($error->getLine()); ?>
    </p>
</div>
