<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Sponsors')
  ->show_on_post_type('page')
  ->show_on_template('template-sponsors.php')
  ->add_fields(array(
    Field::make('complex', 'crb_presenter')
      ->add_fields('Presenter', array(
        Field::make("image", "crb_presenter_logo", "Logo des Presenter")->set_required(true),
        Field::make('text', 'crb_presenter_name', "Name des Presenter")->set_required(true),
        Field::make('text', 'crb_presenter_url', "Homepage des Presenter")
      )),
    Field::make('complex', 'crb_main_sponsors')
        ->set_layout('tabbed-vertical')
        ->add_fields('Hauptsponsor', array(
          Field::make("image", "crb_main_sponsors_logo", "Logo des Hauptsponsors")->set_required(true),
          Field::make('text', 'crb_main_sponsors_name', "Name des Hauptsponsors")->set_required(true),
          Field::make('text', 'crb_main_sponsors_url', "Homepage des Hauptsponsors")
        )),
    Field::make('complex', 'crb_media_partner')
        ->set_layout('tabbed-vertical')
        ->add_fields('Hauptsponsor', array(
          Field::make("image", "crb_media_partner_logo", "Logo des Medienpartner")->set_required(true),
          Field::make('text', 'crb_media_partner_name', "Name des Medienpartner")->set_required(true),
          Field::make('text', 'crb_media_partner_url', "Homepage des Medienpartner")
        )),
    Field::make('complex', 'crb_sponsors')
      ->set_layout('tabbed-vertical')
      ->add_fields('Sponsoren', array(
        Field::make("image", "crb_sponsors_logo", "Logo des Sponsors")->set_required(true),
        Field::make('text', 'crb_sponsors_name', "Name des Sponsors")->set_required(true),
        Field::make('text', 'crb_sponsors_url', "Homepage des Sponsors")
      ))
  ));
