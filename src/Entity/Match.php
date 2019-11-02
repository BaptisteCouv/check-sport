<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 * @ORM\Table(name="`match`")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $host_team;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $guest_team;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datage;

    /**
     * @ORM\Column(type="integer")
     */
    private $nb_present_player;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $postponed;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cancelage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $information;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHostTeam(): ?Team
    {
        return $this->host_team;
    }

    public function setHostTeam(?Team $host_team): self
    {
        $this->host_team = $host_team;

        return $this;
    }

    public function getGuestTeam(): ?Team
    {
        return $this->guest_team;
    }

    public function setGuestTeam(?Team $guest_team): self
    {
        $this->guest_team = $guest_team;

        return $this;
    }

    public function getDatage(): ?\DateTimeInterface
    {
        return $this->datage;
    }

    public function setDatage(\DateTimeInterface $date): self
    {
        $this->datage = $date;

        return $this;
    }

    public function getNbPresentPlayer(): ?int
    {
        return $this->nb_present_player;
    }

    public function setNbPresentPlayer(int $nb_present_player): self
    {
        $this->nb_present_player = $nb_present_player;

        return $this;
    }

    public function getPostponed(): ?bool
    {
        return $this->postponed;
    }

    public function setPostponed(?bool $postponed): self
    {
        $this->postponed = $postponed;

        return $this;
    }

    public function getCancelage(): ?bool
    {
        return $this->cancelage;
    }

    public function setCancelage(?bool $cancel): self
    {
        $this->cancelage = $cancel;

        return $this;
    }

    public function getInformation(): ?string
    {
        return $this->information;
    }

    public function setInformation(?string $information): self
    {
        $this->information = $information;

        return $this;
    }
}