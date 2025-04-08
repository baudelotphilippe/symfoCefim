<?php

namespace App\Entity;

use App\Repository\ArtisteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtisteRepository::class)]
class Artiste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, Soiree>
     */
    #[ORM\ManyToMany(targetEntity: Soiree::class, inversedBy: 'artistes')]
    private Collection $soiree;

    public function __construct()
    {
        $this->soiree = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Soiree>
     */
    public function getSoiree(): Collection
    {
        return $this->soiree;
    }

    public function addSoiree(Soiree $soiree): static
    {
        if (!$this->soiree->contains($soiree)) {
            $this->soiree->add($soiree);
        }

        return $this;
    }

    public function removeSoiree(Soiree $soiree): static
    {
        $this->soiree->removeElement($soiree);

        return $this;
    }
}
