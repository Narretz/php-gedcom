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
class SourRef extends \Gedcom\Parser\Component
{
    
    /**
     *
     *
     */
    public static function parse(\Gedcom\Parser $parser)
    {
        $record = $parser->getCurrentLineRecord();
        $depth = (int)$record[0];
        
        $sour = new \Gedcom\Record\SourRef();
        $sour->setSour($record[2]);
        
        $parser->forward();
        
        while(!$parser->eof())
        {
            $record = $parser->getCurrentLineRecord();
            $recordType = strtoupper(trim($record[1]));
            $currentDepth = (int)$record[0];
            
            if($currentDepth <= $depth)
            {
                $parser->back();
                break;
            }
            
            switch($recordType)
            {
                case 'CONT':
                    $sour->setSour($sour->getSour() . "\n");
                    
                    if(isset($record[2]))
                        $sour->setSour($sour->getSour() . $record[2]);
                break;
                
                case 'CONC':
                    if(isset($record[2]))
                        $sour->setSour($sour->getSour() . $record[2]);
                break;
            
                case 'TEXT':
                    $sour->setText($parser->parseMultiLineRecord());
                break;
                
                case 'NOTE':
                    $note = \Gedcom\Parser\NoteRef::parse($parser);
                    $sour->addNote($note);
                break;
                
                case 'DATA':
                    $sour->setData(\Gedcom\Parser\Sour\Data::parse($parser));
                break;
                
                case 'QUAY':
                    $sour->setQuay(trim($record[2]));
                break;
                
                case 'PAGE':
                    $sour->setPage(trim($record[2]));
                break;
                
                case 'EVEN':
                    $even = \Gedcom\Parser\SourRef\Even::parse($parser);
                    $sour->setEven($even);
                break;
                
                default:
                    $parser->logUnhandledRecord(get_class() . ' @ ' . __LINE__);
            }
            
            $parser->forward();
        }
        
        return $sour;
    }
}
