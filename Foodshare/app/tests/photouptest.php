<?php
class UserTest extends Testcaset
{
    public function TestcallRegister()
    {
        $response = $this->call('GET','/Image');

        $this->assertResponseok();
    }
     public function TestUploadImage()
    {
        $response = $this->action('GET','ImageController@uploadimage');
        $image = new email(array('image' => 'uploadimage' ));
    }
     public function testValidationImage(){
        $response = $this->call('POST','Image@postRegister');
        $view = $response->original;
        $this->assertEquals('uploadimage',$image['image']);
    }
}
?>