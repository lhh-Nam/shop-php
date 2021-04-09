<?php
    ob_start();
    include('header.php');
?>

<?php
    /* Include banner area */ 
    include('./Template/_banner-area.php');
    /* Include banner area */

    /* Include Top sale */ 
    include('./Template/_top-sale.php');
    /* Include Top sale */

    /* Include Special price */ 
    include('./Template/_special-price.php');
    /* Include Special price */

    /* Include Banner Ads */ 
    include('./Template/_banner_adds.php');
    /* Include Banner Ads */

    /* Include New Phones */ 
    include('./Template/_new-phones.php');
    /* Include New Phones */

    /* Include Blogs  */ 
    include('./Template/_blogs.php');
    /* Include Blogs  */
    
?>

<?php
    include('footer.php');
?>