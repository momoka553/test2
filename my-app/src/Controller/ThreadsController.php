<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3/en/controllers/pages-controller.html
 */
class ThreadsController extends AppController
{
    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Http\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Http\Exception\NotFoundException When the view file could not
     *   be found
     * @throws \Cake\View\Exception\MissingTemplateException In debug mode.
     */

    public function initialize()
    {
        parent::initialize();
        $this->CommentsTable = TableRegistry::getTableLocator()->get("comments");
        $this->loadComponent('RequestHandler');

    }

    public function index($id)
    {
        $ThredsTable = TableRegistry::getTableLocator()->get("threads");

        $thread = $ThredsTable->getData($id);
        $comments = $this->CommentsTable->getData($id);
        $this->set('thread', $thread);
        $this->set('comments', $comments);

    }

    public function add()
    {
        $request = $this->request->getData();
        $this->CommentsTable->register($request);

        $this->redirect($this->referer(null, true));
    }

    public function delete($id = null){
        if ($this->request->is('get')) {
            throw new ForbiddenException('削除できませんでした');
        }
        

        if ($this->CommentsTable->remove($id)) {
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除できませんでした'));
        }

        $this->redirect($this->referer(null, true));
    }

    public function addLike($id) {
        return $this->response
            ->withCharset('UTF-8')
            ->withType('json')
            ->withStringBody(json_encode(
                $this->CommentsTable->registerLike($id)
            ));
    }
}