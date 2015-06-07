<?php
namespace EasyMenus\Model\Entity;

use Cake\ORM\Entity;

/**
 * EasyMenu Entity.
 */
class EasyMenu extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'link' => true,
        'parent' => true,
        'params' => true,
        'ordering' => true,
    ];
    
    protected function _setParent($parent)
    {
        if (empty($parent)) {
            $parent = null;
        }
        return $parent;
    }
}
