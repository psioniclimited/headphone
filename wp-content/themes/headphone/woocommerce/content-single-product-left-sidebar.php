<?php

$single_product_feature_logo         =   get_field('single_product_feature_logo');
$feature_box_1         =   get_field('feature_box_1');
$feature_box_2         =   get_field('feature_box_2');
$feature_box_3         =   get_field('feature_box_3');
$feature_box_4         =   get_field('feature_box_4');
?>
<?php if(!empty($single_product_feature_logo)) : ?>
    <a href="#" title="Brand Logo" class="d-none d-md-block"><img class="image_fade" src="<?php echo $single_product_feature_logo['url']; ?>" alt="Brand Logo"></a>
<?php endif;?>


<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

<?php

echo $feature_box_1;
echo $feature_box_2;
echo $feature_box_3;
echo $feature_box_4;

?>
