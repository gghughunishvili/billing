<?php

use Invoicer\App\Domain\Entities\Invoice;
use Invoicer\App\Domain\Entities\Order;
use Invoicer\App\Domain\Factories\InvoiceFactory;

describe('InvoiceFactory', function () {
    describe('->createFromOrder()', function () {
        it('should return an order object', function () {
            $order = new Order();
            $factory = new InvoiceFactory();
            $invoice = $factory->createFromOrder($order);
            expect($invoice)->to->be->instanceof(
                'Invoicer\App\Domain\Entities\Invoice'
            );
        });
    });
});
