<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:11
 */

namespace NocVpClient;

use NocVpClient;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    /*
     * fill your credentials (only supported "client_credentials" grant type)
     *
    'noc_vp_client' => [
        'url' => '',
        'client_id' => '',
        'client_secret' => '',
    ),
    */
    'routes' => [
        'home' => [
            'child_routes' => [
                'videos' => [
                    'type' => Segment::class,
                    'options' => [
                        'route' => '[/:lang]/noc-vp/api/:service',
                        'defaults' => [
                            'controller' => NocVpClient\Mvc\Controller\ApiController::class,
                            'lang' => 'en',
                        ],
                        'constraints' => array(
                            'lang' => '(en|tr|de|fr|nl)?',
                        ),
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            'NocVp\Token' => NocVpClient\Service\Factory\TokenServiceFactory::class,
            'NocVp\Subscription' => NocVpClient\Service\Factory\SubscriptionServiceFactory::class,
            'NocVp\Account' => NocVpClient\Service\Factory\AccountServiceFactory::class,
            'NocVp\User' => NocVpClient\Service\Factory\UserServiceFactory::class,
            'NocVp\Client' => NocVpClient\Service\Factory\ClientServiceFactory::class,
            'NocVp\Asset' => NocVpClient\Service\Factory\AssetServiceFactory::class,
        ],
    ],
    'controllers' => [
        'factories' => [
            NocVpClient\Mvc\Controller\ApiController::class => InvokableFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'NocVp' => NocVpClient\Mvc\Controller\Plugin\Factory\NocVpPluginFactory::class,
        ],
    ],
];