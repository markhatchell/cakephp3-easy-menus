<?php

namespace EasyMenus\Model\Behavior;

use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\Routing\Route\InflectedRoute;
use Cake\Routing\Route\Route;
use Cake\Utility\Inflector;
use Cake\Routing\Router;

class MenuLinkBehavior extends Behavior
{
    protected $_defaultConfig = [

    ];

    public function makeLink(Entity $entity)
    {
        if ( !empty($entity->link) ) {
            if ( !empty($entity->params['link_options']) ) {
                $link_options = (Array)$entity->params['link_options'];
                if (isset($link_options[0])) {
                    $id = $link_options[0];
                    unset($link_options[0]);
                    $link_options[$id] = '';
                }
                $entity->link = Router::url(['controller'=>'pages', 'action'=>'alerts']);
            }
        } else {
            $params = $entity->params;
            $params['link_options'] = array();

            $entity->set('params', $params);
        }
    }

    public function makeRouteDetails(Entity $entity)
    {
        if ( !empty($entity->link) ) {
            $InflectedRoute = new Route($entity->route);
            $connection = $InflectedRoute->parse($entity->link);
            print_r($connection);
            exit();
        } else {
        }
    }

    public function beforeSave(Event $event, Entity $entity)
    {
//        $this->makeLink($entity);
    }

}
