
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title_for_layout; ?></title>

        <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array('bootstrap.min.css', 'app.css'));
        echo $this->Html->script(array('jquery.min.js', 'bootstrap.min.js', 'app.js'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>

        <?php echo $this->Element('Navigation'); ?>
        <div class="container">
            <div id="content">
                <?php echo $this->Session->flash('flash', array('element' => 'flash')); ?>
                <?php echo $this->Session->flash('auth', array('element' => 'flash')); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">
                <a href="https://github.com/beeman/cakephp-opauth-example">CakePHP Opauth example</a>
            </div>
            <?php echo $this->element('sql_dump'); ?>
        </div>
    </body>
</html>
