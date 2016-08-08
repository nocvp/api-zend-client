<?php
/**
 * Created by PhpStorm.
 * User: semihs
 * Date: 8.08.2016
 * Time: 11:40
 */

namespace NocVpClient\Mvc\Controller;

use NocVpClient\Mvc\Controller\Plugin\NocVpPlugin;
use NocVpClient\Service\AbstractRequest;
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

/**
 * Class ApiController
 * @package NocVpClient\Mvc\Controller
 *
 * @method NocVpPlugin NocVp
 */
class ApiController extends AbstractRestfulController
{
    protected $service_name;

    public function __construct($serviceName)
    {
        $this->service_name = $serviceName;
    }

    /**
     * @return JsonModel
     */
    public function getList()
    {
        /* @var $service AbstractRequest */
        $service = $this->NocVp()->{$this->service_name}();
        $service->setHydration(AbstractRequest::HYDRATE_ARRAY);

        return new JsonModel(
            $service->fetchAll($this->params()->fromQuery())
        );
    }

    /**
     * @param string $id
     * @return JsonModel
     */
    public function get($id)
    {
        /* @var $service AbstractRequest */
        $service = $this->NocVp()->{$this->service_name}();
        $service->setHydration(AbstractRequest::HYDRATE_ARRAY);

        return new JsonModel(
            $service->fetch($this->params()->fromRoute('id'))
        );
    }
}