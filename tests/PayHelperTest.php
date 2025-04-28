<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Order;

    class PayHelperTest extends TestCase
    {
        public function testPayReturnsCorrectTotal()
        {
            $orders = [
                new Order(1, 24000),
                new Order(1, 30000),
                new Order(2, 20000)
            ];

            $total = PayHelper::pay($orders, 1);
            $this->assertEquals(54000, $total);
        }
    }