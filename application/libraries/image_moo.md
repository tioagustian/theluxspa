load($x) - Loads a base image as specified by $x - JPG, PNG, GIF supported. This is then used for all processing and is kept in memory till complete

load_temp() - Copies the temp image (e.g. cropped) and make it the new main image

save($x,$overwrite=FALSE) - Saved the manipulated image (if applicable) to file $x - JPG, PNG, GIF supported. If overwrite is not set file write may fail. The file saved will be dependant on processing done to the image, or a simple copy if nothing has been done.

get_data_stream($filename="") - Return raw data that can be encoded and displayed in an image tag, e.g. $x = $this->image_moo->load('x')->get_data_stream(); $y = base64_encode($x); print '<img src="data:image/jpg;base64,'.$y.'">';

save_dynamic($filename="") - Saves as a stream output, use filename to return png/jpg/gif etc., default is jpeg (This also sends relevant headers)

save_pa($prepend="", $append="", $overwrite=FALSE) - Saves the file using the original location and filename, however it adds $prepend to the start of the filename and adds $append to the end of the filename. e.g. if your original file was /this/that/file.jpg you can use save_pe("pre_", "_app", TRUE) to save it as /this/that/pre_file_app.jpg

resize($x,$y,$pad=FALSE) - Proportioanlly resize original image using the bounds $x and $y, if padding is set return image is as defined centralised using current background colour (set_background_colour)

resize_crop($x,$y) - Proportioanlly resize original image using the bounds $x and $y but cropped to fill dimensions

stretch($x,$y) - Take the original image and stretch it to fill new dimensions $x $y, unless you have done the calculations this will distort the image

crop($x1,$y1,$x2,$y2) - Crop the original image using Top left, $x1,$y1 to bottom right $x2,y2. New image size =$x2-x1 x $y2-y1

rotate($angle) - Rotates the work image by X degrees, normally 90,180,270 can be any angle.Excess filled with background colour

load_watermark($filename, $transparent_x=0, $transparent_y=0) - Loads the specified file as the watermark file, if using PNG32/24 use x,y to specify direct positions of colour to use as index

make_watermark_text($text, $fontfile, $size=16, $colour="#ffffff", $angle=0) - Creates a watermark image using your text and specified ttf font file. 

watermark($position, $offset=8, $abs=FALSE) - Use the loaded watermark, or created text to place a watermark. $position works like NUM PAD key layout, e.g. 7=Top left, 3=Bottom right $offset is the padding/indentation, if $abs is true then use $positiona and $offset as direct values to watermark placement 

shadow($size=4, $direction=3, $colour="#444") - Add a basic shadow to the image. Size in pixels, note that the image will increase by this size, so resize(400,400)->shadow(4) will give an image 404 pixels in size, Direction works on the keypad basis like the watermark, so 3 is bottom right, 7 top left, $color if the colour of the shadow.

border($width,$colour="#000") - Draw a border around the output image X pixels wide in colour specified. This can be used multiple times, e.g. $this->image_moo->border(6,"#fff")->border(1,"#000") creates a photo type of border

border_3d($width,$rot=0,$opacity=30) - Creates a 3d border (opaque) around the current image $width wise in 0-3 rot positions, $opacity allows you to change how much it effects the picture

filter($function, $arg1=NULL, $arg2=NULL, $arg3=NULL, $arg4=NULL) - Runs the standard imagefilter GD2 command, see http://www.php.net/manual/en/function.imagefilter.php for details

round($radius,$invert=FALSE,$corners(array[top left, top right, bottom right, bottom left of true or False)="") default is all on and normal rounding. This functions masks the corners to created a rounded edge effect.

Image helper functions

display_errors($open = '<p>', $close = '</p>') - Display errors as Ci standard style. Example if ($this->image_moo->error) print $this->image_moo->display_errors();

ignore_jpeg_warnings($onoff = TRUE) - relax the GD strictness for loading jpegs

allow_scale_up($onoff = FALSE) - Allow you to stretch images that are too small to match resize/crop request

real_filesize() - returns the size of the file in B,KB,MB.GB or T (as if!)
set_jpeg_quality($x) - quality to wrte jpeg files in for save, default 75 (1-100)

set_watermark_transparency($x) - the opacity of the watermark 1-100, 1-just about see, 100=solid

check_gd() - Run to see if you server can use this library

clear_temp() - Call to clear the temp changes using the master image again

clear() - Use to clear all loaded images form memory