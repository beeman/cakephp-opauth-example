<div class='paging'>
    <ul class="pagination">
        <li>
            <?php echo $this->Paginator->prev('«', array(), null, array('class' => 'prev disabled')); ?>
        </li>
        <?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'span')); ?> 
        <li>
            <?php echo $this->Paginator->next('»', array(), null, array('class' => 'next disabled')); ?>
        </li>
    </ul>
</div>