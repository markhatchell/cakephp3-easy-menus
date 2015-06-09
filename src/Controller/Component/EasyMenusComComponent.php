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

    public function setupForForm()
    {
        $this->setRoutes();
        $this->setLinkTypes();
        $this->setStates();
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

    public function setLinkTypes() {
        $types = $this->getLinkTypes();
        $this->controller->set('link_types',$types);
    }

    public function getLinkTypes() {
        $types = [
            '1' => 'Manual',
            '2' => 'Controller With Action',
            '3' => 'Plugin Controller With Action',
            '4' => 'Controller With Action and ID',
            '5' => 'Plugin Controller With Action and ID',
        ];
        return $types;
    }

    public function getMenuItems() {
        $this->EasyMenus = TableRegistry::get('EasyMenus.EasyMenus');

        $items_array = $this->EasyMenus->find('all')->order(['ordering'=>'ASC','parent'=>'ASC'])->toArray();



        return $this->sortMenu($items_array);
    }

    public function beforeFilter(Event $event)
    {
        $this->controller = $event->subject();

        $menu_items = $this->getMenuItems();

        $this->controller->set('menu_items', $menu_items);
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




    public function setRoutes() {

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
