<?php
include 'header.php';
if ($this->value['location']->getStatus() == Application\Iss\IssLocation::STATUS_OK && !empty($this->value['location']->getName())) {
    echo 'Stacja ISS aktualnie znajduje się nad: ' . $this->value['location']->getName();
} else {
    echo "Nie można wskazać najbliższego miejsca adresowego według geocode. <br />"
        . "Stacja ISS znajduje się nad współrzędnymi: " . $this->value['location']->getLatlng() 
        . "<br /> - odpowiednio szerokości i długości geograficznej";
}
include 'footer.php';
?>