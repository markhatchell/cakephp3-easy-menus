<?php
namespace EasyMenus\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use EasyMenus\Model\Table\EasyMenusSettingsTable;

/**
 * EasyMenus\Model\Table\EasyMenusSettingsTable Test Case
 */
class EasyMenusSettingsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.easy_menus.easy_menus_settings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EasyMenusSettings') ? [] : ['className' => 'EasyMenus\Model\Table\EasyMenusSettingsTable'];
        $this->EasyMenusSettings = TableRegistry::get('EasyMenusSettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EasyMenusSettings);

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
