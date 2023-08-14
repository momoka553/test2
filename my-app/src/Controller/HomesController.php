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
class HomesController extends AppController
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
    public function index()
    {
        $ThredsTable = TableRegistry::getTableLocator()->get("threads");
        $this->set('title', '渋谷掲示板');
        $this->set('threads', $ThredsTable->getList());
    }

    public function add()
    {
        $request = $this->request->getData();
        $ThredsTable = TableRegistry::getTableLocator()->get("threads");
        $CommentsTable->register($request);

        $this->redirect([
            'controller' => 'Homes',
            'action' => 'index'
        ]);
    }
}
