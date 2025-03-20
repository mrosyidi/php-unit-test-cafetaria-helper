<?php 

    namespace Cafetaria\Helper;

    use PHPUnit\Framework\TestCase;
    use PHPUnit\Framework\Assert;
    use Cafetaria\Helper\Entity\Order;
    use Cafetaria\Helper\Entity\Payment;

    class CodeHelperTest extends TestCase
    {
        public function testEmptyOrdersAndPayments()
        {
            $orders = [];
            $payments = [];
            $exit = false;

            $code = CodeHelper::code($orders, $payments, $exit);
            $this->assertEquals(1, $code);
        }
    }