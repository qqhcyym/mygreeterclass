<?php
require_once('MyGreeter.php');
use PHPUnit\Framework\TestCase;

class MyGreeterTest extends TestCase
{
    private MyGreeter $greeter;
    private $init=array(
				array('min'=>6,'max'=>12,'text'=>'Good morning')
				,array('min'=>12,'max'=>18,'text'=>'Good afternoon')
				,array('min'=>18,'max'=>24,'text'=>'Good evening')
				,array('min'=>0,'max'=>6,'text'=>'Good evening')
	);
    private $testArray=array(
    		'Good morning','Good afternoon','Good evening'
    );

    public function setUp(): void
    {
        $this->greeter = new MyGreeter($this->init);
    }

    public function test_init()
    {
        $this->assertInstanceOf(
            MyGreeter::class,
            $this->greeter
        );
    }

    public function test_greeting()
    {
    	//change to assertContains,get match text better than strlen(i think)
        $this->assertContains($this->greeter->greeting(),$this->testArray,'doesnot match');
    }
}
