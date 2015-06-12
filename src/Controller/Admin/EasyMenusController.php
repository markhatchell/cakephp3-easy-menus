<?php
namespace EasyMenus\Controller\Admin;

use Cake\ORM\TableRegistry;
use EasyMenus\Controller\AppController;

/**
 * EasyMenus Controller
 *
 * @property \EasyMenus\Model\Table\EasyMenusTable $EasyMenus
 */



class EasyMenusController extends AppController
{
    public $paginate = [
        'limit' => 1000,
        'order' => [
            'ordering' => 'asc'
        ]
    ];
    public function initialize() {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {

        $admin_menu_items = $this->EasyMenus->find('all')->toArray();
//        $query = $this->EasyMenus->find('all');
//        $admin_menu_items = $this->paginate($query)->toArray();
        $admin_menu_items = $this->EasyMenusCom->sortMenu($admin_menu_items);

        $this->set('admin_menu_items', $admin_menu_items);
        $this->set('_serialize', ['easyMenus']);
    }

    /**
     * View method
     *
     * @param string|null $id Easy Menu id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $easyMenu = $this->EasyMenus->get($id, [
        ]);
        $this->set('easyMenu', $easyMenu);
    }

    /**
     * MenuSettings method
     *
     * @return void
     */
    public function menuSettings()
    {
        $easyMenusSettingsTable = TableRegistry::get('EasyMenus.EasyMenusSettings');

        $easyMenusSettings = $easyMenusSettingsTable->get(1);
        if ($this->request->is('post') || $this->request->is('put')) {
            $easyMenusSettings = $easyMenusSettingsTable->patchEntity($easyMenusSettings, $this->request->data);
            if ($easyMenusSettingsTable->save($easyMenusSettings )) {
                $this->Flash->success(__('The menu settings have been saved.'));
                return $this->redirect($this->request->here);
            } else {
                $this->Flash->error(__('The menu settings could not be saved. Please, try again.'));
            }
        }

        $this->EasyMenusCom->setupForForm([
            'setRoutes' => false,
            'setLinkTypes' => false,
            'setMenuSides' => false,
            'setStates' => false,
        ]);
        $this->set('easyMenusSettings', $easyMenusSettings);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $parents = $this->EasyMenus->find('list')->toArray();
        $easyMenu = $this->EasyMenus->newEntity();
        if ($this->request->is('post')) {
            $easyMenu = $this->EasyMenus->patchEntity($easyMenu, $this->request->data);
            if ($this->EasyMenus->save($easyMenu)) {
                $this->Flash->success(__('The easy menu has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The easy menu could not be saved. Please, try again.'));
            }
        }
        $this->EasyMenusCom->setupForForm();
        $this->set(compact('easyMenu','parents'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Easy Menu id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $parents = $this->EasyMenus->find('list')->where(['id !='=>$id, 'OR' => ['parent !='=>$id, 'parent is'=>null] ])->toArray();
        $easyMenu = $this->EasyMenus->get($id, [
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $easyMenu = $this->EasyMenus->patchEntity($easyMenu, $this->request->data);
            if ($this->EasyMenus->save($easyMenu)) {
                $this->Flash->success(__('The easy menu has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The easy menu could not be saved. Please, try again.'));
            }
        }
        $this->EasyMenusCom->setupForForm();
        $this->set(compact('easyMenu','parents'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Easy Menu id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $easyMenu = $this->EasyMenus->get($id);
        if ($this->EasyMenus->delete($easyMenu)) {
            $this->Flash->success(__('The easy menu has been deleted.'));
        } else {
            $this->Flash->error(__('The easy menu could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
