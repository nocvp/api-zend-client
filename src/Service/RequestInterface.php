<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 15:27
 */

namespace NocVpClient\Service;

interface RequestInterface
{
    public function fetch($id);

    public function fetchAll(array $params = array());

    public function create($data);

    public function update($id, $data);

    public function delete($id);
}