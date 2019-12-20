<?php

use Invoicer\App\Domain\Repositories\InvoiceRepositoryInterface;
use Invoicer\App\Domain\Services\InvoiceService;

describe('InvoicingService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $interface = InvoiceRepositoryInterface::class;
            $this->em = $this->getProphet()->prophesize($interface);
            $this->repository = new InvoiceService($this->em->reveal());
        });

        afterEach(function () {
            $this->getProphet()->checkPredictions();
        });

        it('should query the repository for uninvoiced Orders', function () {
            $this->em->getUninvoicedOrders()->shouldBeCalled();
            $this->repository->generateInvoices();
        });

        it('should return an Invoice for each uninvoiced Order');
    });
});
