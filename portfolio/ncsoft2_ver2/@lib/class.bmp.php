<?
/** 한글
* class jpg, gif, png =========> BMP
*
* { Description :- 
*	class that resize and convert jpg, gif or png to bmp
* }
* for more info contact with me (mahabub1212@yahoo.com)
* you can modify or use or redistribute this class.
*/
class ToBmp{
	
	// new image width
	var  $new_width;
	
	// new image height
	var $new_height;
	
	// image resources
	var $image_resource;
	
	function image_info($source_image){
		$img_info = getimagesize($source_image);
		
		switch ($img_info['mime']){
			case "image/jpeg": { $this->image_resource = imagecreatefromjpeg ($source_image);   break; }
			case "image/gif":  { $this->image_resource = imagecreatefromgif  ($source_image);   break; }
			case "image/png":  { $this->image_resource = imagecreatefrompng  ($source_image);   break; }
			default: {die("unsupported image time");}
		}
	}
	
	
	public function imagebmp($file_path = ''){
		
		if(!$this->image_resource) die("cant not convert. image resource is null");
		$picture_width  = imagesx($this->image_resource);
		$picture_height = imagesy($this->image_resource);
		
		
		if(!imageistruecolor($this->image_resource)){
			$tmp_img_reource = imagecreatetruecolor($picture_width,$picture_height);
			imagecopy($tmp_img_reource,$this->image_resource, 0, 0, 0, 0, $picture_width, $picture_height);
			imagedestroy($this->image_resource);
			$this->image_resource = $tmp_img_reource;
			
		}
		
		
		if((int) $this->new_width >0 && (int) $this->new_height > 0){
			
			$image_resized = imagecreatetruecolor($this->new_width, $this->new_height); 
			imagecopyresampled($image_resized,$this->image_resource,0,0,0,0,$this->new_width,$this->new_height,$picture_width,$picture_height);
			imagedestroy($this->image_resource);
			$this->image_resource =  $image_resized;
		
		}
		
		$result = '';
		
		
		
		$biBPLine =  ((int) $this->new_width >0 &&(int)$this->new_height > 0) ? $this->new_width * 3 : $picture_width * 3;
		$biStride = ($biBPLine + 3) & ~3;
		$biSizeImage =  ((int) $this->new_width >0 &&(int)$this->new_height > 0) ? $biStride * $this->new_height : $biStride * $picture_height;
		$bfOffBits = 54;
		$bfSize = $bfOffBits + $biSizeImage;
		
		$result .= substr('BM', 0, 2);
		$result .= pack ('VvvV', $bfSize, 0, 0, $bfOffBits);
		$result .= ((int) $this->new_width >0 &&(int)$this->new_height > 0) ? pack ('VVVvvVVVVVV', 40, $this->new_width, $this->new_height, 1, 24, 0, $biSizeImage, 0, 0, 0, 0) : pack ('VVVvvVVVVVV', 40, $picture_width, $picture_height, 1, 24, 0, $biSizeImage, 0, 0, 0, 0);
		
		$numpad = $biStride - $biBPLine;
		
		$h = ((int) $this->new_width >0 &&(int)$this->new_height > 0) ? $this->new_height : $picture_height;
		$w = ((int) $this->new_width >0 &&(int)$this->new_height > 0) ? $this->new_width  : $picture_width;
		

		for ($y = $h - 1; $y >= 0; --$y) {
			for ($x = 0; $x < $w; ++$x) {
				$col = imagecolorat ($this->image_resource, $x, $y);
				$result .= substr(pack ('V', $col), 0, 3);
			}
			for ($i = 0; $i < $numpad; ++$i) {
				$result .= pack ('C', 0);
			}
        }
		
		
      if($file_path == ''){
      	
      	header("Content-type: image/bmp");
      	echo $result;
      } else {
      	
      	$fp = fopen($file_path,"wb");
      	fwrite($fp,$result);
      	fclose($fp);
      	//=============
      }
    
      
      return ;  
	
		
	}
	
	
	
	
	
}
?>