<?php 
    if ($file = $page->contentfile()->toFile()) {
        $file->show();
    } 
?>
