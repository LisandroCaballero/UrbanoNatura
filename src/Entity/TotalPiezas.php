<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TotalPiezasRepository")
 */
class TotalPiezas
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
    private $lote;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file_nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fecha;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLote(): ?string
    {
        return $this->lote;
    }

    public function setLote(string $lote): self
    {
        $this->lote = $lote;

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

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

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
}
