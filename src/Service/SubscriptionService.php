<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Subscription;
use NocVpClient\Service\Exception\InvalidRequestDataException;
use Zend\Http\Request;
use Zend\Json\Json;

class SubscriptionService extends AbstractRequest
{
    protected $_endpoint = '/v1/subscription';

    public function fetch($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_GET);

        return new Subscription($response->getBody());
    }

    public function fetchAll(array $params = array())
    {
        $response = $this->request($this->getEndpoint(), Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        $results = array();
        foreach ($data as $row) {
            $results[] = new Subscription($row);
        }

        return $results;
    }

    public function create($subscriptionRequest)
    {
        if (is_array($subscriptionRequest) === true) {
            $data = $subscriptionRequest;

            $subscriptionRequest = new \NocVpClient\Model\Request\Subscription($data);
        } else if (is_object($subscriptionRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Subscription Data');
        } else if ($subscriptionRequest instanceof \NocVpClient\Model\Request\Subscription !== true) {
            throw new InvalidRequestDataException(
                'Subscription Data must be an array or NocVpClient\Model\Request\Subscription instance'
            );
        }

        $response = $this->request($this->getEndpoint(), Request::METHOD_POST, false, $subscriptionRequest->toJson());

        return new Subscription($response->getBody());
    }

    public function update($id, $subscriptionRequest)
    {
        if (is_array($subscriptionRequest) === true) {
            $data = $subscriptionRequest;

            $subscriptionRequest = new \NocVpClient\Model\Request\Subscription($data);
        } else if (is_object($subscriptionRequest) !== true) {
            throw new InvalidRequestDataException('Invalid Subscription Data');
        } else if ($subscriptionRequest instanceof \NocVpClient\Model\Request\Subscription !== true) {
            throw new InvalidRequestDataException(
                'Subscription Data must be an array or NocVpClient\Model\Request\Subscription instance'
            );
        }

        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_PUT, false,
            $subscriptionRequest->toJson());

        return new Subscription($response->getBody());
    }

    public function delete($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_DELETE);

        return new Subscription($response->getBody());
    }
}