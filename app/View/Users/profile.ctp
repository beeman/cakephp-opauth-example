<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Edit your profile</h3>
    </div>
    <?php
    echo $this->Form->create('User', array(
        'inputDefaults' => array(
//            'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
//            'div' => array('class' => 'control-group'),
//            'label' => array('class' => 'control-label'),
//            'between' => '<div class="controls">',
//            'after' => '</div>',
            'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
        )
    ));
    echo $this->Form->input('username', array('class' => 'form-control', 'div' => 'form-group'));
    echo $this->Form->input('email', array('class' => 'form-control', 'div' => 'form-group'));
    echo $this->Form->submit('Save', array('class' => 'btn btn-primary'));
    echo $this->Form->end();
    ?>
</div>

<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Logging in with</h3>
    </div>
    <?php foreach ($this->request->data['UsersOpauth'] as $uopauth) : ?>
        <?php
        if ($uopauth['provider'] == 'Facebook') {
            $info = json_decode($uopauth['info']);
            $img = $this->Html->image($info->image, array('alt' => $info->name, 'style' => 'width: 50px; height: 50px;', 'class' => 'media-object'));
            $link = $this->Html->link($img, $info->urls->facebook, array('class' => 'pull-left', 'escape' => false));
            $name = $info->name;
        } elseif ($uopauth['provider'] == 'Twitter') {
            $info = json_decode($uopauth['info']);
            $img = $this->Html->image($info->image, array('alt' => $info->name, 'style' => 'width: 50px; height: 50px;', 'class' => 'media-object'));
            $link = $this->Html->link($img, $info->urls->twitter, array('class' => 'pull-left', 'escape' => false));
            $name = $info->name;
        } elseif ($uopauth['provider'] == 'Google') {
            $info = json_decode($uopauth['raw']);
            $img = $this->Html->image($info->picture, array('alt' => $info->name, 'style' => 'width: 50px; height: 50px;', 'class' => 'media-object'));
            $link = $this->Html->link($img, $info->link, array('class' => 'pull-left', 'escape' => false));
            $name = $info->name;
        } else {
            $link = "Unknown authentication provider {$uopauth['provider']}";
            $name = " x ";
        }
        ?>
        <div class="media">
            <?php echo $link; ?>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $name; ?></h4>
                <?php echo $uopauth['provider']; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>