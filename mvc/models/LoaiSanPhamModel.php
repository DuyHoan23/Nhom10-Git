<?php
class LoaiSanPhamModel extends DB{
    public function LoaiSanPhamList(){
        $qr = "SELECT * FROM tbl_loai_sp";
        return mysqli_query($this->con, $qr);
    }

    public function themLoaiSanPham(){      
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
          // $id_danhmuc = $_POST["danhmuc_id"];
           $tenloaisp = $_POST['loaisanpham_name'];       
           $sql = "INSERT INTO tbl_loai_sp VALUES ('','".$tenloaisp."')";
           $result = mysqli_query($this->con,$sql);
           if(!$result){
               echo "<script type='text/javascript'>alert('Thêm thất bại')</script>";
           } else{
               echo "<script type='text/javascript'>alert('Thêm thành công');
                window.history.pushState(null, '', '/live/LoaiSanPham/Show');
                window.location.href = '/live/LoaiSanPham/Show';
               </script>";
       }
   
}   

    }

    public function getEdit($id_loaisp){
        $sql = "SELECT * FROM tbl_loai_sp WHERE id_loaisp ='".$id_loaisp."'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function suaLoaiSanPham($id_loaisp){      
        if ($_SERVER['REQUEST_METHOD']== "POST" and isset ($_POST['submit'])){
          //$id_danhmuc = $_POST['danhmuc_id'];
          $tenloaisp = $_POST['loaisanpham_ten'];
       
          $sql="UPDATE tbl_loai_sp SET  tenloaisp = '".$tenloaisp."' WHERE id_loaisp ='".$id_loaisp."'";
          $result = mysqli_query($this->con,$sql);
          if(!$result){
              echo "<script type='text/javascript'>alert('Sửa loại sản phẩm thất bại')</script>";
          } else{
              echo "<script type='text/javascript'>alert('Sửa loại sản phẩm thành công');
              window.history.pushState(null, '', '/live/LoaiSanPham/Show');
                window.location.href = '/live/LoaiSanPham/Show';
              </script>";
      }         
      } 
    }

    public function xoaLoaiSanPham($id_loaisp){
        $sql="DELETE FROM tbl_loai_sp WHERE id_loaisp ='".$id_loaisp."'"; 
        
        $result = mysqli_query($this->con,$sql);
        if(!$result){
            echo "Delete error" .mysqli_error($this->con);
        }else{
        $sql1="DELETE FROM tblsanpham WHERE loaisp_id ='".$id_loaisp."'"; 
        $result1 = mysqli_query($this->con,$sql1);
            echo"<script type='text/javascript'>alert('Xoá loại sản phẩm thành công');
            window.history.pushState(null, '', '/live/LoaiSanPham/Show');
            window.location.href = '/live/LoaiSanPham/Show';
        </script>";

    }
    }

    public function timKiemLoaiSP(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tenloaisp")
    {
        $sql = "SELECT * FROM tbl_loai_sp WHERE tenloaisp LIKE '%$tk%' ORDER BY tenloaisp";
    }
    else{
        $sql = "SELECT * FROM tbl_loai_sp WHERE id_loaisp  LIKE '%$tk%' ORDER BY id_loaisp";
    }
     return $result = mysqli_query($this->con,$sql);
    }    
}
}
?>