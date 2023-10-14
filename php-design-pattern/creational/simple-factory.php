<?php

class User
{
    protected $id;
    protected $name;
    protected $creditLimit = 0;

    public function __construct()
    {
        
    }
}

class Membership
{

}

class UserFactory
{
    protected Membership $membership;

    public function __construct(Membership $membership)
    {
        $this->membership = $membership;
    }

    public function createUser($name)
    {
        $user = new User();
        $user->setName($name);
        $user->setCreditLimit(0);
        $user->setMembershipAccount($membership);
        $user->setStatus('pending');

        return $user;
    }
}