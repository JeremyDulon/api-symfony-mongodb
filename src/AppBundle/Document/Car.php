<?php
// src/AppBundle/Document/Car.php

namespace AppBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(
 *     db="machinelearning",
 *     collection="car"
 * )
 */
class Car
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $brand;

    /**
     * @MongoDB\Field(type="string")
     */
    protected $model;


    /**
     * @MongoDB\Field(type="integer")
     */
    protected $year;

    /**
     * @MongoDB\Field(type="integer")
     */
    protected $horsePower;

    /**
     * @MongoDB\Field(type="float")
     */
    protected $price;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $color;

    /**
     * @MongoDB\Field(type="integer")
     */
    protected $nbDoors;

    /**
     * @MongoDB\Field(type="integer")
     */
    protected $km;


    /**
     * @MongoDB\Field(type="string")
     */
    protected $option;
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set brand
     *
     * @param string $brand
     * @return self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * Get brand
     *
     * @return string $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set model
     *
     * @param string $model
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Get model
     *
     * @return string $model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return self
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Get year
     *
     * @return integer $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set horsePower
     *
     * @param integer $horsePower
     * @return self
     */
    public function setHorsePower($horsePower)
    {
        $this->horsePower = $horsePower;
        return $this;
    }

    /**
     * Get horsePower
     *
     * @return integer $horsePower
     */
    public function getHorsePower()
    {
        return $this->horsePower;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return float $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Get color
     *
     * @return string $color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set nbDoors
     *
     * @param integer $nbDoors
     * @return self
     */
    public function setNbDoors($nbDoors)
    {
        $this->nbDoors = $nbDoors;
        return $this;
    }

    /**
     * Get nbDoors
     *
     * @return integer $nbDoors
     */
    public function getNbDoors()
    {
        return $this->nbDoors;
    }

    /**
     * Set km
     *
     * @param integer $km
     * @return self
     */
    public function setKm($km)
    {
        $this->km = $km;
        return $this;
    }

    /**
     * Get km
     *
     * @return integer $km
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set option
     *
     * @param string $option
     * @return self
     */
    public function setOption($option)
    {
        $this->option = $option;
        return $this;
    }

    /**
     * Get option
     *
     * @return string $option
     */
    public function getOption()
    {
        return $this->option;
    }
}
