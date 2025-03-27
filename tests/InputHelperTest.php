<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;

    class InputHelperTest extends TestCase
    {
        public function testInputWithProvidedValue()
        {
            $info = "Nama";
            $providedInput = "Muhammad Rosyidi";

            $this->expectOutputString("Nama: Muhammad Rosyidi\n");

            $result = InputHelper::input($info, $providedInput);
            
            $this->assertEquals($providedInput, $result);
        }

        public function testInputWithStream()
        {
            $simulatedInput = "Muhammad Rosyidi";
            $inputStream = fopen('php://memory', 'r+');
            fwrite($inputStream, $simulatedInput);
            rewind($inputStream);

            $this->expectOutputString("Nama: ");

            $result = InputHelper::input("Nama", null, $inputStream);
            fclose($inputStream);

            $this->assertEquals("Muhammad Rosyidi", $result);
        }

        public function testInputThrowsExceptionForEmptyInfo()
        {
            $this->expectException(\Exception::class);
            $this->expectExceptionMessage("Info tidak boleh kosong.");
    
            InputHelper::input("", "Muhammad Rosyidi");
        }

        public function testInputThrowsExceptionForInvalidStream()
        {
            $this->expectOutputString("Nama: ");
            $this->expectException(\Exception::class);
            $this->expectExceptionMessage("Masukan stream yang disediakan tidak valid.");
            
            InputHelper::input("Nama", null, []);
        }
    }