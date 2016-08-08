<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Account;
use NocVpClient\Service\Exception\InvalidRequestDataException;
use Zend\Http\Request;
use Zend\Json\Json;

class AccountService extends AbstractRequest
{
    protected $_endpoint = '/v1/account';

    public function fetch($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_GET);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Account($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function fetchAll(array $params = array())
    {
        $response = $this->request($this->getEndpoint(), Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            $results = array();
            foreach ($data as $row) {
                $results[] = new Account($row);
            }

            return $results;
        } else {
            return $data;
        }
    }

    public function create($accountRequest)
    {
        if (is_array($accountRequest) === true) {
            $data = $accountRequest;

            $accountRequest = new \NocVpClient\Model\Request\Account($data);
        } else if (is_object($accountRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Account Data');
        } else if ($accountRequest instanceof \NocVpClient\Model\Request\Account !== true) {
            throw new InvalidRequestDataException(
                'Account Data must be an array or NocVpClient\Model\Request\Account instance'
            );
        }

        $response = $this->request($this->getEndpoint(), Request::METHOD_POST, false, $accountRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Account($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function update($id, $accountRequest)
    {
        if (is_array($accountRequest) === true) {
            $data = $accountRequest;

            $accountRequest = new \NocVpClient\Model\Request\Account($data);
        } else if (is_object($accountRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Account Data');
        } else if ($accountRequest instanceof \NocVpClient\Model\Request\Account !== true) {
            throw new InvalidRequestDataException(
                'Account Data must be an array or NocVpClient\Model\Request\Account instance'
            );
        }

        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_PUT, false,
            $accountRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Account($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }
}