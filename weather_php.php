<?php

require_once('twitteroauth.php');

function callWeather(){

$rdmlat = mt_rand (0*10, 181*10) / 10;
$rdmlon = mt_rand (0*10, 361*10) / 10;
$lat = $rdmlat - 90;
$lon = $rdmlon - 180;
$weatherkey =
$locationkey =

$wrequest = "http://api.openweathermap.org/data/2.5/weather?lat=".$lat."&lon=".$lon."&appid=".$weatherkey;
$wresponse  = file_get_contents($wrequest);
$weather  = json_decode($wresponse, true);
$cond = $weather['weather'][0]['main'];
$desc = strtolower($cond);

$prequest = "http://api.geonames.org/findNearbyPlaceNameJSON?lat=".$lat."&lng=".$lon."&username=".$locationkey;
$presponse  = file_get_contents($prequest);
$place_suggest  = json_decode($presponse, true);
foreach($place_suggest['geonames'] as $place){
$town = $place['name'];
$country = $place['countryName'];
};

$consumerKey = '';
$consumerSecret = '';
$accessToken = '';
$accessTokenSecret = '';

if (isset($town)){

if (strpos($desc, 'clouds') !== false) {
  $emoji = '☁';
  $w = 'cloudy';
} else if (strpos($desc, 'rain') !== false) {
  $emoji = '☔';
  $w = 'raining';
} else if (strpos($desc, 'drizzle') !== false) {
  $emoji = '☔';
  $w = 'drizzling';
} else if (strpos($desc, 'snow') !== false) {
  $emoji = '❄';
  $w = 'snowing';
} else if (strpos($desc, 'thunderstorm') !== false) {
  $emoji = '⚡';
  $w = 'stormy';
} else {
  $emoji = '😎';
  $w = $desc;
};

if (strpos($country, 'Afghanistan') !== false) {
$flag = '🇦🇫';
} else if (strpos($country, 'Åland Islands') !== false) {
$flag = '🇦🇽';
} else if (strpos($country, 'Albania') !== false) {
$flag = '🇦🇱';
} else if (strpos($country, 'Algeria') !== false) {
$flag = '🇩🇿';
} else if (strpos($country, 'American Samoa') !== false) {
$flag = '🇦🇸';
} else if (strpos($country, 'Andorra') !== false) {
$flag = '🇦🇩';
} else if (strpos($country, 'Angola') !== false) {
$flag = '🇦🇴';
} else if (strpos($country, 'Anguilla') !== false) {
$flag = '🇦🇮';
} else if (strpos($country, 'Antarctica') !== false) {
$flag = '🇦🇶';
} else if (strpos($country, 'Antigua & Barbuda') !== false) {
$flag = '🇦🇬';
} else if (strpos($country, 'Argentina') !== false) {
$flag = '🇦🇷';
} else if (strpos($country, 'Armenia') !== false) {
$flag = '🇦🇲';
} else if (strpos($country, 'Aruba') !== false) {
$flag = '🇦🇼';
} else if (strpos($country, 'Ascension Island') !== false) {
$flag = '🇦🇨';
} else if (strpos($country, 'Australia') !== false) {
$flag = '🇦🇺';
} else if (strpos($country, 'Austria') !== false) {
$flag = '🇦🇹';
} else if (strpos($country, 'Azerbaijan') !== false) {
$flag = '🇦🇿';
} else if (strpos($country, 'Bahamas') !== false) {
$flag = '🇧🇸';
} else if (strpos($country, 'Bahrain') !== false) {
$flag = '🇧🇭';
} else if (strpos($country, 'Bangladesh') !== false) {
$flag = '🇧🇩';
} else if (strpos($country, 'Barbados') !== false) {
$flag = '🇧🇧';
} else if (strpos($country, 'Belarus') !== false) {
$flag = '🇧🇾';
} else if (strpos($country, 'Belgium') !== false) {
$flag = '🇧🇪';
} else if (strpos($country, 'Belize') !== false) {
$flag = '🇧🇿';
} else if (strpos($country, 'Benin') !== false) {
$flag = '🇧🇯';
} else if (strpos($country, 'Bermuda') !== false) {
$flag = '🇧🇲';
} else if (strpos($country, 'Bhutan') !== false) {
$flag = '🇧🇹';
} else if (strpos($country, 'Bolivia') !== false) {
$flag = '🇧🇴';
} else if (strpos($country, 'Bosnia & Herzegovina') !== false) {
$flag = '🇧🇦';
} else if (strpos($country, 'Botswana') !== false) {
$flag = '🇧🇼';
} else if (strpos($country, 'Bouvet Island') !== false) {
$flag = '🇧🇻';
} else if (strpos($country, 'Brazil') !== false) {
$flag = '🇧🇷';
} else if (strpos($country, 'British Indian Ocean Territory') !== false) {
$flag = '🇮🇴';
} else if (strpos($country, 'British Virgin Islands') !== false) {
$flag = '🇻🇬';
} else if (strpos($country, 'Brunei') !== false) {
$flag = '🇧🇳';
} else if (strpos($country, 'Bulgaria') !== false) {
$flag = '🇧🇬';
} else if (strpos($country, 'Burkina Faso') !== false) {
$flag = '🇧🇫';
} else if (strpos($country, 'Burundi') !== false) {
$flag = '🇧🇮';
} else if (strpos($country, 'Cambodia') !== false) {
$flag = '🇰🇭';
} else if (strpos($country, 'Cameroon') !== false) {
$flag = '🇨🇲';
} else if (strpos($country, 'Canada') !== false) {
$flag = '🇨🇦';
} else if (strpos($country, 'Canary Islands') !== false) {
$flag = '🇮🇨';
} else if (strpos($country, 'Cape Verde') !== false) {
$flag = '🇨🇻';
} else if (strpos($country, 'Caribbean Netherlands') !== false) {
$flag = '🇧🇶';
} else if (strpos($country, 'Cayman Islands') !== false) {
$flag = '🇰🇾';
} else if (strpos($country, 'Central African Republic') !== false) {
$flag = '🇨🇫';
} else if (strpos($country, 'Ceuta & Melilla') !== false) {
$flag = '🇪🇦';
} else if (strpos($country, 'Chad') !== false) {
$flag = '🇹🇩';
} else if (strpos($country, 'Chile') !== false) {
$flag = '🇨🇱';
} else if (strpos($country, 'China') !== false) {
$flag = '🇨🇳';
} else if (strpos($country, 'Christmas Island') !== false) {
$flag = '🇨🇽';
} else if (strpos($country, 'Clipperton Island') !== false) {
$flag = '🇨🇵';
} else if (strpos($country, 'Cocos Islands') !== false) {
$flag = '🇨🇨';
} else if (strpos($country, 'Colombia') !== false) {
$flag = '🇨🇴';
} else if (strpos($country, 'Comoros') !== false) {
$flag = '🇰🇲';
} else if (strpos($country, 'Congo - Brazzaville') !== false) {
$flag = '🇨🇬';
} else if (strpos($country, 'Congo - Kinshasa') !== false) {
$flag = '🇨🇩';
} else if (strpos($country, 'Cook Islands') !== false) {
$flag = '🇨🇰';
} else if (strpos($country, 'Costa Rica') !== false) {
$flag = '🇨🇷';
} else if (strpos($country, 'Côte D’Ivoire') !== false) {
$flag = '🇨🇮';
} else if (strpos($country, 'Croatia') !== false) {
$flag = '🇭🇷';
} else if (strpos($country, 'Cuba') !== false) {
$flag = '🇨🇺';
} else if (strpos($country, 'Curaçao') !== false) {
$flag = '🇨🇼';
} else if (strpos($country, 'Cyprus') !== false) {
$flag = '🇨🇾';
} else if (strpos($country, 'Czech Republic') !== false) {
$flag = '🇨🇿';
} else if (strpos($country, 'Denmark') !== false) {
$flag = '🇩🇰';
} else if (strpos($country, 'Diego Garcia') !== false) {
$flag = '🇩🇬';
} else if (strpos($country, 'Djibouti') !== false) {
$flag = '🇩🇯';
} else if (strpos($country, 'Dominica') !== false) {
$flag = '🇩🇲';
} else if (strpos($country, 'Dominican Republic') !== false) {
$flag = '🇩🇴';
} else if (strpos($country, 'Ecuador') !== false) {
$flag = '🇪🇨';
} else if (strpos($country, 'Egypt') !== false) {
$flag = '🇪🇬';
} else if (strpos($country, 'El Salvador') !== false) {
$flag = '🇸🇻';
} else if (strpos($country, 'Equatorial Guinea') !== false) {
$flag = '🇬🇶';
} else if (strpos($country, 'Eritrea') !== false) {
$flag = '🇪🇷';
} else if (strpos($country, 'Estonia') !== false) {
$flag = '🇪🇪';
} else if (strpos($country, 'Ethiopia') !== false) {
$flag = '🇪🇹';
} else if (strpos($country, 'European Union') !== false) {
$flag = '🇪🇺';
} else if (strpos($country, 'Falkland Islands') !== false) {
$flag = '🇫🇰';
} else if (strpos($country, 'Faroe Islands') !== false) {
$flag = '🇫🇴';
} else if (strpos($country, 'Fiji') !== false) {
$flag = '🇫🇯';
} else if (strpos($country, 'Finland') !== false) {
$flag = '🇫🇮';
} else if (strpos($country, 'France') !== false) {
$flag = '🇫🇷';
} else if (strpos($country, 'French Guiana') !== false) {
$flag = '🇬🇫';
} else if (strpos($country, 'French Polynesia') !== false) {
$flag = '🇵🇫';
} else if (strpos($country, 'French Southern Territories') !== false) {
$flag = '🇹🇫';
} else if (strpos($country, 'Gabon') !== false) {
$flag = '🇬🇦';
} else if (strpos($country, 'Gambia') !== false) {
$flag = '🇬🇲';
} else if (strpos($country, 'Georgia') !== false) {
$flag = '🇬🇪';
} else if (strpos($country, 'Germany') !== false) {
$flag = '🇩🇪';
} else if (strpos($country, 'Ghana') !== false) {
$flag = '🇬🇭';
} else if (strpos($country, 'Gibraltar') !== false) {
$flag = '🇬🇮';
} else if (strpos($country, 'Greece') !== false) {
$flag = '🇬🇷';
} else if (strpos($country, 'Greenland') !== false) {
$flag = '🇬🇱';
} else if (strpos($country, 'Grenada') !== false) {
$flag = '🇬🇩';
} else if (strpos($country, 'Guadeloupe') !== false) {
$flag = '🇬🇵';
} else if (strpos($country, 'Guam') !== false) {
$flag = '🇬🇺';
} else if (strpos($country, 'Guatemala') !== false) {
$flag = '🇬🇹';
} else if (strpos($country, 'Guernsey') !== false) {
$flag = '🇬🇬';
} else if (strpos($country, 'Guinea') !== false) {
$flag = '🇬🇳';
} else if (strpos($country, 'Guinea-Bissau') !== false) {
$flag = '🇬🇼';
} else if (strpos($country, 'Guyana') !== false) {
$flag = '🇬🇾';
} else if (strpos($country, 'Haiti') !== false) {
$flag = '🇭🇹';
} else if (strpos($country, 'Heard & McDonald Islands') !== false) {
$flag = '🇭🇲';
} else if (strpos($country, 'Honduras') !== false) {
$flag = '🇭🇳';
} else if (strpos($country, 'Hong Kong') !== false) {
$flag = '🇭🇰';
} else if (strpos($country, 'Hungary') !== false) {
$flag = '🇭🇺';
} else if (strpos($country, 'Iceland') !== false) {
$flag = '🇮🇸';
} else if (strpos($country, 'India') !== false) {
$flag = '🇮🇳';
} else if (strpos($country, 'Indonesia') !== false) {
$flag = '🇮🇩';
} else if (strpos($country, 'Iran') !== false) {
$flag = '🇮🇷';
} else if (strpos($country, 'Iraq') !== false) {
$flag = '🇮🇶';
} else if (strpos($country, 'Ireland') !== false) {
$flag = '🇮🇪';
} else if (strpos($country, 'Isle of Man') !== false) {
$flag = '🇮🇲';
} else if (strpos($country, 'Israel') !== false) {
$flag = '🇮🇱';
} else if (strpos($country, 'Italy') !== false) {
$flag = '🇮🇹';
} else if (strpos($country, 'Ivory Coast') !== false) {
$flag = '🇨🇮';
} else if (strpos($country, 'Jamaica') !== false) {
$flag = '🇯🇲';
} else if (strpos($country, 'Japan') !== false) {
$flag = '🇯🇵';
} else if (strpos($country, 'Jersey') !== false) {
$flag = '🇯🇪';
} else if (strpos($country, 'Jordan') !== false) {
$flag = '🇯🇴';
} else if (strpos($country, 'Kazakhstan') !== false) {
$flag = '🇰🇿';
} else if (strpos($country, 'Kenya') !== false) {
$flag = '🇰🇪';
} else if (strpos($country, 'Kiribati') !== false) {
$flag = '🇰🇮';
} else if (strpos($country, 'Kosovo') !== false) {
$flag = '🇽🇰';
} else if (strpos($country, 'Kuwait') !== false) {
$flag = '🇰🇼';
} else if (strpos($country, 'Kyrgyzstan') !== false) {
$flag = '🇰🇬';
} else if (strpos($country, 'Laos') !== false) {
$flag = '🇱🇦';
} else if (strpos($country, 'Latvia') !== false) {
$flag = '🇱🇻';
} else if (strpos($country, 'Lebanon') !== false) {
$flag = '🇱🇧';
} else if (strpos($country, 'Lesotho') !== false) {
$flag = '🇱🇸';
} else if (strpos($country, 'Liberia') !== false) {
$flag = '🇱🇷';
} else if (strpos($country, 'Libya') !== false) {
$flag = '🇱🇾';
} else if (strpos($country, 'Liechtenstein') !== false) {
$flag = '🇱🇮';
} else if (strpos($country, 'Lithuania') !== false) {
$flag = '🇱🇹';
} else if (strpos($country, 'Luxembourg') !== false) {
$flag = '🇱🇺';
} else if (strpos($country, 'Macau') !== false) {
$flag = '🇲🇴';
} else if (strpos($country, 'Macedonia') !== false) {
$flag = '🇲🇰';
} else if (strpos($country, 'Madagascar') !== false) {
$flag = '🇲🇬';
} else if (strpos($country, 'Malawi') !== false) {
$flag = '🇲🇼';
} else if (strpos($country, 'Malaysia') !== false) {
$flag = '🇲🇾';
} else if (strpos($country, 'Maldives') !== false) {
$flag = '🇲🇻';
} else if (strpos($country, 'Mali') !== false) {
$flag = '🇲🇱';
} else if (strpos($country, 'Malta') !== false) {
$flag = '🇲🇹';
} else if (strpos($country, 'Marshall Islands') !== false) {
$flag = '🇲🇭';
} else if (strpos($country, 'Martinique') !== false) {
$flag = '🇲🇶';
} else if (strpos($country, 'Mauritania') !== false) {
$flag = '🇲🇷';
} else if (strpos($country, 'Mauritius') !== false) {
$flag = '🇲🇺';
} else if (strpos($country, 'Mayotte') !== false) {
$flag = '🇾🇹';
} else if (strpos($country, 'Mexico') !== false) {
$flag = '🇲🇽';
} else if (strpos($country, 'Micronesia') !== false) {
$flag = '🇫🇲';
} else if (strpos($country, 'Moldova') !== false) {
$flag = '🇲🇩';
} else if (strpos($country, 'Monaco') !== false) {
$flag = '🇲🇨';
} else if (strpos($country, 'Mongolia') !== false) {
$flag = '🇲🇳';
} else if (strpos($country, 'Montenegro') !== false) {
$flag = '🇲🇪';
} else if (strpos($country, 'Montserrat') !== false) {
$flag = '🇲🇸';
} else if (strpos($country, 'Morocco') !== false) {
$flag = '🇲🇦';
} else if (strpos($country, 'Mozambique') !== false) {
$flag = '🇲🇿';
} else if (strpos($country, 'Myanmar') !== false) {
$flag = '🇲🇲';
} else if (strpos($country, 'Namibia') !== false) {
$flag = '🇳🇦';
} else if (strpos($country, 'Nauru') !== false) {
$flag = '🇳🇷';
} else if (strpos($country, 'Nepal') !== false) {
$flag = '🇳🇵';
} else if (strpos($country, 'Netherlands') !== false) {
$flag = '🇳🇱';
} else if (strpos($country, 'New Caledonia') !== false) {
$flag = '🇳🇨';
} else if (strpos($country, 'New Zealand') !== false) {
$flag = '🇳🇿';
} else if (strpos($country, 'Nicaragua') !== false) {
$flag = '🇳🇮';
} else if (strpos($country, 'Niger') !== false) {
$flag = '🇳🇪';
} else if (strpos($country, 'Nigeria') !== false) {
$flag = '🇳🇬';
} else if (strpos($country, 'Niue') !== false) {
$flag = '🇳🇺';
} else if (strpos($country, 'Norfolk Island') !== false) {
$flag = '🇳🇫';
} else if (strpos($country, 'Northern Mariana Islands') !== false) {
$flag = '🇲🇵';
} else if (strpos($country, 'North Korea') !== false) {
$flag = '🇰🇵';
} else if (strpos($country, 'Norway') !== false) {
$flag = '🇳🇴';
} else if (strpos($country, 'Oman') !== false) {
$flag = '🇴🇲';
} else if (strpos($country, 'Pakistan') !== false) {
$flag = '🇵🇰';
} else if (strpos($country, 'Palau') !== false) {
$flag = '🇵🇼';
} else if (strpos($country, 'Palestinian Territories') !== false) {
$flag = '🇵🇸';
} else if (strpos($country, 'Panama') !== false) {
$flag = '🇵🇦';
} else if (strpos($country, 'Papua New Guinea') !== false) {
$flag = '🇵🇬';
} else if (strpos($country, 'Paraguay') !== false) {
$flag = '🇵🇾';
} else if (strpos($country, 'Peru') !== false) {
$flag = '🇵🇪';
} else if (strpos($country, 'Philippines') !== false) {
$flag = '🇵🇭';
} else if (strpos($country, 'Pitcairn Islands') !== false) {
$flag = '🇵🇳';
} else if (strpos($country, 'Poland') !== false) {
$flag = '🇵🇱';
} else if (strpos($country, 'Portugal') !== false) {
$flag = '🇵🇹';
} else if (strpos($country, 'Puerto Rico') !== false) {
$flag = '🇵🇷';
} else if (strpos($country, 'Qatar') !== false) {
$flag = '🇶🇦';
} else if (strpos($country, 'Réunion') !== false) {
$flag = '🇷🇪';
} else if (strpos($country, 'Romania') !== false) {
$flag = '🇷🇴';
} else if (strpos($country, 'Russia') !== false) {
$flag = '🇷🇺';
} else if (strpos($country, 'Rwanda') !== false) {
$flag = '🇷🇼';
} else if (strpos($country, 'Samoa') !== false) {
$flag = '🇼🇸';
} else if (strpos($country, 'San Marino') !== false) {
$flag = '🇸🇲';
} else if (strpos($country, 'São Tomé & Príncipe') !== false) {
$flag = '🇸🇹';
} else if (strpos($country, 'Saudi Arabia') !== false) {
$flag = '🇸🇦';
} else if (strpos($country, 'Senegal') !== false) {
$flag = '🇸🇳';
} else if (strpos($country, 'Serbia') !== false) {
$flag = '🇷🇸';
} else if (strpos($country, 'Seychelles') !== false) {
$flag = '🇸🇨';
} else if (strpos($country, 'Sierra Leone') !== false) {
$flag = '🇸🇱';
} else if (strpos($country, 'Singapore') !== false) {
$flag = '🇸🇬';
} else if (strpos($country, 'Sint Maarten') !== false) {
$flag = '🇸🇽';
} else if (strpos($country, 'Slovakia') !== false) {
$flag = '🇸🇰';
} else if (strpos($country, 'Slovenia') !== false) {
$flag = '🇸🇮';
} else if (strpos($country, 'Solomon Islands') !== false) {
$flag = '🇸🇧';
} else if (strpos($country, 'Somalia') !== false) {
$flag = '🇸🇴';
} else if (strpos($country, 'South Africa') !== false) {
$flag = '🇿🇦';
} else if (strpos($country, 'South Georgia & South Sandwich Islands') !== false) {
$flag = '🇬🇸';
} else if (strpos($country, 'South Korea') !== false) {
$flag = '🇰🇷';
} else if (strpos($country, 'South Sudan') !== false) {
$flag = '🇸🇸';
} else if (strpos($country, 'Spain') !== false) {
$flag = '🇪🇸';
} else if (strpos($country, 'Sri Lanka') !== false) {
$flag = '🇱🇰';
} else if (strpos($country, 'St. Barthélemy') !== false) {
$flag = '🇧🇱';
} else if (strpos($country, 'St. Helena') !== false) {
$flag = '🇸🇭';
} else if (strpos($country, 'St. Kitts & Nevis') !== false) {
$flag = '🇰🇳';
} else if (strpos($country, 'St. Lucia') !== false) {
$flag = '🇱🇨';
} else if (strpos($country, 'St. Martin') !== false) {
$flag = '🇲🇫';
} else if (strpos($country, 'St. Pierre & Miquelon') !== false) {
$flag = '🇵🇲';
} else if (strpos($country, 'St. Vincent & Grenadines') !== false) {
$flag = '🇻🇨';
} else if (strpos($country, 'Sudan') !== false) {
$flag = '🇸🇩';
} else if (strpos($country, 'Suriname') !== false) {
$flag = '🇸🇷';
} else if (strpos($country, 'Svalbard & Jan Mayen') !== false) {
$flag = '🇸🇯';
} else if (strpos($country, 'Swaziland') !== false) {
$flag = '🇸🇿';
} else if (strpos($country, 'Sweden') !== false) {
$flag = '🇸🇪';
} else if (strpos($country, 'Switzerland') !== false) {
$flag = '🇨🇭';
} else if (strpos($country, 'Syria') !== false) {
$flag = '🇸🇾';
} else if (strpos($country, 'Taiwan') !== false) {
$flag = '🇹🇼';
} else if (strpos($country, 'Tajikistan') !== false) {
$flag = '🇹🇯';
} else if (strpos($country, 'Tanzania') !== false) {
$flag = '🇹🇿';
} else if (strpos($country, 'Thailand') !== false) {
$flag = '🇹🇭';
} else if (strpos($country, 'Timor-Leste') !== false) {
$flag = '🇹🇱';
} else if (strpos($country, 'Togo') !== false) {
$flag = '🇹🇬';
} else if (strpos($country, 'Tokelau') !== false) {
$flag = '🇹🇰';
} else if (strpos($country, 'Tonga') !== false) {
$flag = '🇹🇴';
} else if (strpos($country, 'Trinidad & Tobago') !== false) {
$flag = '🇹🇹';
} else if (strpos($country, 'Tristan Da Cunha') !== false) {
$flag = '🇹🇦';
} else if (strpos($country, 'Tunisia') !== false) {
$flag = '🇹🇳';
} else if (strpos($country, 'Turkey') !== false) {
$flag = '🇹🇷';
} else if (strpos($country, 'Turkmenistan') !== false) {
$flag = '🇹🇲';
} else if (strpos($country, 'Turks & Caicos Islands') !== false) {
$flag = '🇹🇨';
} else if (strpos($country, 'Tuvalu') !== false) {
$flag = '🇹🇻';
} else if (strpos($country, 'Uganda') !== false) {
$flag = '🇺🇬';
} else if (strpos($country, 'Ukraine') !== false) {
$flag = '🇺🇦';
} else if (strpos($country, 'United Arab Emirates') !== false) {
$flag = '🇦🇪';
$country = 'the United Arab Emirates';
} else if (strpos($country, 'United Kingdom') !== false) {
$flag = '🇬🇧';
$country = 'the United Kingdom';
} else if (strpos($country, 'United States') !== false) {
$flag = '🇺🇸';
$country = 'the United States';
} else if (strpos($country, 'Uruguay') !== false) {
$flag = '🇺🇾';
} else if (strpos($country, 'U.S. Outlying Islands') !== false) {
$flag = '🇺🇲';
} else if (strpos($country, 'U.S. Virgin Islands') !== false) {
$flag = '🇻🇮';
} else if (strpos($country, 'Uzbekistan') !== false) {
$flag = '🇺🇿';
} else if (strpos($country, 'Vanuatu') !== false) {
$flag = '🇻🇺';
} else if (strpos($country, 'Vatican City') !== false) {
$flag = '🇻🇦';
} else if (strpos($country, 'Venezuela') !== false) {
$flag = '🇻🇪';
} else if (strpos($country, 'Vietnam') !== false) {
$flag = '🇻🇳';
} else if (strpos($country, 'Wallis & Futuna') !== false) {
$flag = '🇼🇫';
} else if (strpos($country, 'Western Sahara') !== false) {
$flag = '🇪🇭';
} else if (strpos($country, 'Yemen') !== false) {
$flag = '🇾🇪';
} else if (strpos($country, 'Zambia') !== false) {
$flag = '🇿🇲';
} else if (strpos($country, 'Zimbabwe') !== false) {
$flag = '🇿🇼';
}

$rp = 'The weather at latitude '. $lat .' longitude '. $lon .', '. $town . ' in ' . $country .' is currently '. $w .'.';

$tweet = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);
$tweetMessage = $rp . ' ' . $flag . $emoji;

if(strlen($tweetMessage) <= 140) {
    $tweet->post('statuses/update', array('status' => $tweetMessage));
};

} else {

callWeather();

};
};

callWeather();

?>
