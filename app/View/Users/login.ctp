
<div id="sociallogin" class="row">
    <div class="col-3">&nbsp;<!-- TODO: Implement Bootstrap 3 offset to next div --></div>
    <div class="panel col-6">
        <div class="panel-heading">
            <h3 class="panel-title">Please sign in using the following services</h3>
        </div>
        <div>
            <ul>
                <?php
                // Get the list of strategies
                $strategies = array();
                foreach (array_keys(Configure::read('Opauth.Strategy')) as $strategy) {
                    $strategies[strtolower($strategy)] = $strategy;
                }

                // Show link of each of them
                if (count($strategies) < 1) {
                    echo "<li><div class='alert alert-danger'>There are no Opauth Strategies configured</div></li>";
                } else {
                    foreach ($strategies as $id => $label) {
                        $img = $this->Html->image("{$id}.png", array('alt' => "Login with {$label}"));
                        $link = $this->Html->link($img . " Sign in with {$label}", array('controller' => 'auth', 'action' => $id), array('title' => "Login with {$label}", 'escape' => false));
                        echo "<li>$link</li>";
                    }
                }
                ?>
            </ul>        
        </div>
    </div>
</div>

