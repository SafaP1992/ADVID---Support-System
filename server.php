<?php

session_start();
include_once('handle/ajax/jdf.php');
include_once('handle/ajax/user_info/UserInfo.php');

$errors = array();

try {
	require_once('conn/db.php');
	error_reporting(E_ERROR | E_PARSE);


	if (isset($_POST['login'])) {

		$username = $_POST['inputusername'];
		$passstr = $_POST['inputpassword'];
		$pass = md5($_POST['inputpassword']);
		$captcha = $_POST['captcha'];


		if (empty($username) && empty($pass)) {
			array_push($errors, "نام کاربری و کلمه عبور را وارد نمائید.");
		} else if (empty($username)) {
			array_push($errors, "لطفا نام کاربری را وارد نمائید.");
		} else if (empty($pass)) {
			array_push($errors, "لطفا کلمه عبور را وارد نمائید.");
		} else if (empty($captcha)) {
			array_push($errors, "رمز امنیتی را وارد نکردید.");
		}
		
		
        if(!preg_match("/^[a-z0-9]*$/", $username)) {
            array_push($errors, "نام کاربری وارد شده معتبر نیست، فقط حروف کوچک و اعداد می باشد.");
		    return;
        } 
        if($username == "select" or $username == "update" or $username == "delete" or $username == "drop" or $username == "insert"  or $username == "set" or $username == "view" or $username == "create" ){
            array_push($errors, "نام کاربری وارد شده معتبر نیست، فقط حروف کوچک و اعداد می باشد.");
		    return;
        }
        //if(!preg_match("/^[A-Za-z0-9]*$/", $passstr)) {
        //    array_push($errors, "کلمه عبور وارد شده معتبر نیست");
		//    return;
        //}
        

		$select = $dbo->prepare("SELECT * FROM tbusers WHERE vcrUsernameUser='$username' and vcrPasswordUser='$pass'");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data = $select->fetch();

		if (!empty($_POST["captcha"])) {
			if ($captcha != $_SESSION["captcha"]) {
				array_push($errors, "رمز امنیتی اشتباه می باشد.");
				return;
			}
		}



		//Get user IP address
		// $ip = $_SERVER['REMOTE_ADDR'];

		$remote_addr = UserInfo::get_ip();
		$remote_OS = UserInfo::get_os();
		$remote_Browser = UserInfo::get_browser();
		$remote_Device = UserInfo::get_device();

		//Using the API to get information about this IP
		$details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=$remote_addr"));
		//Using the geoplugin to get the continent for this IP
		$continent = $details->geoplugin_continentCode;
		//And for the country
		$country = $details->geoplugin_countryCode;
		//If continent is Europe

		if ($continent == "AS" && $country == "IR") {
			//Do action if country is Iran or not from Europe
			if ($data['vcrUsernameUser'] != $username and $data['vcrPasswordUser'] != $pass) {
				// echo "invalid Username or password";
				array_push($errors, "نام کاربری یا کلمه عبور اشتباه می باشد.");
			} elseif ($data['vcrUsernameUser'] == $username and $data['vcrPasswordUser'] == $pass and count($errors) == 0) {

				$_SESSION['intUserID'] = $data['intUserID'];
				$_SESSION['vcrUsernameUser'] = $data['vcrUsernameUser'];
				$_SESSION['vcrFNameUser'] = $data['vcrFNameUser'];
				$_SESSION['vcrLNameUser'] = $data['vcrLNameUser'];

				$id_user = $_SESSION['intUserID'];
				//adding new visitor (new ip)
				// $remote_addr = $_SERVER['REMOTE_ADDR'];
				// $http_client_ip = $_SERVER['$HTTP_CLIENT_IP'];
				// $http_forwarded_for = $_SERVER['$HTTP_FORWARDED_FOR'];
				// $c_info = new Users_info;


				$DateTime = date("Y-m-d H:i:s");
				$date = date("Y-m-d H:i:s");
				$array = explode(' ', $date);
				list($year, $month, $day) = explode("-", $array[0]);
				list($hour, $minute, $second) = explode(':', $array[1]);
				$timestamp = mktime($hour, $minute, $second, $month, $day, $year);

				$jalali_date = tr_num(jdate("Y/m/d H:i:s", $timestamp));



				$insert = $dbo->prepare("INSERT INTO tbipuser (intUserID,vcrIPUserAddress,vcrIPUserOS,vcrIPUserBrowser,vcrIPUserDevice,datIPUserEntryDateTime,vcrIPUserEntryDateTime,vcrIPUserLocation,intIPUserStatusOnline) VALUES ('$id_user','$remote_addr','$remote_OS','$remote_Browser','$remote_Device','$DateTime','$jalali_date','NULL','1') ");
				$insert->setFetchMode(PDO::FETCH_ASSOC);
				$insert->execute();

				$_SESSION['intIPUserID'] = $data['intIPUserID'];


				header("location:dashboard.php");
			}
		} else {
			//Do action if country is in Europe , but its not Iran
			array_push($errors, "در کشور شما مجاز نیست، تنها از ایران مجاز است.");
			return;
		}
	}
	
	if (isset($_POST['get_captcha'])) {
		$val = $_SESSION["captcha"];
		echo $val;
	}
	
	
	if (isset($_POST['entermessage'])) {

// 		$captcha = $_POST['captcha'];
		$_SESSION['entercaptcha'] = $_SESSION['captcha'];
// 		if (!empty($_POST["captcha"])) {
// 			if ($captcha != $_SESSION["captcha"]) {
// 				array_push($errors, "رمز امنیتی اشتباه می باشد.");
// 				return;
// 			}
// 		}

// 		if (empty($username) && empty($pass)) {
// 			array_push($errors, "نام کاربری و کلمه عبور را وارد نمائید.");
// 		} else if (empty($username)) {
// 			array_push($errors, "لطفا نام کاربری را وارد نمائید.");
// 		} else if (empty($pass)) {
// 			array_push($errors, "لطفا کلمه عبور را وارد نمائید.");
// 		} else if (empty($captcha)) {
// 			array_push($errors, "رمز امنیتی را وارد نکردید.");
// 		}

	}
	
	
} catch (PDOException $e) {
	echo "error" . $e->getMessage();
}

function validate_string_spaces_only($string,$passstr) {
    if(!preg_match("/^[A-Za-z0-9]*$/", $username)) {
            array_push($errors, "نام کاربری وارد شده معتبر نیست");
		    return;
        } 
    if(!preg_match("/^[A-Za-z0-9]*$/", $passstr)) {
            array_push($errors, "نام کلمه عبور وارد شده معتبر نیست");
		    return;
        } 
        
}
