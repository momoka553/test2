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
    public function index($id)
    {
        $ThredsTable = TableRegistry::getTableLocator()->get("threads");
        $CommentsTable = TableRegistry::getTableLocator()->get("comments");

        $thread = $ThredsTable->getData($id);
        $comments = $CommentsTable->getData($id);
        $this->set('thread', $thread);
        $this->set('comments', $comments);

    }

    public function add()
    {
        $request = $this->request->getData();
        $CommentsTable = TableRegistry::getTableLocator()->get("comments");
        $CommentsTable->register($request);

        $this->redirect($this->referer(null, true));
    }

    public function delete($id = null){
        if ($this->request->is('get')) {
            throw new ForbiddenException('投稿の削除に失敗しました');
        }
        
        $CommentsTable = TableRegistry::getTableLocator()->get("comments");
        // dd($CommentsTable->getComment($id));
        $request = $CommentsTable->getComment($id);
        // $CommentsTable->remove($request);
        if ($CommentsTable->remove($request)) {
            $this->Flash->success(__('削除しました'));
        } else {
            $this->Flash->error(__('削除できませんでした.'));
        }
        $this->redirect($this->referer(null, true));
    }
}