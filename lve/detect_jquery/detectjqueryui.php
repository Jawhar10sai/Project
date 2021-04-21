<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Detection of jQuery UI</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script src="http://code.jquery.com/jquery-latest.min.js" ></script>
<script src="<?php echo $_GET["src"]; ?>" ></script>

</head>
<body>
<div id="result">0</div>
<script type="text/javascript">
if(window.jQuery.ui)
document.getElementById("result").innerHTML = 1;
</script>
</body>
</html>