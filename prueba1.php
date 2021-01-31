<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#div-btn1').on('click', function() {
        $("#central").load('inc/presentation.php');
        
        return false;
    });
    ...
});
</script>
<body>
  <a class="nav-link" id="div-btn1" href="#">Presentation</a>

</body>
</html>