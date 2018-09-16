var Twitter = require('twitter')
var request = require('request')

var client = new Twitter({
    consumer_key: '',
    consumer_secret: '',
    access_token_key: '',
    access_token_secret: ''
})

function tweetWeather() {

    var lat = ((Math.random() * 181) - 90).toFixed(3)
    var lng = ((Math.random() * 361) - 180).toFixed(3)
    var weatherData = null
    var locData = null
    var wuri = 'http://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + lng + '&appid=' + weatherkey
    var luri = 'http://api.geonames.org/findNearbyPlaceNameJSON?lat=' + lat + '&lng=' + lng + '&username=' + locationkey

    request(luri, function (error, response, body) {
        if (!error && response.statusCode == 200) {
            locData = JSON.parse(body)
            if (locData['geonames'].length > 0) {
                var datalist = locData['geonames'][0]
                var town = datalist['name']
                var country = datalist['countryName']
                request(wuri, function (error, response, body) {
                    if (!error && response.statusCode == 200) {
                        weatherData = JSON.parse(body)
                        var desc = weatherData['weather'][0]['main']

                        if (desc == 'Clouds') {
                            var emoji = '☁';
                            var w = 'cloudy';
                        } else if (desc == 'Rain') {
                            var emoji = '☔';
                            var w = 'raining';
                        } else if (desc == 'Drizzle') {
                            var emoji = '☔';
                            var w = 'drizzling';
                        } else if (desc == 'Snow') {
                            var emoji = '❄';
                            var w = 'snowing';
                        } else if (desc == 'Thunderstorm') {
                            var emoji = '⚡';
                            var w = 'stormy';
                        } else {
                            var emoji = '😎';
                            var w = desc.toLowerCase()
                        }

                        var f = getFlag(country)

                        var result = 'The weather at latitude ' + lat + ' longitude ' + lng + ', ' + town + ' in ' + country + ' is currently ' + w + '. ' + emoji + f

                        client.post('statuses/update', {
                            status: result
                        }, function (error, tweet, response) {
                            if (error) throw error;
                            console.log(tweet); // Tweet body. 
                            console.log(response); // Raw response object. 
                        })

                    }
                })
            } else {
                tweetWeather()
            }

        }
    })
}

tweetWeather()
setInterval(tweetWeather, 1000 * 60 * 60)


