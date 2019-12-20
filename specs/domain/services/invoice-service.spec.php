<?php

use Invoicer\App\Domain\Entities\Invoice;
use Invoicer\App\Domain\Entities\Order;
use Invoicer\App\Domain\Factories\InvoiceFactory;
use Invoicer\App\Domain\Repositories\InvoiceRepositoryInterface;
use Invoicer\App\Domain\Services\InvoiceService;

describe('InvoicingService', function () {
    describe('->generateInvoices()', function () {
        beforeEach(function () {
            $interface = InvoiceRepositoryInterface::class;
            $this->em = $this->getProphet()->prophesize($interface);
            $this->factory = $this->getProphet()
                ->prophesize(InvoiceFactory::class);
            $this->repository = new InvoiceService(
                $this->em->reveal(),
                $this->factory->reveal()

            );
        });

        afterEach(function () {
            $this->getProphet()->checkPredictions();
        });

        it('should query the repository for uninvoiced Orders', function () {
            $this->em->getUninvoicedOrders()->shouldBeCalled();
            $service = new InvoiceService(
                $this->em->reveal(),
                $this->factory->reveal()
            );
            $service->generateInvoices();
        });

        it('should return an Invoice for each uninvoiced Order', function () {
            $orders = [(new Order())->setTotal(400)];
            $invoices = [(new Invoice())->setTotal(400)];
            $this->em->getUninvoicedOrders()->willReturn($orders);
            $this->factory->createFromOrder($orders[0])->willReturn($invoices[0]);
            $service = new InvoiceService(
                $this->em->reveal(),
                $this->factory->reveal()
            );
            $results = $service->generateInvoices();
            expect($results)->to->be->an('array');
            expect($results)->to->have->length(count($orders));
        });
    });
});
