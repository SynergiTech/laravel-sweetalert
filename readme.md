# Laravel SweetAlert

### In active development, please do not report issues until the project is considered stable.

This package integrates Twig with the standard Laravel 5 view framework. The package is based on [Easy Sweet Alert Messages for Laravel](https://github.com/uxweb/sweet-alert) by [Uziel Bueno](https://github.com/uxweb) but has been modified and refactored for our requirements.

## Install

First, install the package using Composer:

```
composer require synergitech/sweetalert
```

> Please note that this package works only alongside [SweetAlert](http://t4t5.github.io/sweetalert/).

## Usage

### Facade

First, import the Alert facade into your controller.
```php
use Alert;
```
Then, use the facade methods to add your message.

- `Alert::message('Message', 'Optional Title');`
- `Alert::basic('Basic Message', 'Mandatory Title');`
- `Alert::info('Info Message', 'Optional Title');`
- `Alert::success('Success Message', 'Optional Title');`
- `Alert::error('Error Message', 'Optional Title');`
- `Alert::warning('Warning Message', 'Optional Title');`

### Helper Function

The helper supports the same methods as the facade.

- `alert()->message('Message', 'Optional Title');`
- `alert()->basic('Basic Message', 'Mandatory Title');`
- `alert()->info('Info Message', 'Optional Title');`
- `alert()->success('Success Message', 'Optional Title');`
- `alert()->error('Error Message', 'Optional Title');`
- `alert()->warning('Warning Message', 'Optional Title');`
- `alert()->basic('Basic Message', 'Mandatory Title')->autoclose(3500);`

For a generic alert, you can just use `alert('Message')`, which has the same outcome as `alert()->message('Message')`.

### Rendering

#### Blade
```html
@if (Session::has('sweetalert.alert'))
    <script>
        swal({!! Session::get('sweetalert.alert') !!});
    </script>
@endif
```

#### Twig
```html
{% if session_has('sweetalert.alert') %}
    <script>
        swal({{ session_get('sweetalert.alert')|raw }});
    </script>
{% endif %}
```

The `sweetalert.alert` session key contains a JSON configuration object which can be passed directly to SweetAlert.

### Advanced Rendering

#### Blade
```html
@if (Session::has('sweetalert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweetalert.text') !!}",
            title: "{!! Session::get('sweetalert.title') !!}",
            timer: {!! Session::get('sweetalert.timer') !!},
            type: "{!! Session::get('sweetalert.type') !!}",
            showConfirmButton: "{!! Session::get('sweetalert.showConfirmButton') !!}",
            confirmButtonText: "{!! Session::get('sweetalert.confirmButtonText') !!}",
            confirmButtonColor: "#AEDEF4"
        });
    </script>
@endif
```

#### Twig
```html
{% if session_has('sweetalert.alert') %}
    <script>
        swal({
            text: "{{ Session::get('sweetalert.text')|raw }}",
            title: "{{ Session::get('sweetalert.title')|raw }}",
            timer: {{ Session::get('sweetalert.timer')|raw }},
            type: "{{ Session::get('sweetalert.type')|raw }}",
            showConfirmButton: "{{ Session::get('sweetalert.showConfirmButton')|raw }}",
            confirmButtonText: "{{ Session::get('sweetalert.confirmButtonText')|raw }}",
            confirmButtonColor: "#AEDEF4"
        });
    </script>
{% endif %}
```
