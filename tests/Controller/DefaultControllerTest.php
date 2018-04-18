<?php

namespace App\Tests\Controller;

use App\Entity\Booking;
use App\Entity\Information;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage;

class DefaultControllerTest extends WebTestCase
{
    public function testShowHomePage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $form = $crawler->selectButton('Valider')->form();
        $booking = new Booking();
        $booking->setVisitDay($form['booking[visitDay]'] = '02/01/2020');
        $booking->setTicketNumber($form['booking[ticketNumber]'] = 1);
        $booking->setTicketType($form['booking[ticketType]'] = "J");
        $booking->setMail($form['booking[mail]'] = "abdounikarim@gmail.com");
        $client->submit($form);

        //echo $client->getResponse()->getContent();die();

        $this->assertInstanceOf(Booking::class, $booking);
        $date = date('02/01/2020');
        $this->assertEquals($date, $booking->getVisitDay());
        $this->assertGreaterThanOrEqual($booking->getVisitDay(), new \DateTime());
        $this->assertGreaterThanOrEqual(1, $booking->getTicketNumber());
        $this->assertEquals("J", $booking->getTicketType());
        $this->assertEquals("abdounikarim@gmail.com", $booking->getMail());
        $session = new Session(new MockFileSessionStorage());
        $session->set('booking', $booking);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        return [
          [$session]
        ];
    }

    /**
     * @dataProvider testShowHomePage
     */
    public function testShowInformationsPage($session)
    {
        $booking = $session->get('booking');
        $this->assertInstanceOf(Booking::class, $booking);
        $client = static::createClient();

        $crawler = $client->request('GET', '/informations');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        /*
        $form = $crawler->selectButton('Valider')->form();
        $information = new Information();
        */

    }
}
