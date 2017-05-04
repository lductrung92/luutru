<p>Bài trước mình đã giới thiệu về cấu trúc thư mục trong Laravel 5. Bài hôm nay chúng ta sẽ đi tổng quan về Route và cách sử dụng route trong Laravel 5.</p>
<p><strong>Mục Lục:</strong></p>
<div id="category_list">
    <ul>
        <li><a id = "category_01_link" href="#">Hiểu về route trong Laravel</a></li>
        <li>
            <a id = "category_02_link" href="#">Các loại route trong Laravel 5 và cách sử dụng:</a>
            <ul>
                <li><a id = "category_03_link" href="#">Route::get()</a></li>
                <li><a id = "category_04_link" href="#">Route::post()</a></li>
                <li><a id = "category_05_link" href="#">Route::group()</a></li>
                <li><a id = "category_06_link" href="#">Route::match()</a></li>
                <li><a id = "category_07_link" href="#">Route::any()</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id="category_01">
    <p><strong>1. Hiểu về route trong Laravel</strong></p>
    <ul>
        <li>
            Tất cả các routes(định tuyến) của Laravel chứ trong thư mục <code>routes/web.php</code> Các file trong thư mục này sẽ được tải tự động bởi Laravel.File <code>routes/web.php</code> định nghĩa các định tuyến cho giao diện web của bạn. Ngoài ra ở phiên bản 5.3 so với các phiên bản trước nó còn có thêm <code>routes/api.php</code> và <code>routes/console.php</code>. Về cơ bản chỉ là tách nhỏ routes ra theo chức năng, nên ta sẽ định nghĩa các định tuyến từ file <code>routes/web.php</code>.
        </li>
        <li>
            Ta hiểu môn na như sau: khi <code>index.blade.php</code> nhận được 1 request từ người dùng, nó sẽ đưa request đó về route, từ route sẽ định tuyến cho request đó đi đâu tiếp theo.
        </li>
        <li>
            Ví dụ: Khi người dùng truy cập vào đường dẫn: http://laedaily.com/article, thì lúc này route sẽ nhận url là <code>/articles</code>, sau đó nó sẽ gửi request đó tời Controller tương ứng để xử lý.
        </li>
        <li>
            Tóm lại, chúng ta chỉ cần hiểu route trong laravel đóng vai trò định tuyến(điều hướng request).
        </li>
    </ul>
    <p>Route trong Laravel 5 (bản 5.4) được định nghĩa trong <code>routes/web.php</code>. Danh sách các route cơ bản: </p>
    <ul>
        <li>
            <strong>Route::get</strong> : tương tự như method get() trong PHP
            <strong>Route::post</strong> : tương tự như method post() trong PHP
            <strong>Route::group</strong> : gom các route có điểm chung với nhau thành 1 nhóm.
            <strong>Route::match</strong> : kết hợp nhiều method.
            <strong>Route::any</strong> : nhận tất cả các method.
        </li>
    </ul>
    <p>Ngoài ra còn có:</p>
    <ul>
        <li>
            <strong>Route::filter</strong> : tạo bộ lọc. ví dụ tạo bộ lọc kiểm ta login
        </li>
        <li>
            <strong>Route::controller</strong> : gọi đến Controller tương ứng
        </li>
        <li>
            <strong>Route::resource</strong> : sử dụng với resource controller
        </li>
    </ul>
</div>
<div id="category_02">
    <p><strong>2. Các loại route trong Laravel 5 và cách sử dụng:</strong></p>
</div>
<div id="category_03">
    <p><strong>Route::get()</strong></p>
    <p>Đây là route tiếp nhận các request với method <code>get()</code>. Cú pháp:</p>
    <pre class="brush: php">
        Route::get($uri, $ac);
        // $ac có thể là mảng, hàm hoặc chuổi
    </pre>
    <p><strong>Ví dụ 1: Khi action là một hàm</strong></p>
    <pre class="brush: php">
        Route::get('/demo_get', function () {
            echo 'Đây là ví dụ route get';
        });
    </pre>
    <p>Bạn truy cập vào địa chỉ: <i>http://localhost/blog/public/demo_get</i> sẽ thấy kết quả:</p>
    <p style="text-align: center">
        <a href="http://laedaily.com/upload/laravel/bai3/1.png">
            <img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai3/1.png" title="Demo route get laravel 5" />
        </a>
    </p>
    <p><strong>Ví dụ 2: Khi action là một mảng</strong></p>
    <pre class="brush: php">
        Route::get('/demo_get', ['as' => 'getMethod', 'uses' => 'DemoController@index']);
        // getMethod là tên route
        // uses sẽ gọi tới method index trong DemoController
    </pre>
    <p>Các bạn phải khởi tạo controller <code>DemoController</code> bằng lệnh:</p>
    <pre class="brush: php">
        $ php artisan make:controller DemoController
    </pre>
    <p>Mở file <code>blog/app/Http/Controllers/DemoController.php</code> lên thêm vào function <code>index</code></p>
    <pre class="brush: php">
        <?php
        class DemoController extends Controller
        {
            public function index ()
            {
                echo 'Đây là ví dụ route get';
            }
        }
        ?>
    </pre>
    <p>Bạn truy cập vào địa chỉ: <i>http://localhost/blog/public/demo_get</i> sẽ thấy kết quả giống như ví dụ 1.</p>
