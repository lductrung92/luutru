<p><strong>Hàm date được sử dụng để định dạng ngày và thời gian.</strong></p>
<p><strong>Cú pháp: </strong></p>
<pre class="brush: php">
    date(format,timestamp)
</pre>
<p>Tham số <code>format</code> bắt buộc của hàm date () xác định các định dạng ngày tháng (hoặc thời gian).</p>
<p><strong>Ví dụ: </strong> ta sẽ lưu trữ bảng sau trong mảng 2 chiều</p>
<p><strong>Dưới đây là một số ký tự thường được sử dụng cho ngày tháng:</strong></p>
<ul>
    <li><strong>D</strong> - Thể hiện ngày trong tháng (01 đến 31)</li>
    <li><strong>M</strong> - Thể hiện một tháng (01 đến 12)</li>
    <li><strong>Y</strong> - Thể hiện một năm (bằng bốn chữ số)</li>
    <li><strong>L</strong> - Thể hiện ngày trong tuần</li>
</ul>
<p>Ví dụ dưới đây định dạng ngày hôm nay theo ba cách khác nhau:</p>
<pre class="brush :php">
    echo "Hôm nay là " . date("Y/m/d") . "<br>";
    echo "Hôm nay là " . date("Y.m.d") . "<br>";
    echo "Hôm nay là " . date("Y-m-d") . "<br>";
    echo "Hôm nay là " . date("l");
</pre>
<a href="demo/php/bai15/1" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
<p><strong>Dưới đây là một số ký tự thường được sử dụng cho thời gian:</strong></p>
<ul>
    <li><strong>H</strong> - Định dạng giờ (01 đến 12)</li>
    <li><strong>I</strong> - Định dạng phút (00 đến 59)</li>
    <li><strong>S</strong> - Định dạng giây (00 đến 59)</li>
    <li><strong>A</strong> - Buổi trong ngày (am hoặc pm)</li>
</ul>
<p>Ví dụ dưới xác định thời gian hiện tại:</p>
<pre class="brush :php">
    echo "Bây giờ là " . date("h:i:sa");
</pre>
<a href="demo/php/bai15/2" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
<p><strong>Các cách khởi tạo Date trong PHP</strong></p>
<p><code>mktime ()</code></p>
<p><strong>Cú pháp: </strong></p>
<pre class="brush: php">
    mktime(hour,minute,second,month,day,year)
</pre>
<p><strong>Mktime</strong> trả về dấu thời gian Unix cho một ngày. </p>
<pre class="brush :php">
    $d=mktime(11, 14, 54, 8, 12, 2014);
    echo "Created date is " . date("Y-m-d h:i:sa", $d);
</pre>
<a href="demo/php/bai15/3" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
<p><strong>Tạo một Date Từ một chuỗi</strong></p>
<p><strong>Cú pháp: </strong></p>
<pre class="brush: php">
    strtotime(time,now)
</pre>
<p>Ví dụ dưới đây tạo ra một ngày tháng và thời gian sử dụng <code>strtotime</code></p>
<pre class="brush :php">
    $d=strtotime("10:30pm April 15 2014");
    echo "Created date is " . date("Y-m-d h:i:sa", $d);
</pre>
<a href="demo/php/bai15/4" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
