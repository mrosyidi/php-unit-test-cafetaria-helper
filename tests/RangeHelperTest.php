<?php   

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Food;
    use Cafetaria\Helper\Entity\Drink;

    class RangeHelperTest extends TestCase
    {
        public function testRangeNumberWithinRange()
        {
            $items = [
                new Food("Mie Goreng", 6000),
                new Food("Pastel", 5000),
                new Food("Rawon", 12000)
            ];

            $this->assertTrue(RangeHelper::range($items, 2));
        }

        public function testRangeNumberEqualsCount()
        {
            $items = [
                new Drink("Jus Jeruk", 5000),
                new Drink("Es Oyen", 12000),
                new Drink("Es Campur", 12000)
            ];

            $this->assertTrue(RangeHelper::range($items, 3));
        }
    }