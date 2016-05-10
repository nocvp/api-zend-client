<?php
/**
 * Created by NOC.
 * User: semihs
 * Date: 6.05.2016
 * Time: 16:13
 */

namespace NocVpClient\Model\Request;

/**
 * Class Subscription
 * @package NocVpClient\Model\Request
 */
class Subscription extends AbstractRequest
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_PASSIVE = 'PASSIVE';
    const STATUS_SUSPEND = 'SUSPEND';

    const TYPE_ENTERPRISE = 'ENTERPRISE';
    const TYPE_PERSONAL = 'PERSONAL';

    /**
     * @var int
     */
    protected $delivery;
    /**
     * @var int
     */
    protected $storage;
    /**
     * @var int
     */
    protected $transcoderHour;
    /**
     * @var int
     */
    protected $asset;
    /**
     * @var int
     */
    protected $liveAsset;
    /**
     * @var string
     */
    protected $type;
    /**
     * @var string
     */
    protected $status;

    /**
     * @param array $data
     */
    public function __construct(array $data = array())
    {
        parent::__construct($data);
    }

    /**
     * @return int
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param int $delivery
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
    }

    /**
     * @return int
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param int $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
    }

    /**
     * @return int
     */
    public function getTranscoderHour()
    {
        return $this->transcoderHour;
    }

    /**
     * @param int $transcoderHour
     */
    public function setTranscoderHour($transcoderHour)
    {
        $this->transcoderHour = $transcoderHour;
    }

    /**
     * @return int
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @param int $asset
     */
    public function setAsset($asset)
    {
        $this->asset = $asset;
    }

    /**
     * @return int
     */
    public function getLiveAsset()
    {
        return $this->liveAsset;
    }

    /**
     * @param int $liveAsset
     */
    public function setLiveAsset($liveAsset)
    {
        $this->liveAsset = $liveAsset;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
}