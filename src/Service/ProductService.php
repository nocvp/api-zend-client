<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:17
 */

namespace NocVpClient\Service;

use NocVpClient\Model\Response\Product;
use Zend\Http\Request;
use Zend\Json\Json;

class ProductService extends AbstractRequest
{
    public function fetch($id)
    {
        $response = $this->request('/v1/product/' . $id, Request::METHOD_GET);

        return new Product($response->getBody());
    }

    public function fetchAll(array $params = array())
    {
        $response = $this->request('/v1/product', Request::METHOD_GET);
        $data = Json::decode($response->getBody(), Json::TYPE_ARRAY);

        $results = array();
        foreach($data as $row) {
            $results[] = new Product($row);
        }

        return $results;
    }
}