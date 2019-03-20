<?php
    class Books {
        /* Member variables */
        var $price;
        var $title;

        /* Member functions */
        function setPrice($par){
            $this->price = $par;
        }

        function getPrice(){
            echo $this->price ."<br/>";
        }

        function setTitle($par){
            $this->title = $par;
        }

        function getTitle(){
            echo $this->title ." <br/>";
        }
    }


    $book = new Books();

    $book->setPrice(2300.00);
    $book->setTitle("Angels");
    print $book->getTitle()." for ".$book->getPrice()." \n";
    var_dump(class_exists("SOAPClient"));
?>