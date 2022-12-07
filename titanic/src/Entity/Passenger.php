<?php

namespace App\Entity;

use App\Repository\PassengerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassengerRepository::class)]
class Passenger
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $survived = null;

    #[ORM\Column(nullable: true)]
    private ?int $class = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sex = null;

    #[ORM\Column(nullable: true)]
    private ?int $age = null;

    #[ORM\Column(nullable: true)]
    private ?int $sibsp = null;

    #[ORM\Column(nullable: true)]
    private ?int $parch = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ticket = null;

    #[ORM\Column(nullable: true)]
    private ?float $fare = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cabin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $embarked = null;

    public function create(bool $survived, int $classLevel,  string $name, string $sex, int $age, int $sibps, int $parch, string $ticket, float $fare, string $cabin, string $embarked): void{
        $this->setSurvived($survived);
        $this->setClass($classLevel);
        $this->setName($name);
        $this->setSex($sex);
        $this->setAge($age);
        $this->setSibsp($sibps);
        $this->setParch($parch);
        $this->setTicket($ticket);
        $this->setFare($fare);
        $this->setCabin($cabin);
        $this->setEmbarked($embarked);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isSurvived(): ?bool
    {
        return $this->survived;
    }

    public function setSurvived(?bool $survived): self
    {
        $this->survived = $survived;

        return $this;
    }

    public function getClass(): ?int
    {
        return $this->class;
    }

    public function setClass(?int $class): self
    {
        $this->class = $class;

        return $this;
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

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getSibsp(): ?int
    {
        return $this->sibsp;
    }

    public function setSibsp(?int $sibsp): self
    {
        $this->sibsp = $sibsp;

        return $this;
    }

    public function getParch(): ?int
    {
        return $this->parch;
    }

    public function setParch(?int $parch): self
    {
        $this->parch = $parch;

        return $this;
    }

    public function getTicket(): ?string
    {
        return $this->ticket;
    }

    public function setTicket(?string $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getFare(): ?float
    {
        return $this->fare;
    }

    public function setFare(?float $fare): self
    {
        $this->fare = $fare;

        return $this;
    }

    public function getCabin(): ?string
    {
        return $this->cabin;
    }

    public function setCabin(?string $cabin): self
    {
        $this->cabin = $cabin;

        return $this;
    }

    public function getEmbarked(): ?string
    {
        return $this->embarked;
    }

    public function setEmbarked(?string $embarked): self
    {
        $this->embarked = $embarked;

        return $this;
    }
}
