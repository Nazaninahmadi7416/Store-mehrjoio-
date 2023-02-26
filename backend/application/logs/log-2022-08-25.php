<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-08-25 09:19:02 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'upcomeco_sog'@'localhost' (using password: YES) C:\wamp64\www\samplevisha2\backend\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2022-08-25 09:19:02 --> Unable to connect to the database
ERROR - 2022-08-25 10:34:00 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:34:16 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:34:33 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:39:28 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:40:04 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:40:08 --> 404 Page Not Found: Api/v1
ERROR - 2022-08-25 10:41:18 --> 404 Page Not Found: test3/Test3/joinexampletest3
ERROR - 2022-08-25 10:42:11 --> Severity: Warning --> mysqli::real_connect(): (HY000/1049): Unknown database 'upcomeco_upcome' C:\wamp64\www\samplevisha2\backend\system\database\drivers\mysqli\mysqli_driver.php 203
ERROR - 2022-08-25 10:42:11 --> Unable to connect to the database
ERROR - 2022-08-25 10:42:42 --> Query error: Unknown column 'yer_property.ID' in 'field list' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `yer_property`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city_id` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 10:58:33 --> Query error: Unknown column 'yer_property.ID' in 'field list' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `yer_property`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city_id` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 10:58:35 --> Query error: Unknown column 'yer_property.ID' in 'field list' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `yer_property`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city_id` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 10:58:44 --> Query error: Unknown column 'khanedan_ads.city_id' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city_id` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 10:58:58 --> Query error: Unknown column 'khanedan_ads.city_id' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city_id` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:01:06 --> Query error: Unknown column 'khanedan_ads.price' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:01:08 --> Query error: Unknown column 'khanedan_ads.price' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:01:09 --> Query error: Unknown column 'khanedan_ads.price' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:01:34 --> Query error: Unknown column 'khanedan_ads.price' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:01:35 --> Query error: Unknown column 'khanedan_ads.price' in 'where clause' - Invalid query: SELECT `khane_city`.`ID`, `khane_city`.`title` as `ptitle`, `khane_city`.`state_id`, `khanedan_ads`.`ID`, `khanedan_ads`.`user_id`, `khanedan_ads`.`city`, `khanedan_ads`.`metrics_based_price`
FROM `khanedan_ads`
LEFT JOIN `khane_city` ON `khanedan_ads`.`city` = `khane_city`.`state_id`
WHERE `khanedan_ads`.`city` = ''
AND `khanedan_ads`.`price` > 30
AND `khanedan_ads`.`price` < 100000000
ERROR - 2022-08-25 11:42:44 --> 404 Page Not Found: Api/v1
