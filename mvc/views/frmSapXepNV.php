<?php
include "header.php";
include "Left_side.php";
?>

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<main class="app-content">
    <div class="app-title">
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item active"><a href="#"><b>Thông tin nhân viên</b></a></li>
            <li class="breadcrumb-item active"><a href="addNV"><b>Thêm nhân viên</b></a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class='row element-button'>
                        <div class='col-sm-2'>
                            <a class='btn btn-add btn-sm' href='' onclick="xuatexcel()" title='Xuất Excel'><i class='fas fa-plus'></i>
                                Xuất Excel</a>
                        </div>

                    </div>
                    <div>
                        <h2>Tất cả các nhân viên đã sắp xếp tăng theo họ tên:</h2>
                        <table id="customers">
                            <tr>
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
                            <?php
                            $count = 0;
                            if (mysqli_num_rows($data["NV"]) > 0) {
                                while ($row = mysqli_fetch_assoc($data["NV"])) {
                                    $count++;
                            ?>
                                    <tr>
                                        <td><?php echo $row['id_nhanvien'] ?></td>
                                        <td><?php echo $row['id_taikhoan'] ?></td>
                                        <td><?php echo $row['ten'] ?></td>
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['sdt'] ?></td>
                                        <td><?php echo $row['diachi'] ?></td>
                                        <td><?php echo $row['CMND'] ?></td>
                                        <td><?php echo $row['trangThai'] ?></td>
                                        <td>
                                            <a name="submit" href="<?php echo 'editNV/' . $row["id_taikhoan"] . '' ?>" class="btn btn-delete" type="button" title="Sửa">
                                                <i class="fas fa-edit"></i></a>
                                            <a href="<?php echo 'deleteNV/' . $row["id_taikhoan"] . '' ?>" onclick="return confirm('Thông tin nhân viên sẽ bị xóa vĩnh viễn, bạn có chắc muốn tiếp tục không?');" class="btn btn-edit" type="button" title="Xóa"><i class="fas fa-trash"></i></a>
                                        </td>

                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>

                </div>
                <div class='row element-button'>
<div class='col-sm-2'>
                        <br>
                        <br>
                        <a class='btn btn-add btn-sm' href='live/NhanVien' title='Sắp xếp'><i class='fas fa-plus'></i>
                            Quay lại</a>
                    </div>
                </div>
            </div>

        </div>
</main>

</body>

</html>

<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        exportData(name, '.xlsx');

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