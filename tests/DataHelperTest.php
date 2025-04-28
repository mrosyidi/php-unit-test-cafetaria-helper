<?php   

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Food;
    use Cafetaria\Helper\Entity\Drink;

    class DataHelperTest extends TestCase
    {
        public function testDataReturnsCorrectArray()
        {
            $items = [
                new Food("Mie Goreng", 6000),
                new Food("Ayam Panggang", 12000),
                new Food("Pastel", 6000)
            ];

            $result = DataHelper::data($items, 1);

            $this->assertEquals(["name" => "Ayam Panggang", "price" => 12000], $result);
        }

        public function testDataThrowsExceptionEmptyItems()
        {
            $this->expectException(\Exception::class);
            $this->expectExceptionMessage('Item tidak boleh kosong.');

            DataHelper::data([], 0);
        }
    }