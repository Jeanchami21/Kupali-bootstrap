<?php

namespace App\Entity;

use App\Repository\SpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpeciesRepository::class)
 */
class Species
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
    private $commonName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $binomialName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kind;

    /**
     * @ORM\OneToMany(targetEntity=Variety::class, mappedBy="species")
     */
    private $varieties;

    /**
     * @ORM\ManyToOne(targetEntity=Family::class, inversedBy="species")
     */
    private $family;

    public function __construct()
    {
        $this->varieties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommonName(): ?string
    {
        return $this->commonName;
    }

    public function setCommonName(string $commonName): self
    {
        $this->commonName = $commonName;

        return $this;
    }

    public function getBinomialName(): ?string
    {
        return $this->binomialName;
    }

    public function setBinomialName(?string $binomialName): self
    {
        $this->binomialName = $binomialName;

        return $this;
    }

    public function getKind(): ?string
    {
        return $this->kind;
    }

    public function setKind(?string $kind): self
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * @return Collection|Variety[]
     */
    public function getVarieties(): Collection
    {
        return $this->varieties;
    }

    public function addVariety(Variety $variety): self
    {
        if (!$this->varieties->contains($variety)) {
            $this->varieties[] = $variety;
            $variety->setSpecies($this);
        }

        return $this;
    }

    public function removeVariety(Variety $variety): self
    {
        if ($this->varieties->contains($variety)) {
            $this->varieties->removeElement($variety);
            // set the owning side to null (unless already changed)
            if ($variety->getSpecies() === $this) {
                $variety->setSpecies(null);
            }
        }

        return $this;
    }

    public function getFamily(): ?Family
    {
        return $this->family;
    }

    public function setFamily(?Family $family): self
    {
        $this->family = $family;

        return $this;
    }
}
