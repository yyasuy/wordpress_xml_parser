<?php
#https://blog.mach3.jp/2010/12/14/various-xml-on-php.html
$contents = file_get_contents( 'iamwhatieat.wordpress.2021.xml' );
$contents = mb_convert_encoding($contents, "UTF-8", "auto");
$xml = simplexml_load_string( $contents, 'SimpleXMLElement', LIBXML_NOCDATA );
$text = $xml->channel->item[ 38 ]->children( 'content', true )->encoded;
var_dump( $text );
?>

