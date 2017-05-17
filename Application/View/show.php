<?php
include 'header.php';
if ($this->value['location']->isStatusOk() && !empty($this->value['location']->getName())) {
    echo 'Stacja ISS aktualnie znajduje się nad: ' . $this->value['location']->getName();
} else {
    echo "Nie można wskazać najbliższego miejsca adresowego według geocode. <br />"
        . "Stacja ISS znajduje się nad współrzędnymi: " . $this->value['location']->getLatlng() 
        . "<br /> - odpowiednio szerokości i długości geograficznej";
}
include 'footer.php';
?>