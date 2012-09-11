<?php
require 'path/to/php-gedcom/lib/Gedcom/bootstrap.php';

$file = 'path/to/gedcom/file.ged';

$parser = new \Gedcom\Parser();

try
{
    $gedcom = $parser->parse($file);
}
catch(Exception $e)
{
    echo $e->getMessage();
    exit;
}

$errors = $parser->getErrors();

if(!empty($errors))
    echo 'The following parser errors occurred: <pre>' . print_r($parser->getErrors(), true) . '</pre>';

foreach($gedcom->getIndi() as $indi)
{
   echo $indi->name[0]->name.'<br>';
}

?>