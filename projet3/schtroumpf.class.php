<?php
class Schtroumpf {
  public $color = "Bleu";
  private $sexualOrientation = "Heureux";


//new Schtroumpf("métier", "passion")
  public function __construct($metier) {
    $this->metier = $metier;
    //echo "Moi Schtroumpf " . $metier . "<br>";
  }
  public function __clone(){
    $this->clone = true;
  }
  public function __destruct() {
    echo "Moi Schtroumpf " . $this->metier . "<br>";
    //echo "Je me meurt ...";
    //echo "Schtroumpfette t'es bonne, Wesh <br>";
  }

  public function sayMySexualOrientation() {
    return $this->sexualOrientation;
  }
  private function repare($bonnet) {

  }
}
