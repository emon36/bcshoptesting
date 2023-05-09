<?php

namespace App\Services;

use App\Models\AuthSession;
use App\Models\User;

class AuthService
{
    private $email;
    private $password;

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function panelLogin(){
        $user = User::where('email', $this->email)->first();
        if($user){
            if(password_verify($this->password, $user->password)){
                return $user;
            }
        }

        return false;
    }


    

    
}
