<?php
namespace EasyMenus\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use EasyMenus\Model\Entity\EasyMenu;

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
            ->requirePresence('link', 'create')
            ->notEmpty('link');
            
        $validator
            ->add('parent', 'valid', ['rule' => 'numeric'])
            ->requirePresence('parent', 'create')
            ->allowEmpty('parent');
            
        $validator
            ->requirePresence('params', 'create')
            ->allowEmpty('params');

        $validator
            ->add('ordering', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ordering', 'create')
            ->allowEmpty('ordering');

        $validator
            ->add('state', 'valid', ['rule' => 'numeric'])
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->add('level', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('level');

        return $validator;
    }
}
