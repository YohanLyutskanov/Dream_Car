<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * Importer
 *
 * @ORM\Table(name="importers")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImporterRepository")
 */
class Importer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="importer", type="string", length=255, unique=true)
     */
    private $importer;

    /**
     *
     * @OneToMany(targetEntity="AppBundle\Entity\Car", mappedBy="importer")
     */
    private $cars;


    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->importer;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set importer
     *
     * @param string $importer
     *
     * @return Importer
     */
    public function setImporter($importer)
    {
        $this->importer = $importer;

        return $this;
    }

    /**
     * Get importer
     *
     * @return string
     */
    public function getImporter()
    {
        return $this->importer;
    }

    /**
     * @return mixed
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $cars
     */
    public function setCars($cars)
    {
        $this->cars = $cars;
    }
}

