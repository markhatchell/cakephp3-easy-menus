<?php
use Phinx\Migration\AbstractMigration;

class EasyMenus extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up()
    {
		$table = $this->table('easy_menus');
		$table
		    ->addColumn('name', 'char', ['limit' => 255])
		    ->addColumn('link', 'char', ['limit' => 255])
		    ->addColumn('parent', 'integer', array('null' => true))
		    ->addColumn('params', 'string', array('null' => true))
            ->addIndex('params')
		    ->addColumn('ordering', 'integer');
	    $table->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
		$table = $this->dropTable('easy_menus');
    }
}
