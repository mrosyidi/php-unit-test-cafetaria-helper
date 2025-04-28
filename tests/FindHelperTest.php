<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Order;

    class FindHelperTest extends TestCase
    {
        public function testFindReturnsTrueWhenItemFound()
        {
            $items = [
                new Order(1, 50000),
                new Order(2, 22000),
                new Order(3, 35000)
            ];

            $result = FindHelper::find($items, 2);

            $this->assertTrue($result);
        }

        public function testFindReturnsFalseWhenItemNotFound()
        {
            $items = [
                new Order(1, 50000),
                new Order(2, 22000),
                new Order(3, 35000)
            ];

            $result = FindHelper::find($items, 4);

            $this->assertFalse($result);
        }

        public function testFindThrowsExceptionEmptyItemsArray()
        {
            $items = [];

            $this->expectException(\Exception::class);
            $this->expectExceptionMessage('Item tidak boleh kosong.');
            
            FindHelper::find($items, 1);
        }
    }