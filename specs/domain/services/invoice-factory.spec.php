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

    it('should set the total of the invoice', function () {
        $order = new Order();
        $order->setTotal(500);
        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);
        expect($invoice->getTotal())->to->equal(500);
    });

    it('should associate the Order to the Invoice', function () {
        $order = new Order();
        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);
        expect($invoice->getOrder())->to->equal($order);
    });

    it('should set the date of the Invoice', function () {
        $order = new Order();
        $factory = new InvoiceFactory();
        $invoice = $factory->createFromOrder($order);
        expect($invoice->getInvoiceDate())->to->loosely->equal(new \DateTime());
    });
});
