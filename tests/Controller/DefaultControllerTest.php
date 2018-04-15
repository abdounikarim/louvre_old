<?php

namespace App\Tests\Controller;

use App\Entity\Booking;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testShowHomepage()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $form = $crawler->selectButton('Valider')->form();
        $booking = new Booking();
        $booking->setVisitDay($form['booking[visitDay]'] = '16/04/2018');
        $booking->setTicketNumber($form['booking[ticketNumber]'] = 1);
        $booking->setTicketType($form['booking[ticketType]'] = "J");
        $booking->setMail($form['booking[mail]'] = "abdounikarim@gmail.com");
        $client->submit($form);

        //echo $client->getResponse()->getContent();die();

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }
}
