<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Food;
    use Cafetaria\Helper\Entity\Drink;

    class CheckHelperTest extends TestCase
    {
        public function testCheckReturnsTrueWhenItemExists()
        {
            $items = [
                new Food("Mie Goreng", 6000),
                new Food("Ayam Bakar", 12000),
                new Food("Rawon", 12000)
            ];

            $result = CheckHelper::check($items, "Ayam Bakar");
            $this->assertTrue($result);
        }

        public function testCheckIgnoresCaseAndWhitespaceWhenCheckingItem()
        {
            $items = [
                new Drink("Es Oyen", 12000),
                new Drink("Es Campur", 12000),
                new Drink("Es Kelapa Muda", 7000)
            ];

            $result = CheckHelper::check($items, "eS  Ca  m   pur");
            $this->assertTrue($result);
        }

    }