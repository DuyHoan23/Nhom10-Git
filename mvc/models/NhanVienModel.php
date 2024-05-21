<?php
class NhanVienModel extends DB{
    public function listNhanVien(){
        $sql = "SELECT * FROM tblnhanvien";
         return $result = mysqli_query($this->con,$sql);
    }

    public function themNhanVien(){
        if($_SERVER['REQUEST_METHOD']== "POST" || isset($_POST['btnsubmit'])){              
            $ten = $_POST['ten'];
            $email = $_POST['email'];
            $pass = $_POST['password'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $CMND = $_POST['cmnd'];
            $trangThai = $_POST['trangthai'];
            if(empty($ten) || empty($email) || empty($pass)|| empty($sdt)|| empty($diachi) || empty($trangThai)){
                echo "<script type = 'text/javascript'>alert('Vui lòng nhập đầy đủ thông tin');
                </script>";
                return;
            }
            
            $sql2 = "SELECT * FROM tbltk WHERE email ='".$email."'";
            $result2 = mysqli_query($this->con,$sql2);
            if(mysqli_num_rows($result2)<=0){
            $sql = "INSERT INTO tbltk (ten,email,pass,sdt, diachi, quyen) VALUES('".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."','Nhânviên')";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Không thêm thành công";
            }
            else{
                $sql4 = "SELECT id_taikhoan FROM tbltk WHERE email = '".$email."' ";
                $result4 = mysqli_query($this->con,$sql4);

                $row = mysqli_fetch_assoc($result4);
                $sql3 = "INSERT INTO tblnhanvien (id_nhanvien,id_taikhoan,ten,email,pass,sdt,diachi,CMND,trangThai)VALUES('','".$row['id_taikhoan']."','".$ten."','".$email."','".$pass."','".$sdt."','".$diachi."','".$CMND."','".$trangThai."')";
                $result3 = mysqli_query($this->con,$sql3);
                echo  "<script type = 'text/javascript'>alert('Thêm nhân viên thành công');
                window.history.pushState(null, '', '/live/NhanVien/Show');
                window.location.href = '/live/NhanVien/Show';
                </script>";
            }
            }else{
                echo  "<script type = 'text/javascript'>alert('Trùng email');
                </script>";
            }
            
        }
    }

    public function showEdit($id_nhanvien){
        $sql = "SELECT * FROM tblnhanvien WHERE id_nhanvien = '" .$id_nhanvien. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function showNVAPI($id_nhanvien){
        $sql = "SELECT * FROM tblnhanvien WHERE id_nhanvien = '" .$id_nhanvien. "'";
        return $result = mysqli_query($this->con,$sql);
    }

    public function editNV($id_nhanvien){       
            if($_SERVER['REQUEST_METHOD']=="PUT" || isset($_POST["btnsubmit"])){
                $ten = $_POST['ten'];
                $email = $_POST['email'];
                $CMND = $_POST['cmnd'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $trangThai = $_POST['trangthai'];
                $sql = "UPDATE tblnhanvien SET
                 ten = '" .$ten."' ,
                 email = '" .$email."',
                 CMND = '" .$CMND."',
                 sdt = '" .$sdt."',
                 diachi = '" .$diachi."',
                 trangThai = '".$trangThai."'
                 WHERE id_nhanvien = '" .$id_nhanvien."'";
                $result = mysqli_query($this->con,$sql);
                if(!$result){
                    echo "Update error" . mysqli_error($this->con);
                }
                else{
                    echo " 
                    <script> 
                    alert('Sửa nhân viên thành công');
                    window.history.pushState(null, '', '/live/NhanVien/Show');
                    window.location.href = '/live/NhanVien/Show';
                    </script>";
                }
            }            
    }

    public function editNV_API($ten,$email,$CMND,$sdt,$diachi,$trangThai,$id_nhanvien){
                $sql = "UPDATE tblnhanvien SET
                 ten = '" .$ten."' ,
                 email = '" .$email."',
                 CMND = '" .$CMND."',
                 sdt = '" .$sdt."',
                 diachi = '" .$diachi."',
                 trangThai = '".$trangThai."'
                 WHERE id_nhanvien = '" .$id_nhanvien."'";
                $result = mysqli_query($this->con,$sql);
                if(!$result){
                    echo "Update error" . mysqli_error($this->con);
                }
                else{
                    echo " 
                    <script> 
                    alert('Sửa nhân viên thành công');
                    window.history.pushState(null, '', '/live/NhanVien/Show');
                    window.location.href = '/live/NhanVien/Show';
                    </script>";
                }
    }



    public function deleteNV($id_nhanvien){
            $sql = "DELETE FROM tblnhanvien WHERE id_nhanvien ='" .$id_nhanvien."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa nhân viên thành công');
                window.history.pushState(null, '', '/live/NhanVien/Show');
                window.location.href = '/live/NhanVien/Show';
                </script>";
            }

    }

    public function deleteAPI($id_nhanvien){
            $sql = "DELETE FROM tblnhanvien WHERE id_nhanvien ='" .$id_nhanvien."'";
            $result = mysqli_query($this->con,$sql);
            if(!$result){
                echo "Delete error" .mysqli_error($this->con);
            }
            else{
                echo "<script type = 'text/javascript'>alert('Xóa nhân viên thành công');
                window.history.pushState(null, '', '/live/NhanVien/Show');
                window.location.href = '/live/NhanVien/Show';
                </script>";
            }
    }


    public function timKiemLNhanVien(){
        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['btntimkiemten']))
    {
        $tk = $_POST['txttimkiem'];
        $lc= $_POST['txtlc'];
        if($lc=="tennv")
    {
        $sql = "SELECT * FROM tblnhanvien WHERE ten LIKE '%$tk%' ORDER BY ten";
    }
    else{
        $sql = "SELECT * FROM tblnhanvien WHERE email  LIKE '%$tk%' ORDER BY email";
    }
     return $result = mysqli_query($this->con,$sql);
    }   
    }

    public function SortNV()
    {
        $qr = "SELECT * FROM tblnhanvien ORDER BY ten ASC";
        return mysqli_query($this->con, $qr);
    }

    public function kttt($id_nhanvien){
        $sql = "SELECT * FROM tblnhanvien WHERE id_nhanvien = '" .$id_nhanvien. "'";
        $result = mysqli_query($this->con,$sql);
        if(mysqli_num_rows($result)<=0) return false;
        else return true;
    }


}
?>