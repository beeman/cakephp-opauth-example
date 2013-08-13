<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo $name; ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake', 'Error'); ?>: </strong>
        <?php echo __d('cake', 'An Internal Error Has Occurred.'); ?>
    </p>
    <?php
    if (Configure::read('debug') > 0):
        echo $this->element('exception_stack_trace');
    endif;
    ?>
</div>
