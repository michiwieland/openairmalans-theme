<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Timetable')
  ->show_on_post_type('page')
  ->show_on_template('template-timetables.php')
  ->add_fields(array(
      Field::make('complex', 'crb_timetable_days')->add_fields(array(
          Field::make('text', 'timetable_day', "Tag")->set_required(true),
          Field::make('complex', 'crb_timetable_entries')
            ->set_layout('tabbed-vertical')
            ->add_fields(array(
              Field::make('text', 'timetable_entry_from', "Von")->set_required(true),
              Field::make('text', 'timetable_entry_to', "Bis")->set_required(true),
              Field::make('text', 'timetable_entry_act', "Act")->set_required(true),
          ))
      ))
  ));

?>
