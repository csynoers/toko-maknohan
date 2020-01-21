<?php

class Rajaongkir{

	// function __construct(){
	// 	parent::__construct();
	// }
	
	public static function province($id=NULL)
	{
		$curl = curl_init();
		
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province".(empty($id) ? null : '?id='.$id ),
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: 04419aca2907b96962780057dbc98f5a"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
		    return "cURL Error #:" . $err;
		} else {
			return json_decode($response)->rajaongkir->results ;
		}
	}
	public static function city($provinciID,$kotaID=NULL)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" .$provinciID.(empty($kotaID) ? null : '&id='.$kotaID ),
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"key: 04419aca2907b96962780057dbc98f5a"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
            return "cURL Error #:" . $err;
		} else {
			return json_decode($response)->rajaongkir->results;
		}
	}
	public static function cost($data)
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => "origin=498&destination={$data['destination']}&weight={$data['weight']}&courier={$data['courier']}",
		// CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=jne",
		CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: 04419aca2907b96962780057dbc98f5a"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return "cURL Error #:" . $err;
		} else {
			return $response;
		}
	}
	public static function courier()
	{
		return [
			'jne',
			'pos',
			'tiki',
		];
	}
	public static function cost_all($get=null){
		$data= [];
		foreach (Rajaongkir::courier() as $key => $value) {
			$kurir= json_decode(
				Rajaongkir::cost([
					'destination'=> $get['destination'],
					'weight'=> $get['weight'],
					'courier'=> $value,
				])
			)->rajaongkir->results;

			foreach ($kurir as $key_kurir => $value_kurir) {
				$code= strtoupper( $value_kurir->code );
				foreach ($value_kurir->costs as $key_costs => $value_costs) {
					$service= $value_costs->service;
					foreach ($value_costs->cost as $key_cost => $value_cost) {
						$data[]= [
							'code'=> $code,
							'service'=> $service,
							'etd'=> $value_cost->etd .($code=='POS'? null : ' HARI' ),
							'value'=> $value_cost->value,
						];
					}
				}
			}
		}
		return $data;
	}
	public function courier_html_option()
	{
		$this->load->helper('currency');
		$rows= $this->cost_all([
			'destination'=> $this->input->get('destination'),
			'weight'=> $this->input->get('weight'),
		]);
		$html= "";
		foreach ($rows as $key => $value) {
			$html .= "<option value='{$value["value"]}' kurir='{$value["code"]} {$value["service"]} ({$value["etd"]})' >{$value["code"]} {$value["service"]} ({$value["etd"]}) - ".idr($value['value'])."</option>";
		}
		echo $html;
	}
  
}