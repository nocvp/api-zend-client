<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:11
 */

namespace NocVpClient;

use NocVpClient;

return array(
    'modules' => array(
        'NocVpClient',
    ),
    /*
     * fill your credentials (only supported client_credentials grant type)
     *
    'noc_vp_client' => array(
        'url' => '',
        'client_id' => '',
        'client_secret' => '',
    ),
    */
    'service_manager' => array(
        'factories' => array(
            'NocVp\Token' => NocVpClient\Service\Factory\TokenServiceFactory::class,
            'NocVp\Subscription' => NocVpClient\Service\Factory\SubscriptionServiceFactory::class,
            'NocVp\Account' => NocVpClient\Service\Factory\AccountServiceFactory::class,
            'NocVp\User' => NocVpClient\Service\Factory\UserServiceFactory::class,
            'NocVp\Client' => NocVpClient\Service\Factory\ClientServiceFactory::class,
        ),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'NocVp' => NocVpClient\Mvc\Controller\Plugin\Factory\NocVpPluginFactory::class,
        ),
    ),
);