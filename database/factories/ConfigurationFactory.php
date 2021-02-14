<?php
use App\Configuration;
use Faker\Generator as Faker;
$factory->define(Configuration::class, function (Faker $faker) {
    $device_type = ['Laptop', 'Desktop'];
    $device_manufacturer = ['Acer', 'Lenovo', 'Asus', 'Apple', 'Microsoft', 'Alienware', 'Dell', 'HP', 'MSI',
                        'Huawei', ];
    $device_model = ['250 G7 6HM80ES', 'Aspire 5 A515-54-520Z', 'Aspire 3 A315-55G-56FH', 'GL73 8RE-691',
                    'ENVY x360 13-ar0107ng', 'Precision 3540', 'Pavilion x360 15-dq0001ng',
                    'MacBook Air 13" MQD32D/A', 'MateBook D W00D', ];
    $cpu_manufacturer = ['AMD', 'Intel'];
    $cpu_model = ['i5-9400F', 'i7-9700K', 'i9-9900K', 'Ryzen 5 1600X', 'Ryzen 7 1700X',
                        'Ryzen 7 PRO 2700X', 'i5-8400', 'i3-8100', 'i7-8565U', 'Ryzen Threadripper 2990WX',
                        'Ryzen 5 3600X', 'Ryzen 9 3950X', 'Ryzen 7 2700U', 'Ryzen 3 3200U', 'Ryzen 5 3550H', ];
    $distribution = ['Ubuntu 14.04', 'Ubuntu 16.10', 'Ubuntu 19.10', 'Ubuntu 18.04',
                'ElementaryOS', 'Manjaro 18.1', 'Fedora 30', 'Fedora 28', 'Qubes OS',
                'MX Linux', 'Mint', 'Solus', 'Deepin', 'CentOS', 'Debian', 'Pop!_OS', ];
    $kernel = ['4.20-rc4', '3.18-rc3', '4.19', '5.2', '3.13-rc1', '2.6.28-rc1', '2.4.15'];
    return [
        'device_type' => $device_type[array_rand($device_type)],
        'device_manufacturer' => $device_manufacturer[array_rand($device_manufacturer)],
        'device_model' => $device_model[array_rand($device_model)],
        'cpu_manufacturer' => $cpu_manufacturer[array_rand($cpu_manufacturer)],
        'cpu_model' => $cpu_model[array_rand($cpu_model)],
        'distribution' => $distribution[array_rand($distribution)],
        'kernel' => $kernel[array_rand($kernel)],
        'comment' => $faker->text(500),
        'key' => Str::random(50),
    ];
});
