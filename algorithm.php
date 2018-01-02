<?php
// Формула выглядит n!/((n-m)!*m!) где  n- количество клеток, а  m- количество пешек.
// Взял алгоритм -> https://ru.stackoverflow.com/questions/542788/%D0%90%D0%BB%D0%B3%D0%BE%D1%80%D0%B8%D1%82%D0%BC-%D0%B4%D0%BB%D1%8F-%D0%BF%D0%BE%D0%B4%D1%81%D1%87%D0%B5%D1%82%D0%B0-%D0%BA%D0%BE%D0%BB%D0%B8%D1%87%D0%B5%D1%81%D1%82%D0%B2%D0%B0-%D0%B2%D0%B0%D1%80%D0%B8%D0%B0%D0%BD%D1%82%D0%BE%D0%B2-%D1%80%D0%B0%D0%B7%D0%BC%D0%B5%D1%89%D0%B5%D0%BD%D0%B8%D1%8F-8-%D0%BF%D0%B5%D1%88%D0%B5%D0%BA-%D0%BD%D0%B0-%D1%88%D0%B0%D1%85%D0%BC%D0%B0%D1%82%D0%BD%D0%BE%D0%B9-%D0%B4%D0%BE%D1%81%D0%BA%D0%B5

/*
$p= 8; $n= 48;
for($c= $n, $x= $n-1, $y= 2; $y<=$p; $y++, $x--) $c= $c*$x/$y;
echo "$c\n";
*/




?>