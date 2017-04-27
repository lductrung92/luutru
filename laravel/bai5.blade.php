<p>Bài trước mình đã giới thiệu về <code>View</code> trong Laravel 5. Bài hôm nay tôi sẽ giới thiệu về <code>Blade template engine (BTE)</code> trong Laravel 5.</p>
<p><strong>Mục Lục:</strong></p>
<div id="category_list">
    <ul>
        <li><a id = "category_01_link" href="#">Tạo Blade template engine (BTE)</a></li>
        <li><a id = "category_02_link" href="#">Cú pháp trong BTE</a></li>
        <li><a id = "category_03_link" href="#">Chuẩn bị giao diện cho trang quản trị(Admin-LTE)</a></li>
    </ul>
</div>
<div id="category_01">
    <p><strong>1. Tạo Blade template engine (BTE)</strong></p>
    <p>Tất cả các Blade template engine (BTE) đều có phần mở rộng là <code>.blade.php</code>, nằm trong thư mục <code>resources/views</code>. Việc tạo mới BTE rất đơn giản. Ví dụ để tạo BTE tên là <code>demo</code> ta tạo file <code>demo.blade.php</code> nằm trong thư mục <code>resources/views</code> là xong.</p>
</div>
<div id="category_02">
    <p><strong>2. Cú pháp trong BTE</strong></p>
    <p><strong>BTE sử dụng cặp ngoặc <code>{{}}</code> để echo giá trị (in ra định dạng html)</strong></p>
    <p>Ví dụ:</p>
    <pre class="brush: php">
        Ngày hôm nay: {{ date("d/m/y") }}
        {{ '<p>Hôm nay trời đep thế</p>' }}
    </pre>
    <p>Kết quả: </p>
    <pre class="brush: php">
    Ng&agrave;y h&ocirc;m nay: 26/04/17&lt;p&gt;H&ocirc;m nay trời đep thế&lt;/p&gt;
    </pre>

    <p><strong>BTE sử dụng <code>{!! !!}</code> để echo giá trị (đọc định dạng html rồi in ra)</strong></p>
    <p>Ví dụ:</p>
    <pre class="brush: php">
       Ngày hôm nay: {{ date("d/m/y") }}
        {!! '<p>Hôm nay trời đep thế</p>' !!}
    </pre>
    <p>Kết quả: </p>
    <pre class="brush: php">
        Kết quả: Ngày hôm nay: 26/04/17
        Hôm nay trời đep thế
    </pre>
    <p><strong>Sử dụng <code>or</code> để xuất giá trị mặc định</strong></p>
    <p>Ví dụ: </p>
    <pre class="brush: php">
    Xin chào, {{ $name or 'TrungLe' }}
    </pre>
    <p><code>$name<code> này không tồn tại thì kết quả sẽ mặc định là TrungLe</code></code></p>

</div>
<div id="category_03">
    <p><strong>3. Chuẩn bị giao diện cho trang quản trị(Admin-LTE)</strong></p>
    <p>Bài hôm nay nay chúng ta khởi động làm 1 website tin tức luôn nhé.</p>
    <p>Tạo project mới: </p>
    <pre class="brush: php">
        $ composer create-project --prefer-dist laravel/laravel tintuc
    </pre>
    <p>Download AdminLTE: <a href="https://github.com/almasaeed2010/AdminLTE/archive/master.zip" target="_blank">tại đây</a></p>
    <p>Giải nén vào thư mục <code>public</code> đổi tên thành adminlte(tùy)</p>
    <p>Tạo view như sau: </p>
    <p style="text-align: center"><img alt="" src="http://laptrinh.laedaily.com/laravel-filemanager/photos/1/laravel/bai5/1.jpg"/></p>
    <p>Nội dung từng file: </p>
    <p>Code hơi dài nên các bạn có thể xem video hướng dẫn và download: <a href="http://laptrinh.laedaily.com/laravel-filemanager/photos/1/laravel/bai5/views.zip" target="_blank">tại đây</a></p>
    <p>Tạo<code>Route</code></p>
    <pre class="brush: php">
        Route::group(['prefix' => 'administrator'], function () {
           Route::get('index', 'AdminController@index');
        });
    </pre>
    <p>Nội dung controller <code>AdminController</code></p>
    <pre class="brush: php">
        class AdminController extends Controller
        {
            public function index ()
            {
                return view('admin.index');
            }
        }
    </pre>
    <p>Các bạn truy cập vào: http://localhost/tintuc/public/administrator/index </p>
    <p>Kết quả</p>
    <p style="text-align: center"><img alt="" src="http://laptrinh.laedaily.com/laravel-filemanager/photos/1/laravel/bai5/2.jpg"/></p>

</div>
<p><strong>Video hướng dẫn: </strong></p>
<div class="videowrapper">
    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/nfM4REGjlw4" frameborder="0" allowfullscreen></iframe>
</div>
<p>Trong bài này mình đã giới thiệu về <code>Blade Template Engine</code> trong Laravel 5. Trong series bài viết tiếp theo mình sẽ hướng dẫn các bạn về <code>Migrations</code> trong Laravel 5. Mời các bạn đón đọc. Bài viết trên là những hiểu biết của cá nhân mình nên không tránh phải sai sót, rất mong sự đóng góp ý kiến của các bạn để bài viết trở nên hữu ích hơn.</p>



