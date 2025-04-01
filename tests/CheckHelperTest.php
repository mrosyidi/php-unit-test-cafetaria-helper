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
    }