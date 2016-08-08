<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:11
 */

namespace NocVpClient;

use NocVpClient;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;

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
    'router' => [
        'routes' => [
            'noc-vp' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/noc-vp',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'api' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/api/:service',
                            'defaults' => [
                                'controller' => NocVpClient\Mvc\Controller\ApiController::class,
                            ],
                        ],
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
            NocVpClient\Mvc\Controller\ApiController::class => NocVpClient\Mvc\Controller\Factory\ApiControllerFactory::class,
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            'NocVp' => NocVpClient\Mvc\Controller\Plugin\Factory\NocVpPluginFactory::class,
        ],
    ],
    'view_manager' => [
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];