<?php
use Migrations\AbstractMigration;

class CreateThreads extends AbstractMigration
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
        $table = $this->table('threads');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('title', 'string', [
                'null' => false,
            ])
            ->addColumn('explanation', 'string', [
                'null' => false,
                'signed' => false,
            ])
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
