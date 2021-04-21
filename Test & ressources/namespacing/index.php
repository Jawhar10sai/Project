<?php namespace fub;
  include 'classes/cats.class.php';
  include 'classes/dogs.class.php';
  include 'classes/animate.class.php';
  use foo as feline;
  use bar as canine;
  use animate;
  echo feline\Cat::says(), "<br />\n";
  echo canine\Dog::says(), "<br />\n";
  echo animate\Animal::breathes(), "<br />\n";
  /*
Note that
felineCat::says()
should be
\feline\Cat::says()
(and similar for the others)
but this comment form deletes the backslash (why???)

The 'use' keyword also applies to closure constructs:

 function getTotal($products_costs, $tax)
    {
        $total = 0.00;

        $callback =
            function ($pricePerItem) use ($tax, &$total)
            {

                $total += $pricePerItem * ($tax + 1.0);
            };

        array_walk($products_costs, $callback);
        return round($total, 2);
    }*/
?>
