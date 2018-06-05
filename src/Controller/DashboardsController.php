<?php
/**
 * Created by PhpStorm.
 * User: kazutaka
 * Date: 2018/05/27
 * Time: 12:54
 */

namespace App\Controller;

/**
 * Dashboards Controller
 *
 * @property \App\Model\Table\ServersTable $Servers
 *
 * @method \App\Model\Entity\Server[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

//use Cake\ORM\TableRegistry;
//use Cake\ORM\Locator\TableLocator;

class DashboardsController extends AppController
{

    public function initialize()
    {
//        $this->Servers = TableLocator::get('servers');
        $this->loadModel('Servers');
    }

    public function index()
    {
        $this->setAction('server');
    }

    public function server()
    {
        // レイアウトの設定
        $this->viewBuilder()->setLayout('dashboard');

        $servers = $this->Servers->find()->all();
//        debug($servers);
        $this->set(compact('servers'));
    }

}