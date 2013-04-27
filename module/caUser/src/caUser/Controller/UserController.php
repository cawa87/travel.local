<?php
/**
 * namespace
*/
namespace caUser\Controller;

use Zend\View\Model\ViewModel;
use caUser\Service\UserService as Service;

class UserController extends AbstractController
{
    public function loginAction()
    {
        $service = new Service($this->getServiceLocator());
       // var_dump($service->authenticate('test', 'test'));
    }
    public function cabinetAction()
    {
        $service = new Service($this->getServiceLocator());
        return new ViewModel(['user' => $service->getCurrentUser()]);
    }
}