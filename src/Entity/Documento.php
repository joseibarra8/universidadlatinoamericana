<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoRepository")
 */
class Documento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $modalidad;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $campus;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $nivel;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $rvoe;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $clavePrograma;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $matricula;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $fileName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $fileType;

    /**
     * @ORM\Column(type="integer")
     */
    private $fileSize;

    /**
     * @ORM\Column(type="blob")
     */
    private $fileData;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaRegistro;

    /**
     * @ORM\Column(type="datetime")
     */
    private $ultimaActualizacion;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\usuario", inversedBy="documentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario_registro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModalidad(): ?string
    {
        return $this->modalidad;
    }

    public function setModalidad(string $modalidad): self
    {
        $this->modalidad = $modalidad;

        return $this;
    }

    public function getCampus(): ?string
    {
        return $this->campus;
    }

    public function setCampus(string $campus): self
    {
        $this->campus = $campus;

        return $this;
    }

    public function getNivel(): ?string
    {
        return $this->nivel;
    }

    public function setNivel(string $nivel): self
    {
        $this->nivel = $nivel;

        return $this;
    }

    public function getRvoe(): ?string
    {
        return $this->rvoe;
    }

    public function setRvoe(string $rvoe): self
    {
        $this->rvoe = $rvoe;

        return $this;
    }

    public function getClavePrograma(): ?string
    {
        return $this->clavePrograma;
    }

    public function setClavePrograma(string $clavePrograma): self
    {
        $this->clavePrograma = $clavePrograma;

        return $this;
    }

    public function getTipoDocumento(): ?string
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(string $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    public function setFileType(string $fileType): self
    {
        $this->fileType = $fileType;

        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function setFileSize(int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    public function getFileData()
    {
        return $this->fileData;
    }

    public function setFileData($fileData): self
    {
        $this->fileData = $fileData;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->fechaRegistro;
    }

    public function setFechaRegistro(\DateTimeInterface $fechaRegistro): self
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    public function getUltimaActualizacion(): ?\DateTimeInterface
    {
        return $this->ultimaActualizacion;
    }

    public function setUltimaActualizacion(\DateTimeInterface $ultimaActualizacion): self
    {
        $this->ultimaActualizacion = $ultimaActualizacion;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
}
