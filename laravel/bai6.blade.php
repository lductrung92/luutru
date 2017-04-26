<p>Bài trước mình đã giới thiệu về <code>Blade template engine (BTE)</code> trong Laravel 5. Bài hôm nay mình sẽ hướng dẫn sử dụng <code>migrations</code> để tạo database trong Laravel 5.</p>
<p><strong>Mục Lục:</strong></p>
<div id="category_list">
    <ul>
        <li><a id = "category_01_link" href="#">Cấu hình database</a></li>
        <li>
            <a id = "category_02_link" href="#">Sử dụng migrations trong laravel 5</a>
        </li>
        <li><a id = "category_03_link" href="#">Tạo database website tin tức cơ bản bằng migrations</a></li>
    </ul>
</div>
<div id="category_01">
    <p><strong>1. Cấu hình database</strong></p>
    <p>Để cấu hình database trong Laravel, bạn tìm đến file <code>.env</code> ở thu mục gốc của ứng dụng.</p>
    <p style="text-align: center"><img alt="" src="http://laptrinh.laedaily.com/laravel-filemanager/photos/1/laravel/bai6/1.jpg"/></p>
    <p>Mở file lên với editor bất kỳ, tìm đến và chỉnh sửa 6 dòng như trong hình (trong trường hợp này mình dùng mysql). Tùy server, tên database, tài khoản của bạn để điền tương ứng</p>
    <p style="text-align: center"><img alt="" src="http://laptrinh.laedaily.com/laravel-filemanager/photos/1/laravel/bai6/2.jpg"/></p>
</div>
<div id="category_02">
    <p><strong>2. Sử dụng migrations trong laravel 5</strong></p>
    <p><code>Migration</code> cơ sở dữ liệu trong Laravel cung cấp cho bạn một cách dễ dàng việc quản lý những schema CSDL trong ứng dụng. Khi bạn sử dụng migration, nhiều tác vụ liên quan tới CSDL schema dễ dàng hơn rất nhiều; bằng cách sử dụng migration bạn có thể thay đổi cấu trúc của bảng cơ sở dữ liệu, bạn có thể giữ lại những dữ liệu cũ bất cứ khi nào cho dù hiện tại bạn có thay đổi.</p>
    <p>Tạo bảng bằng <code>Migration</code></p>
    <pre class="brush: php">
        $ php artisan make:migration created_table_name --create=name
    </pre>
    <p>Chèn thêm columns vào bảng đã có sẵn <code>Migration</code></p>
    <pre class="brush: php">
        $ php artisan make:migration add_columns_table_name --table=name
    </pre>
    <p>Kết quả tạo ra file trong thư mục <code>database/migrations</code></p>
    <p>Ví dụ: </p>
    <p>Khi chạy lệnh khởi tạo như sau: </p>
    <pre class="brush: php">
        $ php artisan make:migration create_table_categories --create=categories
    </pre>
    <p>Trong thư mục <code>database/migrations</code> sẽ tạo cho bạn file <code>2017_04_26_074546_create_table_categories.php</code></p>
    <p>Nội dung file: </p>
    <pre class="brush: php">
        // database/migrations
        use Illuminate\Support\Facades\Schema;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Database\Migrations\Migration;

        class CreateTableCategories extends Migration
        {
            /**
             * Run the migrations.
             *
             * @return void
             */
            public function up()
            {
                Schema::create('categories', function (Blueprint $table) {
                    $table->increments('id');
                    $table->timestamps();
                });
            }

            /**
             * Reverse the migrations.
             *
             * @return void
             */
            public function down()
            {
                Schema::dropIfExists('categories');
            }
        }
    </pre>
    <p>Dưới đây là một số câu lệnh của những hàm liên quan tới Schema mà Laravel cung cấp</p>
    <table>
        <thead>
        <tr>
            <th>Câu lệnh</th>
            <th>Diễn giãi</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="active"><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;increments(‘id’);<br>
                </span></td>
            <td class="success">Tạo khóa ID tự động tăng trong bảng</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;string(’email’);</span></td>
            <td>Trường dữ liệu khai báo với kiểu VARCHAR</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;string(‘name’, 100);</span></td>
            <td>Trường dữ liệu khai báo với kiểu VARCHAR với số kí tự 100</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;integer(‘votes’);</span></td>
            <td>Trường dữ liệu khai báo với kiểu INTEGER</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;float(‘amount’);</span></td>
            <td>Trường dữ liệu khai báo với kiểu FLOAT</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;boolean(‘confirmed’);</span></td>
            <td>Trường dữ liệu khai báo với kiểu BOOLEAN</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;timestamps();</span></td>
            <td>Tự động thêm trường created_at, updated_at</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">$table-&gt;text(‘description’);</span></td>
            <td>Trường dữ liệu khai báo với kiểu TEXT</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">-&gt;nullable()</span></td>
            <td>Trường dữ liệu có thể ghi dữ liệu null</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">-&gt;default($value)</span></td>
            <td>Đặt giá trị mặc định cho trường</td>
        </tr>
        <tr>
            <td><span style="color: #bd3613; font-family: Menlo, Monaco, Consolas, 'Courier New', monospace; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 18px;  text-align: left; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: #fdf6e3;">-&gt;unsigned()</span></td>
            <td>Đặt trường dữ liệu là số nguyên dương</td>
        </tr>
        </tbody>
    </table>
    <p>Xem chi tiết: <a href="https://laravel.com/docs/5.4/migrations" target="_blank">tại đây</a></p>
</div>
<div id="category_03">
    <p><strong>3. Tạo database website tin tức cơ bản bằng migrations</strong></p>
</div>




