<?php

session_start();
include_once('../handle/ajax/user_info/UserInfo.php');

try {

	// ini_set('upload_max_filesize', '10M');
	// ini_set('post_max_size', '10M');
	// ini_set('max_input_time', 300);
	// ini_set('max_execution_time', 300);

	require_once('conn/db.php');
	error_reporting(E_ERROR | E_PARSE);


	if (isset($_POST['login'])) {

		$username = $_POST['inputusername'];
		$pass = md5($_POST['inputpassword']);
		// $pass = md5($_POST['inputpassword']);
		$captcha = $_POST['captcha'];

		$errors = array();

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

		$select = $dbo->prepare("SELECT * FROM tbadmin WHERE vcrUsernameAdmin='$username' and vcrPasswordAdmin='$pass'");
		$select->setFetchMode(PDO::FETCH_ASSOC);
		$select->execute();
		$data = $select->fetch();

		// $data['vcrPasswordAdmin']


		if (!empty($_POST["captcha"])) {
			if ($captcha != $_SESSION["captcha"]) {
				array_push($errors, "رمز امنیتی اشتباه می باشد.");
				return;
			}
		}

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
    		if ($data['vcrUsernameAdmin'] != $username and $data['vcrPasswordAdmin'] != $pass) {
    			// echo "invalid Username or password";
    				array_push($errors, "نام کاربری یا کلمه عبور اشتباه می باشد.");
    		} elseif ($data['vcrUsernameAdmin'] == $username and $data['vcrPasswordAdmin'] == $pass and count($errors) == 0) {
    			$_SESSION['vcrUsernameAdmin'] = $data['vcrUsernameAdmin'];
    			$_SESSION['vcrFNameAdmin'] = $data['vcrFNameAdmin'];
    			$_SESSION['vcrLNameAdmin'] = $data['vcrLNameAdmin'];
    			header("location:dashboard.php");
    		}
    		
		} else {
			//Do action if country is in Europe , but its not Iran
			array_push($errors, "در کشور شما مجاز نیست، تنها از ایران مجاز است.");
			return;
		}
	}
} catch (PDOException $e) {
	echo "error" . $e->getMessage();
}
