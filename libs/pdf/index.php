<?php
	include('./barcode/php-barcode.php');
	$fontdir = "./fonts";
	$font     = "$fontdir/Lato-Black.ttf";

	$fontSize = 10;   // GD1 in px ; GD2 in point
	$marge    = 10;   // between barcode and hri in pixel
	$x        = 100;  // barcode center
	$y        = 50;  // barcode center
	$height   = 50;   // barcode height in 1D ; module size in 2D
	$width    = 2;    // barcode height in 1D ; not use in 2D
	$angle    = 0;   // rotation in degrees : nb : non horizontable barcode might not be usable because of pixelisation

	$code     = '123456789012'; // barcode, of course ;)
	$type     = 'ean13'; 

	$im     = imagecreatetruecolor(200, 100);
	$black  = ImageColorAllocate($im,0x00,0x00,0x00);
	$white  = ImageColorAllocate($im,0xff,0xff,0xff);
	$red    = ImageColorAllocate($im,0xff,0x00,0x00);
	$blue   = ImageColorAllocate($im,0x00,0x00,0xff);
	imagefilledrectangle($im, 0, 0, 300, 300, $white);

	// -------------------------------------------------- //
	//                      BARCODE
	// -------------------------------------------------- //
	$data = Barcode::gd($im, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);

	// -------------------------------------------------- //
	//                        HRI
	// -------------------------------------------------- //
	if ( isset($font) ){
	$box = imagettfbbox($fontSize, 0, $font, $data['hri']);
	$len = $box[2] - $box[0];
	Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
	imagettftext($im, $fontSize, $angle, $x + $xt, $y + $yt, $black, $font, $data['hri']);
	}

	imagegif($im, "./tmp/tmp.gif");
	//

	$pdf = PDF_new();
	pdf_open_file($pdf, "./tmp/card.pdf");
	pdf_begin_page($pdf, 595, 842);
	
	pdf_set_parameter($pdf, "FontOutline", "lato=$fontdir/Lato-Black.ttf");
	$lato = PDF_findfont($pdf,"lato","host",0 );
	pdf_setfont($pdf, $lato, 10);
	pdf_show_xy($pdf, "Hellow World? ",50, 750);
	pdf_show_xy($pdf, "Test 1, 2, 3, 4 working. ", 50,730);
	$image = PDF_load_image($pdf,"gif","./tmp/tmp.gif","");
	PDF_place_image($pdf,$image,200,600,.50);
	pdf_end_page($pdf);
	
	pdf_close($pdf);

	header('Content-Type: application/pdf');
 	header("Content-Disposition:attachment;filename=card.pdf");
 	readfile("./tmp/card.pdf");

 	unlink("./tmp/card.pdf");
 	unlink("./tmp/tmp.gif");
 	imagedestroy($im);
?>