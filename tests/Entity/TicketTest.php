<?php

namespace App\tests\Entity;

use App\Entity\Ticket;
use PHPUnit\Framework\TestCase;

class TicketTest extends TestCase
{
    private $ticket;

    public function setUp()
    {
        $this->ticket = new Ticket();
    }

    public function testIdIsNull()
    {
        $this->assertNull($this->ticket->getId());
    }

    public function testVisitDayIsTodayOrAfter()
    {
        $this->ticket->setVisitDay(new \DateTime());
        $this->assertInstanceOf(\DateTime::class, $this->ticket->getVisitDay());
        $this->assertLessThanOrEqual(new \DateTime(), $this->ticket->getVisitDay());
    }

    public function testTypeIsADay()
    {
        $this->ticket->setType('J');
        $this->assertEquals('J', $this->ticket->getType());
    }

    public function testTypeIsAHalfDay()
    {
        $this->ticket->setType('D');
        $this->assertEquals('D', $this->ticket->getType());
    }

    public function testQuantityAvailable()
    {
        $this->ticket->setQuantityAvailable(1000);
        $this->assertGreaterThanOrEqual(1, $this->ticket->getQuantityAvailable());
    }
}