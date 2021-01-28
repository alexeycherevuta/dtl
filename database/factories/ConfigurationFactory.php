<?php
use App\Configuration;
use Faker\Generator as Faker;
$factory->define(Configuration::class, function (Faker $faker) {
    $device_type = ['Laptop', 'Desktop'];
    $device_vendor = ['Acer', 'Lenovo', 'Asus', 'Apple', 'Microsoft'];
    $device_model = ['Model 1', 'Model 2', 'Model 3'];
    $processor_vendor = ['AMD', 'Intel'];
    $processor_model = ['i5', 'i7', 'i9', 'Ryzen 3500', 'Ryzen 3200', 'Ryzen 3700'];
    $distribution = ['Ubuntu 14.04', 'Ubuntu 16.10', 'Ubuntu 19.10', 'Ubuntu 18.04',
                'ElementaryOS 5 Juno', 'Manjaro 18.1', 'Fedora 30', 'Fedora 28', 'RHEL 2345', ];
    $kernel = [1, 2, 3, 4, 5];
    return [
        'device_type' => $device_type[array_rand($device_type)],
        'device_vendor' => $device_vendor[array_rand($device_vendor)],
        'device_model' => $device_model[array_rand($device_model)],
        'processor_vendor' => $processor_vendor[array_rand($processor_vendor)],
        'processor_model' => $processor_model[array_rand($processor_model)],
        'distribution' => $distribution[array_rand($distribution)],
        'kernel' => $kernel[array_rand($kernel)],
        'comment' => $faker->text(500),
        'key' => Str::random(50),
    ];
});
