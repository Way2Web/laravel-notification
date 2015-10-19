# Notification
Flash notification that accepts a array and string.

## Install
```bash
composer require intothesource/notification
```

## After install

#### ServiceProvider
Add the following line to "config/app.php".

at "providers":

```bash
IntoTheSource\Notification\NotificationServiceProvider::class,
```

And at "aliases":

```bash
'Notification' => IntoTheSource\Notification\Facade\Notification::class,
```

#### Publish files
Run the following command:

```bash
php artisan vendor:publish
```

## Using

### Including the flash message in your view
To see the flash notification(s), you need to add the following '@include()'.

```bash
@include('notification::message')
```

### available functions
Creating a notification can be done with the next commands:

```bash
Notification::
    - success()
    - error()
    - warning()
    - info()
    - overlay() // Bootstrap modal
```

You can also add the class "Important" to the alert message, with the following command:

```bash
Notification::error('message', 'title')->important();
```

### Message variables and Title
You can send a message as a string or as a array.

##### Array
```bash
Notification::success([
                    'First success',
                    'Second success title' => [
                        'First success',
                        'Second success'
                    ],
                    'Third success'
                ], 'Title success block');

Notification::success([
                    'First success',
                    'Second success title' => [
                        'First success',
                        'Second success'
                    ],
                    'Third success'
                ]);
```

##### String
With title:

```bash
Notification::success('First success', 'Title success block');
```

Without title:

```bash
Notification::success('First success');
```

##### Title

The last string is the title. You have two options: give a string or leave it blank.