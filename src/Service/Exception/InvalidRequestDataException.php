<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:28
 */

namespace NocVpClient\Service\Exception;

class InvalidRequestDataException extends \Exception
{
    public function __construct()
    {
        $this->code = 400;
    }
}