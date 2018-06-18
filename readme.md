# laravel SweetAlert

## Installation

First, pull in the package through Composer.

```
    composer require synergitech/sweetalert
```

> Note that this package works only by using the [SweetAlert](http://t4t5.github.io/sweetalert/).

## Usage

### Using the Facade

First import the Alert facade in your controller.
```php
use Alert;
```
Within your controllers, before you perform a redirect...

```php
public function store()
{
    Alert::message('Robots are working!');

    return Redirect::home();
}
```

- `Alert::message('Message', 'Optional Title');`
- `Alert::basic('Basic Message', 'Mandatory Title');`
- `Alert::info('Info Message', 'Optional Title');`
- `Alert::success('Success Message', 'Optional Title');`
- `Alert::error('Error Message', 'Optional Title');`
- `Alert::warning('Warning Message', 'Optional Title');`

### Using the helper function

- `alert($message = null, $title = '')`

In addition to the previous listed methods you can also just use the helper
function without specifying any message type. Doing so is similar to:

- `alert()->message('Message', 'Optional Title')`

Like with the Facade we can use the helper with the same methods:

- `alert()->message('Message', 'Optional Title');`
- `alert()->basic('Basic Message', 'Mandatory Title');`
- `alert()->info('Info Message', 'Optional Title');`
- `alert()->success('Success Message', 'Optional Title');`
- `alert()->error('Error Message', 'Optional Title');`
- `alert()->warning('Warning Message', 'Optional Title');`
- `alert()->basic('Basic Message', 'Mandatory Title')->autoclose(3500);`

Within your controllers, before you perform a redirect...

```php
/**
 * Destroy the user's session (logout).
 *
 * @return Response
 */
public function destroy()
{
    Auth::logout();

    alert()->success('You have been logged out.', 'Good bye!');

    return home();
}
```

For a general information alert, just do: `alert('Some message');` (same as `alert()->message('Some message');`).

### Final Considerations
You can render html in your message with the html() method like this:

```php
    // -> html will be evaluated
    alert('<a href="#">Click me</a>')->html()->persistent("No, thanks");
```

### Configuration Options

You have access to the following configuration options to build a custom view:

    Session::get('sweetalert.text')
    Session::get('sweetalert.type')
    Session::get('sweetalert.title')
    Session::get('sweetalert.confirmButtonText')
    Session::get('sweetalert.showConfirmButton')
    Session::get('sweetalert.allowOutsideClick')
    Session::get('sweetalert.timer')

Please check the CONFIGURATION section in the [website](http://t4t5.github.io/sweetalert/) for all other options available.

### Default View

```html
@if (Session::has('sweetalert.alert'))
    <script>
        swal({!! Session::get('sweetalert.alert') !!});
    </script>
@endif
```

The `sweetalert.alert` session key contains a JSON configuration object to pass it directly to Sweet Alert.

Note that `{!! !!}` are used to output the json configuration object unescaped, it will not work with `{{ }}` escaped output tags.

### Custom View

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

            // more options
        });
    </script>
@endif
```

Note that you must use `""` (double quotes) to wrap the values except for the timer option.
