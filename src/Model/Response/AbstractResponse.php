<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:24
 */

namespace NocVpClient\Model\Response;

use Zend\Json\Json;

/**
 * Class AbstractResponse
 * @package NocVpClient\Model\Response
 */
class AbstractResponse
{
    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        if (!empty($data)) {
            if (is_array($data) !== true) {
                $data = Json::decode($data, Json::TYPE_ARRAY);
            }
            if (!empty($data)) {
                foreach($data as $key => $value) {
                    if (property_exists($this, $key)) {
                        $this->$key = $value;
                    }
                }
            }
        }
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return get_object_vars($this);
    }

    /**
     * @return string
     */
    public function toJson()
    {
        return Json::encode($this->toArray());
    }
}