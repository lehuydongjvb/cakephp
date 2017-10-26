<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;
use SendMailComponent;
use Cake\View\Helper\SessionHelper;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{   var $name = "Users";
        var $helpers = array("Html");
        var $component = array("Session");
     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('SendMail');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
        $this->set('users', $this->paginate());
    }


    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *s
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            
            if ($this->Users->save($user)) {
               $this->SendMail->sendMail($user->email);

                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function login(){
        if($this->request->is('post')){
            $data = $this->request->getData();
            $email = $data['email'];
            $password = $data['password'];
            // $password = Security::hash($data['password'], 'sha1', true);
            //print_r($password);
            $user = $this->Users->find('all', [
                'conditions' => [
                    'email' => $email,
                    'password' => $password]])->toArray();
            
            
            if(!empty($user)){
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);

            }else{
                    $this->Flash->error(__('Login fail!'));
            }
        }
        
    }
        
    
    public function logout(){
        $this->autoRender = false;
        $this->Auth->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
    public $paginate = [
        'limit' => 10,
        'order' => [
            'Users.email' => 'asc'
        ]
    ];
    public function profile(){
        
    }
    public function upload(){
        $UsersTable = TableRegistry::get('Users');
        $user = $this->Auth->user();
        $id = $user[0]['id'];
        if($this->request->is('post')){
            $file = $this->request->data();
            if(!empty($file))
            {       
                $name = date('Ymdhis').$file['uploadfile']['name'];
                move_uploaded_file($file['uploadfile']['tmp_name'], WWW_ROOT . "upload" . DS . $name);
            
                $path = WWW_ROOT . "upload" . DS . $name;
                $st = $UsersTable->get($id);
                $st->images = $path; 
                
                $UsersTable->save($st);
                return $this->redirect(['controller' => 'Users', 'action' => 'profile']);
            }
            else{
               $this->Flash->error(__('upload fail!'));
            }   
        }
    }
    public function download(){
        $this->autoRender = false;
        
        $user = $this->Auth->user();
        $path = $user[0]['images'];
        $st = WWW_ROOT . "upload" . DS;
        $local =  explode("$st", $path);
        $filename = $local[1];
        if (!empty($filename)) {
            $response = $this->response->withdownload($filename);
        }
        return $response;        
    }
   
}
