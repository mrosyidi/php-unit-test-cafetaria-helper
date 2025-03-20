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

        public function testFoodNotFound()
        {
            $foods = [
                new Food("Mie Ayam", 6000),
                new Food("Ayam Goreng", 12000),
                new Food("Rawon", 12000)
            ];

            $result = CheckHelper::check($foods, "Pastel");
            $this->assertFalse($result);
        }

        public function testEmptyFoodList()
        {
            $foods = [];

            $result = CheckHelper::check($foods, "Soto Ayam");
            $this->assertFalse($result);
        }

        public function testDrinkFoundExactMatch()
        {
            $drinks = [
                new Drink("Es Campur", 12000),
                new Drink("Es Oyen", 12000),
                new Drink("Jus Wortel", 6000)
            ];

            $result = CheckHelper::check($drinks, "Es Oyen");
            $this->assertTrue($result);
        }

        public function testDrinkFoundWithDifferentCaseAndWhitespace()
        {
            $drinks = [
                new Drink("  Es   Coklat", 12000),
                new Drink(" J  us  Alpukat", 10000),
                new Drink(" Es   Oy e  n   ", 12000)
            ];

            $result = CheckHelper::check($drinks, "jusalpukat");
            $this->assertTrue($result);
        }

        public function testDrinkNotFound()
        {
            $drinks = [
                new Drink("Jus Melon", 6000),
                new Drink("Es Campur", 12000),
                new Drink("Es Kelapa Muda", 5000)
            ];

            $result = CheckHelper::check($drinks, "Jus Semangka");
            $this->assertFalse($result);
        }

        public function testEmptyDrinkList()
        {
            $drinks = [];

            $result = CheckHelper::check($drinks, "Es Campur");
            $this->assertFalse($result);
        }
    }