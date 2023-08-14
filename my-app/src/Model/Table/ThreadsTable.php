<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;

/**
 * Class AppTable
 * @package App\Model\Table
 */
class ThreadsTable extends AppTable
{
    const TABLE = 'threads';

    public function initialize(array $config)
    {
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        parent::initialize($config);
    }

    public function getList()
    {
        return $this->find()->all();
    }

    public function getData($id)
    {
        return $this->find()
            ->where(['id' => $id])
            ->first();
    }

    public function register(array $data)
    {
        $entity = $this->newEntity($data);
        $this->save($entity);
    }
}
