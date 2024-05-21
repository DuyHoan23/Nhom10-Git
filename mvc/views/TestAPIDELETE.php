<?php
$url = "http://localhost/live/API_NhanVien/DELETENV/".$data['id_nhanvien'];
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($ch);

if($e = curl_error($ch)){
    echo $e;
}else {
    $decoded = json_decode($resp);
    if ($decoded !== null) { // Kiểm tra xem $decoded có giá trị không
        foreach($decoded as $key => $val) {
            // Kiểm tra xem giá trị của thuộc tính có phải là chuỗi hay không
            if (is_string($val)) {
                echo $key . ': ' . $val . '<br>';
            } else {
                echo $key . ': '; // Nếu không phải chuỗi, chỉ in ra tên thuộc tính
                var_dump($val); // In ra giá trị của thuộc tính để kiểm tra kiểu dữ liệu
                echo '<br>';
            }
        }
    } else {
       echo"Xóa nhân viên API";
              
    }
}


curl_close($ch);