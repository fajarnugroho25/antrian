<?php
/**
* function format_date
* @author choirudin.emcha@gmail.com
* @param datetime, format type
* @return string
* @uses
*/

function format_date($date, $format='name')
{
	$ci=& get_instance();

	if($format=='long'):
		$unix_date = human_to_unix($date);
		return date('l, jS F, Y - H:i:s',$unix_date);
	elseif($format=='medium1'):
		$unix_date = human_to_unix($date);
		return date('jS M, Y - H:i',$unix_date);
	elseif($format=='medium2'):
		$unix_date = human_to_unix($date);
		return date('jS F, Y',$unix_date);
	elseif($format=='admin_date'):
		$unix_date = human_to_unix($date);
		return date('d-M-Y',$unix_date);
	elseif($format=='short1'):
		$unix_date = human_to_unix($date);
		return date('d M Y - H:i:s',$unix_date);
	elseif($format=='short2'):
		$unix_date = human_to_unix($date);
		return date('M Y',$unix_date);
	elseif($format=='short3'):
		$unix_date = human_to_unix($date);
		return date('D, H',$unix_date);
	elseif($format=='rssdate'):
		$unix_date = human_to_unix($date);
		return date('D, j M Y H:i:s +0700',$unix_date);
	elseif($format=='sitemap_date'):
		$unix_date = human_to_unix($date);
		return date('Y-m-d',$unix_date);
	elseif($format=='timespan'):
		$unix_date = human_to_unix($date);
		return timespan($unix_date,now());
	elseif($format=='ampm'):
		$unix_date = human_to_unix($date);
		return date('d M Y g:ia',$unix_date);
	elseif($format=='mdy'):
		$unix_date = human_to_unix($date);
		return date('m/d/Y',$unix_date);
	elseif($format=='timespan'):
		$unix_date = human_to_unix($date);
		return timespan($unix_date,now());
	endif;
	
	return false;
}

/**
* function upload
* @author choirudin.emcha@gmail.com
* @param file_name = input type name, current_file = "for edit", config = config
* @return string filename
* @uses
*/
function file_upload($file_name = '', $current_file = '', $config = '') {
	$ci =& get_instance();
	$ci->load->helper('file');
	$date = date("Y-m-d H:i:s");

	// inisialisasi library upload
	$ci->load->library('upload', $config);

	if (!$ci->upload->do_upload($file_name)){
		$ci->session->set_flashdata('message_type','error');
		$ci->session->set_flashdata('message', $ci->upload->display_errors());
		return $ci->upload->display_errors();
	} else {
		$thumbnail_size = $ci->config->item("thumbnail_size");
		$file_uploaded = array('upload_photo' => $ci->upload->data());
		$file_name = $file_uploaded['upload_photo']['file_name'];
		$file_ext = $file_uploaded['upload_photo']['file_ext'];
		$randName = 'p_'.mt_rand(100000,999999);
		$newName = $randName;
		$absolutePath = $_SERVER['DOCUMENT_ROOT'].$config['upload_path'];
		$absolutePath = str_replace('.', '', $absolutePath);
		$source_image = $file_uploaded['upload_photo']['file_path'];
		
		while(file_exists($config['upload_path'].$newName)){
			$randName = 'p_'.mt_rand(100000,999999);
			$newName = $randName;
		}
		
		$fileDate = date("YmdHis");
		$newFileName = $newName.'_'.$fileDate.$file_ext;
		
		if(!file_exists($config['upload_path'].$newFileName)){
			rename($config['upload_path'].$file_name, $config['upload_path'].$newFileName);
		}

		if (!empty($current_file)) {
			unlink($absolutePath.$current_file);

			$oldPhotoThumb = explode('.', $current_file)[0].'_'.$thumbnail_size.'x'.$thumbnail_size.'.'.explode('.', $current_file)[1];
			unlink($absolutePath.$oldPhotoThumb);
		}

		$source_image = $source_image.$newFileName;
		$resize = image_resize($source_image);

		$thumbnail = crop_image($source_image, $thumbnail_size, $newName.'_'.$fileDate, $file_ext, $file_uploaded['upload_photo']['file_path']);


		return $newFileName;
	}
}

