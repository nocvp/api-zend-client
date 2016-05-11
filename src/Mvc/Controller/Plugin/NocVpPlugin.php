<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 9.05.2016
 * Time: 14:35
 */

namespace NocVpClient\Mvc\Controller\Plugin;

use Interop\Container\ContainerInterface;
use NocVpClient\Service\AccountService;
use NocVpClient\Service\ClientService;
use NocVpClient\Service\SubscriptionService;
use NocVpClient\Service\TokenService;
use NocVpClient\Service\UserService;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Zend\ServiceManager\Exception\ServiceNotFoundException;

/**
 * Class NocVpPlugin
 * @package NocVpClient\Mvc\Controller
 *
 * @method TokenService token
 * @method SubscriptionService subscription
 * @method AccountService account
 * @method UserService user
 * @method ClientService client
 */
class NocVpPlugin extends AbstractPlugin
{
    /**
     * @var ContainerInterface
     */
    protected $_container;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->_container;
    }

    /**
     * @param ContainerInterface $container
     */
    public function setContainer($container)
    {
        $this->_container = $container;
    }

    public function __call($name , array $arguments)
    {
        $formattedName = ucfirst($name);
        $serviceNameSpace = 'NocVp\\' . $formattedName;

        if ($this->getContainer()->has($serviceNameSpace) !== true) {
            throw new ServiceNotFoundException('Service Not Found: ' . $serviceNameSpace, 400);
        } else {
            return $this->getContainer()->get($serviceNameSpace);
        }
    }
}