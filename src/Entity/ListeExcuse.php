<?php

namespace App\Entity;

use App\Repository\ListeExcuseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeExcuseRepository::class)]
class ListeExcuse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $http_code = null;

    #[ORM\Column(length: 255)]
    private ?string $tag = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHttpCode(): ?int
    {
        return $this->http_code;
    }

    public function setHttpCode(int $http_code): static
    {
        $this->http_code = $http_code;

        return $this;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }

    public function setTag(string $tag): static
    {
        $this->tag = $tag;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