function getFlag(country) {
    if (country == 'Afghanistan') {
        var flag = '🇦🇫';
    } else if (country == 'Åland Islands') {
        var flag = '🇦🇽';
    } else if (country == 'Albania') {
        var flag = '🇦🇱';
    } else if (country == 'Algeria') {
        var flag = '🇩🇿';
    } else if (country == 'American Samoa') {
        var flag = '🇦🇸';
    } else if (country == 'Andorra') {
        var flag = '🇦🇩';
    } else if (country == 'Angola') {
        var flag = '🇦🇴';
    } else if (country == 'Anguilla') {
        var flag = '🇦🇮';
    } else if (country == 'Antarctica') {
        var flag = '🇦🇶';
    } else if (country == 'Antigua & Barbuda') {
        var flag = '🇦🇬';
    } else if (country == 'Argentina') {
        var flag = '🇦🇷';
    } else if (country == 'Armenia') {
        var flag = '🇦🇲';
    } else if (country == 'Aruba') {
        var flag = '🇦🇼';
    } else if (country == 'Ascension Island') {
        var flag = '🇦🇨';
    } else if (country == 'Australia') {
        var flag = '🇦🇺';
    } else if (country == 'Austria') {
        var flag = '🇦🇹';
    } else if (country == 'Azerbaijan') {
        var flag = '🇦🇿';
    } else if (country == 'Bahamas') {
        var flag = '🇧🇸';
    } else if (country == 'Bahrain') {
        var flag = '🇧🇭';
    } else if (country == 'Bangladesh') {
        var flag = '🇧🇩';
    } else if (country == 'Barbados') {
        var flag = '🇧🇧';
    } else if (country == 'Belarus') {
        var flag = '🇧🇾';
    } else if (country == 'Belgium') {
        var flag = '🇧🇪';
    } else if (country == 'Belize') {
        var flag = '🇧🇿';
    } else if (country == 'Benin') {
        var flag = '🇧🇯';
    } else if (country == 'Bermuda') {
        var flag = '🇧🇲';
    } else if (country == 'Bhutan') {
        var flag = '🇧🇹';
    } else if (country == 'Bolivia') {
        var flag = '🇧🇴';
    } else if (country == 'Bosnia & Herzegovina') {
        var flag = '🇧🇦';
    } else if (country == 'Botswana') {
        var flag = '🇧🇼';
    } else if (country == 'Bouvet Island') {
        var flag = '🇧🇻';
    } else if (country == 'Brazil') {
        var flag = '🇧🇷';
    } else if (country == 'British Indian Ocean Territory') {
        var flag = '🇮🇴';
    } else if (country == 'British Virgin Islands') {
        var flag = '🇻🇬';
    } else if (country == 'Brunei') {
        var flag = '🇧🇳';
    } else if (country == 'Bulgaria') {
        var flag = '🇧🇬';
    } else if (country == 'Burkina Faso') {
        var flag = '🇧🇫';
    } else if (country == 'Burundi') {
        var flag = '🇧🇮';
    } else if (country == 'Cambodia') {
        var flag = '🇰🇭';
    } else if (country == 'Cameroon') {
        var flag = '🇨🇲';
    } else if (country == 'Canada') {
        var flag = '🇨🇦';
    } else if (country == 'Canary Islands') {
        var flag = '🇮🇨';
    } else if (country == 'Cape Verde') {
        var flag = '🇨🇻';
    } else if (country == 'Caribbean Netherlands') {
        var flag = '🇧🇶';
    } else if (country == 'Cayman Islands') {
        var flag = '🇰🇾';
    } else if (country == 'Central African Republic') {
        var flag = '🇨🇫';
    } else if (country == 'Ceuta & Melilla') {
        var flag = '🇪🇦';
    } else if (country == 'Chad') {
        var flag = '🇹🇩';
    } else if (country == 'Chile') {
        var flag = '🇨🇱';
    } else if (country == 'China') {
        var flag = '🇨🇳';
    } else if (country == 'Christmas Island') {
        var flag = '🇨🇽';
    } else if (country == 'Clipperton Island') {
        var flag = '🇨🇵';
    } else if (country == 'Cocos Islands') {
        var flag = '🇨🇨';
    } else if (country == 'Colombia') {
        var flag = '🇨🇴';
    } else if (country == 'Comoros') {
        var flag = '🇰🇲';
    } else if (country == 'Congo - Brazzaville') {
        var flag = '🇨🇬';
    } else if (country == 'Congo - Kinshasa') {
        var flag = '🇨🇩';
    } else if (country == 'Cook Islands') {
        var flag = '🇨🇰';
    } else if (country == 'Costa Rica') {
        var flag = '🇨🇷';
    } else if (country == 'Côte D’Ivoire') {
        var flag = '🇨🇮';
    } else if (country == 'Croatia') {
        var flag = '🇭🇷';
    } else if (country == 'Cuba') {
        var flag = '🇨🇺';
    } else if (country == 'Curaçao') {
        var flag = '🇨🇼';
    } else if (country == 'Cyprus') {
        var flag = '🇨🇾';
    } else if (country == 'Czech Republic') {
        var flag = '🇨🇿';
    } else if (country == 'Denmark') {
        var flag = '🇩🇰';
    } else if (country == 'Diego Garcia') {
        var flag = '🇩🇬';
    } else if (country == 'Djibouti') {
        var flag = '🇩🇯';
    } else if (country == 'Dominica') {
        var flag = '🇩🇲';
    } else if (country == 'Dominican Republic') {
        var flag = '🇩🇴';
    } else if (country == 'Ecuador') {
        var flag = '🇪🇨';
    } else if (country == 'Egypt') {
        var flag = '🇪🇬';
    } else if (country == 'El Salvador') {
        var flag = '🇸🇻';
    } else if (country == 'Equatorial Guinea') {
        var flag = '🇬🇶';
    } else if (country == 'Eritrea') {
        var flag = '🇪🇷';
    } else if (country == 'Estonia') {
        var flag = '🇪🇪';
    } else if (country == 'Ethiopia') {
        var flag = '🇪🇹';
    } else if (country == 'European Union') {
        var flag = '🇪🇺';
    } else if (country == 'Falkland Islands') {
        var flag = '🇫🇰';
    } else if (country == 'Faroe Islands') {
        var flag = '🇫🇴';
    } else if (country == 'Fiji') {
        var flag = '🇫🇯';
    } else if (country == 'Finland') {
        var flag = '🇫🇮';
    } else if (country == 'France') {
        var flag = '🇫🇷';
    } else if (country == 'French Guiana') {
        var flag = '🇬🇫';
    } else if (country == 'French Polynesia') {
        var flag = '🇵🇫';
    } else if (country == 'French Southern Territories') {
        var flag = '🇹🇫';
    } else if (country == 'Gabon') {
        var flag = '🇬🇦';
    } else if (country == 'Gambia') {
        var flag = '🇬🇲';
    } else if (country == 'Georgia') {
        var flag = '🇬🇪';
    } else if (country == 'Germany') {
        var flag = '🇩🇪';
    } else if (country == 'Ghana') {
        var flag = '🇬🇭';
    } else if (country == 'Gibraltar') {
        var flag = '🇬🇮';
    } else if (country == 'Greece') {
        var flag = '🇬🇷';
    } else if (country == 'Greenland') {
        var flag = '🇬🇱';
    } else if (country == 'Grenada') {
        var flag = '🇬🇩';
    } else if (country == 'Guadeloupe') {
        var flag = '🇬🇵';
    } else if (country == 'Guam') {
        var flag = '🇬🇺';
    } else if (country == 'Guatemala') {
        var flag = '🇬🇹';
    } else if (country == 'Guernsey') {
        var flag = '🇬🇬';
    } else if (country == 'Guinea') {
        var flag = '🇬🇳';
    } else if (country == 'Guinea-Bissau') {
        var flag = '🇬🇼';
    } else if (country == 'Guyana') {
        var flag = '🇬🇾';
    } else if (country == 'Haiti') {
        var flag = '🇭🇹';
    } else if (country == 'Heard & McDonald Islands') {
        var flag = '🇭🇲';
    } else if (country == 'Honduras') {
        var flag = '🇭🇳';
    } else if (country == 'Hong Kong') {
        var flag = '🇭🇰';
    } else if (country == 'Hungary') {
        var flag = '🇭🇺';
    } else if (country == 'Iceland') {
        var flag = '🇮🇸';
    } else if (country == 'India') {
        var flag = '🇮🇳';
    } else if (country == 'Indonesia') {
        var flag = '🇮🇩';
    } else if (country == 'Iran') {
        var flag = '🇮🇷';
    } else if (country == 'Iraq') {
        var flag = '🇮🇶';
    } else if (country == 'Ireland') {
        var flag = '🇮🇪';
    } else if (country == 'Isle of Man') {
        var flag = '🇮🇲';
    } else if (country == 'Israel') {
        var flag = '🇮🇱';
    } else if (country == 'Italy') {
        var flag = '🇮🇹';
    } else if (country == 'Ivory Coast') {
        var flag = '🇨🇮';
    } else if (country == 'Jamaica') {
        var flag = '🇯🇲';
    } else if (country == 'Japan') {
        var flag = '🇯🇵';
    } else if (country == 'Jersey') {
        var flag = '🇯🇪';
    } else if (country == 'Jordan') {
        var flag = '🇯🇴';
    } else if (country == 'Kazakhstan') {
        var flag = '🇰🇿';
    } else if (country == 'Kenya') {
        var flag = '🇰🇪';
    } else if (country == 'Kiribati') {
        var flag = '🇰🇮';
    } else if (country == 'Kosovo') {
        var flag = '🇽🇰';
    } else if (country == 'Kuwait') {
        var flag = '🇰🇼';
    } else if (country == 'Kyrgyzstan') {
        var flag = '🇰🇬';
    } else if (country == 'Laos') {
        var flag = '🇱🇦';
    } else if (country == 'Latvia') {
        var flag = '🇱🇻';
    } else if (country == 'Lebanon') {
        var flag = '🇱🇧';
    } else if (country == 'Lesotho') {
        var flag = '🇱🇸';
    } else if (country == 'Liberia') {
        var flag = '🇱🇷';
    } else if (country == 'Libya') {
        var flag = '🇱🇾';
    } else if (country == 'Liechtenstein') {
        var flag = '🇱🇮';
    } else if (country == 'Lithuania') {
        var flag = '🇱🇹';
    } else if (country == 'Luxembourg') {
        var flag = '🇱🇺';
    } else if (country == 'Macau') {
        var flag = '🇲🇴';
    } else if (country == 'Macedonia') {
        var flag = '🇲🇰';
    } else if (country == 'Madagascar') {
        var flag = '🇲🇬';
    } else if (country == 'Malawi') {
        var flag = '🇲🇼';
    } else if (country == 'Malaysia') {
        var flag = '🇲🇾';
    } else if (country == 'Maldives') {
        var flag = '🇲🇻';
    } else if (country == 'Mali') {
        var flag = '🇲🇱';
    } else if (country == 'Malta') {
        var flag = '🇲🇹';
    } else if (country == 'Marshall Islands') {
        var flag = '🇲🇭';
    } else if (country == 'Martinique') {
        var flag = '🇲🇶';
    } else if (country == 'Mauritania') {
        var flag = '🇲🇷';
    } else if (country == 'Mauritius') {
        var flag = '🇲🇺';
    } else if (country == 'Mayotte') {
        var flag = '🇾🇹';
    } else if (country == 'Mexico') {
        var flag = '🇲🇽';
    } else if (country == 'Micronesia') {
        var flag = '🇫🇲';
    } else if (country == 'Moldova') {
        var flag = '🇲🇩';
    } else if (country == 'Monaco') {
        var flag = '🇲🇨';
    } else if (country == 'Mongolia') {
        var flag = '🇲🇳';
    } else if (country == 'Montenegro') {
        var flag = '🇲🇪';
    } else if (country == 'Montserrat') {
        var flag = '🇲🇸';
    } else if (country == 'Morocco') {
        var flag = '🇲🇦';
    } else if (country == 'Mozambique') {
        var flag = '🇲🇿';
    } else if (country == 'Myanmar') {
        var flag = '🇲🇲';
    } else if (country == 'Namibia') {
        var flag = '🇳🇦';
    } else if (country == 'Nauru') {
        var flag = '🇳🇷';
    } else if (country == 'Nepal') {
        var flag = '🇳🇵';
    } else if (country == 'Netherlands') {
        var flag = '🇳🇱';
    } else if (country == 'New Caledonia') {
        var flag = '🇳🇨';
    } else if (country == 'New Zealand') {
        var flag = '🇳🇿';
    } else if (country == 'Nicaragua') {
        var flag = '🇳🇮';
    } else if (country == 'Niger') {
        var flag = '🇳🇪';
    } else if (country == 'Nigeria') {
        var flag = '🇳🇬';
    } else if (country == 'Niue') {
        var flag = '🇳🇺';
    } else if (country == 'Norfolk Island') {
        var flag = '🇳🇫';
    } else if (country == 'Northern Mariana Islands') {
        var flag = '🇲🇵';
    } else if (country == 'North Korea') {
        var flag = '🇰🇵';
    } else if (country == 'Norway') {
        var flag = '🇳🇴';
    } else if (country == 'Oman') {
        var flag = '🇴🇲';
    } else if (country == 'Pakistan') {
        var flag = '🇵🇰';
    } else if (country == 'Palau') {
        var flag = '🇵🇼';
    } else if (country == 'Palestinian Territories') {
        var flag = '🇵🇸';
    } else if (country == 'Panama') {
        var flag = '🇵🇦';
    } else if (country == 'Papua New Guinea') {
        var flag = '🇵🇬';
    } else if (country == 'Paraguay') {
        var flag = '🇵🇾';
    } else if (country == 'Peru') {
        var flag = '🇵🇪';
    } else if (country == 'Philippines') {
        var flag = '🇵🇭';
    } else if (country == 'Pitcairn Islands') {
        var flag = '🇵🇳';
    } else if (country == 'Poland') {
        var flag = '🇵🇱';
    } else if (country == 'Portugal') {
        var flag = '🇵🇹';
    } else if (country == 'Puerto Rico') {
        var flag = '🇵🇷';
    } else if (country == 'Qatar') {
        var flag = '🇶🇦';
    } else if (country == 'Réunion') {
        var flag = '🇷🇪';
    } else if (country == 'Romania') {
        var flag = '🇷🇴';
    } else if (country == 'Russia') {
        var flag = '🇷🇺';
    } else if (country == 'Rwanda') {
        var flag = '🇷🇼';
    } else if (country == 'Samoa') {
        var flag = '🇼🇸';
    } else if (country == 'San Marino') {
        var flag = '🇸🇲';
    } else if (country == 'São Tomé & Príncipe') {
        var flag = '🇸🇹';
    } else if (country == 'Saudi Arabia') {
        var flag = '🇸🇦';
    } else if (country == 'Senegal') {
        var flag = '🇸🇳';
    } else if (country == 'Serbia') {
        var flag = '🇷🇸';
    } else if (country == 'Seychelles') {
        var flag = '🇸🇨';
    } else if (country == 'Sierra Leone') {
        var flag = '🇸🇱';
    } else if (country == 'Singapore') {
        var flag = '🇸🇬';
    } else if (country == 'Sint Maarten') {
        var flag = '🇸🇽';
    } else if (country == 'Slovakia') {
        var flag = '🇸🇰';
    } else if (country == 'Slovenia') {
        var flag = '🇸🇮';
    } else if (country == 'Solomon Islands') {
        var flag = '🇸🇧';
    } else if (country == 'Somalia') {
        var flag = '🇸🇴';
    } else if (country == 'South Africa') {
        var flag = '🇿🇦';
    } else if (country == 'South Georgia & South Sandwich Islands') {
        var flag = '🇬🇸';
    } else if (country == 'South Korea') {
        var flag = '🇰🇷';
    } else if (country == 'South Sudan') {
        var flag = '🇸🇸';
    } else if (country == 'Spain') {
        var flag = '🇪🇸';
    } else if (country == 'Sri Lanka') {
        var flag = '🇱🇰';
    } else if (country == 'St. Barthélemy') {
        var flag = '🇧🇱';
    } else if (country == 'St. Helena') {
        var flag = '🇸🇭';
    } else if (country == 'St. Kitts & Nevis') {
        var flag = '🇰🇳';
    } else if (country == 'St. Lucia') {
        var flag = '🇱🇨';
    } else if (country == 'St. Martin') {
        var flag = '🇲🇫';
    } else if (country == 'St. Pierre & Miquelon') {
        var flag = '🇵🇲';
    } else if (country == 'St. Vincent & Grenadines') {
        var flag = '🇻🇨';
    } else if (country == 'Sudan') {
        var flag = '🇸🇩';
    } else if (country == 'Suriname') {
        var flag = '🇸🇷';
    } else if (country == 'Svalbard & Jan Mayen') {
        var flag = '🇸🇯';
    } else if (country == 'Swaziland') {
        var flag = '🇸🇿';
    } else if (country == 'Sweden') {
        var flag = '🇸🇪';
    } else if (country == 'Switzerland') {
        var flag = '🇨🇭';
    } else if (country == 'Syria') {
        var flag = '🇸🇾';
    } else if (country == 'Taiwan') {
        var flag = '🇹🇼';
    } else if (country == 'Tajikistan') {
        var flag = '🇹🇯';
    } else if (country == 'Tanzania') {
        var flag = '🇹🇿';
    } else if (country == 'Thailand') {
        var flag = '🇹🇭';
    } else if (country == 'Timor-Leste') {
        var flag = '🇹🇱';
    } else if (country == 'Togo') {
        var flag = '🇹🇬';
    } else if (country == 'Tokelau') {
        var flag = '🇹🇰';
    } else if (country == 'Tonga') {
        var flag = '🇹🇴';
    } else if (country == 'Trinidad & Tobago') {
        var flag = '🇹🇹';
    } else if (country == 'Tristan Da Cunha') {
        var flag = '🇹🇦';
    } else if (country == 'Tunisia') {
        var flag = '🇹🇳';
    } else if (country == 'Turkey') {
        var flag = '🇹🇷';
    } else if (country == 'Turkmenistan') {
        var flag = '🇹🇲';
    } else if (country == 'Turks & Caicos Islands') {
        var flag = '🇹🇨';
    } else if (country == 'Tuvalu') {
        var flag = '🇹🇻';
    } else if (country == 'Uganda') {
        var flag = '🇺🇬';
    } else if (country == 'Ukraine') {
        var flag = '🇺🇦';
    } else if (country == 'United Arab Emirates') {
        var flag = '🇦🇪';
        $country = 'the United Arab Emirates';
    } else if (country == 'United Kingdom') {
        var flag = '🇬🇧';
        $country = 'the United Kingdom';
    } else if (country == 'United States') {
        var flag = '🇺🇸';
        $country = 'the United States';
    } else if (country == 'Uruguay') {
        var flag = '🇺🇾';
    } else if (country == 'U.S. Outlying Islands') {
        var flag = '🇺🇲';
    } else if (country == 'U.S. Virgin Islands') {
        var flag = '🇻🇮';
    } else if (country == 'Uzbekistan') {
        var flag = '🇺🇿';
    } else if (country == 'Vanuatu') {
        var flag = '🇻🇺';
    } else if (country == 'Vatican City') {
        var flag = '🇻🇦';
    } else if (country == 'Venezuela') {
        var flag = '🇻🇪';
    } else if (country == 'Vietnam') {
        var flag = '🇻🇳';
    } else if (country == 'Wallis & Futuna') {
        var flag = '🇼🇫';
    } else if (country == 'Western Sahara') {
        var flag = '🇪🇭';
    } else if (country == 'Yemen') {
        var flag = '🇾🇪';
    } else if (country == 'Zambia') {
        var flag = '🇿🇲';
    } else if (country == 'Zimbabwe') {
        var flag = '🇿🇼';
    }

    return flag
}