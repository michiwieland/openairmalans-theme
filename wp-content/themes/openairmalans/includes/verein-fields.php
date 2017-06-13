<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Verein')
  ->show_on_post_type('page')
  ->show_on_template('template-verein.php')
  ->add_fields(array(
      Field::make("text", 'contact', "Kontakt Allgemein")->set_required(true),
      Field::make('text', 'contact_band', "Band Kontakt")->set_required(true),
      Field::make("text", 'contact_volunteers', "Helfer Kontakt")->set_required(true)
  ));
