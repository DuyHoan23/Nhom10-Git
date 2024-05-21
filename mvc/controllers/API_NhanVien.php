<?php
class API_NhanVien extends Controller {

    public function SayHi(){
        // Khởi tạo model
        $nhanvienmodel = $this->model("NhanVienModel");
        
        // Kiểm tra xem $id_nhanvien có được cung cấp hay không
        if (empty($id_nhanvien)) {
            // Nếu không có $id_nhanvien, gọi listNhanVien để lấy danh sách tất cả nhân viên
            $nv = $nhanvienmodel->listNhanVien();
        } else {
            // Nếu có $id_nhanvien, gọi showNV để lấy thông tin nhân viên theo id
            $nv = $nhanvienmodel->showNVAPI($id_nhanvien);
        }
    
        // Khởi tạo một mảng để lưu dữ liệu nhân viên
        $mang = [];
        
        // Lặp qua kết quả và thêm vào mảng
        while ($s = mysqli_fetch_array($nv)) {
            array_push($mang, new NhanVien(
                $s["id_nhanvien"],
                $s["id_taikhoan"],
                $s["ten"],
                $s["email"],
                $s["pass"],
                $s["sdt"],
                $s["diachi"],
                $s["CMND"],
                $s["trangThai"]
            ));
        }
        
        // Xuất mảng dưới dạng JSON
        echo json_encode($mang);
    }

    public function nhanvien($id_nhanvien = null){
        // Kiểm tra xem phương thức HTTP có phải là GET không
    // Khởi tạo model
    $nhanvienmodel = $this->model("NhanVienModel");
    
    // Kiểm tra xem $id_nhanvien có được cung cấp hay không
    if (empty($id_nhanvien)) {
        // Nếu không có $id_nhanvien, gọi listNhanVien để lấy danh sách tất cả nhân viên
        $nv = $nhanvienmodel->listNhanVien();
    } else {
        // Nếu có $id_nhanvien, gọi showNV để lấy thông tin nhân viên theo id
        $nv = $nhanvienmodel->showNVAPI($id_nhanvien);
    }

    // Khởi tạo một mảng để lưu dữ liệu nhân viên
    $mang = [];
    
    // Lặp qua kết quả và thêm vào mảng
    while ($s = mysqli_fetch_array($nv)) {
        array_push($mang, new NhanVien(
            $s["id_nhanvien"],
            $s["id_taikhoan"],
            $s["ten"],
            $s["email"],
            $s["pass"],
            $s["sdt"],
            $s["diachi"],
            $s["CMND"],
            $s["trangThai"]
        ));
    }
    // Xuất mảng dưới dạng JSON
    echo json_encode($mang);

    }

    public function DELETENV($id_nhanvien = null){ 
    // Kiểm tra xem $id_nhanvien có được cung cấp hay không
    if (empty($id_nhanvien)) {
        // Nếu không có $id_nhanvien, trả về thông báo lỗi
        echo json_encode(array('message' => 'Vui lòng cung cấp ID nhân viên để xóa.'));
        return;
    }
    
    // Khởi tạo model
    $nhanvienmodel = $this->model("NhanVienModel");
    if($nhanvienmodel->kttt($id_nhanvien)){
        // Gọi phương thức xóa nhân viên từ model
        $nhanvienmodel->deleteAPI($id_nhanvien);
    }else{
        echo json_encode(["error" => "ID nhân viên không tồn tại"]);
    }
    
    
 
    }

    public function POSTNV()
    {
        // Gọi ra model
        $nhanvienmodel = $this->model("NhanVienModel");
        $nhanvienmodel->themNhanVien();     
    }



    public function PUTNV() {
        // Kiểm tra phương thức HTTP có phải là PUT không
            // Lấy dữ liệu từ input
            parse_str(file_get_contents("php://input"), $putData);
    
            // Lấy các giá trị từ mảng PUT
            $id_nhanvien = $putData['id_nhanvien'] ?? null;
            $ten = $putData['ten'] ?? null;
            $email = $putData['email'] ?? null;
            $CMND = $putData['cmnd'] ?? null;
            $sdt = $putData['sdt'] ?? null;
            $diachi = $putData['diachi'] ?? null;
            $trangThai = $putData['trangthai'] ?? null;

            
            $modelnhanvien = $this->model("NhanVienModel");
            if($modelnhanvien->kttt($id_nhanvien)){
                $modelnhanvien->editNV_API($ten,$email,$CMND,$sdt,$diachi,$trangThai,$id_nhanvien);
            }else{
                echo json_encode(["error" => "ID nhân viên không tồn tại"]);
            }
            
   
        
    }  
}

class NhanVien{
    public $id_nhanvien;
    public $id_taikhoan;
    public $tennv;
    public $email;
    public $pass;
    public $sdt;
    public $diachi;
    public $cmnd;
    public $trangThai;

    public function __construct($id_nhanvien,$id_taikhoan,$tennv,$email,$pass,$sdt,$diachi,$cmnd,$trangThai){
        $this->id_nhanvien = $id_nhanvien;
        $this->id_taikhoan = $id_taikhoan;
        $this->tennv = $tennv;
        $this->email = $email;
        $this->pass = $pass;
        $this->sdt = $sdt;
        $this->diachi = $diachi;
        $this->cmnd = $cmnd;
        $this->trangThai = $trangThai;
    }
}


?>

