<?php
namespace source\Qualifield;

class User
{
    private $FirstName;
    private $LastName;
    private $email;
    private $error;
    
   

    public function setUser($FirstName, $LastName, $email) {
        $this->setFirstName($FirstName);
        $this->setLastName($LastName);
        
        if(!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} nao e valido!";
            return false;
        }
        
        return true;
    }
    
    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
    
    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }
    
    /**
     * @param mixed $FirstName
     */
    private function setFirstName($FirstName)
    {
        $this->FirstName = filter_var($FirstName, FILTER_SANITIZE_STRIPPED);
    }
    
    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }
    
    /**
     * @param mixed $LastName
     */
    private function setLastName($LastName)
    {
        $this->LastName = filter_var($LastName, FILTER_SANITIZE_STRIPPED);
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param mixed $email
     */
    private function setEmail($email)
    {
        $this->email = $email;
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else {
            return false;
        }
    }
    
    
}