<?php
namespace EasyMenus\Model\Entity;

use Cake\ORM\Entity;

/**
 * EasyMenusSetting Entity.
 */
class EasyMenusSetting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'brand_display_type' => true,
        'brand_display_name' => true,
        'brand_display_image' => true,
        'navbar_class' => true,
        'navbar_is_fixed' => true,
    ];
}
