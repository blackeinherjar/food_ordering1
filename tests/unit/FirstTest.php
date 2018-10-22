<?php

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{

    /** @test */
    public function login_test()
    {
        $email = "test@gmail.com";
        
        $password = "123456";
       
        $this->assertContains("@",$email);
        $this->assertNotNull($password);


    }


    
}


?>