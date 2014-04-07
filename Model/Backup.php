<?php

namespace Xedinaska\BackupsManagerBundle\Model;

/**
 * Class Backup
 * Contains backups info
 *
 * @package Xedinaska\BackupsManagerBundle\Model
 */
abstract class Backup implements BackupInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var \DateTime
     */
    protected $created;

    /**
     * @access public
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @access public
     * @param mixed $path
     * @return void
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @access public
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @access public
     * @param mixed $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @access public
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @access public
     * @param mixed $created
     * @return void
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @access public
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @access public
     * @param mixed $size
     * @return void
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @access public
     * @return mixed
     * @return void
     */
    public function getSize()
    {
        return $this->size;
    }
}