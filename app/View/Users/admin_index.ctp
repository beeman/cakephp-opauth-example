<h3>
    <?php echo __('Users'); ?>
    <?php echo $this->Html->link(__('Add'), array('action' => 'add'), array('class' => 'btn btn-default btn-small pull-right')); ?>
</h3>
<table class="table table-bordered table-striped">
    <tr>
        <th><?php echo $this->Paginator->sort('username'); ?></th>
        <th><?php echo $this->Paginator->sort('email'); ?></th>
        <th><?php echo $this->Paginator->sort('created'); ?></th>
        <th><?php echo $this->Paginator->sort('modified'); ?></th>
        <th><?php echo $this->Paginator->sort('active'); ?></th>
        <th><?php echo $this->Paginator->sort('admin'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['created']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['active']); ?>&nbsp;</td>
            <td><?php echo h($user['User']['admin']); ?>&nbsp;</td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php echo $this->Element('Paginator'); ?>