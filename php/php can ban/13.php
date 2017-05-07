<p><strong>Mục Lục:</strong></p>
<div id="category_list">
    <ul>
        <li><a id = "category_01_link" href="#">Định nghĩa mảng trong PHP</a></li>
        <li><a id = "category_02_link" href="#">Mảng kết hợp trong PHP</a></li>
        <li><a id = "category_03_link" href="#">Phép lặp mảng trong PHP</a></li>
    </ul>
</div>
<div id="category_01">
    <p><strong>1. Định nghĩa mảng trong PHP</strong></p>
    <p>Một mảng là một biến đặc biệt, có thể chứa nhiều giá trị cùng một lúc.</p>
    <p>Có hai cách để tạo mảng:</p>
    <pre class="brush: php">
        $cars = array("Volvo", "BMW", "Toyota");

        // hoặc

        $cars[0] = "Volvo";
        $cars[1] = "BMW";
        $cars[2] = "Toyota";
    </pre>
    <p>Ví dụ sau tạo một mảng $cars, gán cho nó ba phần tử và sau đó in các giá trị trong mảng đó</p>
    <pre class="brush: php">
         $cars = array("Volvo", "BMW", "Toyota");
         echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
    </pre>
    <a href="demo/php/bai13/1" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
</div>
<div id="category_02">
    <p><strong>2. Mảng kết hợp trong PHP</strong></p>
    <p>Là các mảng được tạo index bằng các chuỗi</p>
    <p>Có hai cách để tạo một mảng kết hợp: </p>
    <pre class="brush: php">
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        // hoặc

        $age['Peter'] = "35";
        $age['Ben'] = "37";
        $age['Joe'] = "43";
    </pre>
</div>
<div id="category_03">
    <p><strong>3. Phép lặp mảng trong PHP</strong></p>
    <p>Để lặp và in tất cả các giá trị của mảng, ta có thể sử dụng vòng lặp <code>for</code></p>
    <p>Ví dụ sau sẽ lấy tất cả các giá trị của mảng $cars</p>
    <pre class="brush: php">
        $cars = array("Volvo", "BMW", "Toyota");
        $arrlength = count($cars); // trả về chiều dài (số phần tử) của một mảng

        for($x = 0; $x < $arrlength; $x++) {
            echo $cars[$x];
            echo "<br>";
        }
    </pre>
    <a href="demo/php/bai13/2" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
    <p>Để lặp và in tất cả các giá trị của mảng kết hợp, ta có sử dụng vòng lặp <code>foreach</code></p>
    <p>Ví dụ:</p>
    <pre class="brush: php">
        $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

        foreach($age as $x => $x_value) {
            echo "Key=" . $x . ", Value=" . $x_value;
            echo "<br>";
        }
    </pre>
    <a href="demo/php/bai13/3" class="button bar-item green hover-white hover-text-green" style="margin-bottom: 7px" target="_blank">Xem ví dụ »</a>
</div>