<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Request\Token;
use Zend\Http\Request;

class TokenService extends AbstractRequest
{
    public function create(array $data)
    {
        $tokenRequest = new Token();
        $tokenRequest->setClientId($data['client_id']);
        $tokenRequest->setClientSecret($data['client_secret']);

        $response = $this->request('/oauth', Request::METHOD_POST, false, $tokenRequest->toJson());

        return new \NocVpClient\Model\Response\Token($response->getBody());
    }
}