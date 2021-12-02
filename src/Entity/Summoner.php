<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SummonerRepository;

/**
 * @ORM\Entity(repositoryClass=SummonerRepository::class)
 */
class Summoner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", length=56)
     */
    private $accountId;

    /**
     * @ORM\Column(type="integer")
     */
    private $profileIconId;

    /**
     * @ORM\Column(type="datetime")
     */
    private $revisionDate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $summId;

    /**
     * @ORM\Column(type="string", length=78)
     */
    private $puuid;

    /**
     * @ORM\Column(type="integer")
     */
    private $summonerLevel;


    public function getAccountId(): ?string
    {
        return $this->accountId;
    }

    public function setAccountId(string $accountId): self
    {
        $this->accountId = $accountId;

        return $this;
    }

    public function getProfileIconId(): ?int
    {
        return $this->profileIconId;
    }

    public function setProfileIconId(int $profileIconId): self
    {
        $this->profileIconId = $profileIconId;

        return $this;
    }

    public function getRevisionDate(): ?\DateTimeInterface
    {
        return $this->revisionDate;
    }

    public function setRevisionDate(\DateTimeInterface $revisionDate): self
    {
        $this->revisionDate = $revisionDate;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSummId(): ?string
    {
        return $this->summId;
    }

    public function setSummId(string $summId): self
    {
        $this->summId = $summId;

        return $this;
    }

    public function getPuuid(): ?string
    {
        return $this->puuid;
    }

    public function setPuuid(string $puuid): self
    {
        $this->puuid = $puuid;

        return $this;
    }

    public function getSummonerLevel(): ?int
    {
        return $this->summonerLevel;
    }

    public function setSummonerLevel(int $summonerLevel): self
    {
        $this->summonerLevel = $summonerLevel;

        return $this;
    }
}
