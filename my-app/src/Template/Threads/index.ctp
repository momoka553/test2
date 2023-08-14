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
<?php foreach ($comments as $comment): ?>
	<div><?= $comment->id ?></div>
	<div><?= $comment->getName() ?></div>
	<div><?= $comment->comment ?></div>
	<div><?= $comment->getModified() ?></div>
        <?= $this->Form->postLink(__('削除'),
        ['action' => 'delete', $comment->id, $comment->getName(), $comment->comment, $comment->getModified()], 
        ['confirm' => __('本当に削除しますか？', $comment->id, $comment->getName(), $comment->comment, $comment->getModified())])
?>
<?php endforeach ?>
