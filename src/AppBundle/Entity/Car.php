<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Car
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 */
class Car
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
     * @Assert\NotBlank()
     * @ORM\Column(name="brand", type="string", length=255)
     */
    private $brand;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min =1900,
     *      max=2100,
     *      minMessage = "The year must be after {{ limit }}",
     *      maxMessage = "The year must be before {{ limit }}")
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

    /**
     * @var int
     * @Assert\NotBlank()
     * @Assert\Range(
     *      min =10,
     *      max=2000,
     *      minMessage = "The power must be more than {{ limit }}",
     *      maxMessage = "The power must be less than {{ limit }}")
     *
     * @ORM\Column(name="power", type="integer")
     */
    private $power;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ManyToOne(targetEntity="AppBundle\Entity\Importer")
     * @JoinColumn(name="importer_id", referencedColumnName="id")
     */
    private $importer;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *      min = 3,
     *      minMessage = "The description must be at least {{ limit }} characters long")
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set brand
     *
     * @param string $brand
     *
     * @return Car
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set power
     *
     * @param integer $power
     *
     * @return Car
     */
    public function setPower($power)
    {
        $this->power = $power;

        return $this;
    }

    /**
     * Get power
     *
     * @return int
     */
    public function getPower()
    {
        return $this->power;
    }

    /**
     * Set importer
     *
     * @param string $importer
     *
     * @return Car
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
     * Set description
     *
     * @param string $description
     *
     * @return Car
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

