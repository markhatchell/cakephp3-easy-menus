<?php
namespace EasyMenus\Controller\Component;
use EasyMenus\Model\Table\EasyMenusTable;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Controller\Component;

class EasyMenusComComponent extends Component
{
    public function beforeRender(Event $event)
    {

        $this->controller = $event->subject();
        $this->EasyMenus = TableRegistry::get('EasyMenus.EasyMenus');

        $items_array = $this->EasyMenus->find('all')->order(['ordering'=>'ASC','parent'=>'ASC'])->toArray();
        $menu_items = array();
        $menu_items_by_id = array();
        $sub_menu_items = array();

        foreach ($items_array as $num => &$item) {
            $menu_items_by_id[$item->id] = $item;
            if ($this->request->here == $item->link) {
                $item->active = 1;
            }
            if (!empty($item->parent)) {
                $item['children'] = array();
                $item['has_children'] = false;
                if (!isset($sub_menu_items[$item->parent])) {
                    $sub_menu_items[$item->parent] = array();
                }
                if (!isset($sub_menu_items[$item->parent]['children'])) {
                    $sub_menu_items[$item->parent]['children'] = array();
                }
                if (!isset($sub_menu_items[$item->parent]['active'])) {
                    $sub_menu_items[$item->parent]['active'] = false;
                }
                if ($item->active) {
                    $sub_menu_items[$item->parent]['active'] = true;
                }
                $sub_menu_items[$item->parent]['children'][$item->id] = $item;
                unset($items_array[$num]);
            }
        }
        foreach ($sub_menu_items as $num => &$sub_menu) {
            foreach($sub_menu['children'] as $sub_menu_num => $item) {
                if ($this->request->here == $item->link) {
                    $item->active = 1;
                }
                if (!empty($menu_items_by_id[$item->parent]->parent)) {
                    if ($sub_menu_items[$menu_items_by_id[$item->parent]->parent]['children'][$item->parent]->id != $item->id) {
                        $sub_menu_items[$menu_items_by_id[$item->parent]->parent]['children'][$item->parent]['children'][] = $item;
                        $sub_menu_items[$menu_items_by_id[$item->parent]->parent]['children'][$item->parent]['has_children'] = true;
                    }
                }
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
                if ($sub_menu_items[$menu_items[$num]->id]['active']) {
                    $menu_items[$num]['active'] = true;
                }
                $menu_items[$num]['children'] = $sub_menu_items[$menu_items[$num]->id]['children'];
            }
        }
        print_r($menu_items);

        $this->controller->set('menu_items', $menu_items);
    }
}
