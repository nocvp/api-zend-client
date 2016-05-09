<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Response;

/**
 * Class Product
 * @package NocVpClient\Model\Response
 */
/**
 * Class Product
 * @package NocVpClient\Model\Response
 */
class Product extends AbstractResponse
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $period;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var integer
     */
    protected $delivery_limit;
    /**
     * @var integer
     */
    protected $storage_limit;
    /**
     * @var integer
     */
    protected $transcoder_hours_limit;
    /**
     * @var integer
     */
    protected $asset_limit;

    /**
     * @param null $data
     */
    public function __construct($data = null)
    {
        parent::__construct($data);
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param string $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getDeliveryLimit()
    {
        return $this->delivery_limit;
    }

    /**
     * @param int $delivery_limit
     */
    public function setDeliveryLimit($delivery_limit)
    {
        $this->delivery_limit = $delivery_limit;
    }

    /**
     * @return int
     */
    public function getStorageLimit()
    {
        return $this->storage_limit;
    }

    /**
     * @param int $storage_limit
     */
    public function setStorageLimit($storage_limit)
    {
        $this->storage_limit = $storage_limit;
    }

    /**
     * @return int
     */
    public function getTranscoderHoursLimit()
    {
        return $this->transcoder_hours_limit;
    }

    /**
     * @param int $transcoder_hours_limit
     */
    public function setTranscoderHoursLimit($transcoder_hours_limit)
    {
        $this->transcoder_hours_limit = $transcoder_hours_limit;
    }

    /**
     * @return int
     */
    public function getAssetLimit()
    {
        return $this->asset_limit;
    }

    /**
     * @param int $asset_limit
     */
    public function setAssetLimit($asset_limit)
    {
        $this->asset_limit = $asset_limit;
    }
}