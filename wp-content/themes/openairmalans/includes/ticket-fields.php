<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;

Container::make('post_meta', 'Tickets')
  ->show_on_post_type('page')
  ->show_on_template('template-tickets.php')
  ->add_fields(array(
    Field::make('text', 'crb_ticket_info', "Ticket Infotext")->set_required(true),
    Field::make('complex', 'crb_tickets')
      ->set_layout('tabbed-vertical')
      ->add_fields(array(
        Field::make('text', 'ticket_day', "Tag")->set_required(true),
        Field::make('text', 'ticket_price', "Preis")->set_required(true),
        Field::make('text', 'ticket_link', "Link zum Shop")->set_required(true),
      ))
  ));
