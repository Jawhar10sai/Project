<?php
header("Content-type:application/pdf");
header("Content-Disposition:attachment;filename=novilles.pdf");
readfile("assets/vildes.pdf");
 ?>