/**
* function relative_time
* @author choirudin.emcha@gmail.com
* @param datetime
* @return string
* @uses
*/
function relative_time($datetime)
{
    $CI =& get_instance();
    $CI->lang->load('date');

    if(!is_numeric($datetime))
    {
        $val = explode(" ",$datetime);
       $date = explode("-",$val[0]);
       $time = explode(":",$val[1]);
       $datetime = mktime($time[0],$time[1],$time[2],$date[1],$date[2],$date[0]);
    }

    $difference = time() - $datetime;
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");

    if ($difference > 0) 
    { 
        $ending = $CI->lang->line('date_ago');
    } 
    else 
    { 
        $difference = -$difference;
        $ending = $CI->lang->line('date_to_go');
    }
    for($j = 0; $difference >= $lengths[$j]; $j++)
    {
        $difference /= $lengths[$j];
    } 
    $difference = round($difference);

    if($difference != 1) 
    { 
        $period = strtolower($CI->lang->line('date_'.$periods[$j].'s'));
    } else {
        $period = strtolower($CI->lang->line('date_'.$periods[$j]));
    }

    return "$difference $period $ending";
}

/**
* function send_email_without_mail_helper
* @author choirudin.emcha@gmail.com
* @param value
* @return string
* @uses
*/
function send_email_without_mail_helper($value = array()){
	// require(APPPATH."libraries/sendgrid-php/sendgrid-php.php");
	require(APPPATH."libraries/sendgrid-php/vendor/autoload.php");
	
	$request_body = json_decode('{
	  "personalizations": [
	    {
	      "to": [
	        {
	          "email": "'.$value["to"].'"
	        }
	      ],
	      "subject": "'.$value["subject"].'"
	    }
	  ],
	  "from": {
	    "email": "'.$value["from"].'"
	  },
	  "content": [
	    {
	      "type": "application/json",
	      "value": "'.$value["messages"].'"
	    }
	  ]
	}');

	// $apiKey = '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';
	$apiKey = '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';
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($request_body);
	return $response;
}

/**
* function send_email
* @author choirudin.emcha@gmail.com
* @param array(from, to, subject, messages)
* @return string
* @uses
*/
function send_email($value = array())
{
	// If you are not using Composer
	// require(APPPATH."libraries/sendgrid-php/sendgrid-php.php");
	require(APPPATH."libraries/sendgrid-php/vendor/autoload.php");

	$from = new SendGrid\Email(null, $value['from']);
	$subject = $value['subject'];
	$to = new SendGrid\Email(null, $value['to']);
	$content = new SendGrid\Content("text/html", $value['messages']);
	$mail = new SendGrid\Mail($from, $subject, $to, $content);

	$apiKey = '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';
	$sg = new \SendGrid($apiKey);

	$response = $sg->client->mail()->send()->post($mail);
	
	return $response;
}

/**
* function flash_message
* @author choirudin.emcha@gmail.com
* @param array(type, message)
* @return string
* @uses
*/
function flash_message($type)
{
	$ci=& get_instance();
	$message = $ci->session->flashdata('message');
	if (!empty($message) && isset($message)) :
		
		if ($type == 'error'):
			$output = '<div id="flash_message" class="error">'.$message.'</div>';
		elseif ($type == 'warning'):
			$output = '<div id="flash_message" class="warning">'.$message.'</div>';
		elseif ($type == 'success'):
			$output = '<div id="flash_message" class="success">'.$message.'</div>';
		endif;
	else:
		$output = FALSE;
	endif;
	return $output;
}

/**
* function crop_image
* @author choirudin.emcha@gmail.com
* @param image,size,filename,ext,filepath
* @return string
* @uses
*/
function crop_image($image, $size, $filename, $ext, $filepath)
{
	$ci =& get_instance();

	$image_size = getimagesize($image);
	$image_width = $image_size['0'];
	$image_height = $image_size['1'];

	$config['image_library'] = 'gd2';
	$config['source_image'] = $image;
	$config['new_image'] = $filename.'_'.$size.'x'.$size.$ext;
	$config['maintain_ratio'] = FALSE;

	if($image_width > $image_height):
		$config['height'] = $image_height;
		$config['width'] = $image_height;
	elseif($image_width < $image_height):
		$config['height'] = $image_width;
		$config['width'] = $image_width;
	else:
		$config['height'] = $image_width;
		$config['width'] = $image_width;
	endif;

	if($image_width > $image_height):
		$config['x_axis'] = (10/100)*$image_width;
		$config['y_axis'] = '0';
	elseif($image_width < $image_height):
		$config['x_axis'] = '0';
		$config['y_axis'] = (10/100)*$image_height;
	else:
		$config['x_axis'] = (10/100)*$image_width;
		$config['y_axis'] = '0';
	endif;

	$ci->image_lib->initialize($config);
	$ci->image_lib->crop();

	$ci->image_lib->clear();

	$config2['image_library'] = 'gd2';
	$config2['source_image'] = $filepath.$config['new_image'];
	$config2['maintain_ratio'] = TRUE;
	$config2['height'] = $size;
	$config2['width'] = $size;

	$ci->image_lib->initialize($config2);
	$ci->image_lib->resize();

	return $config['new_image'];
}

