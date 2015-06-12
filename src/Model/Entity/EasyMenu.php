<?php
namespace EasyMenus\Model\Entity;

use Cake\ORM\Entity;
use Cake\Routing\Router;

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
        'route' => true,
        'ordering' => true,
        'state' => true,
        'link_type' => true,
        'menu_side' => true,
    ];

    protected function _setParent($parent)
    {
        if (empty($parent)) {
            $parent = null;
        }
        return $parent;
    }

    protected function _setRoute($route)
    {
        if (empty($route)) {
            $route = '';
        }
        return $route;
    }




}
