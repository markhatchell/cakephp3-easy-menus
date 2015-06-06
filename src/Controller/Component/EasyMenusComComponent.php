<?php
namespace EasyMenus\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Controller\Component;

class EasyMenusComComponent extends Component
{
    public function beforeRender(Event $event)
    {

        $this->controller = $event->subject();
        $this->EasyMenus = TableRegistry::get('EasyMenus');

        $items_array = $this->EasyMenus->find('all')->order(['ordering'=>'ASC','parent'=>'ASC'])->toArray();
        $menu_items = array();
        $sub_menu_items = array();

        foreach ($items_array as $num => &$item) {
            if ($this->request->here == $item->link) {
                $item->active = 1;
            }
            if (!empty($item->parent)) {
                $item['children'] = array();
                $item['has_children'] = false;
                if (!isset($sub_menu_items[$item->parent])) {
                    $sub_menu_items[$item->parent] = array();
                }
                $sub_menu_items[$item->parent][$item->id] = $item;
                unset($items_array[$num]);
            }
        }
        foreach ($items_array as $num => &$item) {
            if ($this->request->here == $item->link) {
                $item->active = 1;
            }
            if (empty($item->parent)) {
                $item['children'] = array();
                $item['has_children'] = false;
                $menu_items[$item->id] = $item;
                unset($items_array[$num]);
            }
        }
        foreach($menu_items as $num => &$item) {
            if (isset($sub_menu_items[$menu_items[$num]->id])) {
                $menu_items[$num]['has_children'] = true;
                $menu_items[$num]['children'] = $sub_menu_items[$menu_items[$num]->id];
            }
        }


        $this->controller->set('menu_items', $menu_items);
    }
}
