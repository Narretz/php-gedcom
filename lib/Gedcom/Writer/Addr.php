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

namespace Gedcom\Writer;

/**
 *
 */
class Addr
{   
    /**
     *
     * @param \Gedcom\Gedcom $gedcom The GEDCOM object
     * @param string $format The format to convert the GEDCOM object to
     * @return string The contents of the document in the converted format
     */
    public static function convert(\Gedcom\Record\Addr &$addr, $format = self::GEDCOM55, $level = 1)
    {
        $addrs = explode("\n", $addr->addr);
        
        $output = "{$level} ADDR " . $addrs[0] . "\n";
        
        array_shift($addrs);
        
        foreach($addrs as $cont)
            $output .= ($level+1) . " CONT " . $cont . "\n";
        
        $output .= ($level+1) . " ADR1 " . $addr->adr1 . "\n" . 
            ($level+1) . " ADR2 " . $addr->adr2 . "\n" .    
            ($level+1) . " CITY " . $addr->city . "\n" . 
            ($level+1) . " STAE " . $addr->stae . "\n" . 
            ($level+1) . " POST " . $addr->post . "\n" . 
            ($level+1) . " CTRY " . $addr->ctry . "\n";
        
        return $output;
    }
}
