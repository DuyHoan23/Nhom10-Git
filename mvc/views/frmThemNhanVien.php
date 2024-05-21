<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" type="text/css" href="/public/assets/style.css">
</head>


<body>
    <div>
<div class = "container">
        <form METHOD = "post" action="/live/mvc/views/TestAPIPost.php">
            <h1>Đăng kí nhân viên</h1>

            <div class="form-control ">
                <input id ="ten"  name = "ten" type="text" placeholder ="Tên" >
                <span></span>
                <small></small>
            </div>


            <div class="form-control ">
                <input id ="email" name = "email" type="email" placeholder ="Email" >
                <span></span>
                <small></small>
            </div>

            <div class="form-control ">
                <input id ="sdt" name = "sdt" type="int" placeholder ="Số điện thoại" required pattern="\d{11}" maxlength="11">
                <span></span>
                <small></small>
            </div>
            <div class="form-control ">
                <input id="password" name = "password" type="password" placeholder ="Password" >
                <span></span>
                <small></small>
            </div>
            
           
            <div class="form-control ">
                <input id ="diachi" name = "diachi" type="text" placeholder ="Địa chỉ" >
                <span></span>
                <small></small>
            </div>

             <!-- CMND -->
             <div class="form-control">
                <input id="cmnd" name="cmnd" type="text" placeholder="CMND" required pattern="\d{12}" maxlength="12">
                <small>Vui lòng nhập CMND với 12 số</small>
            </div>
        
            <!-- Trạng thái làm việc -->
            <div class="form-control">
                <select id="trangthai" name="trangthai" required>
                    <option value="" disabled selected>Chọn trạng thái làm việc</option>
                    <option value="Làm việc">Làm việc</option>
                    <option value="Không làm việc">Không làm việc</option>
                </select>
                <small>Vui lòng chọn trạng thái làm việc</small>
            </div>
            
            <button class="btn-submit" name = "btnsubmit" onclick="submitForm()">Create</button>
          
            <div class="signup-link">
                 <a href="NhanVien.php">Trở về</a>
            </div>
        </form>
    </div>
    <div>
    
</div>
</div>
</body>
</html>
<script>
function submitForm() {
    $.ajax({
        url: "/live/mvc/views/TestAPIPost.php", // Thay thế "process.php" bằng đường dẫn đến tệp PHP bạn muốn thực thi
        method: "POST",
        data: { action: "create", 
            $ten : $_POST['ten'],
            $email : $_POST['email'],
            $pass : $_POST['password'],
            $sdt : $_POST['sdt'],
            $diachi : $_POST['diachi'],
            $CMND : $_POST['cmnd'],
            $trangThai : $_POST['trangthai'],
        
        }, // Gửi dữ liệu cần thiết nếu có
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
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        /* Kiểu cho tiêu đề */
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Kiểu cho form control */
        .form-control {
            margin-bottom: 15px;
        }

        /* Kiểu cho input và combobox */
        .form-control input,
        .form-control select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Kiểu cho input khi được tập trung (focus) */
        .form-control input:focus,
        .form-control select:focus {
            outline: none;
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

        /* Kiểu cho liên kết trong phần dưới cùng */
        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
            transition: text-decoration 0.3s;
        }

        /* Hiệu ứng hover cho liên kết */
        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Kiểu cho thông báo lỗi */
        .form-control small {
            color: red;
            display: none;
        }
    </style>


