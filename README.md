# Pluto Press Logger

A small package to unify logging across Pluto Press
components.

Uses Monolog.

## Usage

Install: `composer require commonknowledge/pluto-press-logger`

Use:

```
use Monolog\Logger;
use CommonKnowledge\Monolog\LoggerFactory;

$channel_name = 'sample-channel';
$logger = LoggerFactory::getLogger($channel_name);
$logger->info('Hello World');
```

By default, the `Logger` will log to `logs/CHANNEL-YYYY-MM-DD.log`, e.g.
`logs/sample-channel-2023-11-22`. The `logs` directory will be in the
root of the project.

A different log directory can be provided using the second parameter
of `LoggerFactory::getLogger($channel_name, $log_dir)`.

## Loggly

To enable sending logs to Loggly, set the `LOGGLY_CUSTOMER_TOKEN`
environment variable.

To view the logs in a tabular form on the Loggly dashboard:

1. Click on the Search icon in the top left of the dashboard
2. In the "Field Explorer" on the left, select JSON -> datetime -> date
3. In the "Field Actions" dropdown that appears, select "Add as Column to Grid"
4. Repeat steps 2 and 3 for JSON -> channel and JSON -> message
