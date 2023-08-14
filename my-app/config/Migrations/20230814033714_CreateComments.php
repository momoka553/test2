<?php
use Migrations\AbstractMigration;

class CreateComments extends AbstractMigration
{
    public $autoId = false;
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('comments');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('thread_id', 'integer', [
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('flag', 'integer', [
                'default' => 2,
                'null' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => true,
            ])
            ->addColumn('comment', 'string', [
                'null' => false,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}