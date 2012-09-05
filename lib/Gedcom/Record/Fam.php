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

namespace Gedcom\Record;

/**
 *
 *
 */
class Fam extends \Gedcom\Record implements Noteable, Sourceable, Objectable
{
    /**
     *
     */
    protected $_id   = null;
    
    /**
     *
     */
    protected $_chan = null;
    
    /**
     *
     */
    protected $_husb = null;
    
    /**
     *
     */
    protected $_wife = null;
    
    /**
     *
     */
    protected $_nchi = null;
    
    /**
     *
     */
    protected $_chil = array();
    
    /**
     *
     */
    protected $_even = array();
    
    /**
     *
     */
    protected $_slgs = array();
    
    /**
     *
     */
    protected $_subm = array();
    
    /**
     *
     */
    protected $_refn = array();
    
    /**
     *
     */
    protected $_rin  = null;
    
    /**
     *
     */
    protected $_note = array();
    
    /**
     *
     */
    protected $_sour = array();
    
    /**
     *
     */
    protected $_obje = array();
    
    /**
     *
     */
    public function addEven(\Gedcom\Record\Fam\Even $even)
    {
        $this->_even[] = $even;
    }
    
    /**
     *
     */
    public function addSlgs(\Gedcom\Record\Fam\Slgs $slgs)
    {
        $this->_slgs[] = $slgs;
    }
    
    /**
     *
     *
     */
    public function addRefn(\Gedcom\Record\Refn $refn)
    {
        $this->_refn[] = $refn;
    }
    
    /**
     *
     */
    public function addNote(\Gedcom\Record\NoteRef $note)
    {
        $this->_note[] = $note;
    }
    
    /**
     *
     */
    public function addSour(\Gedcom\Record\SourRef $sour)
    {
        $this->_sour[] = $sour;
    }
    
    /**
     *
     */
    public function addObje(\Gedcom\Record\ObjeRef $obje)
    {
        $this->_obje[] = $obje;
    }
}
