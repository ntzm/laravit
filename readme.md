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

Combine assets into public folder

```
gulp
```

Run the migrations

```
php artisan migrate
```
