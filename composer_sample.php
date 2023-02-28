&lt;?php
require __DIR__ . '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
// create a log channel
$log = new Logger('name');
$log-&gt;pushHandler(new StreamHandler('~/c_sample/text.log', Logger::WARNING));
// add records to the log
$log-&gt;warning('Foo');
$log-&gt;error('Bar');
