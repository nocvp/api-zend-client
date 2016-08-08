<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Asset;
use Zend\Http\Request;
use Zend\Json\Json;

class AssetService extends AbstractRequest
{
    protected $_endpoint = '/v1/asset';

    public function fetch($id)
    {
        $response = $this->request($this->getEndpoint() . '/' . $id, Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        if ($this->getHydration() == AbstractRequest::HYDRATE_MODEL) {
            return new Asset($data);
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
                $results[] = new Asset($row);
            }

            return $results;
        } else {
            return $data;
        }
    }
}