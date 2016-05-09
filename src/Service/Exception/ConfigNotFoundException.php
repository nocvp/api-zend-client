<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:19
 */

namespace NocVpClient\Service\Exception;

use Interop\Container\Exception\ContainerException;

class ConfigNotFoundException extends \Exception implements  ContainerException
{
    public function __construct()
    {
        $this->code = 400;
    }
}