</div>
<div id="category_04">
    <p><strong>Route::post()</strong></p>
    <p>Đây là route tiếp nhận các request với method <code>post()</code>. Cú pháp:</p>
    <pre class="brush: php">
        Route::post($uri, $ac);
        // $ac có thể là mảng, hàm hoặc chuổi
        // tương tự như route get
    </pre>
    <p>Vậy khi nào dùng get, khi nào dùng post. Ta sẽ đi vào ví dụ sau:</p>
    <p>Trong file <code>routes/web.php</code> bạn tạ 2 route:</p>
    <pre class="brush: php">
        Route::get('/login', ['as' => 'getLogin', 'uses' => 'DemoController@getLogin']);
        Route::post('/login', ['as' => 'postLogin', 'uses' => 'DemoController@postLogin']);
    </pre>
    <p>Trong file <code>DemoController.php</code> bạn tạo 2 function như sau:</p>
    <pre class="brush: php">
        <?php
        namespace App\Http\Controllers;
        use Illuminate\Http\Request;

        class DemoController extends Controller
        {
            public function getLogin()
            {
                return view('login');
            }

            public function postLogin(Request $request)
            {
                if($request->user == 'admin' && $request->pass == '123')
                {
                    echo "Login thành công";
                }
                else
                {
                    echo "Login thất bại";
                }
            }
        }
        ?>
    </pre>
    <p>Tạo 1 view có tên là <code>login.blade.php</code> trong thư mục <code>resources/views</code> có nội dung: </p>
    <pre class="brush: php">
        <form ;class="form-inline" action="login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                <input type="text" class="form-control" name="user" placeholder="Username">
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword3">Password</label>
                <input type="password" class="form-control" name="pass" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Sign in</button>
        </form>
    </pre>
    <p>Bạn truy cập vào địa chỉ: <i>http://localhost/login</i> sẽ thấy kết quả giống như sau:</p>
    <p style="text-align: center">
        <a href="http://laedaily.com/upload/laravel/bai3/2.png">
            <img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai3/2.png" title="Demo route get laravel 5" />
        </a>
    </p>
    <p>Ta thấy nó nhận hiển thị form login mà ta đã tạo ở file <code>login.blade.php</code>. Vì đây là method get lấy nhận request GET đưa về function <code>getLogin()</code> của controller <code>DemoControler</code> và function này return về view login</p>
    <p>Tiếp theo nhập vào thông tin và nhấn submit (Username: <code>admin</code> Password: <code>123</code>)</p>
    <p>Kết quả: </p>
    <p style="text-align: center">
        <a href="http://laedaily.com/upload/laravel/bai3/3.png">
            <img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai3/3.png" title="Demo route post laravel 5" />
        </a>
    </p>
    <p>Ta thấy nó nhận hiển thị <code>Login thành công</code>. Có thể hiểu khi ta nhấn submit thì các thông tin <code>user, pass, token</code> sẽ đưa về route post, route này sẽ đưa về function <code>postLogin()</code> của controller <code>DemoControler</code> và function này kiểm tra dữ liệu nhập vào và xuất ra thông báo</p>
    <p>Khác với PHP ta lấy dữ liệu bằng <code>$_POST["user"]</code> đối với Laravel chỉ cần sử dụng <code>Request</code> như trong file <code>DemoController.php</code></p>
</div>
<div id="category_05">
    <p><strong>Route::group()</strong></p>
    <p>Nó sẽ nhóm có route có điểm chung lại với nhau.</p>
    <p>Ví dụ: </p>
    <p>Không sử dụng <code>Route::group()</code></p>
    <pre class="brush: php">
        Route::get('admin/category/list', function(){});
        Route::get('admin/category/insert', function(){});
        Route::get('admin/category/list', function(){});
    </pre>
    <p>Sử dụng <code>Route::group()</code></p>
    <pre class="brush: php">
        Route::group('prefix' => 'admin', function () {
            Route::get('category/list', function(){});
            Route::get('category/insert', function(){});
            Route::get('category/list', function(){});
        });
    </pre>
    <p>Sử dụng hay không sử dụng thì các route trên đều có mục đích sử dụng giống nhau. Việc nhóm như thế này sẽ giúp bạn dễ dàng trong việc quản lý code hơn.</p>
</div>
<div id="category_06">
    <p><strong>Route::match()</strong></p>
    <p>Ngoài các method POST và GET phổ biến trong laravel còn có thêm <code>PUT</code>, <code>PATCH</code>, <code>DELETE</code> vậy nên sinh ra Route này.</p>
    <p>Cú pháp: </p>
    <pre class="brush: php">
        Route::match($methods, $uri, $action);
        //trong đó $methods có thể là 1 mảng các method như ['GET', 'POST','PUT']
        //$uri và $action giống như các route kể trên
    </pre>
    <p>Ví du:</p>
    <pre class="brush: php">
        Route::match(['GET', 'POST','PUT'],'/demo',function(){
            return 'match route';
        });
    </pre>
    <p>Route này sẽ nhận request với 3 method là PUT, POST, GET</p>
</div>
<div id="category_07">
    <p><strong>Route::any()</strong></p>
    <p>Cú pháp và cách sử dụng của loại route này không khác Route::get() là mấy, chỉ có điều route này nhận request với tất cả các method như: POST, GET, DELETE, ...</p>
    <p>Cú Pháp</p>
    <pre class="brush: php">
        Route::any($uri, $action);
    </pre>
</div>
<p>Trong bài này mình đã giới thiệu về <code>Route</code> trong Laravel 5. Trong series bài viết tiếp theo mình sẽ hướng dẫn các bạn về <code>View</code> trong Laravel 5. Mời các bạn đón đọc. Bài viết trên là những hiểu biết của cá nhân mình nên không tránh phải sai sót, rất mong sự đóng góp ý kiến của các bạn để bài viết trở nên hữu ích hơn.</p>


