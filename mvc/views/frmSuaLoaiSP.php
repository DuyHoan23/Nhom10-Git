<?php
include "header.php";
include "Left_side.php";
?>
<?php       
    $id_loaisp = "";
    $tenloaisp = "";
        if(mysqli_num_rows($data["LoaiSP"])>0){
            while($row = mysqli_fetch_assoc($data["LoaiSP"])){
               // $id_danhmuc = $row["id_danhmuc"] ;
               $id_loaisp = $row["id_loaisp"];
                $tenloaisp= $row["tenloaisp"];
            }
        }else{
            echo"Khong co du lieu";
        }
    
    ?>
<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Sửa loại sản phẩm</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">    
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">ID_LOAI_SP<span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="text" value="<?php echo  $id_loaisp ?>" name="loaisanpham_id" readonly> <br>
                                    </div>                                
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng chọn loại sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control"  type="text" value="<?php echo  $tenloaisp ?>" name="loaisanpham_ten"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Sửa</button>  
                                    <a href="/live/LoaiSanPham/Show" class="btn btn-cancel">Hủy bỏ</a> </div>                                    
                                    </div>    
                                </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>
