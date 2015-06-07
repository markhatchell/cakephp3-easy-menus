<?php
namespace EasyMenus\Controller\Component;
use EasyMenus\Model\Table\EasyMenusTable;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Controller\Component;

class EasyMenusComComponent extends Component
{

    public function getStates()
    {
        $states = [
            '1' => 'Active',
            '0' => 'Inactive',
            '-1' => 'Trashed',
        ];
        return $states;
    }
    public function beforeRender(Event $event)
    {
        $this->controller = $event->subject();
        $this->EasyMenus = TableRegistry::get('EasyMenus.EasyMenus');

        $items_array = $this->EasyMenus->find('all')->order(['ordering'=>'ASC','parent'=>'ASC'])->toArray();

        $menu_items = $this->sortMenu($items_array);

        $this->controller->set('menu_items', $menu_items);
    }

    public function sortMenu($items_array = [])
    {
        $menu_items = Array();

        foreach($items_array as $item) {
            $parentID = empty($item->parent) ? 0 : $item->parent;

            if(!isset($menu_items[$parentID])) {
                $menu_items[$parentID] = Array();
            }

            $menu_items[$parentID][] = $item;
        }

        return $menu_items;
    }
}
