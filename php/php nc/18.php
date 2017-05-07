<p>Một PHP script có thể sử dụng với một HTML form cho phép người dùng upload file lên Server. Đầu tiên các file này được upload lên một thư mục tạm thời, sau đó được di chuyển tới một đích bởi một PHP script.</p>
<p>Để cấu upload được file trong PHP ta phải cấu hình tập tin "php.in"</p>
<p>Tìm kiếm dòng file_uploads và sữa thành như sau: </p>
<pre class="brush: php">
    file_uploads = on
</pre>
<p>Tiếp theo, ta tạo một form cho phép người dùng có thể chọn tệp hình ảnh họ muốn tải lên</p>
<pre class="brush: php">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</pre>
<p>Lưu ý: ta cần thuộc tính enctype = "multipart/form-data" để có thể upload file lên server.</p>
<p>tạo tệp "upload.php" có nội dung như sau: </p>
<pre class="brush: php">
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
</pre>
<p>Giải thích: </p>
<ul>
    <li>$target_dir = "uploads/" - chỉ định thư mục nơi tập tin sẽ upload lên</li>
    <li>$target_file - xác định đường dẫn của tệp tin sẽ được tải lên</li>
    <li>$imageFileType - giữ phần mở rộng của tập tin</li>
    <li>Tiếp theo, kiểm tra nếu tệp hình ảnh là hình ảnh thực hay hình ảnh giả</li>
</ul>
<p><strong>Kiểm tra tệp đã tồn tại hay chưa?</strong></p>
<p>Đầu tiên, chúng tôi sẽ kiểm tra xem tệp đã tồn tại trong thư mục "tải lên" hay không. Nếu có, một thông báo lỗi sẽ được hiển thị, và $uploadOk được đặt thành 0:</p>
<pre class="brush: php">
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
</pre>
<p><strong>Giới hạn kích thước tệp</strong></p>
<pre class="brush: php">
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
</pre>
<p>Đoạn mã kiểm tra nếu tệp tải lên lớn hơn 500KB, một thông báo lỗi sẽ được hiển thị và $uploadOk được đặt thành 0:</p>
<p><strong>Giới hạn loại tệp</strong></p>
<pre class="brush: php">
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
</pre>
<p>Đoạn mã dưới đây chỉ cho phép người dùng tải lên tệp có định dạng JPG, JPEG, PNG và GIF. Tất cả các loại tệp khác sẽ đưa ra thông báo lỗi trước khi đặt $uploadOk thành 0:</p>
<p>Tệp "upload.php" hoàn chỉnh bây giờ trông như sau:</p>
<pre class="brush: php">
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
</pre>