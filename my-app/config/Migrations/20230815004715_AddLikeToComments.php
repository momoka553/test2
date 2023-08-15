<?php
use Migrations\AbstractMigration;

class AddLikeToComments extends AbstractMigration
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
        $table = $this->table('comments')
            ->addColumn('good', 'integer', [
                'null' => false,
                'default' => 0,
                'signed' => false,
                'after' => 'comment',
            ])
            ->update();
    }
}
