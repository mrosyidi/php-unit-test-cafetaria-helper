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

        public function testInputWithStream()
        {
            $info = "Nama";
            $simulatedStream = "Muhammad Rosyidi\n";

            $inputStream = fopen('php://memory', 'r+');
            fwrite($inputStream, $simulatedStream);
            rewind($inputStream);

            $result = InputHelper::input($info, null, $inputStream);
            fclose($inputStream);

            $this->expectOutputString("Nama: ");
            $this->assertEquals("Muhammad Rosyidi", $result);
        }
    }