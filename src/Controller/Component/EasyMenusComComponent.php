<?php
namespace EasyMenus\Controller\Component;

use Aura\Intl\Exception;
use Cake\Routing\Router;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Controller\Component;
use Abc\Controller\EasyController;

class EasyMenusComComponent extends Component
{

    public function setupForForm($options = [])
    {
        if ( !isset($options['setRoutes']) ) {
            $options['setRoutes'] = true;
        }
        if ( !isset($options['setLinkTypes']) ) {
            $options['setLinkTypes'] = true;
        }
        if ( !isset($options['setMenuSides']) ) {
            $options['setMenuSides'] = true;
        }
        if ( !isset($options['setFullWidths']) ) {
            $options['setFullWidths'] = true;
        }
        if ( !isset($options['setStates']) ) {
            $options['setStates'] = true;
        }

        if ($options['setRoutes']) {
            $this->setRoutes();
        }
        if ($options['setLinkTypes']) {
            $this->setLinkTypes();
        }
        if ($options['setMenuSides']) {
            $this->setMenuSides();
        }
        if ($options['setFullWidths']) {
            $this->setFullWidths();
        }
        if ($options['setStates']) {
            $this->setStates();
        }

    }

    public function getStates()
    {
        $states = [
            '1' => 'Active',
            '0' => 'Inactive',
            '-1' => 'Trashed',
        ];
        return $states;
    }

    public function setStates()
    {
        $states = $this->getStates();
        $this->controller->set('states',$states);
    }

    public function getMenuSides()
    {
        $states = [
            '0' => 'Left',
            '1' => 'Right',
        ];
        return $states;
    }

    public function setMenuSides()
    {
        $list = $this->getMenuSides();
        $this->controller->set('menuSides', $list);
    }

    public function getFullWidths()
    {
        $states = [
            '0' => 'Not Full Width',
            '1' => 'Full Width',
        ];
        return $states;
    }

    public function setFullWidths()
    {
        $list = $this->getFullWidths();
        $this->controller->set('fullWidths', $list);
    }

    public function getSettingsListBrandDisplayTypes()
    {
        $types = [
            '1' => 'Text',
            '2' => 'Image',
        ];
        return $types;
    }


    public function setSettingsListBrandDisplayTypes()
    {
        $types = $this->getSettingsListBrandDisplayTypes();
        $this->controller->set('brandDisplayTypes', $types);
    }

    public function setLinkTypes()
    {
        $types = $this->getLinkTypes();
        $this->controller->set('link_types',$types);
    }

    public function getLinkTypes()
    {
        $types = [
            '1' => 'Manual',
            '2' => 'Controller With Action',
            '3' => 'Plugin Controller With Action',
            '4' => 'Controller With Action and ID',
            '5' => 'Plugin Controller With Action and ID',
        ];
        return $types;
    }

    public function getMenuItems()
    {
        $this->EasyMenus = TableRegistry::get('EasyMenus.EasyMenus');

        $items_array = $this->EasyMenus->find('all')->order(['ordering'=>'ASC','parent'=>'ASC'])->toArray();

        return $this->sortMenu($items_array);
    }

    public function beforeFilter(Event $event)
    {
        $this->controller = $event->subject();

        $this->setMenuSettingsLists();
        $this->controller->set('menu_items', $this->getMenuItems());
        $this->controller->set('menu_settings', $this->getMenuSettings());
    }

    public function getMenuSettings()
    {
        $this->EasyMenusSettings = TableRegistry::get('EasyMenus.EasyMenusSettings');

        $settings = $this->EasyMenusSettings->get(1)->toArray();


        return $settings;
    }

    public function setMenuSettingsLists()
    {
        $this->setSettingsListBrandDisplayTypes();
        $this->setFullWidths();
    }


    public function sortMenu($items_array = [])
    {
        $menu_items = Array();

        foreach($items_array as $item) {
            $parentID = empty($item->parent) ? 0 : $item->parent;

            if ($item->link == $this->request->here) {
                $item->active = true;
            }

            if(!isset($menu_items[$parentID])) {
                $menu_items[$parentID] = Array();
            }

            $menu_items[$parentID][] = $item;
        }

        return $menu_items;
    }




    public function setRoutes()
    {

        $routes_info = array();
        $all_routes = Router::routes();
        $ignore = array(
            'index\\'
        );
        foreach($all_routes as $route) {
            $reflection = implode('\\',$route->defaults);
            if (!in_array($reflection, $ignore)) {
                $routes_info[$route->template] = json_encode($route->defaults);
                $routes[$route->template] = $reflection.' -> '.$route->template;
            }
        }

        $this->controller->set('routes', $routes);
        $this->controller->set('routes_info', $routes_info);
    }
}
