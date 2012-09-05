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

namespace Gedcom\Writer\Head;

/**
 *
 */
class Sour
{   
    /**
     *
     * @param \Gedcom\Gedcom $gedcom The GEDCOM object
     * @param string $format The format to convert the GEDCOM object to
     * @return string The contents of the document in the converted format
     */
    public static function convert(\Gedcom\Record\Head\Sour &$sour, $format = self::GEDCOM55, $level = 0)
    {
        $output = "1 SOUR " . $sour->sour . "\n" .
            "2 VERS " . $sour->vers . "\n" .
            \Gedcom\Writer\Head\Sour\Corp::convert($sour->corp, $format, 2) . 
            // TODO DATA;
            "";

/*        
      +2 DATA <NAME_OF_SOURCE_DATA>  {0:1}
        +3 DATE <PUBLICATION_DATE>  {0:1}
        +3 COPR <COPYRIGHT_SOURCE_DATA>  {0:1}
*/
        
        return $output;
    }
}

