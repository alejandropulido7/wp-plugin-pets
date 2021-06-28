<?php

$type_pet = $_POST['typePet'];
$weight_pet = $_POST['weightPet'];
$age_pet = $_POST['agePet'];


$arguments = array(
    'post_type' => 'mascotas',
    'posts_per_page' => 5,
    'type-pet' => $type_pet,
    'weight-pet' => $weight_pet,
    'age-pet' => $age_pet,
    'paged' => get_query_var('paged'),
    'orderby' => 'date',
    'order' => 'DESC'
);
$postPets = new WP_Query($arguments);


?>
<div class="row calculate-food">
    <div class="col-12">
        <p><?php echo "Tu ".$type_pet." con el peso: ".$weight_pet."kg a la edad: ".$age_pet." debe comer:";?></p>
        <?php 
            if($type_pet == "perro" && $weight_pet == "20-30" && $age_pet == "2-anos"){
                echo "<p class='res-cal'>150 gramos por día</p>";
            }        
        ?>
        <br>
        <br>
        <p class="guess-cal">Echa un vistazo a las sugerencias</p>
    </div>
</div>


<div class="container-pets">
    <?php if ($postPets->have_posts()) : ?>
        <?php while ($postPets->have_posts()) : $postPets->the_post(); ?>
            <div class="d-flex flex-nowrap bg-white p-2 my-2 rounded h-auto">
                <div class="w-50 d-flex align-items-center"><?php the_post_thumbnail('resizeImages'); ?></div>
                <div class="w-50 px-3">
                    <h3 class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <p class="text-md-left"><?php the_excerpt(); ?></p>
                    <a class="btn btn-link" id="r-more" href="<?php the_permalink(); ?>">Leer más..</a>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); ?>

    <?php else : ?>
        <div class="d-flex flex-nowrap p-2 my-2 rounded h-auto">
            <span class="text-center p-5">No se encontraron sugerencias</span>
        </div>
    <?php endif ?>
</div>