<?php
/*
$string ="test                        ";
$text ="test test                 ";
$text2 ="à relivrer";

if ($string=="test") {
  echo "ok 1";
}else {
  echo "not ok 1";
}
$string = str_replace(' ', '', $string);
if ($string=="test") {
  echo "ok 2";
}else {
  echo "not ok 2";
}
echo $string.'<br>';
echo trim($string).'<br>';
echo trim($text).'<br>';
echo trim($text2).'<br>';
exit;
*/

require_once "adheads.php";
$dir    = '.';
$files1 = scandir($dir,1);
 ?>
<div class="container-fluid">
  <div class="row">
    <?php foreach ($files1 as $file): ?>
      <?php
      if ($file =='.' || $file=='..')
      continue;
       ?>
        <?php if (is_dir($file)): ?>
            <a href="<?=$file;?>" class="col-xs-12 col-md-3 text-center h3">
              <i class="fas fa-folder-open fa-5x"></i>
              <br><?=$file;?>
            </a>
        <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
