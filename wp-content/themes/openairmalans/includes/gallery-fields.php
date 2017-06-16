<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Impressionen')
    ->show_on_post_type('impressions')
    ->add_fields(array(
        Field::make('complex', 'Bilder')->add_fields(array(
            Field::make('image', 'image')
        )),
    ));

/*
// Add gallery field (not working)
Container::make('post_meta', 'Galerie')
  ->show_on_post_type('impressions')
  ->add_fields(array(
      Field::make("image", 'impression', "Galerie")->set_required(true)
  ));
  */