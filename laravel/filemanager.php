<p>Hướng dẫn cài đặt laravel filemanager và tích hợp  laravel-filemanager vào ckeditor.</p>
<p><strong>1. Yêu cầu hệ thống:</strong></p>
<ul>
    <li>Phiên bản php >= 5.4</li>
    <li>Laravel 5</li>
    <li>Cài đặt <code>intervention/image</code></li>
</ul>
<p><strong>2. Cài đặt:</strong></p>
<p><strong>Cài đặt package: Sử dụng composer</strong></p>
<pre class="brush: php">
    $ composer require unisharp/laravel-filemanager
</pre>
<p><strong>Cấu hình file <code>config/app.php</code></strong></p>
<ul>
    <li>Thêm vào <code>providers</code> dòng:
        <pre class="brush: php">
             Unisharp\Laravelfilemanager\LaravelFilemanagerServiceProvider::class,
             Intervention\Image\ImageServiceProvider::class,
        </pre>
    </li>
    <li>Thêm vào <code>aliases</code> dòng:
        <pre class="brush: php">
             'Image' => Intervention\Image\Facades\Image::class,
        </pre>
    </li>
</ul>
<p><strong>Copy thư mục, file cần thiết ra thư mục public và config</strong></p>
<pre class="brush: php">
     php artisan vendor:publish --tag=lfm_config
     php artisan vendor:publish --tag=lfm_public
</pre>
<p><strong>Sử dụng: </strong></p>
<p>Chèn đoạn code này vào view bạn muốn hiển thị: </p>
<pre class="brush: php">
	<textarea name="textarea" ></textarea>
    <!-- CKEditor init -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
    <script>
        $('textarea[name=textarea]').ckeditor({
            height: 100,
            filebrowserImageBrowseUrl: route_prefix + '?type=Images',
            filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: route_prefix + '?type=Files',
            filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
        });
    </script>

</pre>
<p><strong>Cấu hình file <code>config/lfm.php</code></strong></p>
<pre class="brush: php">
    /*
|--------------------------------------------------------------------------
| Routing
|--------------------------------------------------------------------------
*/

// Include to pre-defined routes from package or not. Middlewares
'use_package_routes' => true,

// Middlewares which should be applied to all package routes.
// For laravel 5.1 and before, remove 'web' from the array.
'middlewares' => ['web','auth'],

// The url to this package. Change it if necessary.
'prefix' => 'laravel-filemanager',

/*
|--------------------------------------------------------------------------
| Multi-User Mode
|--------------------------------------------------------------------------
*/

// If true, private folders will be created for each signed-in user.
'allow_multi_user' => true,

// The database column to identify a user. Make sure the value is unique.
// Ex: When set to 'id', the private folder of user will be named as the user id.
'user_field' => 'id',

/*
|--------------------------------------------------------------------------
| Working Directory
|--------------------------------------------------------------------------
*/

// Which folder to store files in project, fill in 'public', 'resources', 'storage' and so on.
// You should create routes to serve images if it is not set to public.
'base_directory' => 'public',

'images_folder_name' => 'photos',
'files_folder_name'  => 'files',

'shared_folder_name' => 'shares',
'thumb_folder_name'  => 'thumbs',

/*
|--------------------------------------------------------------------------
| Startup Views
|--------------------------------------------------------------------------
*/

// The default display type for items.
// Supported: "grid", "list"
'images_startup_view' => 'grid',
'files_startup_view' => 'list',

/*
|--------------------------------------------------------------------------
| Upload / Validation
|--------------------------------------------------------------------------
*/

// If true, the uploaded file will be renamed to uniqid() + file extension.
'rename_file' => false,

// If rename_file set to false and this set to true, then non-alphanumeric characters in filename will be replaced.
'alphanumeric_filename' => true,

// If true, non-alphanumeric folder name will be rejected.
'alphanumeric_directory' => false,

'max_image_size' => 500,
'max_file_size' => 1000,

// available since v1.3.0
'valid_image_mimetypes' => [
    'image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/gif'
],

// available since v1.3.0
// only when '/laravel-filemanager?type=Files'
'valid_file_mimetypes' => [
    'image/jpeg',
    'image/pjpeg',
    'image/png',
    'image/gif',
    'application/pdf',
    'text/plain',
],

/*
|--------------------------------------------------------------------------
| File Extension Information
|--------------------------------------------------------------------------
*/

'file_type_array' => [
    'pdf'  => 'Adobe Acrobat',
    'doc'  => 'Microsoft Word',
    'docx' => 'Microsoft Word',
    'xls'  => 'Microsoft Excel',
    'xlsx' => 'Microsoft Excel',
    'zip'  => 'Archive',
    'gif'  => 'GIF Image',
    'jpg'  => 'JPEG Image',
    'jpeg' => 'JPEG Image',
    'png'  => 'PNG Image',
    'ppt'  => 'Microsoft PowerPoint',
    'pptx' => 'Microsoft PowerPoint',
],

'file_icon_array' => [
    'pdf'  => 'fa-file-pdf-o',
    'doc'  => 'fa-file-word-o',
    'docx' => 'fa-file-word-o',
    'xls'  => 'fa-file-excel-o',
    'xlsx' => 'fa-file-excel-o',
    'zip'  => 'fa-file-archive-o',
    'gif'  => 'fa-file-image-o',
    'jpg'  => 'fa-file-image-o',
    'jpeg' => 'fa-file-image-o',
    'png'  => 'fa-file-image-o',
    'ppt'  => 'fa-file-powerpoint-o',
    'pptx' => 'fa-file-powerpoint-o',
],
</pre>
<p><i>Lưu ý: <code>middlewares</code> và <code>user_field</code> cấu hình theo mục đích sử dụng của bạn nhé.</i></p>
<p><strong>Kết quả: </strong></p>
<p style="text-align: center"><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/baimoi/filemanager/filemanager_1.jpg"></p>
<p style="text-align: center"><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/baimoi/filemanager/filemanager_2.jpg"></p>
<p style="text-align: center"><img src="http://laedaily.com/laravel-filemanager/photos/1/laravel/baimoi/filemanager/filemanager_3.jpg"></p>