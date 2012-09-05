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
class Subn extends \Gedcom\Parser\Component
{

    /**
     *
     *
     */
    public static function parse(\Gedcom\Parser $parser)
    {
        $record = $parser->getCurrentLineRecord();
        $identifier = $parser->normalizeIdentifier($record[1]);
        $depth = (int)$record[0];
        
        $subn = new \Gedcom\Record\Subn();
        $subn->setId($identifier);
        
        $parser->getGedcom()->setSubn($subn);
        
        $parser->forward();
        
        while(!$parser->eof())
        {
            $record = $parser->getCurrentLineRecord();
            $currentDepth = (int)$record[0];
            $recordType = strtoupper(trim($record[1]));
            
            if($currentDepth <= $depth)
            {
                $parser->back();
                break;
            }
            
            switch($recordType)
            {
                case 'SUBM':
                    $subn->setSubm($parser->normalizeIdentifier($record[2]));
                break;
                
                case 'FAMF':
                    $subn->setFamf(trim($record[2]));
                break;
                
                case 'TEMP':
                    $subn->setTemp(trim($record[2]));
                break;
                
                case 'ANCE':
                    $subn->setAnce(trim($record[2]));
                break;
                
                case 'DESC':
                    $subn->setDesc(trim($record[2]));
                break;
                
                case 'ORDI':
                    $subn->setOrdi(trim($record[2]));
                break;
                
                case 'RIN':
                    $subn->setRin(trim($record[2]));
                break;
                
                default:
                    $parser->logUnhandledRecord(get_class() . ' @ ' . __LINE__);
            }
            
            $parser->forward();
        }
        
        return $subn;
    }
}
