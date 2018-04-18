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
        $booking->setTicketNumber($form['booking[ticketNumber]'] = 1);
        $booking->setMail($form['booking[mail]'] = "abdounikarim@gmail.com");
        $client->submit($form);

        //echo $client->getResponse()->getContent();die();

        $this->assertInstanceOf(Booking::class, $booking);
        $this->assertGreaterThanOrEqual(1, $booking->getTicketNumber());
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
