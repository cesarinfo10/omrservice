<?PHP


  function sendMessageGral($titulo, $mensaje){	
	$content = array(
			"en" => "$mensaje"
			);
		
		$fields = array(
			'app_id' => "060e5179-d05f-4e8b-969f-65de4ccd40c1",
			'included_segments' => array('Active Users'),
			'data' => array("userId" => "gral"),
			'contents' => $content,
            "headings" => array("en" => "$titulo"),
			//'include_player_ids' => ["$include_player_ids"]
		);
		
		$fields = json_encode($fields);
    	print("\nJSON sent:\n");
    	print($fields);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
												   'Authorization: Basic NGFmNjMzM2EtMGU4Zi00MjdmLTg5YWUtZDQ4NDkwNmQ0OWNj'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$response = curl_exec($ch);
		curl_close($ch);
		
		return $response;
	}

    


