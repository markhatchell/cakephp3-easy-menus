<?php
use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class EasyMenus5 extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */


    public function up()
    {

        $this->table('easy_menus_settings')
            ->addColumn('brand_display_type', 'integer', ['limit' => 1, 'signed'=>false, 'default'=>1])
            ->addColumn('brand_display_name', 'char', ['limit' => 255, 'default'=>'Brand Name'])
            ->addColumn('brand_display_image', 'char', ['limit' => 255, 'default'=>''])
            ->addColumn('navbar_class', 'char', ['limit' => 255, 'default'=>'navbar-default'])
            ->addColumn('navbar_is_fixed', 'boolean', ['default'=>true])
        ->save();

        $this->execute("INSERT INTO easy_menus_settings (id, brand_display_type, brand_display_name, navbar_class, navbar_is_fixed, brand_display_image) VALUES(1, 1,'Brand','navbar-default',true,'');");

    }

    public function down()
    {
        $this->dropTable('easy_menus_settings');

    }

}
