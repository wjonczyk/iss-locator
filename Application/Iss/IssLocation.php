<?php
namespace Application\Iss;

class IssLocation
{
    const STATUS_OK = 'OK';
    
    protected $status;
    protected $name;
    protected $latlng;
    
    public function setStatus($status)
    {
        $this->status = $status;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setLatlng($latlng)
    {
        $this->latlng = $latlng;
    }
    
    public function getStatus()
    {
        return $this->status;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getLatlng()
    {
        return $this->latlng;
    }
    
    public function isStatusOk()
    {
        return $this->status == self::STATUS_OK;
    }
}