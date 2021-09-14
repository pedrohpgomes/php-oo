<?php
require_once 'a.php';
require_once 'b.php';

use Application\Form as Form;
use Application\Field as Field;
use Components\Form as ComponentForm;

var_dump( new Form );
var_dump( new Field );
var_dump( new ComponentForm );
var_dump( new \Application\Form );
var_dump( new \Components\Form );
