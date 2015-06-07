<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class EasyMenus1 extends AbstractMigration
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
            ->addColumn('level', 'integer', ['null'=>false,'default'=>0,'limit' => MysqlAdapter::INT_TINY])
            ->addIndex('level')
            ->addColumn('state', 'integer', ['null'=>false,'default'=>1,'limit' => MysqlAdapter::INT_TINY])
            ->addIndex('state')
            ->save()
        ;
    }
}
