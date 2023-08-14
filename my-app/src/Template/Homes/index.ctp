<h1><?= $title ?></h1>
<div style="width: 500px;display: block;margin: 0 auto;text-align: center;">
    <?= $this->Form->create(null, [
        'type' => 'post',
        'url' => ['controller' => 'Homes', 'action' => 'add'],
      ]);
    ?>
    タイトル<?= $this->Form->text('title', ['required' => true]) ?>
    説明文<?= $this->Form->textarea('explanation', ['required' => true]) ?>

    <?= $this->Form->submit() ?>

    <?= $this->Form->end() ?>
</div>

<?php foreach($threads as $thread): ?>
<div>
    <a href="/threads/<?= $thread->id ?>"><?= $thread->title ?></a>
    <p><?= $thread->explanation ?></p>
</div>
<?php endforeach ?>