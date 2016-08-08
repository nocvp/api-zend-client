<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Token;
use NocVpClient\Service\Exception\InvalidRequestDataException;
use Zend\Http\Request;
use Zend\Json\Json;

class TokenService extends AbstractRequest
{
    protected $_endpoint = '/oauth';

    public function create($tokenRequest)
    {
        if (is_array($tokenRequest) === true) {
            $data = $tokenRequest;

            $tokenRequest = new \NocVpClient\Model\Request\Token($data);
        } else if (is_object($tokenRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Token Data');
        } else if ($tokenRequest instanceof \NocVpClient\Model\Request\Token !== true) {
            throw new InvalidRequestDataException(
                'Token Data must be an array or NocVpClient\Model\Request\Token instance'
            );
        }

        $response = $this->request($this->getEndpoint(), Request::METHOD_POST, false, $tokenRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Token($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }
}