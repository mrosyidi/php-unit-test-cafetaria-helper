<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use PHPUnit\Framework\Assert;
    use Cafetaria\Helper\Entity\Food;
    use Cafetaria\Helper\Entity\Drink;

    class CheckHelperTest extends TestCase
    {
        public function testFoodFoundExactMatch()
        {
            $foods = [
                new Food("Mie Ayam", 6000),
                new Food("Ayam Goreng", 12000),
                new Food("Rawon", 12000)
            ];

            $result = CheckHelper::check($foods, "Mie Ayam");
            $this->assertTrue($result);
        }

        public function testFoodFoundWithDifferentCaseAndWhitespace()
        {
            $foods = [
                new Food(" Mie Ayam   ", 6000),
                new Food(" Ayam   Goreng", 12000),
                new Food("  Rawon   ", 12000)
            ];

            $result = CheckHelper::check($foods, "rawon");
            $this->assertTrue($result);
        }
    }