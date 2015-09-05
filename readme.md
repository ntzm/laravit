# Laravit

## Installation

Clone the repository

```
git clone https://github.com/natzim/laravit
cd laravit/
```

Copy the example environment file

```
cp .env.example .env
```

Generate a secure application key

```
php artisan key:generate
```

Install composer dependencies

```
composer install
```

Install node dependencies

```
npm install
```

Combine assets into public folder using gulp

```
node_modules/.bin/gulp
```

or if you have `gulp` already installed

```
gulp
```

Run the migrations

```
php artisan migrate
```
