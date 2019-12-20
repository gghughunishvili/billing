<?php

namespace Invoicer\App\Domain\Repositories;

interface InvoiceRepositoryInterface extends RepositoryInterface
{
    /**
     * @return mixed
     */
    public function getUninvoicedOrders();
}
