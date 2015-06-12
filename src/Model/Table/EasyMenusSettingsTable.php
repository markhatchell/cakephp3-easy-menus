<?php
namespace EasyMenus\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use EasyMenus\Model\Entity\EasyMenusSetting;

/**
 * EasyMenusSettings Model
 *
 */
class EasyMenusSettingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('easy_menus_settings');
        $this->displayField('id');
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
            ->add('brand_display_type', 'valid', ['rule' => 'numeric'])
            ->requirePresence('brand_display_type', 'create')
            ->notEmpty('brand_display_type');

        $validator
            ->requirePresence('brand_display_name', 'create')
            ->notEmpty('brand_display_name');

        $validator
            ->requirePresence('brand_display_image', 'create')
            ->allowEmpty('brand_display_image');

        $validator
            ->add('full_width', 'valid', ['rule' => 'numeric'])
            ->requirePresence('full_width', 'create')
            ->notEmpty('full_width');

        $validator
            ->requirePresence('navbar_class', 'create')
            ->allowEmpty('navbar_class');
            
        $validator
            ->add('navbar_is_fixed', 'valid', ['rule' => 'boolean'])
            ->requirePresence('navbar_is_fixed', 'create')
            ->notEmpty('navbar_is_fixed');
            

        return $validator;
    }
}
