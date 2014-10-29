<?php
class UserTest extends Testcase
{
    public function TestcallRegister()
    {
        $response = $this->call('GET','/Register');

        $this->assertResponseok();

        

    }
    public function testinputRegister(){
        $response = $this->call('POST','AuthController@postRegister');
        $email = new email(array('email' => 'kit_tiwat@hotmail.com' ));
        $this->be($email);
        $email = new email(array('password' => 'helloworld' ));
        $this->be($password);
        $email = new email(array('password_again' => 'password_again' ));
        $this->be('password_again');

    }
    public function testValidationRegist(){
        $response = $this->call('POST','AuthController@postRegister');
        $view = $response->original;
        $this->assertEquals('kit_tiwat@hotmail.com',$email['email']);
        $this->assertEquals('helloworld',$password['password']);
        $this->assertEquals('helloworld',$password_again['password_again'])
    }
    public function testviewRegister(){
        $this->call('POST','/Register')

        $this->assertviewHas('email',$email);
        $this->assertviewHas('password',$password);
        $this->assertviewHas('password_again',$password_again);

    }
    public function TestcallSignin()
    {
        $response = $this->call('GET','/Signin');

        $this->assertResponseok();
    }
}
?>
