<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Client;
use NocVpClient\Service\Exception\InvalidRequestDataException;
use Zend\Http\Request;
use Zend\Json\Json;

class ClientService extends AbstractRequest
{
    protected $_endpoint = '/v1/client';

    public function fetch($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Client($data);
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
                $results[] = new Client($row);
            }

            return $results;
        } else {
            return $data;
        }
    }

    public function create($clientRequest)
    {
        if (is_array($clientRequest) === true) {
            $data = $clientRequest;

            $clientRequest = new \NocVpClient\Model\Request\Client($data);
        } else if (is_object($clientRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Client Data');
        } else if ($clientRequest instanceof \NocVpClient\Model\Request\Client !== true) {
            throw new InvalidRequestDataException(
                'Client Data must be an array or NocVpClient\Model\Request\Client instance'
            );
        }

        $response = $this->request($this->getEndpoint(), Request::METHOD_POST, false, $clientRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Client($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function update($id, $clientRequest)
    {
        if (is_array($clientRequest) === true) {
            $data = $clientRequest;

            $clientRequest = new \NocVpClient\Model\Request\Client($data);
        } else if (is_object($clientRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Client Data');
        } else if ($clientRequest instanceof \NocVpClient\Model\Request\Client !== true) {
            throw new InvalidRequestDataException(
                'Client Data must be an array or NocVpClient\Model\Request\Client instance'
            );
        }

        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_PUT, false,
            $clientRequest->toJson());

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Client($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }

    public function delete($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_DELETE);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Client($response->getBody());
        } else{
            return Json::decode($response->getBody(), Json::TYPE_ARRAY);
        }
    }
}