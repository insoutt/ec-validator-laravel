# Validar Cédula, RUC, Placa y mas datos de Ecuador en Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/insoutt/ec-validator-laravel.svg?style=flat-square)](https://packagist.org/packages/insoutt/ec-validator-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/insoutt/ec-validator-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/insoutt/ec-validator-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/insoutt/ec-validator-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/insoutt/ec-validator-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/insoutt/ec-validator-laravel.svg?style=flat-square)](https://packagist.org/packages/insoutt/ec-validator-laravel)

Con `insoutt/ec-validator-laravel` podrás realizar validaciones de distintos datos que se suele usar frecuentemente en Ecuador, como por ejemplo:

- Validar RUC
- Validar cédula
- Validar número de teléfono fijo
- Validar número de celular
- Validar placa de carro
- Validar placa de moto

Si crees que falta validar alguna información adicional puedes crear una sugerencia en el [Foro de Discuciones](https://github.com/insoutt/ec-validator-laravel/discussions/new?category=ideas) para desarrollarla o también puedes crear un [Pull Request](https://github.com/insoutt/ec-validator-laravel/pulls) para ser implementado.
## Instalación

Instala el paquete via composer a través del siguiente comando: 

```bash
composer require insoutt/ec-validator-laravel
```

Compatible con Laravel `10.*` y `11.*`. Si requieres que el paquete esté disponible para una versión anterior crea tu solicitud en el [Foro de Discuciones](https://github.com/insoutt/ec-validator-laravel/discussions/new?category=ideas)

## Uso

Para validar un campo se puede usar el validador de Laravel junto con las reglas disponibles según sea el caso. Ejemplo

```php
$request->validate([
    'identificacion' => 'required|ec_cedula',
]);
```

## Validaciones disponibles

| Regla | Descripción | Ejemplos Válidos | 
|--|--|--|
| `ec_cedula` | Validar un número de cédula | `1003462080` |
| `ec_ruc` | Validar RUC | `1790016919001` |
| `ec_placa` | Validar placa de un vehículo | `ABC0123`, `JB123A` |
| `ec_placa_moto` | Validar placa de una moto | `JB123A` |
| `ec_placa_car` | Validar placa de un carro | `ABC1234` |
| `ec_cellphone` | Validar número de celular | `0991234567` `593991234567` |
| `ec_cellphone_national` | Validar número de celular sin código internacional | `0991234567` |
| `ec_cellphone_international` | Validar número de celular con código internacional (sin `+`) | `593991234567` |
| `ec_telephone` | Validar número de teléfono | `2334590`, `042334590`, `59322334590` |
| `ec_telephone_local` | Validar número de teléfono local (en la misma provincia) | `2334590` |
| `ec_telephone_national` | Validar número de teléfono nacional | `042334590` |
| `ec_telephone_international` | Validar número de teléfono con código internacional | `59322334590` |

Este paquete es una extensión de [insoutt/ec-validator](https://github.com/insoutt/ec-validator) si deseas conocer más detalles de los tipos de validaciones puedes revisar su documentación.

## Pruebas

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Créditos

- [insoutt](https://github.com/insoutt)
- [All Contributors](../../contributors)

## Contacto
- 𝕏 (Twitter): [@insoutt](http://x.com/insoutt)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
