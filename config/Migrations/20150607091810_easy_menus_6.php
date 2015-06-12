<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class EasyMenus6 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this->table('easy_menus')
            ->addColumn('menu_side', 'integer', ['limit' => 1,'signed' => false, 'default' => 0])
            ->save()
        ;
    }
}
