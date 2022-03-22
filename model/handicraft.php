<?php
class Handicraft
{
  function __construct()
  {
  }

  public $id;
  public $date;
  public $user;
  public $title;
  public $description;
  public $onsale;
  public $price;
  public $img;

  function set_id($id)
  {
    $this->id = $id;
  }

  function set_date($date)
  {
    $this->date = $date;
  }

  function set_user($user)
  {
    $this->user = $user;
  }

  function set_title($title)
  {
    $this->title = $title;
  }

  function set_description($description)
  {
    $this->description = $description;
  }

  function set_onsale($onsale)
  {
    $this->onsale = $onsale;
  }

  function set_price($price)
  {
    $this->price = $price;
  }

  function set_img($img)
  {
    $this->img = $img;
  }

  function get_id()
  {
    return $this->id;
  }

  function get_date()
  {
    return $this->date;
  }

  function get_user()
  {
    return $this->user;
  }

  function get_title()
  {
    return $this->title;
  }

  function get_description()
  {
    return $this->description;
  }

  function get_onsale()
  {
    return $this->onsale;
  }

  function get_price()
  {
    return $this->price;
  }

  function get_img()
  {
    return $this->img;
  }
}
?>