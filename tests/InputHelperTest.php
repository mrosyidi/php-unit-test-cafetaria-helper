<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;

    class InputHelperTest extends TestCase
    {
        public function testInputDisplaysPromptAndReturnsProvidedValue()
        {
            $info = "Nama";
            $providedInput = "Muhammad Rosyidi";

            $this->expectOutputString("Nama: Muhammad Rosyidi\n");

            $result = InputHelper::input($info, $providedInput);
            
            $this->assertEquals($providedInput, $result);
        }
    }