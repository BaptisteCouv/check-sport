<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_victory;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_defeat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $team_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $team_logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stadium_adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbVictory(): ?int
    {
        return $this->nb_victory;
    }

    public function setNbVictory(?int $nb_victory): self
    {
        $this->nb_victory = $nb_victory;

        return $this;
    }

    public function getNbDefeat(): ?int
    {
        return $this->nb_defeat;
    }

    public function setNbDefeat(?int $nb_defeat): self
    {
        $this->nb_defeat = $nb_defeat;

        return $this;
    }

    public function getTeamName(): ?string
    {
        return $this->team_name;
    }

    public function setTeamName(string $team_name): self
    {
        $this->team_name = $team_name;

        return $this;
    }

    public function getTeamLogo(): ?string
    {
        return $this->team_logo;
    }

    public function setTeamLogo(?string $team_logo): self
    {
        $this->team_logo = $team_logo;

        return $this;
    }

    public function getStadiumAdress(): ?string
    {
        return $this->stadium_adress;
    }

    public function setStadiumAdress(string $stadium_adress): self
    {
        $this->stadium_adress = $stadium_adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }
}
