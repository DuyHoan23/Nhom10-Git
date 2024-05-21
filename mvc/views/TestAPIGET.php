<?php

$ch = curl_init();

$url = "http://localhost/live/API_NhanVien/nhanvien";

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)){
        echo $e;
}
else{
        $decoded = json_decode($resp, true);
        print_r($decoded);
}

curl_close($ch);