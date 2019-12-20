<?php

namespace Invoicer\App\Domain\Repositories;

interface InvoiceInterface extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getUninvoicedOrders();
}
