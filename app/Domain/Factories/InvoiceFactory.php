<?php

namespace Invoicer\App\Domain\Factories;

use Invoicer\App\Domain\Entities\Invoice;
use Invoicer\App\Domain\Entities\Order;

class InvoiceFactory
{
    public function createFromOrder(Order $order) {
        return new Invoice();
    }
}
