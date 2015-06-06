<?php
namespace EasyMenus\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use EasyMenus\Model\Table\EasyMenusTable;

/**
 * EasyMenus\Model\Table\EasyMenusTable Test Case
 */
class EasyMenusTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.easy_menus.easy_menus',
        'plugin.easy_menus.phinxlog',
        'plugin.easy_menus.easy_menus_phinxlog'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EasyMenus') ? [] : ['className' => 'EasyMenus\Model\Table\EasyMenusTable'];
        $this->EasyMenus = TableRegistry::get('EasyMenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EasyMenus);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
