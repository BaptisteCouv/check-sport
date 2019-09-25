<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Player")
     */
    private $id_joueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Match")
     */
    private $id_match;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJoueur(): ?Player
    {
        return $this->id_joueur;
    }

    public function setIdJoueur(?Player $id_joueur): self
    {
        $this->id_joueur = $id_joueur;

        return $this;
    }

    public function getIdMatch(): ?Match
    {
        return $this->id_match;
    }

    public function setIdMatch(?Match $id_match): self
    {
        $this->id_match = $id_match;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(?string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getDateMessage(): ?\DateTimeInterface
    {
        return $this->date_message;
    }

    public function setDateMessage(?\DateTimeInterface $date_message): self
    {
        $this->date_message = $date_message;

        return $this;
    }
}
