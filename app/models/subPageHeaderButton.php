<?php
class subPageHeaderButton
{
    private String $name;
    private String $link;

    private bool $activeState;

    public function __construct( String $name, String $link)
    {
        $this->name = $name;
        $this->link = $link;
        $this->activeState = false;
    }

    public function getName() : String
    {
        return $this->name;
    }

    public function getLink() : String
    {
        return $this->link;
    }

    public function getActiveState() : bool
    {
        return $this->activeState;
    }

    public function setActiveState(bool $isActive) : void
    {
        $this->activeState = $isActive;
    }
}

?>