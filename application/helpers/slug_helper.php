<?php 
if ( ! function_exists('slugify'))
{
/**
 * slugify
 *
 * @param  mixed $text
 * @return void
 */
function slugify($text) {
    // Convert text to lowercase
    $text = strtolower($text);
  
    // Replace non-alphanumeric characters with hyphen (-)
    $text = preg_replace('/\W+/', '-', $text);
  
    // Remove leading and trailing hyphens
    $text = trim($text, '-');
  
    // Remove duplicate hyphens
    $text = preg_replace('/-+/', '-', $text);
  
    // Handle empty string cases (optional)
    if (empty($text)) {
      return 'n-a'; // or any default slug
    }
  
    return $text;
  }
}