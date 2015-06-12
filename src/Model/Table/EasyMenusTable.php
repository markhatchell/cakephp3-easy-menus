<?php
namespace EasyMenus\Model\Table;

use Cake\Database\Schema\Table as Schema;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use EasyMenus\Model\Entity\EasyMenu;
use Cake\Database\Type;
use EasyMenus\Model\Behavior\MenuLinkBehavior;

Type::map('json', 'App\Database\Type\JsonType');

/**
 * EasyMenus Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Phinxlog
 */
class EasyMenusTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('easy_menus');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->addBehavior('EasyMenus.MenuLink');

    }

    protected function _initializeSchema(Schema $schema)
    {
        $schema->columnType('params', 'json');
        return $schema;
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');
            
        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');
            
        $validator
            ->allowEmpty('link');

        $validator
            ->add('parent', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('parent');

        $validator
            ->allowEmpty('route');

        $validator
            ->add('link_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('link_type', 'create')
            ->notEmpty('link_type');

        $validator
            ->add('menu_side', 'valid', ['rule' => 'numeric'])
            ->requirePresence('menu_side', 'create')
            ->notEmpty('menu_side');

        $validator
            ->allowEmpty('params');

        $validator
            ->add('ordering', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ordering', 'create')
            ->allowEmpty('ordering');

        $validator
            ->add('state', 'valid', ['rule' => 'numeric'])
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        return $validator;
    }
}
