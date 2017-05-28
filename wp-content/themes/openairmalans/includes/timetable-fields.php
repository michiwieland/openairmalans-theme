<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Timetable')
  ->show_on_post_type('timetable')
  ->add_fields(array(
      Field::make('text', 'artist_url', "Youtube Link")->set_required(true),
      Field::make("rich_text", "artist_description", "Beschreibung des Künstler")->set_required(true)
  ));
