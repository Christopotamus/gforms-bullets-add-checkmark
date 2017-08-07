<?php
/**
 * @package GravityForms-Checkbox-Plugin
 * @version 1.6
 */
/*
Plugin Name: GravityForms Bullet to checkbox notifications
Plugin URI: http://mitec.net
Description: This plugin converts option bullets in gravityforms notifications to checkmarks.
Author: Christopher Budd & Brian Randomski
Version: 1.0
Author URI: http://mitec.net/
*/

// This changes all bullets to checkmarks
function convertBulletsHTML($email, $message_format) {
  if( $message_format == 'html' ) {
    $email["message"] = preg_replace("/<\/li>/m", " ✔ </li>",$email["message"]);
  }
  return $email;
}

// This changes all bullets to checkmarks
function convertBulletsPDF($html, $form, $entry, $settings, $Helper_PDF) {
  /* Initialise like this */

  $html = preg_replace("/<\/li>/m", " ✔ </li>",$html);

  return $html;
}
// Now we set that function up to execute when the admin_notices action is called
add_filter( 'gform_pre_send_email', 'convertBulletsHTML', 10, 2);
add_filter( 'gfpdf_pdf_html_output', 'convertBulletsPDF', 10, 5);

?>
