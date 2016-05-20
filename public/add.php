<?PHP
		
define('USERNAME', 'jpyle');
define('PASSWORD', 'Champ2244');
define('ACCOUNT', 'lop_solutions');
define('LIST_ID', 0); 
define('URL', 'http://api.ongage.net');

if (ACCOUNT == '********')
	die("you need to add parameters in order for this page to work correctly. open the PHP page to do that!!");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<style>
	label{width:250px; display:inline-block; margin-top:10px; float:left;}
	input, select{width:150px; float:left;margin-top:13px;padding:0px; border:1px solid silver;}
	textarea {float:left;margin-top:13px;padding:0px; border:1px solid silver;}
	a {float:left; clear:both;}
	#div_content div {display:none;}
	#div_content.email div#email,#div_content.content div#content {display:block;}
	br {clear:both; }
</style>
<?php 
$check = "";
$result = "";

if ( ! LIST_ID)
{
	$list = json_decode(post_request(array(), URL.'api/lists/', 'get'));

	if (empty($list->payload[0]->id))
		die("list retrieve failed");
		
	$list_id = $list->payload[0]->id;
}
else
{
	$list_id = LIST_ID;
}
$fields = json_decode(post_request(array('list_id'=>$list_id), URL.'/'.LIST_ID.'/api/list_fields/', 'get'));

if ( ! empty($_POST))
{
	// making the underscore back to space
	foreach($fields->payload as $field)
	{
		$modified = str_replace(' ','_', $field->name);
		if ( $field->name != $modified && isset($_POST[$modified]))
		{
			$_POST[$field->name] = $_POST[$modified];
			unset($_POST[$modified]);
		}
	}
}


function post_request($request, $link, $method)
{
	$request_json = json_encode($request);
/*
 *  $request['email'] = $email;
 *	$request['list_id'] = $list_id;
 
 */
	
	
	$c = curl_init();
	$link = $link;
	
	
	//curl_setopt($c, CURLOPT_USERPWD, 'asapi:asapi');
	switch($method)
	{
		case "post":
			curl_setopt($c, CURLOPT_URL, $link);
			curl_setopt($c, CURLOPT_POST, TRUE);
			curl_setopt($c, CURLOPT_POSTFIELDS, $request_json);
			break;
		case "put":
			curl_setopt($c, CURLOPT_URL, $link);
			curl_setopt($c, CURLOPT_PUT, TRUE);
			$temp = tmpfile();
			fwrite($temp, $request_json);
			fseek($temp, 0);
			curl_setopt($c, CURLOPT_INFILE, $temp);
			curl_setopt($c, CURLOPT_INFILESIZE, strlen($request_json));
			break;
		case "get":
			if ( ! empty($request))
			{
				$link .= '?' . http_build_query($request);
			}
			curl_setopt($c, CURLOPT_URL, $link);
			break;
			
	}
	
	$headers = array(
		'X_USERNAME: ' . USERNAME,
		'X_PASSWORD: ' . PASSWORD,
		'X_ACCOUNT_CODE: ' . ACCOUNT,
	);
	
	curl_setopt($c, CURLOPT_HTTPHEADER, array_merge(array(
		// Overcoming POST size larger than 1k wierd behaviour
		// @link  http://www.php.net/manual/en/function.curl-setopt.php#82418
		'Expect:'), $headers
	));
	
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$response_raw = curl_exec($c);
	
	if ($method == 'put')
	{
		fclose($temp); // this removes the file
	}
	
	$errno =  curl_errno ( $c );
	$result = json_decode($response_raw);
	
	if (strpos($link, 'api/list_fields/') === FALSE)
	{
		echo "link [$method] :<b>$link</b><br/>";
		echo "json request: ".json_encode($request)."<br/>";
		echo "-----------------------------------<br/>";
		echo "json reponse: " .$response_raw;
	}
	
	if (empty($errno))
	{
		if ( ! empty($result->payload->errors))
		{
			$errno = 500;
		}
	}
	if ( ! empty($errno))
	{
		header("HTTP/1.0 " . $errno);
	}
	return $response_raw;
}

$post = array();
$email = '';

foreach($fields->payload as $field)
{
	$post[$field->name] = '';
	if (empty($_POST[$field->name]))
		continue;
	
	if ($field->name == 'email')
	{
		$email = $_POST[$field->name];		
	}
	if ( ! empty($_POST[$field->name]))
	{
		$post[$field->name] = $_POST[$field->name];
	}
}

