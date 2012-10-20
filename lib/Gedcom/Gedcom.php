<?php
/**
 * php-gedcom
 *
 * php-gedcom is a library for parsing, manipulating, importing and exporting
 * GEDCOM 5.5 files in PHP 5.3+.
 *
 * @author          Kristopher Wilson <kristopherwilson@gmail.com>
 * @copyright       Copyright (c) 2010-2011, Kristopher Wilson
 * @package         php-gedcom 
 * @license         http://php-gedcom.kristopherwilson.com/license
 * @link            http://php-gedcom.kristopherwilson.com
 * @version         SVN: $Id$
 */

namespace Gedcom;

/**
 *
 *
 */
class Gedcom
{
    protected $_head = null;
    protected $_subn = null;
    
    protected $_sour = array();
    protected $_indi = array();
    protected $_fam  = array();
    protected $_note = array();
    protected $_repo = array();
    protected $_obje = array();
    protected $_subm = array();
    
    /**
     *
     */
    public function setHead(\Gedcom\Record\Head $head)
    {
        $this->_head = $head;
    }
    
    /**
     *
     */
    public function setSubn(\Gedcom\Record\Subn $subn)
    {
        $this->_subn = $subn;
    }
    
    /**
     *
     */
    public function addSour(\Gedcom\Record\Sour $sour)
    {
        $this->_sour[$sour->getId()] = $sour;
    }
    
    /**
     *
     */
    public function addIndi(\Gedcom\Record\Indi $indi)
    {
        $this->_indi[$indi->getId()] = $indi;
    }
    
    /**
     *
     */
    public function addFam(\Gedcom\Record\Fam $fam)
    {
        $this->_fam[$fam->getId()] = $fam;
    }
    
    /**
     *
     */
    public function addNote(\Gedcom\Record\Note $note)
    {
        $this->_note[$note->getId()] = $note;
    }
    
    /**
     *
     */
    public function addRepo(\Gedcom\Record\Repo $repo)
    {
        $this->_repo[$repo->getId()] = $repo;
    }
    
    /**
     *
     */
    public function addObje(\Gedcom\Record\Obje $obje)
    {
        $this->_obje[$obje->getId()] = $obje;
    }
    
    /**
     *
     */
    public function addSubm(\Gedcom\Record\Subm $subm)
    {
        $this->_subm[$subm->getId()] = $subm;
    }
    
    /**
     *
     */
    public function getHead()
    {
        return $this->_head;
    }
    
    /**
     *
     */
    public function getSubn()
    {
        return $this->_subn;
    }
    
    /**
     *
     */
    public function getSubm()
    {
        return $this->_subm;
    }
    
    /**
     * @brief Fetch a specific individual or all individuals
     *
     * @param $indiId (optional) An individual Id
     *
     * @throw Throws an exception if the requested individual is not found
     *
     * @note If an array is returned, the array keys are individual Ids
     *
     * @return A single individual, if an ID is given as an argument. An associative array of individuals if no ID is given.
     */
    public function getIndi($indiId = NULL)
    {
	if(!is_null($indiId)){
	   if(array_key_exists($indiId,$this->_indi)){
	       return $this->_indi[$indiId];
	   }else{
	       throw new \Exception('Requested individual not found');
	   }
	}
        return $this->_indi;
    }
    
    /**
     * @brief Fetch a specific family or all families 
     *
     * @param $famId (optional) A family Id
     *
     * @throw Throws an exception if the requested family is not found
     *
     * @note If an array is returned, the array keys are family Ids
     *
     * @return A single family, if an ID is given as an argument. An associative array of families if no ID is given.
     */
    public function getFam($famId = NULL)
    {
	if(!is_null($famId)){
	   if(array_key_exists($famId,$this->_fam)){
	       return $this->_fam[$famId];
	   }else{
	       throw new \Exception('Requested family not found');
	   }
	}
        return $this->_fam;
    }
    
    /**
     *
     */
    public function getRepo()
    {
        return $this->_repo;
    }
    
    /**
     *
     */
    public function getSour()
    {
        return $this->_sour;
    }
    
    /**
     *
     */
    public function getNote()
    {
        return $this->_note;
    }
    
    /**
     *
     */
    public function getObje()
    {
        return $this->_obje;
    }
    
    /**
     *
     * @throws Exception Whenever called
     * @param string $name Ignored
     * @param string $value Ignored
     */
    public function __set($name, $value)
    {
        // prevent setting undefined attributes and not reporting the error
        throw new \Exception('Undefined property ' . $name . ' in __set');
    }
    
    /**
     * 
     * @throws Exception Whenever called
     * @param string $name Ignored
     */
    public function __get($name)
    {
        // prevent getting undefined attributes and not reporting the error
        throw new \Exception('Undefined property ' . $name . ' in __get');
    }
}
