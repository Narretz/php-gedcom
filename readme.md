# php-gedcom

## PHP library for parsing gedcom genealogy files into objects

### Forked from http://code.google.com/p/php-gedcom/

### How to use

Include the bootstrap.php file in your script. Alternatively, you can also set up another autoloader, auch as the symfony2 component. Create a new Gedcom\Parser object, and use parse($file) to read a gedcom file into a new variable, resulting in a hierarchy of objects, which can be accesed via get calls, most importanly "getFam()" and "getIndi()". Parse errors are stored and can be retrieved with getErrors(). See also the included example file.

### Issues

Parsing the stresstestfiles currently fails, and this is expected to happen with other complex files.

Note that most gedcom files are encoded in ANSEL format, and need to be converted to Unicode first, e.g. with [Pål Gjerde Gammelsæter's ansel2unicode php class](http://www.gammelsaeter.com/programming/converting-ansel-character-set-to-unicode/).





 
