<?php ?>
<div class="navbar">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php echo $this->Html->link('Home', '/', array('class' => 'navbar-brand')); ?>

        <div class="nav-collapse collapse">

            <?php if (AuthComponent::user('id')): ?>
                <ul class="nav navbar-nav">
                    <li><?php echo $this->Html->link('Dashboard', '/'); ?></li>
                    <?php if (AuthComponent::user('admin')): ?>
                        <li><?php echo $this->Html->link('Admin', array('controller' => 'users', 'action' => 'index', 'admin' => true)); ?></li>
                    <?php endif; ?>
                </ul>


                <?php
                if (AuthComponent::user('avatar')) {
                    $img_url = AuthComponent::user('avatar');
                } else {
                    $img_url = 'avatar.png';
                }
                $img = $this->Html->image($img_url, array('height' => '35px'));
                $target = array('controller' => 'users', 'action' => 'profile', 'admin' => false);
                ?>
                <div class="btn-group pull-right">
                    <?php echo $this->Html->link($img, $target, array('class' => 'btn btn-default navbar-btn', 'style' => 'padding: 0px; width:40px;', 'escape' => false)); ?>                        
                    <button type="button" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right">
                        <li><?php echo $this->Html->link('Profile', array('controller' => 'users', 'action' => 'profile', 'admin' => false, 'plugin' => false)); ?></li>
                        <li><?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false, 'plugin' => false)); ?></li>
                    </ul>
                </div>
            <?php else: ?>
                <ul class="nav navbar-nav pull-right">
                    <li><?php echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login', 'admin' => false, 'plugin' => false), array('class' => '')); ?></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>