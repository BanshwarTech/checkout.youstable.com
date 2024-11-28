<?php

header('Content-Type: text/html'); // Set response as HTML

function getClientIp()
{
    $ip = 'UNKNOWN'; // Default value
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Handle cases where multiple IPs are returned
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim($ipList[0]); // Take the first IP
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    } elseif (!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['HTTP_FORWARDED'])) {
        $ip = $_SERVER['HTTP_FORWARDED'];
    } elseif (!empty($_SERVER['REMOTE_ADDR'])) {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

function getGeolocation($ip)
{
    // Fallback API
    $fallbackApiUrl = "https://ipinfo.io/{$ip}/json/";

    $fallbackResponse = fetchApiData($fallbackApiUrl);

    // Check if the API response is not empty
    if (!empty($fallbackResponse)) {

        // Determine currency based on country code
        $countryCode = $fallbackResponse['country'] ?? '';
        $currency = getCurrencyByCountry($countryCode);
        $fallbackResponse['currency'] = $currency;

        return [
            'status' => 'success',
            'data' => $fallbackResponse // Return all data directly
        ];
    } else {
        // Handle error if API response is empty
        return [
            'status' => 'error',
            'message' => 'Failed to fetch geolocation data.'
        ];
    }
}

function fetchApiData($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYHOST => 0, // Optional: Ignore SSL certificate verification (for testing)
        CURLOPT_SSL_VERIFYPEER => 0  // Optional: Ignore SSL certificate verification (for testing)
    ]);

    $response = curl_exec($curl);
    $error = curl_error($curl);

    curl_close($curl);

    if ($error) {
        return [
            'status' => 'error',
            'message' => "cURL Error: " . $error
        ];
    }

    return json_decode($response, true);
}

