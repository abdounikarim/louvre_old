<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $visitDay;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantityAvailable;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $type;

    /**
     * Ticket constructor.
     */
    public function __construct()
    {
        $this->visitDay = new \DateTime();
    }


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getVisitDay()
    {
        return $this->visitDay;
    }

    /**
     * @param mixed $visitDay
     */
    public function setVisitDay($visitDay): void
    {
        $this->visitDay = $visitDay;
    }

    /**
     * @return mixed
     */
    public function getQuantityAvailable()
    {
        return $this->quantityAvailable;
    }

    /**
     * @param mixed $quantityAvailable
     */
    public function setQuantityAvailable($quantityAvailable): void
    {
        $this->quantityAvailable = $quantityAvailable;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }
}