if ( ! empty($_POST['btn']))
{
	switch 	($_POST['btn'])
	{
		case "Save":
		case "Update":
			$post_method = array(
				'Save' => 'post',
				'Update' => 'put',
			);
			$btn = $_POST['btn'];
			unset($_POST['btn']);
		
			foreach($fields->payload as $field)	
			{
				if (empty($post[$field->name]))
				{
					if ( ! empty($field->mandatory))
					{
						$check .= $field->title . ' is empty<br/>';
					}
				}
				else
				{
					switch($field->type)
					{
						case "date":
							if ( ! strtotime($post[$field->name]))
							{
								$check .= $field->title . ' invalid date (format not checked)<br/>';		
							}
							break;
						case "email":
							if ( ! filter_var($post[$field->name], FILTER_VALIDATE_EMAIL))
							{
								$check .= $field->title . ' invalid email<br/>';		
							}
							break;
						case "numeric":
							if ( ! is_numeric($post[$field->name]))
							{
								$check .= $field->title . ' invalid number<br/>';		
							}
							break;
						case "string":
							// nothing to check for string
							break;
					}
				}
				
				
			}
			if (empty($check))
			{
				$request = array();
				$request['email'] = $email;
				$request['list_id'] = $list_id;
				$request['fields'] = $_POST;
				$response_raw = post_request($request, URL.'/'.LIST_ID.'/api/contacts', $post_method[$btn]);
				$result = json_decode($response_raw);
				if (isset($result->metadata->error) && $result->metadata->error == FALSE)
				{
					$result = 'OK';
				}
				else
				{
					$result = $response_raw;
				}
			}
			
		break;
		case "Get":			
			// removing all except for email

			$request = array(
				'criteria' => array(
					array(
						"field_name" => "email",
						"type" => "email",
						"operator" => "=",
						"operand" => array( $email ),
						"case_sensitive" => "0",
						"condition" => "and",	
						
					),
				
				),
				"list_id" => $list_id
			);
			
			$response_raw = post_request($request, URL.'/'.LIST_ID.'/api/contacts/lookup', 'post');
			
			$result = json_decode($response_raw);
			
			foreach($fields->payload as $field)
			{
				$name = $field->name;
				$value = '';
				if ( ! empty($result->payload[0]->$name))
				{
					$value = $result->payload[0]->$name;
					if ($field->type == 'date' && is_numeric($value))
					{
						$value = date("Y-m-d", $value);
					}
				}
				if ($field->name != 'email')
				{
					$post[$name] = $value;
				}
				
			}	

			if (isset($result->metadata->error) && $result->metadata->error == FALSE)
			{
				
				if ($result->metadata->total == 0)
				{
					$result = 'OK. contact not found';
				}
				else
				{
					$result = 'OK';
				}
				
				
			}
			else
			{
				$result = $response_raw;
			}			
		break;	
		}
}




?>
</head>
<body>
<br/>
<?php 
if ( ! empty($check))
{
	echo '<b style="color:red;">'.$check.'</b>';
}
if ( ! empty($result))
{
$color = 'green';
if (strpos($result,'OK') === FALSE)
{
	$color = 'red';
	$result = "Error";
	//echo "<br /><label>posted:</label><textarea>".json_encode($request)."</textarea><br clear='both'/>";
	
}
echo '<b style="color:'.$color.';">'.$result.'</b>';
}
?><br/>
Adding new contact.<br/>
<b>Production (account: <?php echo ACCOUNT; ?>)</b><br/>
<form method="post">

<?php 

foreach($fields->payload as $field)
{
	echo '<br /><label>'.$field->title;
	if ( ! empty($field->format))
	{
		echo '('.$field->format.')';
		
	}
	if ( ! empty($field->mandatory))
	{
		echo "<sup>*</sup>";
	}
	
	echo '</label><input type="text" name="'.$field->name.'" value="'.$post[$field->name].'" />';
}
?>


<br /><label>&nbsp;</label><input type="submit" name="btn" value="Save" />&nbsp;<input type="submit" name="btn" value="Update" /><input type="submit" name="btn" value="Get" />
</form>
</body>
</html>