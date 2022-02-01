<?php

//x(t) = 0.5 * at^2 + vt + x

$acceleration = -9.81;
$time = 10;
$initial_velocity = 0;
$initial_position = 0;

$x = (0.5 * $acceleration * ($time * $time) + ($initial_velocity * $time) + $initial_position);

echo $x;