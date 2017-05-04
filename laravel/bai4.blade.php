<p>Bài trước mình đã giới thiệu về <code>Route</code> trong Laravel 5. Bài hôm nay chúng ta sẽ đi tổng quan về <code>View</code>
    và cách sử dụng <code>view</code> trong Laravel 5.</p>
<p><strong>Mục Lục:</strong></p>
<div id="category_list">
    <ul>
        <li><a id="category_01_link" href="#">Tạo file view và tạo sub-view trong Laravel</a></li>
        <li><a id="category_02_link" href="#">Gọi view trong Laravel</a></li>
        <li>
            <a id="category_03_link" href="#">Truyền dữ liệu qua view</a>
            <ul>
                <li><a id="category_04_link" href="#">Truyền ngay khi gọi view</a></li>
                <li><a id="category_05_link" href="#">Sử dụng with()</a></li>
                <li><a id="category_06_link" href="#">Sử dụng magic method</a></li>
                <li><a id="category_07_link" href="#">Sử dụng compact()</a></li>
            </ul>
        </li>
    </ul>
</div>
<div id="category_01">
    <p><strong>1. Tạo file view và tạo sub-view trong Laravel</strong></p>
    <p>Trong Laravel 5, tất cả c&aacute;c file view sẽ được đặt trong thư mục <code>resources/views</code> với đu&ocirc;i
        l&agrave; <code>.php</code> hoặc <code>.blade.php</code>(Khuy&ecirc;n d&ugrave;ng). V&iacute; dụ ta tạo file
        <code>demo1.php</code> v&agrave; <code>demo2.blade.php</code> th&igrave; ta sẽ được 2 view l&agrave; demo1 v&agrave;
        demo2</p>
    <p>Nội dung trong file view th&igrave; c&oacute; thể l&agrave; bất cứ g&igrave; như code javascript, jquery, html,
        css, php, ...</p>
    <p>Cấu tr&uacute;c: <code>t&ecirc;n view</code> - <code>phần mở rộng</code></p>
    <p><strong>Tạo sub-view trong Laravel</strong></p>
    <p>Kh&aacute; đơn gi&agrave;n, trong thư mục <code>resources/views</code> bạn tạo th&ecirc;m thư mục con trong đ&oacute;.
        V&iacute; dụ: tạo sub-view <code>category</code> ta tạo thư mục <code>cate</code> trong thư muc cha <code>resources/views</code>
        trong thư mục <code>cate</code> ta tạo tiếp 3 file <code>list.blade.php</code> <code>insert.blade.php</code>
        <code>update.blade.php</code></p>
    <p><code>Vậy l&agrave; đ&atilde; c&oacute; sub-view rồi.</code></p>
</div>
<div id="category_02">
    <p><strong>2. Gọi view trong Laravel</strong></p>
    <p><strong>C&uacute; ph&aacute;p: </strong></p>
    <pre class="brush: php">
        View::make($nameView, array(), array());
    </pre>
    <ul>
        <li>Tham số thứ nhất l&agrave; t&ecirc;n view. Nếu l&agrave; sub-view th&igrave; th&ecirc;m dấu &#39;.&#39;. V&iacute;
            dụ gọi <code>list.blade.php</code> như v&iacute; dụ mục 1 th&igrave; <code>$nameView</code> sẽ l&agrave;
            <code>cate.list</code>.
        </li>
        <li>Tham số thứ 2 l&agrave; mảng dữ liệu sẽ được truyền cho view.</li>
        <li>Tham số thứ 3 l&agrave; mảng dữ liệu sẽ được merge với $data bằng h&agrave;m array_merge.</li>
        <li><code>$nameView</code> l&agrave; tham số bắt buộc, c&ograve;n 2 tham số c&ograve;n lại t&ugrave;y chọn.</li>
    </ul>
