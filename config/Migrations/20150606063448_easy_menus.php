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
            ->addForeignKey('parent', 'easy_menus', 'id', array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
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
