<?php

class GDProc
{

	/**
	 * $image = imagecreatefromjpeg('example.jpg');
	 * 
	 * Image Convert from JPG to WEBP Online.
	 * ==========================================
	 * imagewebp($image, 'example.webp');
	 * 
	 * 
	 * Image Resize to New Width and Height.
	 * ==========================================
	 * imagescale ( $image , $new_width , $new_height = -1)
	 * 
	 * imagedestroy($image);
	 * 
	 */

	public $image;

	public function __construct()
	{
		$this->image = null;
	}

	private function _init_($filename)
	{
		log_message('', "GDProc Library Loaded!");
		$image = imagecreatefromjpeg($filename);
		return $image;
	}

	public function scale($source, $width): bool
	{
		$gi = $this->_init_($source);
		$sgi = imagescale($gi, $width);
		$ext = pathinfo($source, PATHINFO_EXTENSION);

		$bool = false;
		switch ($ext) {
			case 'jpeg':
			case 'jpg':
				$bool = imagejpeg($sgi, $source, 60);
				break;
			case 'webp':
				$bool = imagewebp($sgi, $source, 60);
				break;
		}
		return $bool;
	}

	public function convert($source, $width, $destination): bool
	{
		$bool = false;
		return $bool;
	}
}
