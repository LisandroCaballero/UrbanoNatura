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
     * @ORM\Column(type="integer")
     */
    private $id_reg;

    /**
     * @ORM\Column(type="bigint")
     */
    private $lote;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $sucursal;

    /**
     * @ORM\Column(type="integer")
     */
    private $shipper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $campo11;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_nombre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_usuario;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $estado;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLote(): ?int
    {
        return $this->lote;
    }

    public function setLote(int $lote): self
    {
        $this->lote = $lote;

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

    public function getShipper(): ?int
    {
        return $this->shipper;
    }

    public function setShipper(int $shipper): self
    {
        $this->shipper = $shipper;

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

    public function getFileNombre(): ?string
    {
        return $this->file_nombre;
    }

    public function setFileNombre(string $file_nombre): self
    {
        $this->file_nombre = $file_nombre;

        return $this;
    }

    public function getDatetime(): ?\DateTimeInterface
    {
        return $this->datetime;
    }

    public function setDatetime(\DateTimeInterface $datetime): self
    {
        $this->datetime = $datetime;

        return $this;
    }

    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): self
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}
