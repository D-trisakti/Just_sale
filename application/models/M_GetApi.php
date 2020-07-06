<?php
defined('BASEPATH') or exit('no direct script access allowed');

class M_GetApi extends CI_Model
{
    public function get_all_province()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:7f6058ab73e3727b281eccf68dec2504"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        curl_close($curl);
        if ($err == "") {
            $response = $response->rajaongkir->results;
        } else {
            $response = "Tidak Ada Koneksi";
        }
        return $response;
    }
    public function get_city($id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:7f6058ab73e3727b281eccf68dec2504"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        curl_close($curl);
        if ($err == "") {
            $response = $response->rajaongkir->results;
        } else {
            $response = "Tidak Ada Koneksi";
        }
        return $response;
    }
    public function get_city_toko($id_prov, $id_kota)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=$id_kota&province=$id_prov",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key:7f6058ab73e3727b281eccf68dec2504"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        curl_close($curl);
        if ($err == "") {
            $response = $response->rajaongkir->results;
        } else {
            $response = "Tidak Ada Koneksi";
        }
        return $response;
    }
    public function get_ongkir($origin, $des, $kurir)
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
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$des&weight=1700&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 7f6058ab73e3727b281eccf68dec2504"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        curl_close($curl);
        if ($err == "") {
            $response = $response->rajaongkir->results[0]->costs;
        } else {
            $response = "Tidak Ada Koneksi";
        }
        return $response;
    }
    public function get_ongkir_value($origin, $des, $kurir, $service)
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
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$des&weight=1700&courier=$kurir",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 7f6058ab73e3727b281eccf68dec2504"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        curl_close($curl);
        if ($err == "") {
            $response = $response->rajaongkir->results[0]->costs;
        } else {
            $response = "Tidak Ada Koneksi";
        }
        return $response;
    }
}
