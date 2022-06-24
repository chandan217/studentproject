<?php

namespace App\Entity;

use App\Repository\AddClassRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddClassRepository::class)
 */
class AddClass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
     private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class;


    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    
};
