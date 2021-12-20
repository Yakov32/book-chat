<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoryRepository;


/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */

class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     */
    private string $id;

    /**
     * @ORM\Column (type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Category $parent)
    {
        $this->parent = $parent;

        return $this;
    }
}