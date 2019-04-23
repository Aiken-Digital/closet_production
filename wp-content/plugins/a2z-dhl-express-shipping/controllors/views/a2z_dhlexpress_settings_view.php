<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$this->init_settings(); 
global $woocommerce;
$_carriers = array(
		//"Public carrier name" => "technical name",
		'1'                    => 'DOMESTIC EXPRESS 12:00',
		'2'                    => 'B2C',
		'3'                    => 'B2C',
		'4'                    => 'JETLINE',
		'5'                    => 'SPRINTLINE',
		'7'                    => 'EXPRESS EASY',
		'8'                    => 'EXPRESS EASY',
		'9'                    => 'EUROPACK',
		'B'                    => 'BREAKBULK EXPRESS',
		'C'                    => 'MEDICAL EXPRESS',
		'D'                    => 'EXPRESS WORLDWIDE',
		'E'                    => 'EXPRESS 9:00',
		'F'                    => 'FREIGHT WORLDWIDE',
		'G'                    => 'DOMESTIC ECONOMY SELECT',
		'H'                    => 'ECONOMY SELECT',
		'I'                    => 'DOMESTIC EXPRESS 9:00',
		'J'                    => 'JUMBO BOX',
		'K'                    => 'EXPRESS 9:00',
		'L'                    => 'EXPRESS 10:30',
		'M'                    => 'EXPRESS 10:30',
		'N'                    => 'DOMESTIC EXPRESS',
		'O'                    => 'DOMESTIC EXPRESS 10:30',
		'P'                    => 'EXPRESS WORLDWIDE',
		'Q'                    => 'MEDICAL EXPRESS',
		'R'                    => 'GLOBALMAIL BUSINESS',
		'S'                    => 'SAME DAY',
		'T'                    => 'EXPRESS 12:00',
		'U'                    => 'EXPRESS WORLDWIDE',
		'V'                    => 'EUROPACK',
		'W'                    => 'ECONOMY SELECT',
		'X'                    => 'EXPRESS ENVELOPE',
		'Y'                    => 'EXPRESS 12:00'	
	);
