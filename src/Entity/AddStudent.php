<?php

namespace App\Entity;

use App\Repository\AddStudentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddStudentRepository::class)
 */
class AddStudent
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
    private $AdmissionNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ChildsName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $class;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdmissionNumber(): ?string
    {
        return $this->AdmissionNumber;
    }

    public function setAdmissionNumber(string $AdmissionNumber): self
    {
        $this->AdmissionNumber = $AdmissionNumber;

        return $this;
    }

    public function getChildsName(): ?string
    {
        return $this->ChildsName;
    }

    public function setChildsName(string $ChildsName): self
    {
        $this->ChildsName = $ChildsName;

        return $this;
    }

    public function getClass(): ?string
    {
        return $this->class;
    }

    public function setClass(string $class): self
    {
        $this->class = $class;

        return $this;
    }
}
