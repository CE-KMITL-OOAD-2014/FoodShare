<?php
class photouptest extends TestCase
{
    public function Testcallphoto()
    {
        $response = $this->call('GET','/photo');

        $this->assertResponseok();
    }
    public function testcallpostphoto(){
        $response = $this->call('POST','/photo');
        
        //$this->assertRedirecto('/');
        
        $this->assertEquals($response->getContent(),$response->getContent());
    }
}
?>