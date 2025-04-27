<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use Cafetaria\Helper\Entity\Order;
    use Cafetaria\Helper\Entity\Payment;

    class CodeHelperTest extends TestCase
    {
        public function testCodeEmptyOrdersAndPayments()
        {
            $orders = [];
            $payments = [];

            $this->assertEquals(1, CodeHelper::code($orders, $payments, true));
        }

        public function testCodeEmptyOrdersWithPayments()
        {
            $orders = [];

            $payments = [
                new Payment(5), 
                new Payment(10)
            ];

            $this->assertEquals(11, CodeHelper::code($orders, $payments, true));
        }

        public function testCodeOrdersWithoutExit()
        {
            $orders = [
                new Order(2, 2), 
                new Order(4, 2)
            ];

            $payments = [];

            $this->assertEquals(4, CodeHelper::code($orders, $payments, false));
        }
    }