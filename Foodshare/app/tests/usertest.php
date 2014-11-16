<?php
class userTest extends TestCase
{
    public function testsingin()
    {
        $response = $this->call('GET','/signin');
        
        //$this->assertRedirecto('/');
        
        $this->assertEquals($response->getContent(),$response->getContent());
    }
    public function testregisterdata(){
        $this->call('POST','/register');
        $user = new User(array('email'=>'kit_tiwat@hotmail.com','password' =>'89318931'));
        $this->be($user);
    }
    public function testresponsesingin(){
        $this->call('GET','/signin');
        $this->assertResponseOk();
    }
    public function testregister(){
        $this->call('GET','/register');
        $this->assertResponseOK();
    }
}
?>
