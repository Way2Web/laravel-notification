# Notification
OK

## Install

```bash
composer require intothesource/notification
```

## After install

#### ServiceProvider
Add the following line to "config/app.php"

at "providers":

```bash
IntoTheSource\Notification\NotificationServiceProvider::class,
```

## Using

Creating a notification can be done with the next commands
```bash
Notification::
    - success()
    - error()
    - warning()
    - info()
    - overlay() // Bootstrap modal
```

You can also add the class "Important" to the alert message, with the following command

```bash
Notification::error('message', 'title')->important();
```

### Message variables and Title

You can send a message like a string or as a array

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
```bash
Notification::success('First success', 'Title success block');

Notification::success('First success');
```

##### Title

The last string is the title. You have two options: give a string or leave it blank.

