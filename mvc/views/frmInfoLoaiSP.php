<?php
include "header.php";
include "Left_side.php";
?>
    <?php

    if(mysqli_num_rows($data["LoaiSP"])>0){
       echo"  
       <main class='app-content'>
       <div class='app-title'>
       <ul class='app-breadcrumb breadcrumb side'>
       <li class='breadcrumb-item active'><a href='index.php'><b>DS sản phẩm</b></a></li>
       </ul>
       </div>
       <div class='row'>
        <div class='col-md-12'>
            <div class='tile'>
                <div class='tile-body'>
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                          <a class='btn btn-add btn-sm' href='addLoaiSP' title='Thêm'><i class='fas fa-plus'></i>
                            Tạo mới loại sản phẩm</a>
                            <br>
                            <br>
                            <a class='btn btn-add btn-sm' href='searchLoaiSP' title='TimKiem'><i class='fas fa-plus'></i>
                            Tìm Kiếm loại sản phẩm</a>                            
                        </div>
                      </div>
                    <div>
                      <table id='customers'>
                        <tr>
                          <th>STT</th>
                          <th>ID loại sản phẩm</th>                         
                          <th>Ten loại sản phẩm</th>
                          <th>Chức năng</th>
                        </tr>";
                        $coun=0;
        while($row = mysqli_fetch_assoc($data["LoaiSP"])){
            $coun++;
            echo "<tr>";
            echo "<td> " .$coun. "</td>";
            echo "<td> " .$row["id_loaisp"]. "</td>";
            //echo "<td> " .$row['id_danhmuc']. "</td>";
            echo "<td> " .$row['tenloaisp']. "</td>";
            echo "<td><a href='deleteLoaiSP/".$row['id_loaisp']."' class='btn btn-edit' type='button' title='Xóa'>Xóa
              </a>
              <a href='editLoaiSP/".$row['id_loaisp']."' class='btn btn-delete' type='button' title='Sửa'>Sửa</a>        
            </td>";
        }
        echo "</tbody>";

        
    }else{
        echo" Khong co du lieu";
    }
    

?>
<a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel' style="margin-bottom:20px;"><i class='fas fa-plus'></i>
                            Xuất Excel </a> 
                            
<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
      
      function xuatexcel(){
        var name = prompt("Nhập tên file của bạn", "Tên");
         exportData(name,'.xlsx');
    
      }
      function exportData(name, type) {
    // Lấy bảng customers
    const table = document.getElementById("customers");

    // Loại bỏ cột cuối cùng của bảng
    const rows = table.getElementsByTagName("tr");
    for (let i = 0; i < rows.length; i++) {
        const row = rows[i];
        if (row.cells.length > 0) {
            row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
        }
    }

    // Xuất bảng sang Excel
    const fileName = name + type;
    const wb = XLSX.utils.table_to_book(table);
    XLSX.writeFile(wb, fileName);
}
    </script>

<script src="live/lib/js/sheet.js"></script>
</body>
</html>






