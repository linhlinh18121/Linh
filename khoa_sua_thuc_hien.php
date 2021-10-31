<?php 
    // Mục đích kiểm tra xem bạn có quyền truy cập trang này không thông qua BIẾN $_SESSION['da_dang_nhap']
    session_start();
    if (!isset($_SESSION["da_dang_nhap"]) ){
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không có quyền truy cập');
            </script>
        ";

        echo "
            <script type='text/javascript'>
                window.location.href='dang_nhap.php';
            </script>
        ";
    }
;?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sửa khoa</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
	    <?php         
            // 1. Load file cấu hình để kết nối đến máy chủ CSDL, CSDL
            include('../config.php');


            // 2. Lấy ra được các dữ liệu mà trang TIN TỨC THÊM MỚI chuyển sang
            $khoa_id= $_POST["txtID"];
            $ten_khoa = $_POST["txtTenkhoa"];

            // 3. Viết câu lệnh truy vấn để sửa dữ liệu vào bảng TIN TỨC trong CSDL)
            $sql="
                    UPDATE `tbl_khoa` 
                    SET `ten_khoa` = '".$ten_khoa."'
                    WHERE `tbl_khoa`.`khoa_id` = '".$khoa_id."'
            ";

            // 4. Thực thi câu lệnh truy vấn (mục đích trả về dữ liệu các bạn cần)
            $khoa = mysqli_query($ket_noi, $sql);

            // 5. Hiển thị ra thông báo các bạn đã sửa tin tức thành công và đẩy các bạn về trang quản trị tin tức
            echo "
            	<script type='text/javascript'>
            		window.alert('Bạn đã sửa tên khoa thành công');
            	</script>
            ";

            echo "
            	<script type='text/javascript'>
            		window.location.href='quan_tri_khoa.php';
            	</script>
            ";
	    ;?>
    </body>
</html>
