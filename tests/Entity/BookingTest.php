<?php

namespace App\Tests\Entity;

use App\Entity\Booking;
use PHPUnit\Framework\TestCase;

class BookingTest extends TestCase
{
    private $booking;

    public function setUp()
    {
        $this->booking = new Booking();
    }

    public function testBookingObjectIsInstanceOfBookingClass()
    {
        $this->assertInstanceOf(Booking::class, $this->booking);
    }

    public function testVisitDayIsTodayOrAfter()
    {
        //Booking Entity Constructor initialize a new \DateTime()
        $this->assertInstanceOf(\DateTime::class, $this->booking->getVisitDay());
        $this->assertLessThanOrEqual(new \DateTime(), $this->booking->getVisitDay());
    }

    public function testNumberOfTicketsIsNotNull()
    {
        //Booking Entity Constructor initialize a quantity to 1 by default
        $this->assertEquals(1, $this->booking->getTicketNumber());
        $this->assertSame(1, $this->booking->getTicketNumber());
        $this->assertLessThanOrEqual(1, $this->booking->getTicketNumber());
        $this->assertGreaterThan(0, $this->booking->getTicketNumber());
    }

    public function testTicketTypeIsADay()
    {
        $this->booking->setTicketType('J');
        $this->assertEquals('J', $this->booking->getTicketType());
    }

    public function testTicketTypeIsAHalfDay()
    {
        $this->booking->setTicketType('D');
        $this->assertEquals('D', $this->booking->getTicketType());
    }

    public function testMailIsValid()
    {
        $this->booking->setMail('abdounikarim@gmail.com');
        $this->assertEquals('abdounikarim@gmail.com', $this->booking->getMail());
    }

    public function testPriceIsNotNull()
    {
        $this->booking->setPrice(16);
        $this->assertGreaterThanOrEqual(0, $this->booking->getPrice());
    }
}
