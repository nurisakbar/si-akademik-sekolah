<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->output->delete_cache();
        //$this->load->view('template');
        $this->template->load('template', 'table-example');
    }

    function guzzle() {
        //step1
        $cSession = curl_init();
//step2
        curl_setopt($cSession, CURLOPT_URL, "https://reguler.zenziva.net/apps/smsapi.php?userkey=wq8ed6&passkey=testing&nohp=089699935552&pesan=asasasasasasasasasas");
        curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cSession, CURLOPT_HEADER, false);
//step3
        $result = curl_exec($cSession);
//step4
        curl_close($cSession);
//step5
        echo $result;
    }

    function sms() {
        // Script Kirim SMS Api Zenziva
        $userkey = "wq8ed6"; // userkey lihat di zenziva
        $passkey = "testing"; // set passkey di zenziva
        $message = "Terima Kasih, pendaftaran atas nama nuris telah berhasil di cpnsonline.com. Silahkan baca dan download petunjuk selanjutnya. Harap Maklum";
        $telepon = "089699935552";
        $url = "https://reguler.zenziva.net/apps/smsapi.php";
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey=' . $userkey . '&passkey=' . $passkey . '&nohp=' . $telepon . '&pesan=' . urlencode($message));
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        $results = curl_exec($curlHandle);
        curl_close($curlHandle);

        echo print_r($results);
    }

    function test() {

        $this->load->library('curl');

        $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=wq8ed6&passkey=testing&nohp=089699935552&pesan=testing by nuris";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        print $result;

        die;

        $userkey = "wq8ed6"; // userkey lihat di zenziva
        $passkey = "testing"; // set passkey di zenziva
        $this->load->library('curl');

        $params = array('userkey' => $userkey, 'passkey' => $passkey, 'nohp' => 089699935552, 'pesan' => 'coba dari culr');

        //$result  = $this->curl->simple_call('get',"https://reguler.zenziva.net/apps/smsapi.php?",$params);
        //$result = $this->curl->simple_get('https://reguler.zenziva.net/apps/smsapi.php',$params);
        $result = $this->curl->simple_get('https://reguler.zenziva.net/apps/smsapi.php', array(CURLOPT_PORT => 8080));
        echo print_r($result);

        echo $this->curl->execute();

        die;
        $url = "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkey&passkey=$passkey&nohp=089699935552&pesan= test kirim sms dengan zenziva api";
        echo $this->curl->simple_get($url);
    }

}
