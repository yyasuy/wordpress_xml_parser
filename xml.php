<?php
$contents = file_get_contents( 'iamwhatieat.wordpress.2014.xml' );
$contents = mb_convert_encoding($contents, "UTF-8", "auto");
$xml = simplexml_load_string( $contents, 'SimpleXMLElement', LIBXML_NOCDATA );

print( "<html>\n" );
print( "<body>\n" );
$num_items = count( $xml->channel->item );
for( $i = $num_items - 1; $i >=0 ; $i-- ){
	$published = $xml->channel->item[ $i ]->pubDate;
	$date_time = new DateTime( $published );
	$date_str = $date_time->setTimeZone(new DateTimeZone('Asia/Tokyo'))->format( 'Y/m/d' );
	print( "$date_str<br>" );
	$text = $xml->channel->item[ $i ]->children( 'content', true )->encoded;
	$text = trim( $text );
	$lines = explode( "\n", $text );
	foreach( $lines as $line ){
		$line = trim( $line );
		if( preg_match( '|KGVID|', $line, $matches ) == 1 ){
			continue;
		}else if( preg_match( '|<img.+?>|', $line, $matches ) == 1 ){
			continue;
		}else if( preg_match( '|<.+?>|', $line, $matches ) == 1 ){
			print( "$line" );
		}else{
			print( "$line<br>" );
		}
	}
	print( "<br>" );
}
print( "</html>\n" );
print( "</body>\n" );
?>

