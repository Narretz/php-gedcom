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

namespace Gedcom\Parser;

/**
 *
 *
 */
class Addr extends \Gedcom\Parser\Component
{
    
    /**
     *
     *
     */
    public static function parse(\Gedcom\Parser $parser)
    {
        $record = $parser->getCurrentLineRecord();
        $depth = (int)$record[0];
        $line = isset($record[2]) ? trim($record[2]) : '';
        
        $addr = new \Gedcom\Record\Addr();
        $addr->setAddr($line);
        $parser->forward();
        
        while(!$parser->eof())
        {
            $record = $parser->getCurrentLineRecord();
            $recordType = strtolower(trim($record[1]));
            $currentDepth = (int)$record[0];
            
            if ($currentDepth <= $depth)
            {
                $parser->back();
                break;
            }
            
            if ($addr->hasAttribute($recordType))
                $addr->{'set' . $recordType}(trim($record[2]));
            else if ($recordType == 'cont')
            {
                // FIXME: Can have CONT on multiple attributes
                $addr->setAddr($addr->getAddr() . "\n");
                if(isset($record[2]))
                    $addr->setAddr($addr->getAddr() . trim($record[2]));
            }
            else
                $parser->logUnhandledRecord(get_class() . ' @ ' . __LINE__);
            
            $parser->forward();
        }
        
        return $addr;
    }
}
