# Base Installation

Laravel Simpro API can be installed using Composer:

```bash
composer require stitch-digital/laravel-simpro-api
```

## Run the installation command

To install the package, run the following artisan command:

```bash
php artisan laravel-simpro-api:install
```

The install command will ask if you are using a single Simpro API connection in your application or multiple connections:

<div align="left" data-full-width="false">

<figure><img src="../.gitbook/assets/Screenshot 2024-09-02 at 2.26.59 PM.png" alt=""><figcaption></figcaption></figure>

</div>

If you plan on using multiple connections, you will need to let the package know which model will be associated with each Simpro API connection:

<div align="left">

<figure><img src="../.gitbook/assets/Screenshot 2024-09-02 at 2.27.49 PM.png" alt=""><figcaption></figcaption></figure>

</div>

## Next Steps

If you selected using a single Simpro connection for your application, read the instructions for [using a single connection](broken-reference).

If you have multiple Simpro connections in your application, for example one per customer or one per user, read the instructions for [using multiple connections](broken-reference).