function getCurrencyByCountry($countryCode)
{
    // Map of country codes to currencies
    $currencyMap = [
        'AF' => 'AFN', // Afghanistan
        'AL' => 'ALL', // Albania
        'DZ' => 'DZD', // Algeria
        'AS' => 'USD', // American Samoa
        'AD' => 'EUR', // Andorra
        'AO' => 'AOA', // Angola
        'AI' => 'XCD', // Anguilla
        'AG' => 'XCD', // Antigua and Barbuda
        'AR' => 'ARS', // Argentina
        'AM' => 'AMD', // Armenia
        'AU' => 'AUD', // Australia
        'AT' => 'EUR', // Austria
        'AZ' => 'AZN', // Azerbaijan
        'BS' => 'BSD', // Bahamas
        'BH' => 'BHD', // Bahrain
        'BD' => 'BDT', // Bangladesh
        'BB' => 'BBD', // Barbados
        'BY' => 'BYN', // Belarus
        'BE' => 'EUR', // Belgium
        'BZ' => 'BZD', // Belize
        'BJ' => 'XOF', // Benin
        'BM' => 'BMD', // Bermuda
        'BT' => 'BTN', // Bhutan
        'BO' => 'BOB', // Bolivia
        'BA' => 'BAM', // Bosnia and Herzegovina
        'BW' => 'BWP', // Botswana
        'BR' => 'BRL', // Brazil
        'BN' => 'BND', // Brunei
        'BG' => 'BGN', // Bulgaria
        'BF' => 'XOF', // Burkina Faso
        'BI' => 'BIF', // Burundi
        'KH' => 'KHR', // Cambodia
        'CM' => 'XAF', // Cameroon
        'CA' => 'CAD', // Canada
        'CV' => 'CVE', // Cape Verde
        'KY' => 'KYD', // Cayman Islands
        'CF' => 'XAF', // Central African Republic
        'TD' => 'XAF', // Chad
        'CL' => 'CLP', // Chile
        'CN' => 'CNY', // China
        'CO' => 'COP', // Colombia
        'KM' => 'KMF', // Comoros
        'CD' => 'CDF', // Congo (Democratic Republic)
        'CG' => 'XAF', // Congo (Republic)
        'CR' => 'CRC', // Costa Rica
        'CI' => 'XOF', // Côte d'Ivoire
        'HR' => 'EUR', // Croatia
        'CU' => 'CUP', // Cuba
        'CY' => 'EUR', // Cyprus
        'CZ' => 'CZK', // Czech Republic
        'DK' => 'DKK', // Denmark
        'DJ' => 'DJF', // Djibouti
        'DM' => 'XCD', // Dominica
        'DO' => 'DOP', // Dominican Republic
        'EC' => 'USD', // Ecuador
        'EG' => 'EGP', // Egypt
        'SV' => 'USD', // El Salvador
        'GQ' => 'XAF', // Equatorial Guinea
        'ER' => 'ERN', // Eritrea
        'EE' => 'EUR', // Estonia
        'SZ' => 'SZL', // Eswatini
        'ET' => 'ETB', // Ethiopia
        'FJ' => 'FJD', // Fiji
        'FI' => 'EUR', // Finland
        'FR' => 'EUR', // France
        'GA' => 'XAF', // Gabon
        'GM' => 'GMD', // Gambia
        'GE' => 'GEL', // Georgia
        'DE' => 'EUR', // Germany
        'GH' => 'GHS', // Ghana
        'GR' => 'EUR', // Greece
        'GD' => 'XCD', // Grenada
        'GT' => 'GTQ', // Guatemala
        'GN' => 'GNF', // Guinea
        'GW' => 'XOF', // Guinea-Bissau
        'GY' => 'GYD', // Guyana
        'HT' => 'HTG', // Haiti
        'HN' => 'HNL', // Honduras
        'HK' => 'HKD', // Hong Kong
        'HU' => 'HUF', // Hungary
        'IS' => 'ISK', // Iceland
        'IN' => 'INR', // India
        'ID' => 'IDR', // Indonesia
        'IR' => 'IRR', // Iran
        'IQ' => 'IQD', // Iraq
        'IE' => 'EUR', // Ireland
        'IL' => 'ILS', // Israel
        'IT' => 'EUR', // Italy
        'JM' => 'JMD', // Jamaica
        'JP' => 'JPY', // Japan
        'JO' => 'JOD', // Jordan
        'KZ' => 'KZT', // Kazakhstan
        'KE' => 'KES', // Kenya
        'KI' => 'AUD', // Kiribati
        'KR' => 'KRW', // South Korea
        'KW' => 'KWD', // Kuwait
        'KG' => 'KGS', // Kyrgyzstan
        'LA' => 'LAK', // Laos
        'LV' => 'EUR', // Latvia
        'LB' => 'LBP', // Lebanon
        'LS' => 'LSL', // Lesotho
        'LR' => 'LRD', // Liberia
        'LY' => 'LYD', // Libya
        'LI' => 'CHF', // Liechtenstein
        'LT' => 'EUR', // Lithuania
        'LU' => 'EUR', // Luxembourg
        'MG' => 'MGA', // Madagascar
        'MW' => 'MWK', // Malawi
        'MY' => 'MYR', // Malaysia
        'MV' => 'MVR', // Maldives
        'ML' => 'XOF', // Mali
        'MT' => 'EUR', // Malta
        'MH' => 'USD', // Marshall Islands
        'MR' => 'MRU', // Mauritania
        'MU' => 'MUR', // Mauritius
        'MX' => 'MXN', // Mexico
        'FM' => 'USD', // Micronesia
        'MD' => 'MDL', // Moldova
        'MC' => 'EUR', // Monaco
        'MN' => 'MNT', // Mongolia
        'ME' => 'EUR', // Montenegro
        'MA' => 'MAD', // Morocco
        'MZ' => 'MZN', // Mozambique
        'MM' => 'MMK', // Myanmar
        'NA' => 'NAD', // Namibia
        'NR' => 'AUD', // Nauru
        'NP' => 'NPR', // Nepal
        'NL' => 'EUR', // Netherlands
        'NZ' => 'NZD', // New Zealand
        'NI' => 'NIO', // Nicaragua
        'NE' => 'XOF', // Niger
        'NG' => 'NGN', // Nigeria
        'NO' => 'NOK', // Norway
        'OM' => 'OMR', // Oman
        'PK' => 'PKR', // Pakistan
        'PW' => 'USD', // Palau
        'PS' => 'ILS', // Palestine
        'PA' => 'USD', // Panama
        'PG' => 'PGK', // Papua New Guinea
        'PY' => 'PYG', // Paraguay
        'PE' => 'PEN', // Peru
        'PH' => 'PHP', // Philippines
        'PL' => 'PLN', // Poland
        'PT' => 'EUR', // Portugal
        'QA' => 'QAR', // Qatar
        'RO' => 'RON', // Romania
        'RU' => 'RUB', // Russia
        'RW' => 'RWF', // Rwanda
        'KN' => 'XCD', // Saint Kitts and Nevis
        'LC' => 'XCD', // Saint Lucia
        'VC' => 'XCD', // Saint Vincent and the Grenadines
        'WS' => 'WST', // Samoa
        'SM' => 'EUR', // San Marino
        'ST' => 'STN', // Sao Tome and Principe
        'SA' => 'SAR', // Saudi Arabia
        'SN' => 'XOF', // Senegal
        'RS' => 'RSD', // Serbia
        'SC' => 'SCR', // Seychelles
        'SL' => 'SLL', // Sierra Leone
        'SG' => 'SGD', // Singapore
        'SK' => 'EUR', // Slovakia
        'SI' => 'EUR', // Slovenia
        'SB' => 'SBD', // Solomon Islands
        'SO' => 'SOS', // Somalia
        'ZA' => 'ZAR', // South Africa
        'ES' => 'EUR', // Spain
        'LK' => 'LKR', // Sri Lanka
        'SD' => 'SDG', // Sudan
        'SR' => 'SRD', // Suriname
        'SE' => 'SEK', // Sweden
        'CH' => 'CHF', // Switzerland
        'SY' => 'SYP', // Syria
        'TW' => 'TWD', // Taiwan
        'TJ' => 'TJS', // Tajikistan
        'TZ' => 'TZS', // Tanzania
        'TH' => 'THB', // Thailand
        'TL' => 'USD', // Timor-Leste
        'TG' => 'XOF', // Togo
        'TO' => 'TOP', // Tonga
        'TT' => 'TTD', // Trinidad and Tobago
        'TN' => 'TND', // Tunisia
        'TR' => 'TRY', // Turkey
        'TM' => 'TMT', // Turkmenistan
        'TV' => 'AUD', // Tuvalu
        'UG' => 'UGX', // Uganda
        'UA' => 'UAH', // Ukraine
        'AE' => 'AED', // United Arab Emirates
        'GB' => 'GBP', // United Kingdom
        'US' => 'USD', // United States
        'UY' => 'UYU', // Uruguay
        'UZ' => 'UZS', // Uzbekistan
        'VU' => 'VUV', // Vanuatu
        'VE' => 'VES', // Venezuela
        'VN' => 'VND', // Vietnam
        'YE' => 'YER', // Yemen
        'ZM' => 'ZMW', // Zambia
        'ZW' => 'ZWL', // Zimbabwe
    ];

    return $currencyMap[$countryCode] ?? 'N/A';
}

