<?php
//Modal
echo '<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">';
echo '<div class = "modal-dialog">';
echo '<div class = "modal-content">';

echo '<div class = "modal-header">';
echo '<button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">';
echo '&times;';
echo '</button>';

echo '<h4 class = "modal-title" id = "myModalLabel">';
echo 'Student Borrow Card';
echo '</h4>';
echo '</div>';

echo '<div class = "modal-body">';
echo '<div class="panel-headings print-container">';
echo '<img src="assets/img/schoolid.jpg" class=" picture"/>';

echo '<div class="name">';
echo '<div class="lr">';
echo 'Name: ';
if (isset($_POST['fullname'])) {
    echo $_POST['fullname'];
}
echo '<br>';
echo 'LRN: ';
if (isset($_POST['lrns'])) {
    echo $_POST['lrns'];
}
echo '</div>';
echo '<div id="qrcode" class="qrcode" style="width:100%; height:100%;"></div>';
echo '<input type="hidden" id="name_display" value="';
if (isset($_POST['fullname'])) {
    echo $_POST['fullname'];
}
echo '" />';
echo '</div>';
echo '</div>';
echo '</div>';

echo '<div class = "modal-footer">';
echo '<button type = "button" class = "btn btn-default" data-dismiss = "modal">';
echo 'Close';
echo '</button>';

echo '<button type = "button" class = "btn btn-primary">';
echo 'Print';
echo '</button>';
echo '</div>';

echo '</div><!-- /.modal-content -->';
echo '</div><!-- /.modal-dialog -->';
echo '</div><!-- /.modal -->';
?>


