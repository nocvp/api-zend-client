<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\User;
use NocVpClient\Service\Exception\InvalidRequestDataException;
use Zend\Http\Request;
use Zend\Json\Json;

class UserService extends AbstractRequest
{
    protected $_endpoint = '/v1/user';

    public function fetch($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new User($data);
        } else{
            return $data;
        }
    }

    public function fetchAll(array $params = array())
    {
        $response = $this->request($this->getEndpoint(), Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            $results = array();
            foreach ($data as $row) {
                $results[] = new User($row);
            }

            return $results;
        } else {
            return $data;
        }
    }

    public function create($userRequest)
    {
        if (is_array($userRequest) === true) {
            $data = $userRequest;

            $userRequest = new \NocVpClient\Model\Request\User($data);
        } else if (is_object($userRequest) !== true) {
            throw new InvalidRequestDataException('Invalid User Data');
        } else if ($userRequest instanceof \NocVpClient\Model\Request\User !== true) {
            throw new InvalidRequestDataException(
                'User Data must be an array or NocVpClient\Model\Request\User instance'
            );
        }

        $response = $this->request($this->getEndpoint(), Request::METHOD_POST, false, $userRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new User($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function update($id, $userRequest)
    {
        if (is_array($userRequest) === true) {
            $data = $userRequest;

            $userRequest = new \NocVpClient\Model\Request\User($data);
        } else if (is_object($userRequest) !== true) {
            throw new InvalidRequestDataException('Invalid User Data');
        } else if ($userRequest instanceof \NocVpClient\Model\Request\User !== true) {
            throw new InvalidRequestDataException(
                'User Data must be an array or NocVpClient\Model\Request\User instance'
            );
        }

        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_PUT, false,
            $userRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new User($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function delete($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_DELETE);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new User($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }
}