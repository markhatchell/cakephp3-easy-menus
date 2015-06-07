<?php

namespace EasyMenus\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Utility\Inflector;
use Cake\Routing\Router;

class MenuLinkBehavior extends Behavior
{
    protected $_defaultConfig = [

    ];

    public function makeLink(Entity $entity)
    {
        if ( $entity->link == '[auto]' ) {
            if ( !empty($entity->params['link_options']) ) {
                $entity->link = Router::url((Array)$entity->params['link_options']);
            }
        } else {
            $params = $this->params;
            $params['link_options'] = array();

            $entity->set('params', $params);
        }
    }

    public function beforeSave(Event $event, Entity $entity)
    {
        $this->makeLink($entity);
    }

}
