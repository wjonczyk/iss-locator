<?php
namespace Application\Iss;

/**
 * Model for Space Station Location
 */
class IssLocation
{
    /**
     * Status OK from Geo Code API meaning location was found
     * 
     * @var string
     */
    const STATUS_OK = 'OK';
    
    /**
     * Status from GeoCode API
     * 
     * @var string
     */
    protected $status;
    
    /**
     * Human readable location
     *
     * @var string
     */
    protected $name;
    
    /**
     * Latitude+longitude
     *
     * @var string
     */
    protected $latlng;
    
    /**
     * 
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    /**
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
    
    /**
     * 
     * @param string $latlng
     */
    public function setLatlng($latlng)
    {
        $this->latlng = $latlng;
    }
    
    /**
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * 
     * @return string
     */
    public function getLatlng()
    {
        return $this->latlng;
    }
    
    /**
     * 
     * @return bool
     */
    public function isStatusOk()
    {
        return $this->status == self::STATUS_OK;
    }
}