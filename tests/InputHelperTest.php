<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use PHPUnit\Framework\Assert;

    class InputHelperTest extends TestCase
    {
        public function testInputWithProvidedValue()
        {
            $info = "Nama";
            $providedInput = "Muhammad Rosyidi";

            $result = InputHelper::input($info, $providedInput);

            $this->expectOutputString("Nama: Muhammad Rosyidi\n");
            $this->assertEquals("Muhammad Rosyidi", $result);
        }
    }