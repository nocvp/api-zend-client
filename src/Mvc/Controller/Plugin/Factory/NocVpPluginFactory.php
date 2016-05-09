<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 9.05.2016
 * Time: 14:43
 */

namespace NocVpClient\Mvc\Controller\Plugin\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use NocVpClient\Mvc\Controller\NocVpPlugin;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class NocVpPluginFactory implements FactoryInterface
{
    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $nocVpPlugin = new NocVpPlugin();
        $nocVpPlugin->setContainer($container);

        return $nocVpPlugin;
    }
}