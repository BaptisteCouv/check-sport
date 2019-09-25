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
    private $id_team_host;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_team_guest;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $winner;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $looser;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

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

    public function getIdTeamHost(): ?Team
    {
        return $this->id_team_host;
    }

    public function setIdTeamHost(?Team $id_team_host): self
    {
        $this->id_team_host = $id_team_host;

        return $this;
    }

    public function getIdTeamGuest(): ?Team
    {
        return $this->id_team_guest;
    }

    public function setIdTeamGuest(?Team $id_team_guest): self
    {
        $this->id_team_guest = $id_team_guest;

        return $this;
    }

    public function getWinner(): ?bool
    {
        return $this->winner;
    }

    public function setWinner(?bool $winner): self
    {
        $this->winner = $winner;

        return $this;
    }

    public function getLooser(): ?bool
    {
        return $this->looser;
    }

    public function setLooser(?bool $looser): self
    {
        $this->looser = $looser;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->datage;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->datage = $date;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

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

    public function getCancel(): ?bool
    {
        return $this->cancelage;
    }

    public function setCancel(?bool $cancel): self
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