$countires =  array(
			'AF' => 'Afghanistan',
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BQ' => 'Bonaire, Saint Eustatius and Saba',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'VG' => 'British Virgin Islands',
			'BN' => 'Brunei',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CW' => 'Curacao',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'CD' => 'Democratic Republic of the Congo',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'TL' => 'East Timor',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'CI' => 'Ivory Coast',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'XK' => 'Kosovo',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia',
			'MD' => 'Moldova',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'KP' => 'North Korea',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'CG' => 'Republic of the Congo',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russia',
			'RW' => 'Rwanda',
			'BL' => 'Saint Barthelemy',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'MF' => 'Saint Martin',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SX' => 'Sint Maarten',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'KR' => 'South Korea',
			'SS' => 'South Sudan',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syria',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania',
			'TH' => 'Thailand',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'VI' => 'U.S. Virgin Islands',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UM' => 'United States Minor Outlying Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VA' => 'Vatican',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
		$value = array();
		$value['AD'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AE'] = array('region' => 'AP', 'currency' =>'AED', 'weight' => 'KG_CM');
		$value['AF'] = array('region' => 'AP', 'currency' =>'AFN', 'weight' => 'KG_CM');
		$value['AG'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['AI'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['AL'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AM'] = array('region' => 'AP', 'currency' =>'AMD', 'weight' => 'KG_CM');
		$value['AN'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'KG_CM');
		$value['AO'] = array('region' => 'AP', 'currency' =>'AOA', 'weight' => 'KG_CM');
		$value['AR'] = array('region' => 'AM', 'currency' =>'ARS', 'weight' => 'KG_CM');
		$value['AS'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['AT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['AU'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['AW'] = array('region' => 'AM', 'currency' =>'AWG', 'weight' => 'LB_IN');
		$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
		$value['AZ'] = array('region' => 'AM', 'currency' =>'AZN', 'weight' => 'KG_CM');
		$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['BA'] = array('region' => 'AP', 'currency' =>'BAM', 'weight' => 'KG_CM');
		$value['BB'] = array('region' => 'AM', 'currency' =>'BBD', 'weight' => 'LB_IN');
		$value['BD'] = array('region' => 'AP', 'currency' =>'BDT', 'weight' => 'KG_CM');
		$value['BE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['BF'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['BG'] = array('region' => 'EU', 'currency' =>'BGN', 'weight' => 'KG_CM');
		$value['BH'] = array('region' => 'AP', 'currency' =>'BHD', 'weight' => 'KG_CM');
		$value['BI'] = array('region' => 'AP', 'currency' =>'BIF', 'weight' => 'KG_CM');
		$value['BJ'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['BM'] = array('region' => 'AM', 'currency' =>'BMD', 'weight' => 'LB_IN');
		$value['BN'] = array('region' => 'AP', 'currency' =>'BND', 'weight' => 'KG_CM');
		$value['BO'] = array('region' => 'AM', 'currency' =>'BOB', 'weight' => 'KG_CM');
		$value['BR'] = array('region' => 'AM', 'currency' =>'BRL', 'weight' => 'KG_CM');
		$value['BS'] = array('region' => 'AM', 'currency' =>'BSD', 'weight' => 'LB_IN');
		$value['BT'] = array('region' => 'AP', 'currency' =>'BTN', 'weight' => 'KG_CM');
		$value['BW'] = array('region' => 'AP', 'currency' =>'BWP', 'weight' => 'KG_CM');
		$value['BY'] = array('region' => 'AP', 'currency' =>'BYR', 'weight' => 'KG_CM');
		$value['BZ'] = array('region' => 'AM', 'currency' =>'BZD', 'weight' => 'KG_CM');
		$value['CA'] = array('region' => 'AM', 'currency' =>'CAD', 'weight' => 'LB_IN');
		$value['CF'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CG'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CH'] = array('region' => 'EU', 'currency' =>'CHF', 'weight' => 'KG_CM');
		$value['CI'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['CK'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['CL'] = array('region' => 'AM', 'currency' =>'CLP', 'weight' => 'KG_CM');
		$value['CM'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['CN'] = array('region' => 'AP', 'currency' =>'CNY', 'weight' => 'KG_CM');
		$value['CO'] = array('region' => 'AM', 'currency' =>'COP', 'weight' => 'KG_CM');
		$value['CR'] = array('region' => 'AM', 'currency' =>'CRC', 'weight' => 'KG_CM');
		$value['CU'] = array('region' => 'AM', 'currency' =>'CUC', 'weight' => 'KG_CM');
		$value['CV'] = array('region' => 'AP', 'currency' =>'CVE', 'weight' => 'KG_CM');
		$value['CY'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['CZ'] = array('region' => 'EU', 'currency' =>'CZF', 'weight' => 'KG_CM');
		$value['DE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['DJ'] = array('region' => 'EU', 'currency' =>'DJF', 'weight' => 'KG_CM');
		$value['DK'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['DM'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['DO'] = array('region' => 'AP', 'currency' =>'DOP', 'weight' => 'LB_IN');
		$value['DZ'] = array('region' => 'AM', 'currency' =>'DZD', 'weight' => 'KG_CM');
		$value['EC'] = array('region' => 'EU', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['EE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['EG'] = array('region' => 'AP', 'currency' =>'EGP', 'weight' => 'KG_CM');
		$value['ER'] = array('region' => 'EU', 'currency' =>'ERN', 'weight' => 'KG_CM');
		$value['ES'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ET'] = array('region' => 'AU', 'currency' =>'ETB', 'weight' => 'KG_CM');
		$value['FI'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['FJ'] = array('region' => 'AP', 'currency' =>'FJD', 'weight' => 'KG_CM');
		$value['FK'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['FM'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['FO'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['FR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GA'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['GB'] = array('region' => 'EU', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GD'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['GE'] = array('region' => 'AM', 'currency' =>'GEL', 'weight' => 'KG_CM');
		$value['GF'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GG'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GH'] = array('region' => 'AP', 'currency' =>'GBS', 'weight' => 'KG_CM');
		$value['GI'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['GL'] = array('region' => 'AM', 'currency' =>'DKK', 'weight' => 'KG_CM');
		$value['GM'] = array('region' => 'AP', 'currency' =>'GMD', 'weight' => 'KG_CM');
		$value['GN'] = array('region' => 'AP', 'currency' =>'GNF', 'weight' => 'KG_CM');
		$value['GP'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GQ'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['GR'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['GT'] = array('region' => 'AM', 'currency' =>'GTQ', 'weight' => 'KG_CM');
		$value['GU'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['GW'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['GY'] = array('region' => 'AP', 'currency' =>'GYD', 'weight' => 'LB_IN');
		$value['HK'] = array('region' => 'AM', 'currency' =>'HKD', 'weight' => 'KG_CM');
		$value['HN'] = array('region' => 'AM', 'currency' =>'HNL', 'weight' => 'KG_CM');
		$value['HR'] = array('region' => 'AP', 'currency' =>'HRK', 'weight' => 'KG_CM');
		$value['HT'] = array('region' => 'AM', 'currency' =>'HTG', 'weight' => 'LB_IN');
		$value['HU'] = array('region' => 'EU', 'currency' =>'HUF', 'weight' => 'KG_CM');
		$value['IC'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ID'] = array('region' => 'AP', 'currency' =>'IDR', 'weight' => 'KG_CM');
		$value['IE'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['IL'] = array('region' => 'AP', 'currency' =>'ILS', 'weight' => 'KG_CM');
		$value['IN'] = array('region' => 'AP', 'currency' =>'INR', 'weight' => 'KG_CM');
		$value['IQ'] = array('region' => 'AP', 'currency' =>'IQD', 'weight' => 'KG_CM');
		$value['IR'] = array('region' => 'AP', 'currency' =>'IRR', 'weight' => 'KG_CM');
		$value['IS'] = array('region' => 'EU', 'currency' =>'ISK', 'weight' => 'KG_CM');
		$value['IT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['JE'] = array('region' => 'AM', 'currency' =>'GBP', 'weight' => 'KG_CM');
		$value['JM'] = array('region' => 'AM', 'currency' =>'JMD', 'weight' => 'KG_CM');
		$value['JO'] = array('region' => 'AP', 'currency' =>'JOD', 'weight' => 'KG_CM');
		$value['JP'] = array('region' => 'AP', 'currency' =>'JPY', 'weight' => 'KG_CM');
		$value['KE'] = array('region' => 'AP', 'currency' =>'KES', 'weight' => 'KG_CM');
		$value['KG'] = array('region' => 'AP', 'currency' =>'KGS', 'weight' => 'KG_CM');
		$value['KH'] = array('region' => 'AP', 'currency' =>'KHR', 'weight' => 'KG_CM');
		$value['KI'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['KM'] = array('region' => 'AP', 'currency' =>'KMF', 'weight' => 'KG_CM');
		$value['KN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['KP'] = array('region' => 'AP', 'currency' =>'KPW', 'weight' => 'LB_IN');
		$value['KR'] = array('region' => 'AP', 'currency' =>'KRW', 'weight' => 'KG_CM');
		$value['KV'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['KW'] = array('region' => 'AP', 'currency' =>'KWD', 'weight' => 'KG_CM');
		$value['KY'] = array('region' => 'AM', 'currency' =>'KYD', 'weight' => 'KG_CM');
		$value['KZ'] = array('region' => 'AP', 'currency' =>'KZF', 'weight' => 'LB_IN');
		$value['LA'] = array('region' => 'AP', 'currency' =>'LAK', 'weight' => 'KG_CM');
		$value['LB'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['LC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'KG_CM');
		$value['LI'] = array('region' => 'AM', 'currency' =>'CHF', 'weight' => 'LB_IN');
		$value['LK'] = array('region' => 'AP', 'currency' =>'LKR', 'weight' => 'KG_CM');
		$value['LR'] = array('region' => 'AP', 'currency' =>'LRD', 'weight' => 'KG_CM');
		$value['LS'] = array('region' => 'AP', 'currency' =>'LSL', 'weight' => 'KG_CM');
		$value['LT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LU'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LV'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['LY'] = array('region' => 'AP', 'currency' =>'LYD', 'weight' => 'KG_CM');
		$value['MA'] = array('region' => 'AP', 'currency' =>'MAD', 'weight' => 'KG_CM');
		$value['MC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MD'] = array('region' => 'AP', 'currency' =>'MDL', 'weight' => 'KG_CM');
		$value['ME'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MG'] = array('region' => 'AP', 'currency' =>'MGA', 'weight' => 'KG_CM');
		$value['MH'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['MK'] = array('region' => 'AP', 'currency' =>'MKD', 'weight' => 'KG_CM');
		$value['ML'] = array('region' => 'AP', 'currency' =>'COF', 'weight' => 'KG_CM');
		$value['MM'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['MN'] = array('region' => 'AP', 'currency' =>'MNT', 'weight' => 'KG_CM');
		$value['MO'] = array('region' => 'AP', 'currency' =>'MOP', 'weight' => 'KG_CM');
		$value['MP'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['MQ'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MR'] = array('region' => 'AP', 'currency' =>'MRO', 'weight' => 'KG_CM');
		$value['MS'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['MT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['MU'] = array('region' => 'AP', 'currency' =>'MUR', 'weight' => 'KG_CM');
		$value['MV'] = array('region' => 'AP', 'currency' =>'MVR', 'weight' => 'KG_CM');
		$value['MW'] = array('region' => 'AP', 'currency' =>'MWK', 'weight' => 'KG_CM');
		$value['MX'] = array('region' => 'AM', 'currency' =>'MXN', 'weight' => 'KG_CM');
		$value['MY'] = array('region' => 'AP', 'currency' =>'MYR', 'weight' => 'KG_CM');
		$value['MZ'] = array('region' => 'AP', 'currency' =>'MZN', 'weight' => 'KG_CM');
		$value['NA'] = array('region' => 'AP', 'currency' =>'NAD', 'weight' => 'KG_CM');
		$value['NC'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
		$value['NE'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['NG'] = array('region' => 'AP', 'currency' =>'NGN', 'weight' => 'KG_CM');
		$value['NI'] = array('region' => 'AM', 'currency' =>'NIO', 'weight' => 'KG_CM');
		$value['NL'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['NO'] = array('region' => 'EU', 'currency' =>'NOK', 'weight' => 'KG_CM');
		$value['NP'] = array('region' => 'AP', 'currency' =>'NPR', 'weight' => 'KG_CM');
		$value['NR'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['NU'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['NZ'] = array('region' => 'AP', 'currency' =>'NZD', 'weight' => 'KG_CM');
		$value['OM'] = array('region' => 'AP', 'currency' =>'OMR', 'weight' => 'KG_CM');
		$value['PA'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['PE'] = array('region' => 'AM', 'currency' =>'PEN', 'weight' => 'KG_CM');
		$value['PF'] = array('region' => 'AP', 'currency' =>'XPF', 'weight' => 'KG_CM');
		$value['PG'] = array('region' => 'AP', 'currency' =>'PGK', 'weight' => 'KG_CM');
		$value['PH'] = array('region' => 'AP', 'currency' =>'PHP', 'weight' => 'KG_CM');
		$value['PK'] = array('region' => 'AP', 'currency' =>'PKR', 'weight' => 'KG_CM');
		$value['PL'] = array('region' => 'EU', 'currency' =>'PLN', 'weight' => 'KG_CM');
		$value['PR'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['PT'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['PW'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['PY'] = array('region' => 'AM', 'currency' =>'PYG', 'weight' => 'KG_CM');
		$value['QA'] = array('region' => 'AP', 'currency' =>'QAR', 'weight' => 'KG_CM');
		$value['RE'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['RO'] = array('region' => 'EU', 'currency' =>'RON', 'weight' => 'KG_CM');
		$value['RS'] = array('region' => 'AP', 'currency' =>'RSD', 'weight' => 'KG_CM');
		$value['RU'] = array('region' => 'AP', 'currency' =>'RUB', 'weight' => 'KG_CM');
		$value['RW'] = array('region' => 'AP', 'currency' =>'RWF', 'weight' => 'KG_CM');
		$value['SA'] = array('region' => 'AP', 'currency' =>'SAR', 'weight' => 'KG_CM');
		$value['SB'] = array('region' => 'AP', 'currency' =>'SBD', 'weight' => 'KG_CM');
		$value['SC'] = array('region' => 'AP', 'currency' =>'SCR', 'weight' => 'KG_CM');
		$value['SD'] = array('region' => 'AP', 'currency' =>'SDG', 'weight' => 'KG_CM');
		$value['SE'] = array('region' => 'EU', 'currency' =>'SEK', 'weight' => 'KG_CM');
		$value['SG'] = array('region' => 'AP', 'currency' =>'SGD', 'weight' => 'KG_CM');
		$value['SH'] = array('region' => 'AP', 'currency' =>'SHP', 'weight' => 'KG_CM');
		$value['SI'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SK'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SL'] = array('region' => 'AP', 'currency' =>'SLL', 'weight' => 'KG_CM');
		$value['SM'] = array('region' => 'EU', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['SN'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['SO'] = array('region' => 'AM', 'currency' =>'SOS', 'weight' => 'KG_CM');
		$value['SR'] = array('region' => 'AM', 'currency' =>'SRD', 'weight' => 'KG_CM');
		$value['SS'] = array('region' => 'AP', 'currency' =>'SSP', 'weight' => 'KG_CM');
		$value['ST'] = array('region' => 'AP', 'currency' =>'STD', 'weight' => 'KG_CM');
		$value['SV'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['SY'] = array('region' => 'AP', 'currency' =>'SYP', 'weight' => 'KG_CM');
		$value['SZ'] = array('region' => 'AP', 'currency' =>'SZL', 'weight' => 'KG_CM');
		$value['TC'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['TD'] = array('region' => 'AP', 'currency' =>'XAF', 'weight' => 'KG_CM');
		$value['TG'] = array('region' => 'AP', 'currency' =>'XOF', 'weight' => 'KG_CM');
		$value['TH'] = array('region' => 'AP', 'currency' =>'THB', 'weight' => 'KG_CM');
		$value['TJ'] = array('region' => 'AP', 'currency' =>'TJS', 'weight' => 'KG_CM');
		$value['TL'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['TN'] = array('region' => 'AP', 'currency' =>'TND', 'weight' => 'KG_CM');
		$value['TO'] = array('region' => 'AP', 'currency' =>'TOP', 'weight' => 'KG_CM');
		$value['TR'] = array('region' => 'AP', 'currency' =>'TRY', 'weight' => 'KG_CM');
		$value['TT'] = array('region' => 'AM', 'currency' =>'TTD', 'weight' => 'LB_IN');
		$value['TV'] = array('region' => 'AP', 'currency' =>'AUD', 'weight' => 'KG_CM');
		$value['TW'] = array('region' => 'AP', 'currency' =>'TWD', 'weight' => 'KG_CM');
		$value['TZ'] = array('region' => 'AP', 'currency' =>'TZS', 'weight' => 'KG_CM');
		$value['UA'] = array('region' => 'AP', 'currency' =>'UAH', 'weight' => 'KG_CM');
		$value['UG'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');
		$value['US'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['UY'] = array('region' => 'AM', 'currency' =>'UYU', 'weight' => 'KG_CM');
		$value['UZ'] = array('region' => 'AP', 'currency' =>'UZS', 'weight' => 'KG_CM');
		$value['VC'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['VE'] = array('region' => 'AM', 'currency' =>'VEF', 'weight' => 'KG_CM');
		$value['VG'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['VI'] = array('region' => 'AM', 'currency' =>'USD', 'weight' => 'LB_IN');
		$value['VN'] = array('region' => 'AP', 'currency' =>'VND', 'weight' => 'KG_CM');
		$value['VU'] = array('region' => 'AP', 'currency' =>'VUV', 'weight' => 'KG_CM');
		$value['WS'] = array('region' => 'AP', 'currency' =>'WST', 'weight' => 'KG_CM');
		$value['XB'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XC'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XE'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
		$value['XM'] = array('region' => 'AM', 'currency' =>'EUR', 'weight' => 'LB_IN');
		$value['XN'] = array('region' => 'AM', 'currency' =>'XCD', 'weight' => 'LB_IN');
		$value['XS'] = array('region' => 'AP', 'currency' =>'SIS', 'weight' => 'KG_CM');
		$value['XY'] = array('region' => 'AM', 'currency' =>'ANG', 'weight' => 'LB_IN');
		$value['YE'] = array('region' => 'AP', 'currency' =>'YER', 'weight' => 'KG_CM');
		$value['YT'] = array('region' => 'AP', 'currency' =>'EUR', 'weight' => 'KG_CM');
		$value['ZA'] = array('region' => 'AP', 'currency' =>'ZAR', 'weight' => 'KG_CM');
		$value['ZM'] = array('region' => 'AP', 'currency' =>'ZMW', 'weight' => 'KG_CM');
		$value['ZW'] = array('region' => 'AP', 'currency' =>'USD', 'weight' => 'KG_CM');

	$general_settings = get_option('a2z_dhl_main_settings');
	$general_settings = empty($general_settings) ? array() : $general_settings;
	if(isset($_POST['save']))
	{
		
		$general_settings['a2z_dhlexpress_site_id'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_site_id']) ? $_POST['a2z_dhlexpress_site_id'] : '');
		$general_settings['a2z_dhlexpress_site_pwd'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_site_pwd']) ? $_POST['a2z_dhlexpress_site_pwd'] : '');
		$general_settings['a2z_dhlexpress_acc_no'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_acc_no']) ? $_POST['a2z_dhlexpress_acc_no'] : '');
		$general_settings['a2z_dhlexpress_test'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_test']) ? 'yes' : 'no');
		$general_settings['a2z_dhlexpress_rates'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_rates']) ? 'yes' : 'no');
		$general_settings['a2z_dhlexpress_delivery_date'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_delivery_date']) ? 'yes' : 'no');
		$general_settings['a2z_dhlexpress_shipper_name'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_shipper_name']) ? $_POST['a2z_dhlexpress_shipper_name'] : '');
		$general_settings['a2z_dhlexpress_company'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_company']) ? $_POST['a2z_dhlexpress_company'] : '');
		$general_settings['a2z_dhlexpress_mob_num'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_mob_num']) ? $_POST['a2z_dhlexpress_mob_num'] : '');
		$general_settings['a2z_dhlexpress_email'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_email']) ? $_POST['a2z_dhlexpress_email'] : '');
		$general_settings['a2z_dhlexpress_address1'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_address1']) ? $_POST['a2z_dhlexpress_address1'] : '');
		$general_settings['a2z_dhlexpress_address2'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_address2']) ? $_POST['a2z_dhlexpress_address2'] : '');
		$general_settings['a2z_dhlexpress_city'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_city']) ? $_POST['a2z_dhlexpress_city'] : '');
		$general_settings['a2z_dhlexpress_state'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_state']) ? $_POST['a2z_dhlexpress_state'] : '');
		$general_settings['a2z_dhlexpress_zip'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_zip']) ? $_POST['a2z_dhlexpress_zip'] : '');
		$general_settings['a2z_dhlexpress_country'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_country']) ? $_POST['a2z_dhlexpress_country'] : '');
		$general_settings['a2z_dhlexpress_carrier'] = !empty($_POST['a2z_dhlexpress_carrier']) ? $_POST['a2z_dhlexpress_carrier'] : array();
		$general_settings['a2z_dhlexpress_carrier_name'] = !empty($_POST['a2z_dhlexpress_carrier_name']) ? $_POST['a2z_dhlexpress_carrier_name'] : array();
		$general_settings['a2z_dhlexpress_account_rates'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_account_rates']) ? 'yes' : 'no');
		$general_settings['a2z_dhlexpress_developer_rate'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_developer_rate']) ? 'yes' :'no');
		$general_settings['a2z_dhlexpress_insure'] = sanitize_text_field(isset($_POST['a2z_dhlexpress_insure']) ? 'yes' :'no');
		update_option('a2z_dhl_main_settings', $general_settings);
	}
	
		$general_settings['a2z_dhlexpress_currency'] = isset($value[(isset($general_settings['a2z_dhlexpress_country']) ? $general_settings['a2z_dhlexpress_country'] : 'A2Z')]) ? $value[$general_settings['a2z_dhlexpress_country']]['currency'] : '';
		$general_settings['a2z_dhlexpress_weight_unit'] = isset($value[(isset($general_settings['a2z_dhlexpress_country']) ? $general_settings['a2z_dhlexpress_country'] : 'A2Z')]) ? $value[$general_settings['a2z_dhlexpress_country']]['weight'] : '';
?>

<table style="width:100%">
	<tr>
		<td>
			<h4><?php _e('DHL Account Informations (This Settings is Must)','a2z_dhlexpress') ?></h4>
			<div style="box-shadow: 1px 1px 10px 1px #d2d2d2;width: 350px;padding: 25px;">
				<table>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('DHL Integration Team will give this details to you.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL XML API Site ID','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_site_id" value="<?php echo (isset($general_settings['a2z_dhlexpress_site_id'])) ? $general_settings['a2z_dhlexpress_site_id'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('DHL Integration Team will give this details to you.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL XML API Password','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_site_pwd" value="<?php echo (isset($general_settings['a2z_dhlexpress_site_pwd'])) ? $general_settings['a2z_dhlexpress_site_pwd'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('DHL Integration Team will give this details to you.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Account Number','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_acc_no" value="<?php echo (isset($general_settings['a2z_dhlexpress_acc_no'])) ? $general_settings['a2z_dhlexpress_acc_no'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this to Run the plugin in Test Mode','a2z_dhlexpress') ?>"></span>	<?php _e('Is this Test Credentilas?','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_test" <?php echo (isset($general_settings['a2z_dhlexpress_test']) && $general_settings['a2z_dhlexpress_test'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('This will automatically Update after Saving Settings.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Currency','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<h4><?php echo (isset($general_settings['a2z_dhlexpress_currency'])) ? $general_settings['a2z_dhlexpress_currency'] : '(Update After Save Action)'; ?></h4>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('This will automatically Update after Saving Settings.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Weight Unit','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<h4><?php echo (isset($general_settings['a2z_dhlexpress_weight_unit'])) ? $general_settings['a2z_dhlexpress_weight_unit'] : '(Update After Save Action)'; ?></h4>
						</td>
					</tr>
				</table>
			</div>
			<h4><?php _e('DHL Rate Section','a2z_dhlexpress') ?></h4>
			<div style="box-shadow: 1px 1px 10px 1px #d2d2d2;width: 350px;padding: 25px;">
				<table>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable Real time Rates to Show Rates in Checkout Page','a2z_dhlexpress') ?>"></span>	<?php _e('Can I Show Rates?','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_rates" <?php echo (isset($general_settings['a2z_dhlexpress_rates']) && $general_settings['a2z_dhlexpress_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable Real time Rates to Show Rates in Checkout Page','a2z_dhlexpress') ?>"></span>	<?php _e('Can I Show Delivery Date?','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_delivery_date" <?php echo (isset($general_settings['a2z_dhlexpress_delivery_date']) && $general_settings['a2z_dhlexpress_delivery_date'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to fetch the dhl account/negotiable rates','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Account Rates','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_account_rates" <?php echo (isset($general_settings['a2z_dhlexpress_account_rates']) && $general_settings['a2z_dhlexpress_account_rates'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to fetch the enable the insurance to the products','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Insurance','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_insure" <?php echo (isset($general_settings['a2z_dhlexpress_insure']) && $general_settings['a2z_dhlexpress_insure'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Enable this option to Check the Request and Response','a2z_dhlexpress') ?>"></span>	<?php _e('Plugin is not Working? (This option show the request and Response in cart / Checkout Page)','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="checkbox" name="a2z_dhlexpress_developer_rate" <?php echo (isset($general_settings['a2z_dhlexpress_developer_rate']) && $general_settings['a2z_dhlexpress_developer_rate'] == 'yes') ? 'checked="true"' : ''; ?> value="yes" > <?php _e('Yes','a2z_dhlexpress') ?>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Go to Product Page and Add or request hooks.','a2z_dhlexpress') ?>"></span>	<?php _e('DHL Rate Hooks','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<a href="#" target="_blank">Request/Get</a>
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Mail to the following Email address for Quick Support.','a2z_dhlexpress') ?>"></span>	<?php _e('A2Z Group Support Email','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<a href="#" target="_blank">a2zplugins@gmail.com</a>
						</td>
					</tr>
				</table>
			</div>
		</td>
		<td style="vertical-align:top;">
			<h4><?php _e('Shipper Address','a2z_dhlexpress') ?></h4>
			<div style="box-shadow: 1px 1px 10px 1px #d2d2d2;width: 350px;padding: 25px;">
				<table>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipping Person Name','a2z_dhlexpress') ?>"></span>	<?php _e('Shipper Name','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_shipper_name" value="<?php echo (isset($general_settings['a2z_dhlexpress_shipper_name'])) ? $general_settings['a2z_dhlexpress_shipper_name'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipper Company Name.','a2z_dhlexpress') ?>"></span>	<?php _e('Company Name','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_company" value="<?php echo (isset($general_settings['a2z_dhlexpress_company'])) ? $general_settings['a2z_dhlexpress_company'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Shipper Mobile / Contact Number.','a2z_dhlexpress') ?>"></span>	<?php _e('Contact Number','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_mob_num" value="<?php echo (isset($general_settings['a2z_dhlexpress_mob_num'])) ? $general_settings['a2z_dhlexpress_mob_num'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Email Address of the Shipper.','a2z_dhlexpress') ?>"></span>	<?php _e('Email Address','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_email" value="<?php echo (isset($general_settings['a2z_dhlexpress_email'])) ? $general_settings['a2z_dhlexpress_email'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Address Line 1 of the Shipper from Address.','a2z_dhlexpress') ?>"></span>	<?php _e('Address Line 1','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_address1" value="<?php echo (isset($general_settings['a2z_dhlexpress_address1'])) ? $general_settings['a2z_dhlexpress_address1'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Address Line 2 of the Shipper from Address.','a2z_dhlexpress') ?>"></span>	<?php _e('Address Line 2','a2z_dhlexpress') ?></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_address2" value="<?php echo (isset($general_settings['a2z_dhlexpress_address2'])) ? $general_settings['a2z_dhlexpress_address2'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('City of the Shipper from address.','a2z_dhlexpress') ?>"></span>	<?php _e('City','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_city" value="<?php echo (isset($general_settings['a2z_dhlexpress_city'])) ? $general_settings['a2z_dhlexpress_city'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('State of the Shipper from address.','a2z_dhlexpress') ?>"></span>	<?php _e('State (Two Digit String)','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_state" value="<?php echo (isset($general_settings['a2z_dhlexpress_state'])) ? $general_settings['a2z_dhlexpress_state'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Postal/Zip Code.','a2z_dhlexpress') ?>"></span>	<?php _e('Postal/Zip Code','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<input type="text" name="a2z_dhlexpress_zip" value="<?php echo (isset($general_settings['a2z_dhlexpress_zip'])) ? $general_settings['a2z_dhlexpress_zip'] : ''; ?>">
						</td>
					</tr>
					<tr>
						<td>
							<h4> <span class="woocommerce-help-tip" data-tip="<?php _e('Country of the Shipper from Address.','a2z_dhlexpress') ?>"></span>	<?php _e('Country','a2z_dhlexpress') ?><font style="color:red;">*</font></h4>
						</td>
						<td>
							<select name="a2z_dhlexpress_country" style="width:153px;">
								<?php foreach($countires as $key => $value)
								{
									if(isset($general_settings['a2z_dhlexpress_country']) && ($general_settings['a2z_dhlexpress_country'] == $key))
									{
										echo "<option value=".$key." selected='true'>".$value."</option>";
									}
									else
									{
										echo "<option value=".$key.">".$value."</option>";
									}
								} ?>
							</select>
						</td>
					</tr>
				</table>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			<h4><?php _e('DHL Services (Change Name of the Services As you want)','a2z_dhlexpress') ?></h4>
			<div style="box-shadow: 1px 1px 10px 1px #d2d2d2;width: 350px;padding: 25px;">
				<table>
				<tr>
					<td colspan="2">
						<h4><?php _e('Why this?','a2z_dhlexpress') ?><br/><?php _e('1) Enable Checkbox to Get the Service in Checkout Page','a2z_dhlexpress') ?><br/><?php _e('2) Add New Name in the Textbox to Chnage the Core Service Name.','a2z_dhlexpress') ?></h4>
					</td>
				</tr>
						<?php foreach($_carriers as $key => $value)
						{
							echo '	<tr>
									<td>
									<input type="checkbox" value="yes" name="a2z_dhlexpress_carrier['.$key.']" '. ((isset($general_settings['a2z_dhlexpress_carrier'][$key]) && $general_settings['a2z_dhlexpress_carrier'][$key] == 'yes') ? 'checked="true"' : '') .' > <small>'.$value.' - [ '.$key.' ]</small>
									</td>
									<td>
										<input type="text" name="a2z_dhlexpress_carrier_name['.$key.']" value="'.((isset($general_settings['a2z_dhlexpress_carrier_name'][$key])) ? $general_settings['a2z_dhlexpress_carrier_name'][$key] : '').'">
									</td>
									</tr>';
						} ?>
				</table>
			</div>
		</td>
	</tr>
	
</table>