// Get client IP
$ip = getClientIp();

// Fallback to a public IP for localhost testing
if ($ip == '127.0.0.1' || $ip == '::1') {
    $ip = '8.8.8.8'; // Example fallback IP
}

// Fetch geolocation data
$response = getGeolocation($ip);

// Output the data in HTML format
if ($response['status'] === 'success') {
    $data = $response['data'];
    echo "<!DOCTYPE html>
<html>
<head>
    <title>Geolocation Info</title>
</head>
<body>
    <h1>Geolocation Information</h1>
    <p><strong>IP Address:</strong> {$ip}</p>
    <p><strong>City:</strong> " . ($data['city'] ?? 'N/A') . "</p>
    <p><strong>Region:</strong> " . ($data['region'] ?? 'N/A') . "</p>
    <p><strong>Country:</strong> " . ($data['country'] ?? 'N/A') . "</p>
    <p><strong>Latitude:</strong> " . (explode(',', $data['loc'] ?? 'N/A')[0]) . "</p>
    <p><strong>Longitude:</strong> " . (explode(',', $data['loc'] ?? 'N/A')[1]) . "</p>
    <p><strong>Currency:</strong> " . ($data['currency'] ?? 'N/A') . "</p>
</body>
</html>";
} else {
    echo "<!DOCTYPE html>
<html>
<head>
    <title>Error</title>
</head>
<body>
    <h1>Error</h1>
    <p>{$response['message']}</p>
</body>
</html>";
}
