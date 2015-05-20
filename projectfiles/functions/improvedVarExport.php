<!--
	Copyright 2014-2015 Zachary Hebert, Patrick Gillespie
	This file is part of Methodocracy.org.

    Methodocracy.org is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

    Methodocracy.org is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with Methodocracy.org.  If not, see <http://www.gnu.org/licenses/>.
	
    Methodocracy TM is a trademark of Methodocracy.org (C)2014-2015, and all rights to that TM are reserved. Any modified versions are required to be marked as changed, so that their problems will not be attributed erroneously to authors of previous versions. And the name Methodocracy TM should be clearly labeled as the source of your work as long as any part of this work remains intact in part or in whole.
-->

<?php
/**
* An implementation of var_export() that is compatible with instances
* of stdClass.
* @param mixed $variable The variable you want to export
* @param bool $return If used and set to true, improved_var_export()
*     will return the variable representation instead of outputting it.
* @return mixed|null Returns the variable representation when the
*     return parameter is used and evaluates to TRUE. Otherwise, this
*     function will return NULL.
*/
function improved_var_export ($variable, $return = false) {
    if ($variable instanceof stdClass) {
        $result = '(object) '.improved_var_export(get_object_vars($variable), true);
    } else if (is_array($variable)) {
        $array = array ();
        foreach ($variable as $key => $value) {
            $array[] = var_export($key, true).' => '.improved_var_export($value, true);
        }
        $result = 'array ('.implode(', ', $array).')';
    } else {
        $result = var_export($variable, true);
    }

    if (!$return) {
        print $result;
        return null;
    } else {
        return $result;
    }
}

/*
 Example usage:
$obj = new stdClass;
$obj->test = 'abc';
$obj->other = 6.2;
$obj->arr = array (1, 2, 3);

improved_var_export((object) array (
    'prop1' => true,
    'prop2' => $obj,
    'assocArray' => array (
        'apple' => 'good',
        'orange' => 'great'
    )
));

 Output:
(object) array ('prop1' => true, 'prop2' => (object) array ('test' => 'abc', 'other' => 6.2, 'arr' => array (0 => 1, 1 => 2, 2 => 3)), 'assocArray' => array ('apple' => 'good', 'orange' => 'great'))

?>
*/