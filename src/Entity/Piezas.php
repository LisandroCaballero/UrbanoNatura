<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PiezasRepository")
 */
class Piezas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo11;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_reg;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo1;

    /**
     * @ORM\Column(type="integer")
     */
    private $shipper;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $sucursal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCampo2(): ?string
    {
        return $this->campo2;
    }

    public function setCampo2(string $campo2): self
    {
        $this->campo2 = $campo2;

        return $this;
    }

    public function getCampo11(): ?string
    {
        return $this->campo11;
    }

    public function setCampo11(string $campo11): self
    {
        $this->campo11 = $campo11;

        return $this;
    }

    public function getIdReg(): ?int
    {
        return $this->id_reg;
    }

    public function setIdReg(int $id_reg): self
    {
        $this->id_reg = $id_reg;

        return $this;
    }

    public function getFileNombre(): ?string
    {
        return $this->file_nombre;
    }

    public function setFileNombre(string $file_nombre): self
    {
        $this->file_nombre = $file_nombre;

        return $this;
    }

    public function getCampo1(): ?string
    {
        return $this->campo1;
    }

    public function setCampo1(string $campo1): self
    {
        $this->campo1 = $campo1;

        return $this;
    }

    public function getShipper(): ?int
    {
        return $this->shipper;
    }

    public function setShipper(int $shipper): self
    {
        $this->shipper = $shipper;

        return $this;
    }

    public function getSucursal(): ?string
    {
        return $this->sucursal;
    }

    public function setSucursal(string $sucursal): self
    {
        $this->sucursal = $sucursal;

        return $this;
    }
}
