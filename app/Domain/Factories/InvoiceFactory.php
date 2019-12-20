<?php

namespace Invoicer\App\Domain\Factories;

use Invoicer\App\Domain\Entities\Invoice;
use Invoicer\App\Domain\Entities\Order;

class InvoiceFactory
{
    public function createFromOrder(Order $order) {
        $invoice = new Invoice();
        $invoice->setOrder($order);
        $invoice->setInvoiceDate(new \DateTime());
        $invoice->setTotal($order->getTotal());
        return $invoice;
    }
}
