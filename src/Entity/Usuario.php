<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $apellidopaterno;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $apellidomaterno;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $correo;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $rol;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="usuario_registro")
     */
    private $documentos;

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidoPaterno(): ?string
    {
        return $this->apellidopaterno;
    }

    public function setApellidoPaterno(string $apellidopaterno): self
    {
        $this->apellidopaterno = $apellidopaterno;

        return $this;
    }

    public function getApellidoMaterno(): ?string
    {
        return $this->apellidomaterno;
    }

    public function setApellidoMaterno(string $apellidomaterno): self
    {
        $this->apellidomaterno = $apellidomaterno;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|Documento[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Documento $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setUsuarioRegistro($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getUsuarioRegistro() === $this) {
                $documento->setUsuarioRegistro(null);
            }
        }

        return $this;
    }
}
