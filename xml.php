<?php
#https://blog.mach3.jp/2010/12/14/various-xml-on-php.html
$contents = file_get_contents( 'iamwhatieat.wordpress.2021.xml' );
$contents = mb_convert_encoding($contents, "UTF-8", "auto");
$xml = simplexml_load_string( $contents, 'SimpleXMLElement', LIBXML_NOCDATA );
var_dump( $xml->channel->item[38]->pubDate );
$text = $xml->channel->item[ 38 ]->children( 'content', true )->encoded;
var_dump( $text );

$date = $xml->channel->item[38]->pubDate;
$date = "Sat, 06 Feb 2021 23:07:40 +0000";
$time = strtotime( $date );
var_dump( $time );
var_dump( date( 'Y/m/d', $time ) );


$dt = new DateTime( $date );
var_dump( $dt->format( 'Y/m/d' ) );
var_dump( $dt->setTimeZone(new DateTimeZone('Asia/Tokyo'))->format( 'Y/m/d D' ) );
?>

