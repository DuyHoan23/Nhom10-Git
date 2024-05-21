<?php
include "header.php";
include "Left_side.php";
?>
<main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                   <h3 class="title-h3">Tạo loại sản phẩm mới</h3>
                    <div class="tile-body">
                          <div class="admin-content-right">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="product-add-content git">                                    
                                    <div class="from-group col-md-3">
                                      <label class="control-label" for="">Vui lòng điền loại sản phẩm<span style="color: red;">*</span></label> <br>
                                      <input class="form-control" required type="text" name="loaisanpham_name" placeholder="Vui lòng điền loại sản phẩm"> <br>
                                    </div>
                                    <div class="from-group col-12">
                                    <button class="btn btn-save admin-btn" name="submit" type="submit">Gửi</button>  
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

