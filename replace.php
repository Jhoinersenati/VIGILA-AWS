<?php
$dirs = ['resources/views', 'app/Http/Controllers'];
foreach($dirs as $d) {
    $r = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d));
    foreach($r as $f) {
        if($f->isFile()) {
            $c = file_get_contents($f->getPathname());
            $n = str_replace(['Noticias','Noticia','noticias','noticia','Semanario Loretano'],['Cámaras','Cámara','cámaras','cámara','VIGILA Cloud Security'],$c);
            file_put_contents($f->getPathname(), $n);
        }
    }
}
echo "Done";
