--TEST--
swoole_client_sync: send & recv

--SKIPIF--
<?php require  __DIR__ . '/../include/skipif.inc'; ?>
--FILE--
<?php
require __DIR__ . '/../include/bootstrap.php';

/**

 * Time: 上午10:06
 */

killself_in_syncmode(1000);

$cli = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_SYNC);
$r = $cli->connect(IP_BAIDU, 80);
assert($r);
$r = $cli->send("GET / HTTP/1.1\r\n\r\n");
assert($r === 18);
$r = $cli->recv();
assert($r !== false);
assert(substr($r, 0, 4) === "HTTP");
echo "SUCCESS";

?>
--EXPECT--
SUCCESS
