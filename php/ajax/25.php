<p>Trong bài này sẽ trình bày ví dụ minh họa ứng dụng Live Search sử dụng kỹ thuật Ajax.</p>
<p>chuẩn bị tệp <code>links.xml</code>: <a href="http://laedaily.com/laravel-filemanager/photos/1/php/links.xml" target="_blank">Xem tại đây</a> </p>
<p>Trong ví dụ này sẽ tạo chức năng khi người dùng nhập nội dung tìm kiếm sẽ hiển thị ra gợi ý tìm kiếm</p>
<p>Tạo file <code>index.php</code> có mã như sau: </p>
<pre class="brush: js; html-script: true">
    &lt;html&gt;
    &lt;head&gt;
    &lt;script&gt;
        function showResult(str) {
            if (str.length==0) { 
            document.getElementById("livesearch").innerHTML="";
            document.getElementById("livesearch").style.border="0px";
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
              document.getElementById("livesearch").innerHTML=this.responseText;
              document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }
            }
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
        }
    &lt;/script&gt;
    &lt;/head&gt;
    &lt;body&gt;
    &lt;form&gt;
    &lt;input type=&quot;text&quot; size=&quot;30&quot; onkeyup=&quot;showResult(this.value)&quot;&gt;
    &lt;div id=&quot;livesearch&quot;&gt;&lt;/div&gt;
    &lt;/form&gt;
    &lt;/body&gt;
    &lt;/html&gt;
</pre>
<p><strong>Giải thích: </strong></p>
<ul>
    <li>Trước tiên, kiểm tra đầu vào có dữ liệu hay không (str.length == 0).</li>
    <p>Nếu trường đầu vào không phải là rỗng, hàm showResult () thực hiện các thao tác sau:</p>
    <ul>
        <li>Tạo một đối tượng XMLHttpRequest</li>
        <li>Sử dụng hàm onreadystatechange để lắng nghe các sự kiện từ máy chủ</li>
        <li>Gửi yêu cầu tới tệp PHP (livesearch.php) trên máy chủ</li>
        <li>Lưu ý rằng tham số q được thêm vào url (livesearch.php?q = " + str)</li>
        <li>Và biến str chứa nội dung của trường đầu vào</li>
    </ul>
</ul>
<p>Tệp PHP (livesearch.php) truy vấn đối với tệp tin livesearch.xml, tìm kiếm tiêu đề phù hợp với chuỗi tìm kiếm và trả về kết quả:</p>
<pre class="brush: php">
    $xmlDoc=new DOMDocument();
    $xmlDoc->load("http://laedaily.com/laravel-filemanager/photos/1/php/links.xml");

    $x=$xmlDoc->getElementsByTagName('link');

    //get the q parameter from URL
    $q=$_GET["q"];

    //lookup all links from the xml file if length of q>0
    if (strlen($q)>0) {
      $hint="";
      for($i=0; $i<($x->length); $i++) {
        $y=$x->item($i)->getElementsByTagName('title');
        $z=$x->item($i)->getElementsByTagName('url');
        if ($y->item(0)->nodeType==1) {
          //find a link matching the search text
          if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
            if ($hint==&quot;&quot;) {
              $hint=&quot;&lt;a href=&#39;&quot; .
              $z-&gt;item(0)-&gt;childNodes-&gt;item(0)-&gt;nodeValue .
              &quot;&#39; target=&#39;_blank&#39;&gt;&quot; .
              $y-&gt;item(0)-&gt;childNodes-&gt;item(0)-&gt;nodeValue . &quot;&lt;/a&gt;&quot;;
            } else {
              $hint=$hint . &quot;&lt;br /&gt;&lt;a href=&#39;&quot; .
              $z-&gt;item(0)-&gt;childNodes-&gt;item(0)-&gt;nodeValue .
              &quot;&#39; target=&#39;_blank&#39;&gt;&quot; .
              $y-&gt;item(0)-&gt;childNodes-&gt;item(0)-&gt;nodeValue . &quot;&lt;/a&gt;&quot;;
            }
          }
        }
      }
    }

    // Set output to "no suggestion" if no hint was found
    // or to the correct values
    if ($hint=="") {
      $response="no suggestion";
    } else {
      $response=$hint;
    }

    //output the response
    echo $response;
</pre>
<a href="demo/php/bai25/1" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>