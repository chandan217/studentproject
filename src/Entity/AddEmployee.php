<?php

namespace App\Entity;

use App\Repository\AddEmployeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AddEmployeeRepository::class)
 */
class AddEmployee
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
    private $EmployeeCode;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $EmployeeName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmployeeCode(): ?string
    {
        return $this->EmployeeCode;
    }

    public function setEmployeeCode(string $EmployeeCode): self
    {
        $this->EmployeeCode = $EmployeeCode;

        return $this;
    }

    public function getEmployeeName(): ?string
    {
        return $this->EmployeeName;
    }

    public function setEmployeeName(string $EmployeeName): self
    {
        $this->EmployeeName = $EmployeeName;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->Role;
    }

    public function setRole(string $Role): self
    {
        $this->Role = $Role;

        return $this;
    }
}
