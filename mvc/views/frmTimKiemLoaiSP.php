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
            <td class="from-group col-md-3"><button type='submit' name='btntimkiemten'>Tìm kiếm</button><br><br>
            <select class="form-control" required="required" name="txtlc" id="">
                <option value="tenloaisp">Tên loại sản phẩm</option>
                <option value="id_loaisp">ID loại sản phẩm</option>
            </select>
            <input type='text' name = 'txttimkiem' id = 'txttimkiem'></td>
        </tr>
    </table>
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
    <th>ID loại sản phẩm</th>
    <th>Tên loại sản phẩm</th>
    </tr>
    </thead>
    <tbody>
    ";
    while( $row = mysqli_fetch_assoc($data["DL"]) )
    {
        echo"<tr>";
        echo "<td> " .$row["id_loaisp"]. "</td>";
            echo "<td> " .$row["tenloaisp"]. "</td>";
            //echo "<td> " .$row["id_danhmuc"]. "</td>";
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
  <a href="/live/LoaiSanPham/Show">Quay về trang chủ</a>
  </body>
</html>

