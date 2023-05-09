<?php

namespace App\Services;
use Illuminate\Support\Str;
use App\Models\AuthSession;

class AuthSessionService
{
    private $token;
    private $ipAddress;
    private $userAgent;
    private $device;
    private $startedAt;
    private $endedAt;
    private $status;
    private $createdBy;
    

    /**
     * Set the value of token
     *
     * @return  self
     */ 
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Set the value of ipAddress
     *
     * @return  self
     */ 
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }

    /**
     * Set the value of userAgent
     *
     * @return  self
     */ 
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Set the value of device
     *
     * @return  self
     */ 
    public function setDevice($device)
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Set the value of startedAt
     *
     * @return  self
     */ 
    public function setStartedAt($startedAt)
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    /**
     * Set the value of endedAt
     *
     * @return  self
     */ 
    public function setEndedAt($endedAt)
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the value of createdBy
     *
     * @return  self
     */ 
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function generateToken(){
        $this->token = Str::uuid(32);
        return $this;
    }

    public function create(){
        $authSession = new AuthSession();
        $authSession->token = $this->token;
        $authSession->ip_address = $this->ipAddress;
        $authSession->user_agent = $this->userAgent;
        $authSession->device = $this->device;
        $authSession->started_at = time();
        $authSession->status = $this->status;
        $authSession->created_by = $this->createdBy;
        $authSession->save();

        return $authSession;
    }

    public function kill(){
        $authSession = AuthSession::where('token', $this->token)->first();
        if($authSession){
            $authSession->ended_at = $this->endedAt;
            $authSession->status = $this->status;
            $authSession->save();
            return $authSession;
        }

        return false;
    }

    public function verifyToken(){
        $authSession = AuthSession::where('token', $this->token)
        ->where('created_by', $this->createdBy)
        ->where('ended_at', null)
        ->where('status', 'active')
        ->first();
        return $authSession;
    }

    /**
     * Get the value of token
     */ 
    public function getToken()
    {
        return $this->token;
    }
}
