<?php

$problema = ProblemaData::getById($_GET["id"]);


/* 
POSIBLEMENTE QUITE ESTA COSA

$products = ProductData::getAllByCategoryId($category->id);
foreach ($products as $product) {
	$product->del_category();
}
*/

$problema->del();
Core::redir("./index.php?view=tipoproblema");


?>