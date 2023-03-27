<?php
    class Artist {
       private int $id;
       private string $name;

       function __construct(int $id, string $name) {
         $this->id = $id;
         $this->name = $name;
       }

       /**
        * Get the value of id
        */ 
       public function getId()
       {
              return $this->id;
       }

       /**
        * Get the value of name
        */ 
       public function getName()
       {
              return $this->name;
       }
    }