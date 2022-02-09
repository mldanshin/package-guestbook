# Site Guestbook

Creates an intermediary for the Laravel framework to record information about site visitors.  
The following data is saved:
- ip address;
- browser information;
- date of visit;
- url;
- request.

The data is stored in a text file (.txt).  
Supports commands for controlling file size, and sending the released data to an email address.  
The localizations en, ru are supported.  

## Requirements
- PHP 8.1 or higher  
- Laravel 8.0  or higher
- Composer

## Installation
Add to the file composer.json  

    "require": {
        "mldanshin/package-guestbook": "^1.0"
    }

    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mldanshin/package-guestbook"
        }
    ]

Execute

    composer update

## Usage
### Step 1 **Required!**
Publish the configuration file

    php artisan vendor:publish

where from the list select Provider: Danshin\Guestbook\Providers\Package Service Provider. After that, the danshin-guestbook file will appear in the config folder, where  

- limit_guest - the maximum amount of data to store (data about one guest is accepted for one data unit), the rest will be deleted when the command is run (see below);
- mail.subject - subject of the letter;
- *mail.replay_to.address - the e-mail address to which the letters will be sent, the field is mandatory!*

In addition, you must have filled in the fields of the sender of emails in the .env file:
- MAIL_MAILER=
- MAIL_HOST=
- MAIL_PORT=
- MAIL_USERNAME=
- MAIL_PASSWORD=
- MAIL_FROM_ADDRESS=
- MAIL_FROM_NAME=

### Step 2 **Required!**
Add the string in the App\Http\Kernel class of your application to the $middleware array

    \Danshin\Guestbook\Http\Middleware\CreatingGuest::class

### Console commands are available:

    php artisan guestbook:cut

Deletes data in excess of the limit set in the configuration file (danshin-guestbook.limit_guest). Information about deleted records is sent to the mail installed in the configuration file (danshin-guestbook.mail.replay_to.address), if the value is missing, the information is not sent. Add a command to the scheduler to automate file filling control.

    php artisan guestbook:clear

Completely clears the guestbook file.

## License

Open source software licensed in accordance with [MIT license](https://opensource.org/licenses/MIT).