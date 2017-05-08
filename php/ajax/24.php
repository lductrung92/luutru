<p>Trong bài này sẽ trình bày ví dụ minh họa cách tương tác với một tệp XML sử dụng kỹ thuật Ajax.</p>
<p>chuẩn bị tệp <code>cd_catalog.xml</code>: <a href="http://laedaily.com/laravel-filemanager/photos/1/php/cd_catalog.xml" target="_blank">Xem tại đây</a> </p>
<p>Trong ví dụ này sẽ tạo chức năng khi người dùng select một đĩa CD sẽ hiện ra bảng thông tin CD đó</p>
<p>Tạo file <code>index.php</code> có mã như sau: </p>
<pre class="brush: js; html-script: true">
    &lt;html&gt;
    &lt;head&gt;
    &lt;script&gt;
        function showCD(str) {
            if (str=="") {
            document.getElementById("txtHint").innerHTML="";
            return;
            }
            if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
              document.getElementById("txtHint").innerHTML=this.responseText;
            }
            }
            xmlhttp.open("GET","getcd.php?q="+str,true);
            xmlhttp.send();
        }
    &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;form&gt;
    Select a CD:
    &lt;select name=&quot;cds&quot; onchange=&quot;showCD(this.value)&quot;&gt;
    &lt;option value=&quot;&quot;&gt;Select a CD:&lt;/option&gt;
    &lt;option value=&quot;Bob Dylan&quot;&gt;Bob Dylan&lt;/option&gt;
    &lt;option value=&quot;Bee Gees&quot;&gt;Bee Gees&lt;/option&gt;
    &lt;option value=&quot;Cat Stevens&quot;&gt;Cat Stevens&lt;/option&gt;
    &lt;/select&gt;
    &lt;/form&gt;
    &lt;div id=&quot;txtHint&quot;&gt;&lt;b&gt;CD info will be listed here...&lt;/b&gt;&lt;/div&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
<p><strong>Giải thích: </strong></p>
<ul>
    <li>Kiểm tra nếu một đĩa CD được chọn</li>
    <li>Tạo một đối tượng XMLHttpRequest</li>
    <li>Sử dụng hàm onreadystatechange để lắng nghe các sự kiện từ máy chủ</li>
    <li>Gửi yêu cầu tới tệp PHP (getcd.php) trên máy chủ</li>
    <li>Lưu ý rằng tham số q được thêm vào url (getcd.php?q = " + str)</li>
    <li>Và biến str chứa nội dung của trường đầu vào</li>
</ul>
<p>Tệp PHP (getuser.php) truy vấn đối với tệp tin cd_catalog.xml và trả về kết quả dưới dạng HTML:</p>
<pre class="brush: php">
    $q=$_GET["q"];

    $xmlDoc = new DOMDocument();
    $xmlDoc->load("http://laedaily.com/laravel-filemanager/photos/1/php/cd_catalog.xml");
    
    $x=$xmlDoc->getElementsByTagName('ARTIST');
    
    for ($i=0; $i<=$x->length-1; $i++) {
      //Process only element nodes
      if ($x->item($i)->nodeType==1) {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
          $y=($x->item($i)->parentNode);
        }
      }
    }
    
    $cd=($y->childNodes);
    
    for ($i=0;$i<$cd->length;$i++) { 
      //Process only element nodes
      if ($cd->item($i)->nodeType==1) {
        echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
        echo($cd->item($i)->childNodes->item(0)->nodeValue);
        echo("<br>");
      }
    }
</pre>
<a href="demo/php/bai24/1" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>