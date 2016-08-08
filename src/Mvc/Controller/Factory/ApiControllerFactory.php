<?php
/**
 * Created by PhpStorm.
 * User: semihs
 * Date: 8.08.2016
 * Time: 12:20
 */

namespace NocVpClient\Mvc\Controller\Plugin\Factory;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use NocVpClient\Mvc\Controller\ApiController;
use Zend\Filter\Word\DashToCamelCase;
use Zend\Http\Request;
use Zend\Router\RouteStackInterface;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class ApiControllerFactory implements FactoryInterface
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
        /* @var RouteStackInterface $router */
        $router = $container->get('router');
        /* @var Request $request */
        $request = $container->get('request');
        $routeMatch = $router->match($request);

        $filter = new DashToCamelCase();
        $service = $filter->filter($routeMatch->getParam('service'));

        return new ApiController($service);
    }
}