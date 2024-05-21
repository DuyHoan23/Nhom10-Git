<?php
include "header.php";
include "Left_side.php";
?>
<main class='app-content'>
        <div class='app-title'>          
        </div>
        <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
<form METHOD="POST">
    <table>
        <tr>
            <td class="from-group col-md-3"><br><br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tennv">Tên nhân viên</option>
                <option value="email">Email</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
        
    </table>
    <button type='submit' name='btntimkiemten'>Tìm kiếm</button>
  </form>
  <?php
     if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
     {         
     $result = $data["DL"];
    if(mysqli_num_rows($data["DL"])>0)
{
    echo"<br>";
    echo "<div class='row'>
    <div class='col-md-12'>
        <div class='tile'>
            <div class='tile-body'>
                <div class='row element-button'>
                    <div class='col-sm-2'>
                    <table id='customers'>;
                    </thead>
    <tr>
    <th>ID nhân viên</th>
    <th>ID tài khoản</th>
    <th>Tên</th>
    <th>Email</th>
    <th>Số điện thoại</th>
    <th>Địa chỉ</th>
    <th>CMND</th>
    <th>Trạng thái</th>
    </tr>
    </thead>
    <tbody>
    ";
    while( $row = mysqli_fetch_assoc($data["DL"]) )
    {
        echo"<tr>";
        echo "<td> " .$row["id_nhanvien"]. "</td>";
        echo "<td> " .$row["id_taikhoan"]. "</td>";
        echo "<td> " .$row["ten"]. "</td>";
        echo "<td> " .$row["email"]. "</td>";
        echo "<td> " .$row["sdt"]. "</td>";
        echo "<td> " .$row["diachi"]. "</td>";
        echo "<td> " .$row["CMND"]. "</td>";
        echo "<td> " .$row["trangThai"]. "</td>";
        echo  "</tr>";
    }
    echo"
    </tbody>
    </table>";

}else {
    echo"Khong tim thay du lieu";
}}
  ?>
  <br>
  <a href="/live/NhanVien/Show">Quay về trang chủ</a>
  </body>
</html>

<style>
    /* CSS cho nút "Tìm kiếm" */
button[name='btntimkiemten'] {
    background-color: #007bff; /* Màu nền (màu xanh lam) */
    color: white; /* Màu chữ (trắng) */
    padding: 10px 20px; /* Khoảng đệm bên trong */
    border: none; /* Bỏ đường viền */
    border-radius: 5px; /* Bo góc cho nút */
    cursor: pointer; /* Con trỏ chuột thành hình tay khi di chuyển vào nút */
    font-size: 16px; /* Cỡ chữ */
    font-weight: bold; /* Độ đậm của chữ */
    text-align: center; /* Canh giữa nội dung bên trong nút */
    transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
    margin-top: 15px;
    margin-left:15px;
}

/* Hiệu ứng khi hover */
button[name='btntimkiemten']:hover {
    background-color: #0056b3; /* Màu nền khi di chuột qua (xanh đậm hơn) */
}

/* Hiệu ứng khi nhấn */
button[name='btntimkiemten']:active {
    background-color: #004080; /* Màu nền khi nhấn (xanh sậm) */
}

</style>

