<?php   

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Order;

    class DuplicateHelperTest extends TestCase
    {   
        public function testDuplicateReturnsCorrectElements()
        {
            $orders = [
                new Order(1, 24000),
                new Order(1, 30000),
                new Order(2, 12000)
            ];

            $result = DuplicateHelper::duplicate($orders, 1);

            $this->assertCount(2, $result);

            foreach ($result as $order) 
            {
                $this->assertEquals(1, $order->getCode());
            }
        }
    }