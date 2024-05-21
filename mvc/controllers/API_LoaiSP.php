<?php
class API_NhanVien extends Controller {
    public function SayHi(){
        echo "HomeAPI";
    }
    public function loaisp($id_loaisp= null){
        // Kiểm tra xem phương thức HTTP có phải là GET không
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Khởi tạo model
    $LoaiSanPhamModel = $this->model("LoaiSanPhamModel");
    
    // Kiểm tra xem $id_nhanvien có được cung cấp hay không
    if (empty($id_loaisp)) {
        // Nếu không có $id_nhanvien, gọi listNhanVien để lấy danh sách tất cả nhân viên
        $nv = $LoaiSanPhamModel->LoaiSanPhamList();
    } else {
        // Nếu có $id_nhanvien, gọi showNV để lấy thông tin nhân viên theo id
        $nv = $LoaiSanPhamModel->getEdit($id_loaisp);
    }

    // Khởi tạo một mảng để lưu dữ liệu nhân viên
    $mang = [];
    
    // Lặp qua kết quả và thêm vào mảng
    while ($s = mysqli_fetch_array($nv)) {
        array_push($mang, new LoaiSanPham(
            $s["id_loaisp"],
            $s["tenloaisp"],
          
        ));
    }
    
    // Xuất mảng dưới dạng JSON
    echo json_encode($mang);
} else {
    // Nếu phương thức không phải là GET, trả về lỗi 405 Method Not Allowed
    http_response_code(405);
    echo json_encode(["error" => "Phương thức không được phép"]);
}
    }

    public function DELETENV($id_nhanvien = null){ 
        // Kiểm tra xem phương thức HTTP có phải là DELETE không
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    // Kiểm tra xem $id_nhanvien có được cung cấp hay không
    if (empty($id_nhanvien)) {
        // Nếu không có $id_nhanvien, trả về thông báo lỗi
        echo json_encode(array('message' => 'Vui lòng cung cấp ID nhân viên để xóa.'));
        return;
    }
    
    // Khởi tạo model
    $LoaiSanPhamModel = $this->model("LoaiSanPhamModel");
    if($LoaiSanPhamModel->kttt($id_nhanvien)){
        // Gọi phương thức xóa nhân viên từ model
        $LoaiSanPhamModel->deleteAPI($id_nhanvien);
    }else{
        echo json_encode(["error" => "ID nhân viên không tồn tại"]);
    }
    
    
} else {
    echo json_encode(array('message' => 'Phương thức không được phép.'));
}
    }

    public function POSTNV()
    {
        // Gọi ra model
        $LoaiSanPhamModel = $this->model("LoaiSanPhamModel");
        $LoaiSanPhamModel->themNhanVien();

    }

    public function PUTNV() {
        // Kiểm tra phương thức HTTP có phải là PUT không
        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
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

            
            $modelnhanvien = $this->model("LoaiSanPhamModel");
            if($modelnhanvien->kttt($id_nhanvien)){
                $modelnhanvien->editNV_API($ten,$email,$CMND,$sdt,$diachi,$trangThai,$id_nhanvien);
            }else{
                echo json_encode(["error" => "ID nhân viên không tồn tại"]);
            }
            
   
        } else {
            // Nếu phương thức không phải là PUT, trả về lỗi 405 Method Not Allowed
            echo json_encode(["error" => "Phương thức không được phép"]);
        } 
    }  
}

class LoaiSanPham{
    public $id_loaisp;
    public $id_tenloaisp;
   

    public function __construct($id_loaisp,$id_tenloaisp){
        $this->id_loaisp = $id_loaisp;
        $this->id_tenloaisp = $id_tenloaisp;
        
    }
}


?>

