<?php

namespace Invoicer\App\Domain\Services;

use Invoicer\App\Domain\Repositories\InvoiceRepositoryInterface;

class InvoiceService
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function generateInvoices()
    {
        $orders = $this->invoiceRepository->getUninvoicedOrders();
    }
}
