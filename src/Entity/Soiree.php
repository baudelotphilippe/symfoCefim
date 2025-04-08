<?php

namespace App\Entity;

use App\Repository\SoireeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoireeRepository::class)]
class Soiree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateSoiree = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, Artiste>
     */
    #[ORM\ManyToMany(targetEntity: Artiste::class, mappedBy: 'soiree')]
    private Collection $artistes;

    /**
     * @var Collection<int, MaterielSoiree>
     */
    #[ORM\OneToMany(targetEntity: MaterielSoiree::class, mappedBy: 'soiree')]
    private Collection $materielSoirees;

    public function __construct()
    {
        $this->artistes = new ArrayCollection();
        $this->materielSoirees = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDateSoiree(): ?\DateTimeInterface
    {
        return $this->dateSoiree;
    }

    public function setDateSoiree(\DateTimeInterface $dateSoiree): static
    {
        $this->dateSoiree = $dateSoiree;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, Artiste>
     */
    public function getArtistes(): Collection
    {
        return $this->artistes;
    }

    public function addArtiste(Artiste $artiste): static
    {
        if (!$this->artistes->contains($artiste)) {
            $this->artistes->add($artiste);
            $artiste->addSoiree($this);
        }

        return $this;
    }

    public function removeArtiste(Artiste $artiste): static
    {
        if ($this->artistes->removeElement($artiste)) {
            $artiste->removeSoiree($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, MaterielSoiree>
     */
    public function getMaterielSoirees(): Collection
    {
        return $this->materielSoirees;
    }

    public function addMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if (!$this->materielSoirees->contains($materielSoiree)) {
            $this->materielSoirees->add($materielSoiree);
            $materielSoiree->setSoiree($this);
        }

        return $this;
    }

    public function removeMaterielSoiree(MaterielSoiree $materielSoiree): static
    {
        if ($this->materielSoirees->removeElement($materielSoiree)) {
            // set the owning side to null (unless already changed)
            if ($materielSoiree->getSoiree() === $this) {
                $materielSoiree->setSoiree(null);
            }
        }

        return $this;
    }
}
