# Laravit

## Installation

### Prerequisites

Required:

- `git`
- `php`
- `composer`
- `npm`

### Method

Use `git` to clone this repository.

```
git clone https://github.com/natzim/laravit
cd laravit/
```

---

Copy the example environment file.

The `.env` file stores all of the values that may change depending on where it is run. Therefore, the `.env` file should
not be committed.

```
cp .env.example .env
```

At this point, you will need to edit `.env` and add your own environment values. The database values must be correct, or
you will get errors further on in the installation.

Note: If you are running the site in [Homestead](http://laravel.com/docs/5.1/homestead) (which I highly recommend), the
database values should work out of the box.

To get a YouTube API key:
1. Go to the [Google Developers Console](https://console.developers.google.com/project) and create a new project
2. Open 'Enable APIs'
3. Open 'YouTube Data API'
4. Click 'Enable API'
5. In the sidebar, open 'APIs & auth' > 'Credentials'
6. Click 'Add credentials' > 'API key' > 'Server key'
7. Choose a descriptive name for your key, and optionally provide the IP addresses that the API will be queried from
8. Copy and paste your API key into the `YOUTUBE_API_KEY` in the `.env` file

If you did not modify the `APP_KEY` value in the `.env` file, you should generate a secure application key

```
php artisan key:generate
```

---

Install composer dependencies.

```
composer install
```

---

Install npm dependencies.

```
npm install
```

---

Combine assets into public folder using gulp.

```
node_modules/.bin/gulp
```

If you already have `gulp` installed, you can omit the directory and just run `gulp`.

---

Run the migrations.

```
php artisan migrate
```

If you need some dummy data to get started, run

```
php artisan db:seed
```

## License

[License](LICENSE.md).

## Contributing

Please read the [contributing guide](CONTRIBUTING.md).