</div>
<div id="category_03">
    <p><strong>3. Truyền dữ liệu qua view</strong></p>
    <p>Ở đ&acirc;y m&igrave;nh thống k&ecirc; c&aacute;c c&aacute;ch m&igrave;nh hay d&ugrave;ng:</p>
</div>
<div id="category_04">


    <p>V&iacute; dụ: Ta c&oacute; route như sau:</p>

    <pre class="brush: php">
        Route::get(&#39;demo&#39;, [&#39;as&#39; =&gt; &#39;demo&#39;, &#39;uses&#39; =&gt; &#39;DemoController@demo
        &#39;]);
    </pre>

    <p>Như ở b&agrave;i giới thiệu về <code>Route</code> m&igrave;nh đ&atilde; hướng dẫn th&igrave; &yacute; nghĩa của
        route n&agrave;y l&agrave; nhận request của method get của url ../demo chuyển về controller
        <code>DemoController</code> gọi function <code>demo</code> xử l&yacute;.</p>

    <p>Trong function <code>demo</code> ta sẽ truyền biến c&oacute; t&ecirc;n <code>name</code> qua view
        <code>demo</code>. Code <code>DemoController</code>:</p>

    <pre class="brush: php">
        namespace App\Http\Controllers;
        use Illuminate\Support\Facades\View;

        class DemoController extends Controller
        {
            public function demo()
            {
                return View::make(&#39;demo&#39;, [&#39;name&#39; =&gt; &#39;T&ocirc;i l&agrave; L&ecirc; Đức Trung&#39;]);
            }
        }
    </pre>

    <p>Khởi tạo view <code>demo</code>: tạo file <code>demo.blade.php</code> trong thư mục <code>resources/views</code>
        với nội dung:</p>

    <pre class="brush: php">
    <h3>{{ $name }}</h3>
    <p>Trời h&ocirc;m nay thật đẹp</p>
</pre>

    <p>Truy cập v&agrave;o URL: http://localhost/blog/public/demo. Bạn nhận được kết quả như sau:</p>
    <p><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai4/1.jpg"/></p>
</div>
<div id="category_05">
    <p><strong>Sử dụng <code>with()</code></strong></p>

    <p><strong>C&uacute; ph&aacute;p: </strong></p>

    <pre class="brush: php">
        View::make($view)-&gt;with($key,$value);
    </pre>

    <p>Trong đ&oacute;:</p>

    <ul>
        <li><code>$view</code>: t&ecirc;n view được gọi.</li>
        <li><code>$key</code> (string hoặc array): nếu l&agrave; chuỗi th&igrave; $key sẽ đ&oacute;ng vai tr&ograve; l&agrave;
            biến d&ugrave;ng để sử dụng trong view nếu l&agrave; mảng th&igrave; mỗi kh&oacute;a của mảng sẽ l&agrave; 1
            biến trong view.
        </li>
        <li><code>$view</code> (string): nếu $key l&agrave; chuỗi th&igrave; $value ch&iacute;nh l&agrave; gi&aacute;
            trị của $key trong view, ngược lại th&igrave; $value kh&ocirc;ng c&oacute; gi&aacute; trị trong view.
        </li>
    </ul>

    <p>V&iacute; dụ:</p>

    <p>Khi <code>$key</code> l&agrave; mảng:</p>

    <p>function <code>demo</code></p>

    <pre class="brush: php">
    return View::make(&#39;demo&#39;)-&gt;with([&#39;email&#39;=&gt;&#39;support@laedaily.com&#39;,&#39;name&#39;=&gt;&#39;admin&#39;]);
</pre>

    <p>gọi biến trong file <code>demo.blade.php</code></p>

    <pre class="brush: php">
    <p>{{ $email }}</p>
    <p>{{ $name }}</p>
    <p>Load lại trang ta được kết quả:</p>
</pre>

    <p><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai4/2.jpg"/></p>
    <p>Khi <code>$key</code> l&agrave; chuỗi:</p>
    <p>function <code>demo</code></p>
    <pre class="brush: php">
    return View::make(&#39;demo&#39;)-&gt;with([&#39;name&#39;=&gt;&#39;admin&#39;]);
</pre>
    <p>gọi biến trong file <code>demo.blade.php</code></p>
    <pre class="brush: php">
    <p>{{ $name }}</p>
</pre>

    <p>Load lại trang ta được kết quả:</p>

    <p><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/bai4/3.jpg"/></p>
</div>
<div id="category_06">
    <p><strong>Sử dụng <code>magic method</code></strong></p>

    <p><strong>C&uacute; ph&aacute;p: </strong></p>

    <pre class="brush: php">
    View::make($view)-&gt;withName($value);
</pre>

    <p>Trong đ&oacute;:</p>

    <ul>
        <li><code>$view</code>: t&ecirc;n view được gọi.</li>
        <li><code>withName</code>:
            <ul>
                <li><code>with</code> sẽ l&agrave; bắt buộc c&oacute; v&agrave; viết hường.</li>
                <li><code>Name</code> ở đ&acirc;y l&agrave; t&ecirc;n biến sẽ gọi trong view v&agrave; chữ c&aacute;i
                    đầu ti&ecirc;n viết in hoa v&agrave; c&aacute;c chữ c&aacute;i c&ograve;n lại viết thường.
                </li>
            </ul>
        </li>
        <li><code>$value</code>: gi&aacute; trị của biến của $name.</li>
    </ul>

    <p>V&iacute; dụ: sử dụng lại v&iacute; dụ <code>with()</code> với <code>$key</code> l&agrave; chuỗi ta thay code
        trong <code>DemoController</code> th&agrave;nh:</p>

    <pre class="brush: php">
    return View::make(&#39;demo&#39;)-&gt;withName(&#39;admin&#39;);
</pre>

    <p>Bạn cũng sẽ nhận được kết quả tương tự.</p>
</div>
<div id="category_07">
    <p><strong>Sử dụng <code>compact()</code></strong></p>

    <p><strong>C&uacute; ph&aacute;p: </strong></p>

    <pre class="brush: php">
         return View::make($view, compact($key));
    </pre>

    <p>Trong đ&oacute;:</p>

    <ul>
        <li><code>$view</code> t&ecirc;n view được gọi.</li>
        <li><code>$key</code> t&ecirc;n biến.</li>
    </ul>

    <p>V&iacute; dụ:</p>

    <p>function <code>demo</code></p>

    <pre class="brush: php">
        $name = &#39;Hello Admin&#39;;
        return View::make(&#39;demo&#39;, compact(&#39;name&#39;));
    </pre>

    <p>gọi biến trong file <code>demo.blade.php</code></p>

    <pre class="brush: php">
    <p>{{ $name }}</p>
</pre>

    <p>Bạn cũng sẽ nhận được kết quả tương tự.</p>
</div>
<p>Trong b&agrave;i n&agrave;y m&igrave;nh đ&atilde; giới thiệu về <code>View</code> trong Laravel 5. Trong series b&agrave;i viết tiếp theo m&igrave;nh sẽ hướng dẫn c&aacute;c bạn về <code>Blade Template Engine</code> trong Laravel 5. Từ b&agrave;i sau trở đi m&igrave;nh sẽ hướng dẫn theo dự &aacute;n <code>website tin tức</code> lu&ocirc;n cho c&aacute;c bạn dễ nắm bắt. Mời c&aacute;c bạn đ&oacute;n đọc. B&agrave;i viết tr&ecirc;n l&agrave; những hiểu biết của c&aacute; nh&acirc;n m&igrave;nh n&ecirc;n kh&ocirc;ng tr&aacute;nh phải sai s&oacute;t, rất mong sự đ&oacute;ng g&oacute;p &yacute; kiến của c&aacute;c bạn để b&agrave;i viết trở n&ecirc;n hữu &iacute;ch hơn.</p>




