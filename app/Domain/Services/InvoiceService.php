<?php

namespace Invoicer\App\Domain\Services;

use Invoicer\App\Domain\Factories\InvoiceFactory;
use Invoicer\App\Domain\Repositories\InvoiceRepositoryInterface;

class InvoiceService
{
    protected $invoiceRepository;
    protected $invoiceFactory;

    public function __construct(
        InvoiceRepositoryInterface $invoiceRepository,
        InvoiceFactory $invoiceFactory
    ) {
        $this->invoiceRepository = $invoiceRepository;
        $this->invoiceFactory = $invoiceFactory;
    }

    public function generateInvoices()
    {
        $orders = $this->invoiceRepository->getUninvoicedOrders();

        $invoices = [];

        if (!empty($orders)) {
            foreach ($orders as $order) {
                $invoices[] = $this->invoiceFactory->createFromOrder($order);
            }
        }

        return $invoices;
    }
}
