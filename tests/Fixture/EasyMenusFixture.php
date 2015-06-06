<?php
namespace EasyMenus\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EasyMenusFixture
 *
 */
class EasyMenusFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'easy_menus';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'link' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'parent' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'params' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'order' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'parent' => ['type' => 'index', 'columns' => ['parent'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'easy_menus_ibfk_1' => ['type' => 'foreign', 'columns' => ['parent'], 'references' => ['easy_menus', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'name' => 'Lorem ipsum dolor sit amet',
            'link' => 'Lorem ipsum dolor sit amet',
            'parent' => 1,
            'params' => 'Lorem ipsum dolor sit amet',
            'order' => 1
        ],
    ];
}
