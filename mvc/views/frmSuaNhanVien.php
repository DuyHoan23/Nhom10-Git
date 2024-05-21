<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông nhân viên</title>
    <link rel = "stylesheet" href = "style.css"/>
</head>
<body>
    <?php
    $id_nhanvien = "";
    $ten ="";
    $email="";
    $pass= "";
    $sdt="";
    $diachi="";
    $CMND= "";
    $trangThai="";
    if(mysqli_num_rows($data["NV"])>0){
        while($row = mysqli_fetch_assoc($data["NV"])){
            $id_nhanvien = $row["id_nhanvien"];
            $ten =$row["ten"]; 
            $email=$row["email"];
            $pass= $row["pass"];
            $sdt=$row["sdt"];
            $diachi=$row["diachi"];
            $CMND= $row["CMND"];
            $trangThai=$row["trangThai"];
        }
    }
    else{
        echo "Khong co ban ghi";
    }
    
    ?>
    <div class = "container">
        <form METHOD = "post" action="/live/mvc/views/TestAPIPUT.php">
            <h1>Edit Account NV</h1>

            <div class="form-control error">
            <label for="id">ID NV</label>
                <input id ="id"  name = "id" type="text" value ="<?php echo($data["id_nhanvien"])?> "placeholder ="ID NV" >
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
            <label for="ten">Họ tên</label>
                <input id ="ten"  name = "ten" type="text" value ="<?php echo($ten) ?> "placeholder ="Tên" >
                <span></span>
                <small></small>
            </div>


            <div class="form-control error">
            <label for="email">Email</label>
                <input id ="email" name = "email" type="email" value ="<?php echo($email) ?>" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control error">
                <label for="sdt">Số điện thoại</label>
                <input id ="sdt" name = "sdt" type="int" value ="<?php echo($sdt) ?>" placeholder ="Số điện thoại" required pattern="\d{11}" maxlength="11">
                <span></span>
                <small></small>
            </div>
            <div class="form-control error">
            <label for="cmnd">CMND</label>
                <input id ="cmnd" name = "cmnd" type="text" value ="<?php echo($CMND) ?>"  placeholder ="CMND" required pattern="\d{12}" maxlength="12">
                <span></span>
                <small>Vui lòng nhập CMND với 12 số</small>
            </div>

            <div class="form-control error">
            <label for="diachi">Địa chỉ</label>
                <input id ="diachi" name = "diachi" type="text" value ="<?php echo($diachi) ?>" placeholder ="Địa chỉ">
                <span></span>
                <small></small>
            </div>

           <!-- Trạng thái làm việc -->
           <div class="form-control">
                <select id="trangthai" name="trangthai" required>
                    <option value="<?php echo($trangThai) ?>" disabled selected><?php echo($trangThai) ?></option>
                    <option value="Làm việc">Làm việc</option>
                    <option value="Không làm việc">Không làm việc</option>
                </select>
                <small>Vui lòng chọn trạng thái làm việc</small>
            </div>
        
            
            <button type = "submit" class="btn-submit" name = "btnsubmit" onclick="submitForm()">Edit</button>
          
            <div class="signup-link">
                 <a href="/live/NhanVien/Show">Trở về</a>
            </div>
            <script>
    function goBack() {
        window.history.back();
    }
</script>
        </form>
   
</body>
</html>

<script>
function submitForm() {

    // Gửi dữ liệu bằng AJAX
    $.ajax({
        url: "/live/mvc/views/TestAPIPUT.php",
        method: "PUT",
        data: {
            action: "update",
            $id_nhanvien: $data['id_nhanvien'],
            $ten : $_POST['ten'],
            $email : $_POST['email'],
            $pass : $_POST['password'],
            $sdt : $_POST['sdt'],
            $diachi : $_POST['diachi'],
            $CMND : $_POST['cmnd'],
            $trangThai : $_POST['trangthai'],
        },
        success: function(response) {
            // Xử lý phản hồi từ tệp PHP (nếu cần)
            alert(response);
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi (nếu có)
            alert("Có lỗi xảy ra: " + error);
        }
    });
}
</script>


<style>
        /* Kiểu cơ bản cho toàn bộ trang */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Kiểu cho container */
        .container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Kiểu cho tiêu đề */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        /* Kiểu cho form control */
        .form-control {
            margin-bottom: 15px;
        }

        /* Kiểu cho input */
        .form-control input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        /* Kiểu cho input khi được tập trung (focus) */
        .form-control input:focus {
            border-color: #007bff;
        }

        /* Kiểu cho nút submit */
        .btn-submit {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        /* Hiệu ứng hover cho nút submit */
        .btn-submit:hover {
            background-color: #0056b3;
        }

        /* Kiểu cho liên kết quay lại */
        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        /* Kiểu cho liên kết trong phần dưới cùng */
        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        /* Hiệu ứng hover cho liên kết */
        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Kiểu cho thông báo lỗi */
        .form-control.error input {
            border-color: red;
        }

        .form-control.error small {
            color: red;
            display: block;
        }

        /* Kiểu cơ bản cho form control */
        .form-control {
            margin-bottom: 15px;
        }

        /* Kiểu cho nhãn (label) */
        .form-control label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        /* Kiểu cho select (trường chọn) */
        .form-control select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        /* Hiệu ứng khi trường chọn được tập trung (focus) */
        .form-control select:focus {
            border-color: #007bff;
            outline: none;
        }

        /* Kiểu cho tùy chọn trong select */
        .form-control select option {
            padding: 5px;
            font-size: 14px;
        }

        /* Kiểu cho thông báo nhỏ */
        .form-control small {
            display: block;
            margin-top: 5px;
            color: #888;
            font-size: 12px;
        }

        /* Kiểu cho thông báo nhỏ khi có lỗi */
        .form-control.error small {
            color: red;
        }
    </style>