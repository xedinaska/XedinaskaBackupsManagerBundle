<?php

namespace Xedinaska\BackupsManagerBundle\Model;

/**
 * Interface BackupInterface
 * @package Xedinaska\BackupsManagerBundle\Model
 */
interface BackupInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @access public
     * @param $path
     * @return mixed
     */
    public function setPath($path);

    /**
     * @access public
     * @return mixed
     */
    public function getPath();

    /**
     * @access public
     * @param $type
     * @return mixed
     */
    public function setType($type);

    /**
     * @access public
     * @return mixed
     */
    public function getType();

    /**
     * @access public
     * @param $created
     * @return mixed
     */
    public function setCreated($created);

    /**
     * @access public
     * @return mixed
     */
    public function getCreated();

    /**
     * @access public
     * @param $size
     * @return mixed
     */
    public function setSize($size);

    /**
     * @access public
     * @return mixed
     */
    public function getSize();
}