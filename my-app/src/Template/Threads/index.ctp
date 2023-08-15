<h1><?= $thread->title ?></h1>

<div style="width: 500px;display: block;margin: 0 auto;text-align: center;">
<?= $this->Form->create(null, [
        'type' => 'post',
        'url' => ['controller' => 'Threads', 'action' => 'add'],
      ]);
    ?>
    <input type="hidden" name="thread_id" value="<?= $thread->id ?>">
    名前<?= $this->Form->text('name', ['required' => false]) ?>
    コメント<?= $this->Form->textarea('comment', ['required' => true]) ?>

    <?= $this->Form->submit() ?>

    <?= $this->Form->end() ?>
</div>


<?php $count = 1 ?>
<?php foreach ($comments as $comment): ?>
	<div><?= $count ?></div>
	<div><?= $comment->getName() ?></div>
	<div><?= $comment->comment ?></div>
	<div class="good-btn">
        <?= $this->Form->button('グッド', ['class' => 'addLike', 'type' => 'button', 'data-id' => $comment->id]) ?>
        <i class="fa-regular fa-thumbs-up"><span class="like"><?= $comment->good ?></span></i>
    	</div>
	<div><?= $comment->getModified() ?></div>
		
        <?= $this->Form->postLink('削除',
		    array('action'=>'delete', $comment->id),
	        ['confirm' => __('本当に削除しますか？')]) 
	    ?>
	    
<?php $count++ ?>
<?php endforeach ?>

<script type="text/javascript">

$(".addLike").click(function(){
    like_class = $(this).next();
    id = $(this).data('id')
    $.post({
        dataType: "json",
        type: "get",
        url: `/threads/addlike/${id}`
    }).done(function(response){
        like_class.text(response);
    })
})
</script>