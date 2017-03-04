<?php

function sendsms($destination, $message)
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('sendsms', array('destination' => $destination, 'message' => $message, 'username' => $apiUsername, 'apikey' => $apiKey));
	return $result;
}

function cekkredit()
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('cekkredit', array('username' => $apiUsername, 'apikey' => $apiKey));
	return $result;
}

function countinbox()
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('countinbox', array('username' => $apiUsername, 'apikey' => $apiKey));
	return $result;
}

function countoutbox()
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('countoutbox', array('username' => $apiUsername, 'apikey' => $apiKey));
	return $result;
}

function readinbox($i, $n)
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('readinbox', array('username' => $apiUsername, 'apikey' => $apiKey, 'i' => $i, 'n' => $n));
	if (is_array($result))
       {
          echo "<table border='1'>";
          echo "<tr><th>ID</th><th>PESAN</th><th>SENDER</th><th>WAKTU</th></tr>";
          foreach($result as $data)
          {
             echo "<tr><td>".$data['id']."</td><td>".$data['sms']."</td><td>".$data['sender']."</td><td>".$data['waktu']."</td></tr>";
          }
          echo "</table>";
       }               
	return $result;
}

function readoutbox($i, $n)
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('readoutbox', array('username' => $apiUsername, 'apikey' => $apiKey, 'i' => $i, 'n' => $n));
	if (is_array($result))
       {
          echo "<table border='1'>";
          echo "<tr><th>ID</th><th>PESAN</th><th>DESTINATION</th><th>WAKTU</th><th>STATUS</th></tr>";
          foreach($result as $data)
          {
             echo "<tr><td>".$data['id']."</td><td>".$data['sms']."</td><td>".$data['destination']."</td><td>".$data['waktu']."</td><td>".$data['status']."</td></tr>";
          }
          echo "</table>";
       }               
	return $result;

}

function delinbox($id)
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('delinbox', array('username' => $apiUsername, 'apikey' => $apiKey, 'id' => $id));
	return $result;
}

function deloutbox($id)
{
	include 'apiconfig.php';
	$urlsoap = 'http://smsapi.rosihanari.net/api.php';
	require_once('lib/nusoap.php');
	$client = new nusoap_client($urlsoap);
	$result = $client->call('deloutbox', array('username' => $apiUsername, 'apikey' => $apiKey, 'id' => $id));
	return $result;
}

?>