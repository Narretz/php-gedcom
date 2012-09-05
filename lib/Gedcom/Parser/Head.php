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
class Head extends \Gedcom\Parser\Component
{
    
    /**
     *
     * @param \Gedcom\Parser parser 
     */
    public static function parse(\Gedcom\Parser $parser)
    {
        $record = $parser->getCurrentLineRecord();
        $identifier = $parser->normalizeIdentifier($record[1]);
        $depth = (int)$record[0];
        
        $head = new \Gedcom\Record\Head();
        
        $parser->getGedcom()->setHead($head);
        
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
                case 'SOUR':
                    $sour = \Gedcom\Parser\Head\Sour::parse($parser);
                    $head->setSour($sour);
                break;
                
                case 'DEST':
                    $head->setDest(trim($record[2]));
                break;
                
                case 'SUBM':
                    $head->setSubm($parser->normalizeIdentifier($record[2]));
                break;
                
                case 'SUBN':
                    $head->setSubn($parser->normalizeIdentifier($record[2]));
                break;
                
                case 'DEST':
                    $head->setDest(trim($record[2]));
                break;
                
                case 'FILE':
                    $head->setFile(trim($record[2]));
                break;
                
                case 'COPR':
                    $head->setCopr(trim($record[2]));
                break;
                
                case 'LANG':
                    $head->setLang(trim($record[2]));
                break;
            
                case 'DATE':
                    $date = \Gedcom\Parser\Head\Date::parse($parser);
                    $head->setDate($date);
                break;
                
                case 'GEDC':
                    $gedc = \Gedcom\Parser\Head\Gedc::parse($parser);
                    $head->setGedc($gedc);
                break;
                
                case 'CHAR':
                    $char = \Gedcom\Parser\Head\Char::parse($parser);
                    $head->setChar($char);
                break;
                
                case 'PLAC':
                    $plac = \Gedcom\Parser\Head\Plac::parse($parser);
                    $head->setPlac($plac);
                break;
                
                case 'NOTE':
                    $head->setNote($parser->parseMultiLineRecord());
                break;
                
                default:
                    $parser->logUnhandledRecord(get_class() . ' @ ' . __LINE__);
            }
            
            $parser->forward();
        }
        
        return $head;
    }
}
