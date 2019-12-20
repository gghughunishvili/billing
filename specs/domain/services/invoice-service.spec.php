<?php

describe('InvoicingService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $repository = Invoicer\App\Domain\Repository\OrderRepositoryInterface::class;
            $this->repository = $this->getProphet()->prophesize($repository);
        });

        it('should query the repository for uninvoiced Orders', function () {
            $this->repository->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvoicingService($this->repository->reveal());
            $service->generateInvoices();
        });

        it('should return an Invoice for each uninvoiced Order');
    });
});
