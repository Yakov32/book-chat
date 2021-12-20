<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;


/**
 * @ORM\Entity (repositoryClass=PostRepository::class)
 */
class Post
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     */
    private $id;


    /**
     * @ORM\Column (type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column (type="text")
     */
    private $text;

    /**
     * @ORM\Column (type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\Column (type="datetime")
     */
    private $updatedAt;

    /**
     * @return mixed
     */
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }
}