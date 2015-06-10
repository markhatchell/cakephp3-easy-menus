<?php
namespace EasyMenus\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EasyMenusSettingsFixture
 *
 */
class EasyMenusSettingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'brand_display_type' => ['type' => 'integer', 'length' => 1, 'unsigned' => true, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'brand_name' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => false, 'default' => 'Brand', 'comment' => '', 'precision' => null],
        'navbar_class' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => false, 'default' => 'navbar-default', 'comment' => '', 'precision' => null],
        'navbar_is_fixed' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null],
        'brand_image' => ['type' => 'string', 'fixed' => true, 'length' => 255, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'brand_display_type' => 1,
            'brand_name' => 'Lorem ipsum dolor sit amet',
            'navbar_class' => 'Lorem ipsum dolor sit amet',
            'navbar_is_fixed' => 1,
            'brand_image' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
