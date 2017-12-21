<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LouvreController extends Controller
{
    public function index(Request $request)
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            return $this->redirectToRoute('informations');
        }
        return $this->render('index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function informations()
    {
        return new Response('Hello World');
    }
}