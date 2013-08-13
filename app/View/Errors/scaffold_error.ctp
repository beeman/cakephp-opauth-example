<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Scaffold Error'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Method _scaffoldError in was not found in the controller'); ?>
    </p>
    <pre>
&lt;?php
function _scaffoldError() {<br />

}

    </pre>

    <?php echo $this->element('exception_stack_trace'); ?>
</div>
