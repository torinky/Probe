<?php
/**
 * Created by PhpStorm.
 * User: kazutaka
 * Date: 2018/05/27
 * Time: 12:54
 */

namespace App\Controller;

/**
 * Servers Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 *
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */


class DashboardsController extends AppController
{
    public function index()
    {
        $this->setAction('server');
    }

    public function server()
    {
        // レイアウトの設定
        $this->viewBuilder()->setLayout('dashboard');
    }

}