<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Class AppTable
 * @package App\Model\Table
 */
class CommentsTable extends AppTable
{
    const TABLE = 'comments';

    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->setPrimaryKey('id');

    }

    public function getList()
    {
        return $this->find()->all();
    }

    public function getData($thread_id)
    {
        return $this->find()
            ->where(['thread_id' => $thread_id])
            ->all();
    }

    public function register(array $data)
    {
        $entity = $this->newEntity($data);
        $this->save($entity);
    }
}
