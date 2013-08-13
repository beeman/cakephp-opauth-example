<div class='panel'>
    <div class='panel-heading'>
        <h4><?php echo __d('cake_dev', 'Missing Plugin'); ?></h4>
    </div>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'The application is trying to load a file from the %s plugin', '<em>' . h($plugin) . '</em>'); ?>
    </p>
    <p class="alert alert-danger">
        <strong><?php echo __d('cake_dev', 'Error'); ?>: </strong>
        <?php echo __d('cake_dev', 'Make sure your plugin %s is in the ' . APP_DIR . DS . 'Plugin directory and was loaded', $plugin); ?>
    </p>
    <pre>
&lt;?php
CakePlugin::load('<?php echo h($plugin); ?>');

    </pre>
    <p class="alert alert-info">
        <strong><?php echo __d('cake_dev', 'Loading all plugins'); ?>: </strong>
        <?php echo __d('cake_dev', 'If you wish to load all plugins at once, use the following line in your ' . APP_DIR . DS . 'Config' . DS . 'bootstrap.php file'); ?>
    </p>
    <pre>
CakePlugin::loadAll();
    </pre>
    <?php echo $this->element('exception_stack_trace'); ?>
</div>
