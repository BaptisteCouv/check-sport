<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 * @UniqueEntity(
 *  fields={"email"},
 *  message="L'email que vous avez indiquez est déjà utilisé"
 * )
 */
class Player implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Assert\NotBlank(message="Please type a password")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=120)
     * @Assert\NotBlank(message="Please type a lastname")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=120)
     * @Assert\NotBlank(message="Please type a firstname")
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_licence;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $num_shirt;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $post;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profil_img;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank(message="Please type a birth date")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nom_phone;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Team")
     */
    private $id_team;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Assert\NotBlank(message="Please type a password")
     */
    private $is_coach;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getNumLicence(): ?string
    {
        return $this->num_licence;
    }

    public function setNumLicence(?string $num_licence): self
    {
        $this->num_licence = $num_licence;

        return $this;
    }

    public function getNumShirt(): ?int
    {
        return $this->num_shirt;
    }

    public function setNumShirt(?int $num_shirt): self
    {
        $this->num_shirt = $num_shirt;

        return $this;
    }

    public function getPost(): ?string
    {
        return $this->post;
    }

    public function setPost(?string $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getProfilImg(): ?string
    {
        return $this->profil_img;
    }

    public function setProfilImg(?string $profil_img): self
    {
        $this->profil_img = $profil_img;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getNomPhone(): ?int
    {
        return $this->nom_phone;
    }

    public function setNomPhone(?int $nom_phone): self
    {
        $this->nom_phone = $nom_phone;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getIdTeam(): ?Team
    {
        return $this->id_team;
    }

    public function setIdTeam(?Team $id_team): self
    {
        $this->id_team = $id_team;

        return $this;
    }

    public function getIsCoach(): ?bool
    {
        return $this->is_coach;
    }

    public function setIsCoach(?bool $is_coach): self
    {
        $this->is_coach = $is_coach;

        return $this;
    }
}
