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
class Note extends \Gedcom\Record implements Sourceable
{
    protected $_id   = null;
    protected $_chan = null;
    
    protected $_note = null;
    protected $_even = null;
    protected $_refn = array();
    protected $_rin  = null;
    
    /**
     *
     */
    protected $_sour = array();
    
    /**
     *
     */
    public function addRefn(\Gedcom\Record\Refn $refn)
    {
        $this->_refn[] = $refn;
    }
    
    /**
     *
     */
    public function addSour(\Gedcom\Record\SourRef $sour)
    {
        $this->_sour[] = $sour;
    }
}
