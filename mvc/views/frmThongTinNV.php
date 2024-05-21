<?php
include "header.php";
include "Left_side.php";
?>
 <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="frmThongTinNV.php"><b>Thông tin nhân viên</b></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body" >
                    <div class="col-sm-2">
                    </div>
    <?php       
        if(mysqli_num_rows($data["NV"])>0){
                
                echo "<p>THÔNG TIN NHÂN VIÊN</p>";
                echo"<table id='customers'>";
                    echo "<thead>";
                        echo "<tr>
                            <th>ID_NV</th>
                            <th>ID_TK</th>
                            <th>Tên</th>
                            <th>Email</th>
                            
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>CMND</th>
                            <th>Trạng thái</th>
                            <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody>";
                    
                        while($row = mysqli_fetch_assoc($data["NV"])){
                            {                                
                            echo "<tr>";                                
                                echo "<td>" . $row["id_nhanvien"] . "</td>";
                                echo "<td>" . $row["id_taikhoan"] . "</td>";
                                echo "<td>" . $row["ten"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                //echo "<td>" . $row["pass"] . "</td>";
                                echo "<td>" . $row["sdt"] . "</td>";
                                echo "<td>" . $row["diachi"] . "</td>";
                                echo "<td>" . $row["CMND"] . "</td>";
                                echo "<td>" . $row["trangThai"] . "</td>";
                                echo "<td> <a href='editNV/".$row["id_nhanvien"]."'class='btn btn-edit' type='button' title='Sửa'> Sửa
                             </a>
                            <a href='deleteNV/".$row["id_nhanvien"]."'
                            \" class='btn btn-delete' type='button' title='Xóa'>Xóa</a> </td>
                           ";
                            echo"</tr>"; 
                                                
                        }

                    }
                    echo "</tbody>";
                    echo "</table>"; 
                    
                    
        }
        else{
            echo "Khong co ban ghi";
        }   
?> 
</div>
    <button>
        <a href = '/live/NhanVien/addNV'> Thêm Nhân Viên </a>                
    </button>

    <button>
        <a href = '/live/NhanVien/searchNV'> Tìm kiếm</a>                
    </button>

    <a class='btn btn-add btn-sm' onclick = "xuatexcel()" title='Xuat_excel'><i class='fas fa-plus'></i>
                            Xuất Excel </a>   
    <a href = '/live/NhanVien/sortNV' class='btn btn-add btn-sm' title='Sapxep'><i class='fas fa-plus'></i>
    Sắp xếp </a>   
      
    </div>
    </div>
    </div>
    </div>
</body>
</html>

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


<style>
    /* CSS cho button */
button a {
    text-decoration: none;
    color: inherit;
    display: block;
    width: 100%;
    height: 100%;
}

/* Cơ bản cho button */
button {
    background-color: #4CAF50; /* Màu nền */
    color: white; /* Màu chữ */
    padding: 10px 20px; /* Khoảng đệm */
    border: none; /* Bỏ đường viền */
    border-radius: 5px; /* Bo góc */
    cursor: pointer; /* Trỏ chuột thành hình tay */
    font-size: 16px; /* Kích cỡ chữ */
    text-align: center; /* Canh giữa chữ */
    margin-top:20px;
}

.btn-add{
    margin-left:10px;
}

/* Hiệu ứng khi hover */
button:hover {
    background-color: #45a049; /* Màu nền khi di chuột qua */
}

/* Hiệu ứng khi nhấn */
button:active {
    background-color: #3e8e41; /* Màu nền khi nhấn */
}

</style>

