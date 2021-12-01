<?php
    $num = 1;
    for ($i = 0; $i < 9; $i++)
    {
        for ($j = 0; $j <= $i; $j++)
        {
            echo $num." ";
        }
        $num = $num + 1;
        echo '<br>';
    }

echo '<br>';

for ($i = 1; $i < 10; $i++) {
    echo $i . '<br>';
    for ($i++ ; $i < 10;) {
        echo $i . $i . '<br>';
        for ($i++; $i < 10;) {
            echo $i . $i . $i . '<br>';
            for ($i++; $i < 10;) {
                echo $i . $i . $i . $i . '<br>';
                  for ($i++; $i < 10;) {
                     echo $i . $i . $i . $i . $i .'<br>';
                      for ($i++; $i < 10;) {
                          echo $i . $i . $i . $i . $i . $i .'<br>';
                          for ($i++; $i < 10;) {
                              echo $i . $i . $i . $i . $i . $i . $i .'<br>';
                              for ($i++; $i < 10;) {
                                  echo $i . $i . $i . $i . $i . $i . $i . $i .'<br>';
                                  for ($i++; $i < 10;) {
                                      echo $i . $i . $i . $i . $i . $i . $i . $i . $i .'<br>';
                                      for ($i++; $i < 10;){
                                          break;
                                      }
                                  }
                              }
                          }
                      }
                  }
            }
        }
    }
}
