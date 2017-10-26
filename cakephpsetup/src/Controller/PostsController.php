<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Routing\Router;

class PostsController extends AppController
{
	public function initialize(){
		parent::initialize();
		$this->loadModel('Posts');
	}
	public function index(){
		$post = '';
		if($this->request->is('post')){
            $data = $this->request->getData();
			if(!empty($data['file']['name'])){
				$filename = $data['filename'];
                print_r($filename);die;
                $url = Router::url('/', true) . 'images/' . $filename;
                $uploadpath = '/images';
                $uploadfile = $uploadpth + $filename;
                if(move_uploaded_file($data['file']['name'], $uploadfile)){
                    $post = $this->Posts->newEntity();
                    $post->name = $filename;
                    $post->path = $url;
                    $post->created = date("Y-m-d H:i:s");
                    $post->modified = date("Y-m-d H:i:s");
                    if($this->Posts->save($post)){
                        $this->Flash->success(__('successful!'));
                    }
                    else{
                        $this->Flash->error(__('fail!'));
                    }
                }
			}
			else{
			$this->Flash->error(__('Fail to upload!'));
			}
		}
		else{
			$this->Flash->error(__('Please choose a file to upload!'));
		
		}
	}
	/*public function index()
    {
        $posts = $this->Posts->find('all');
        $this->set(compact('posts'));
    }*/
    
    public function add()
    {
        $post = $this->Posts->newEntity();
        if ($this->request->is('post')) {
            $post = $this->Posts->patchEntity($post, $this->request->data);
            $post->created = date("Y-m-d H:i:s");
            $post->modified = date("Y-m-d H:i:s");
            if ($this->Posts->save($post)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your post.'));
        }
        $this->set('post', $post);
    }
    public function delete($id)
	{
    	$this->request->allowMethod(['post', 'delete']);

    	$post = $this->Posts->get($id);
    	if ($this->Posts->delete($post)) {
        	$this->Flash->success(__('The post with id: {0} has been deleted.', h($id)));
        	return $this->redirect(['action' => 'index']);
    	}
	}
}




