<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 *---------------------------------------------------------------
 * LIBRARY
 *---------------------------------------------------------------
 * 
 * The Library is used to automatically include all classes that 
 * going to be used in the application. 
 * It works like Auto-load from CodeIgniter, but we can choose when
 * the class going to be loaded.
 *
 */

class Library {
   
   public function __construct()
   {
      require_once 'Administrator.php';
      require_once 'Album.php';
      require_once 'Band.php';
      require_once 'Event.php';
      require_once 'Fa.php';
      require_once 'Gig.php';
      require_once 'Instrument.php';
      require_once 'Manager.php';
      require_once 'Member.php';
      require_once 'Music_Genre.php';
      require_once 'Musician.php';
      require_once 'Post.php';
      require_once 'Show.php';
      require_once 'Song.php';
      require_once 'Studio.php';
      require_once 'Tour.php';
      require_once 'Venue.php';
      //require_once '.php';
   }
}

/* End of file Library.php */
/* Location: ./application/libraries/Library.php */