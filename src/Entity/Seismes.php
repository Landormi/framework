<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

/**
 * Seismes
 *
 * @ORM\Table(name="seismes")
 * @ORM\Entity
 */


 
class Seismes implements JsonSerializable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="instant", type="datetime", nullable=false)
     */
    private $instant;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lat", type="decimal", precision=8, scale=5, nullable=true)
     */
    private $lat;

    /**
     * @var string|null
     *
     * @ORM\Column(name="lon", type="decimal", precision=8, scale=5, nullable=true)
     */
    private $lon;

    /**
     * @var string|null
     *
     * @ORM\Column(name="pays", type="string", length=50, nullable=true)
     */
    private $pays;

    /**
     * @var float|null
     *
     * @ORM\Column(name="mag", type="float", precision=10, scale=0, nullable=true)
     */
    private $mag = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="profondeur", type="float", precision=10, scale=0, nullable=false)
     */
    private $profondeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInstant(): ?\DateTimeInterface
    {
        return $this->instant;
    }

    public function setInstant(\DateTimeInterface $instant): self
    {
        $this->instant = $instant;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(?string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(?string $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getMag(): ?float
    {
        return $this->mag;
    }

    public function setMag(?float $mag): self
    {
        $this->mag = $mag;

        return $this;
    }

    public function getProfondeur(): ?float
    {
        return $this->profondeur;
    }

    public function setProfondeur(float $profondeur): self
    {
        $this->profondeur = $profondeur;

        return $this;
    }



    
    public function jsonSerialize()
    {
        // Retournez les données de votre objet sous forme de tableau associatif
         
        return [
            'id' => $this->id,
            'instant' => $this->instant,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'pays' => $this->pays,
            'mag' => $this->mag,
            'profondeur' => $this->profondeur
        ];
    }

}
