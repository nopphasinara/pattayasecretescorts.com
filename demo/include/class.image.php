<?php
	class Image extends Milkyway {
		function makedir($dirname, $mode, $ness = true) {
			if(empty($dirname) || empty($mode) || empty($ness)) {
				die('Error: function makedir interrupted');
			}
			
			if(!is_dir($dirname)) {
				if(!mkdir($dirname, $mode, $ness)) {
					return false;
				} else {
					return true;
				}
			}
		}
		
		#######################################
		
		function imageInfo($image_file = '', $return = '') {
			if(empty($image_file)) {
				die(__FUNCTION__.' error code {config} in '.__FUNCTION__);
			}
			
			$image_info = getimagesize($image_file);
			
			$ext = image_type_to_mime_type($image_info['2']);
			$ext = str_replace('image/', '', $ext);
			$ext = ($ext == 'jpeg') ? 'jpg' : $ext;
			
			$image_size = filesize($image_file);
			
			$data['width'] = $image_info['0'];
			$data['height'] = $image_info['1'];
			$data['size'] = $image_size;
			$data['ext'] = $ext;
			
			if($return == '') {
				return $data;
			} else {
				return $data[''.$return.''];
			}
		}
		
		#######################################
		
		function upload($imagefile, $output, $limit) {
			global $text;
			
			if(empty($imagefile) || empty($output) || empty($limit)) {
				die('Error: function upload interrupted');
			}
			
			$imageinfo = self::imageinfo($imagefile, '');
			
			$moved = false;
			
			if($imageinfo['ext'] != '.jpg' && $imageinfo['ext'] != '.png' && $imageinfo['ext'] != '.gif') {
				$moved = $text['invalidFile'];
			} else {
				if($imageinfo['width'] <= 0 || $imageinfo['height'] <= 0) {
					$moved = $text['invalidFile'];
				} else {
					if($imageinfo['size'] >= $limit) {
						$moved = $text['maxSize'].' '.$limit;
					} else {
						if(file_exists($output)) {
							$moved = $text['duplicateFile'];
						} else {
							$upload = move_uploaded_file($imagefile, $output);
							if(!$upload) {
								$moved = $text['cannotUpload'];
							} else {
								$moved = true;
							}
						}
					}
				}
			}
			
			if($moved === true) {
				return true;
			} else {
				return $moved;
			}
		}
		
		#######################################
		
		function resize($imagefile, $width = 0, $height = 0, $proportional = false, $output = 'imagefile', $delete = false, $command = false) {
			if($height <= 0 && $width <= 0) {
				return false;
			}
			
			$imageinfo = getimagesize($imagefile);
			$image = '';
			
			$finalwidth = 0;
			$finalheight = 0;
			list($oldwidth, $oldheight) = $imageinfo;
			
			if($proportional) {
				if($width == 0) {
					$factor = $height / $oldheight;
				} else if($height == 0) {
					$factor = $width / $oldwidth;
				} else {
					$factor = min($width / $oldwidth, $height, $oldheight);
				}
				
				$finalwidth = round($oldwidth * $factor);
				$finalheight = round($oldheight * $factor);
			} else {
				$finalwidth = ($width <= 0) ? $oldwidth : $width;
				$finalheight = ($height <= 0) ? $oldheight : $height;
			}
			
			switch ($imageinfo['2']) {
				case IMAGETYPE_GIF:
				$image = imagecreatefromgif($imagefile);
				break;
				
				case IMAGETYPE_JPEG:
				$image = imagecreatefromjpeg($imagefile);
				break;
				
				case IMAGETYPE_PNG:
				$image = imagecreatefrompng($imagefile);
				break;
				
				default:
				return false;
			}
			
			$imageresize = imagecreatetruecolor($finalwidth, $finalheight);
			
			if(($imageibfo['2'] == IMAGETYPE_GIF) || ($imageinfo['2'] == IMAGETYPE_PNG)) {
				$index = imagecolortransparent($image);
				
				if($index >= 0) {
					$color = imagecolorsforindex($image, $index);
					$index = imagecolorallocate($imageresized, $color['red'], $color['green'], $color['blue']);
					imagefill($imageresize, 0, 0, $index);
					imagecolortransparent($imageresize, $index);
				} else if($imageinfo['2'] == IMAGETYPE_PNG) {
					imagealphablending($imageresize, false);
					$color = imagecolorallocatealpha($imageresize, 0, 0, 0, 127);
					imagefill($imageresize, 0, 0, $color);
					imagesavealpha($imageresize, true);
				}
			}
			
			imagecopyresampled($imageresize, $image, 0, 0, 0, 0, $finalwidth, $finalheight, $oldwidth, $oldheight);
			
			if($delete) {
				if($command) {
					exec('rm'.$imagefile);
				} else {
					@unlink($imagefile);
				}
			}
			
			switch (strtolower($output)) {
				case 'browser':
				$mime = image_type_to_mime_type($imageinfo['2']);
				header("Content-type: $mime");
				$output = NULL;
				break;
				
				case 'file':
				$output = $imagefile;
				break;
				
				case 'return':
				return $imageresize;
				break;
				
				default:
				break;
			}
			
			switch ($imageinfo['2']) {
				case IMAGETYPE_GIF:
				imagegif($imageresize, $output);
				break;
				
				case IMAGETYPE_JPEG:
				imagejpeg($imageresize, $output, 90);
				break;
				
				case IMAGETYPE_PNG:
				imagepng($imageresize, $output, 5);
				break;
				
				default:
				return false;
			}
			
			return true;
		}
		
		#######################################
	}
	
	$img = new Image();
	
	class CROP {
		protected $width;
		protected $height;
		protected $image;
		
		public function __construct($file = NULL) {
			if(NULL !== $file) {
				if(is_file($file)) {
					$this->setImageFile($file);
				} else {
					$this->setImageString($file);
				}
			}
		}
		
		public function setImageFile($file) {
			if(!(is_readable($file) && is_file($file))) {
				throw new InvalidArgumentException("Image file $file is not readable");
			}
			
			if(is_resource($this->image)) {
				imagedestroy($this->image);
			}
			
			list($this->width, $this->height, $type) = getimagesize($file);
			
			switch ($type) {
				case IMAGETYPE_GIF:
				$this->image = imagecreatefromgif($file);
				break;
				
				case IMAGETYPE_JPEG:
				$this->image = imagecreatefromjpeg($file);
				break;
				
				case IMAGETYPE_PNG:
				$this->image = imagecreatefrompng($file);
				break;
				
				default:
				throw new InvalidArgumentException("Image type $type not supported");
			}
			
			return $this;
		}
		
		public function setImageString($data){
			if(is_resource($this->image)) {
				imagedestroy($this->image);
			}
			
			if(!$this->image = imagecreatefromstring($data)) {
				throw new RuntimeException('Cannot create image from data string');
			}
			
			$this->width = imagesx($this->image);
			$this->height = imagesy($this->image);
			
			return $this;
	    }
	    
	    public function resample($width, $height, $constrainProportions = true) {
	    	if(!is_resource($this->image)) {
	    		throw new RuntimeException('No image set');
	    	}
	    	
	    	if($constrainProportions) {
	    		if ($this->height >= $this->width) {
	    			$width  = round($height / $this->height * $this->width);
    			} else {
    				$height = round($width / $this->width * $this->height);
    			}
    		}
    		
    		$temp = imagecreatetruecolor($width, $height);
    		imagecopyresampled($temp, $this->image, 0, 0, 0, 0, $width, $height, $this->width, $this->height);
    		return $this->_replace($temp);
    	}
    	
    	public function enlargeCanvas($width, $height, array $rgb = array(), $xpos = null, $ypos = null) {
    		if(!is_resource($this->image)) {
    			throw new RuntimeException('No image set');
    		}
    		
    		$width = max($width, $this->width);
    		$height = max($height, $this->height);
    		
    		$temp = imagecreatetruecolor($width, $height);
    		if(count($rgb) == 3) {
    			$bg = imagecolorallocate($temp, $rgb[0], $rgb[1], $rgb[2]);
    			imagefill($temp, 0, 0, $bg);
    		}
    		
    		if(null === $xpos) {
    			$xpos = round(($width - $this->width) / 2);
    		}
    		
    		if(null === $ypos) {
    			$ypos = round(($height - $this->height) / 2);
    		}
    		
    		imagecopy($temp, $this->image, (int) $xpos, (int) $ypos, 0, 0, $this->width, $this->height);
    		return $this->_replace($temp);
    	}
    	
    	public function crop($x1, $y1 = 0, $x2 = 0, $y2 = 0) {
    		if(!is_resource($this->image)) {
    			throw new RuntimeException('No image set');
    		}
    		
    		if(is_array($x1) && 4 == count($x1)) {
    			list($x1, $y1, $x2, $y2) = $x1;
    		}
    		
    		$x1 = max($x1, 0);
    		$y1 = max($y1, 0);
    		
    		$x2 = min($x2, $this->width);
    		$y2 = min($y2, $this->height);
    		
    		$width = $x2 - $x1;
    		$height = $y2 - $y1;
    		
    		$temp = imagecreatetruecolor($width, $height);
    		imagecopy($temp, $this->image, 0, 0, $x1, $y1, $width, $height);
    		
    		return $this->_replace($temp);
    	}
    	
    	protected function _replace($res) {
    		if(!is_resource($res)) {
    			throw new UnexpectedValueException('Invalid resource');
    		}
    		
    		if(is_resource($this->image)) {
    			imagedestroy($this->image);
    		}
    		
    		$this->image = $res;
    		$this->width = imagesx($res);
    		$this->height = imagesy($res);
    		
    		return $this;
    	}
    	
    	public function save($fileName, $type = IMAGETYPE_JPEG) {
    		$dir = dirname($fileName);
    		
    		if(!is_dir($dir)) {
    			if(!mkdir($dir, 0755, true)) {
    				throw new RuntimeException('Error creating directory ' . $dir);
    			}
    		}
    		
    		try {
    			switch ($type) {
    				case IMAGETYPE_GIF:
    				if(!imagegif($this->image, $fileName)) {
    					throw new RuntimeException;
    				}
    				break;
    				
    				case IMAGETYPE_PNG:
    				if(!imagepng($this->image, $fileName)) {
    					throw new RuntimeException;
    				}
    				break;
    				
    				case IMAGETYPE_JPEG:
    				default:
    				if(!imagejpeg($this->image, $fileName, 95)) {
    					throw new RuntimeException;
    				}
    			}
    		} catch (Exception $ex) {
    			throw new RuntimeException('Error saving image file to ' . $fileName);
    		}
    	}
    	
    	public function getResource() {
    		return $this->image;
		}
		
		public function getWidth() {
			return $this->width;
		}
		
		public function getHeight() {
			return $this->height;
		}
	}

	/*how to use
	
	$CR = new CROP(ROOT.PATH.'image/test.jpg');
	$centreX = round($CR->getWidth() / 2);
	$centreY = round($CR->getHeight() / 2);
	
	$x1 = 0;
	$y1 = 0;
	
	$x2 = 100;
	$y2 = 200;
	
	$CR->crop($x1, $y1, $x2, $y2);
	$CR->save(ROOT.PATH.'image/crop.jpg');
	
	*/	
	$crop = new CROP();
?>