function image_resize($source_image) {
	$ci =& get_instance();
	$ci->load->library('image_lib');

	// config untuk resize
	$config['image_library'] = 'gd2';
	// $config['upload_path'] = $ci->config->item("upload_path_temp");
	// $config['media_path'] = $ci->config->item("upload_path_photo");
	$config['maintain_ratio'] = $ci->config->item("maintain_ratio");
	$config['max_width'] = $ci->config->item("max_width");
	$config['max_height'] = $ci->config->item("max_height");
	// $config['width'] = $ci->config->item("width");
	// $config['height'] = $ci->config->item("height");
	$config['source_image'] = $source_image;
	$config['create_thumb'] = FALSE;
	// $config['new_image'] = $config['upload_path'].'new_image.jpg';
	// $absolutePath = $this->config->item("absolutePath");

	// inisialisasi library resize image
	$ci->image_lib->initialize($config);
	
	// image resize
	if($ci->image_lib->resize()){
		return $ci->image_lib->clear();
	} else {
		// $ci->image_lib->display_errors();
		return $ci->image_lib->display_errors();
	}
}

function triponyu_category($category = '') {
	$ci =& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getCategory();


	$output = '<select class="form-control" name="trip_category">';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($category) == strtolower($value['category_name'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['category_name'].'" '.$selected.'>'.$value['category_name'].'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_city($city = '') {
	$ci =& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getCity();

	$output = '<select class="form-control" name="trip_city" id="trip_city">';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($city) == strtolower($value['city'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['city'].'"'.$selected.'>'.$value['city'].'</option>';
	}

	$output .= '<option value="other">Other</option>';

	$output .= '</select>';

	return $output;
}

function triponyu_province($province = '', $label = 'trip_province') {
	$ci =& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getProvince();

	$output = '<select class="form-control" name="'.$label.'" id="'.$label.'">';
	$output .= '<option value="#">Choose Province</option>';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($province) == strtolower($value['id'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['id'].'"'.$selected.'>'.$value['name'].'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_add_city() {
	$ci =& get_instance();
	
	$output = '<div id="triponyu-add-city">';
	$output .= '<input type="text" class="form-control" placeholder="City" name="triponyu_add_city_name" id="triponyu-add-city-name">';
	$output .= '<button class="btn btn-success" type="button" onclick="btn_trip_add_city()">Add</button>';
	$output .= '</div>';

	return $output;
}

function triponyu_get_rating($table, $field, $value) {
	$ci =& get_instance();

	//get data
	$ci->db->select('rating');
	$ci->db->where($field, $value);
	$result = $ci->db->get($table)->row();
	return $result;
}

function triponyu_update_rating($table, $field, $value, $update) {
	$ci =& get_instance();

	//update data
	$ci->db->where($field, $value);
	$result = $ci->db->update($table, $update);
	return $result;
}

function triponyu_trip_comment_count($trip_id) {
	$ci =& get_instance();

	//update data
	$ci->db->where('trip_id', $trip_id);
	$result = $ci->db->get('rating_review')->num_rows();
	return $result;
}

function triponyu_trip_repeat($checked = false) {
	$output = '';
	$checked = ($checked == '') ? 'none' : $checked;
	foreach (TRIP_REPEAT as $key => $value) {
		$isChecked = ($checked == $value) ? "checked" : '';
		$output .= '<input type="radio" name="trip_repeat" value="'.$value.'" '.$isChecked.'> '.$value.'<br>';
	}

	return $output;
}

function print_rf($expression) {
	echo '<pre>';
	print_r($expression);
	echo '</pre>';
	return;
}

function generate_path_image($images) {
	$ci =& get_instance();
	
	$path_images = $ci->config->item("upload_path_images");
	$path_images = str_replace('.', '', $path_images).''.$images;

	return $path_images;
}

function triponyu_homestay_type($type = '') {
	$ci=& get_instance();

	$categories = array('villa' => 'Villa'
		, 'home' => 'Home'
		, 'hotel' => 'Hotel'
		, 'apartment' => 'Apartment');

	$output = '<select class="form-control" name="homestay_type">';

	foreach ($categories as $key => $value) {
		$selected = '';
		if (htmlspecialchars($key) === $type) {
			$selected = 'selected="selected"';
		}

		$output .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_rating_scale($value) {
	$ci =& get_instance();

	if ($value <= 2) {
		$output = 'Bad';
	} elseif ($value <= 3) {
		$output = 'Fair';
	} elseif ($value <= 4) {
		$output = 'Good';
	} else {
		$output = "Best";
	}

	$output = '<span>'.$value.'</span>'.$output;

	return $output;
}

function triponyu_rating_star($value)
{
	$ci =& get_instance();

	$output = '<div class="rating">';

	for ($i=1; $i <= 5; $i++) { 
		if ($i <= $value) {
			$output .= '<i class="icon-star voted"></i>';
		} else {
			$output .= '<i class="icon-star-empty"></i>';
		}
	}
	
	$output .= '</div>';

	return $output;
}

function triponyu_trip_type($checked = false) {
	$output = '';
	$checked = ($checked == '') ? 'none' : $checked;
	foreach (TRIP_TYPE as $key => $value) {
		$isChecked = ($checked == $value) ? "checked" : '';
		$output .= '<input type="radio" name="trip_type" value="'.$value.'" '.$isChecked.'> '.$value.'<br>';
	}

	return $output;
}

function create_alias($table, $alias){
	$ci =& get_instance();

	//get data
	$ci->db->where('alias', $alias);
	$res = $ci->db->get($table)->row();

	if($res) {
		$count = count($res) + 1;
		$alias = slug($alias.' '.$count);
	}

	return $alias;
}

function slug($string){
	$ci=& get_instance();
	return strtolower(preg_replace("/[^-\w]+/", "-", $string));
}

function triponyu_fuel_type($name = '', $type = '') {
	$ci=& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getFuel();

	$output = '<select class="form-control" name="'.$name.'">';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($type) == strtolower($value['value'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['value'].'" '.$selected.'>'.$value['name'].'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_car_brand($name = '', $type = '') {
	$ci=& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getBrand();

	$output = '<select class="form-control" name="'.$name.'" id="'.$name.'">';
	$output .= '<option value="#">Choose Brand</option>';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($type) == strtolower($value['value'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['id'].'" '.$selected.'>'.$value['name'].'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_car_model($name = '', $brand_id = '') {
	$ci=& get_instance();
	$ci->load->Model('MGeneral');

	$categories = $ci->MGeneral->getBrandModel($brand_id);

	$output = '<select class="form-control" name="'.$name.'" id="'.$name.'">';
	$output .= '<option value="#">Choose Model</option>';

	foreach ($categories as $key => $value) {
		$selected = (strtolower($type) == strtolower($value['value'])) ? 'selected="selected"' : '' ;
		$output .= '<option value="'.$value['value'].'" '.$selected.'>'.$value['name'].'</option>';
	}

	$output .= '</select>';

	return $output;
}

function triponyu_dropdown_search($name = '', $id = '') {
	$ci=& get_instance();
	$ci->load->Model('MTrip');

	$cities = $ci->MTrip->getOptions('trip_cities');

	$output = '<select title="Search in" class="searchSelect" id="'.$id.'" name="'.$name.'">';
	$output .= '<option value="trip" title="Trip">Trip</option>';
	$output .= '<option value="homestay" title="Homestay">Homestay</option>';
	$output .= '<optgroup value="0" label="Explore the City">';

	foreach (explode('|', $cities[0]['value']) as $key => $value) {
		$output .= '<option value="'.$value.'">'.$value.'</option>';
	}

	$output .= '</optgroup>';

	$output .= '</select>';

	return $output;
}