<?php 
$active_index = 3;
include("includes/header.php");
?>
<div class="container">
<?php
$directory = './blogs';
$scanned_directory = array_diff(scandir($directory), array('..', '.'));
foreach ($scanned_directory as $key => $value) {
    echo "<div class='auto_card' data-url='/blogs/$value'>KEY: $key VALUE: $value</div>";
    
}
?>
</div>
<?php
include("includes/footer.php");
?>