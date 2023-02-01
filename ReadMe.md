# FirstAgenda-php-client

[FirstAgenda-php-client](https://packagist.org/packages/code-bureau/firstagenda-php-client) is an API client for accessing the [FirstAgenda API](https://prepare.firstagenda.com/api/publication/swagger/index). The goal of this project is to
enable developers to access the API in a simple and consistent manner.

## Usage
The project can be installed via [composer](https://getcomposer.org/) with this command:

```
composer require code-bureau/firstagenda-php-client
```

after the installation, the project is initialized as such:

```
use CodeBureau\FirstAgendaApi\FirstAgendaService;

...

$this->service = new FirstAgendaService($clientId, $clientSecret);

```
