<?php   
    
    namespace Cafetaria\Helper;

    class InputHelper 
    {
        public static function input(string $info, ?string $input = null, $inputStream = null): string
        {
            echo "$info: ";
    
            if ($input !== null)
            {
                echo $input . PHP_EOL; 
                return trim($input);
            }

            $stream = $inputStream ?? fopen('php://stdin', 'r');
            $result = fgets($stream);
            
            if($inputStream === null) fclose($stream);
            return trim($result);
        }
    }