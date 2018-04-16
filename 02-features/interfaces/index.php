<?php
require 'Documentable.php';
require 'DocumentStore.php';
require 'HtmlDocument.php';
require 'StreamDocument.php';
require 'CommandOutputDocument.php';

/** @var DocumentStore $documentStore 實體文件 */
$documentStore = new DocumentStore();

/** @var HtmlDocument $htmlDocument HTML 文件*/
$htmlDocument = new HtmlDocument('http://php.net');
$documentStore->addDocument($htmlDocument);

/** @var StreamDocument $streamDocument 增加串流文件 */
$streamDocument = new StreamDocument(fopen('stream.txt', 'rb'));
$documentStore->addDocument($streamDocument);

/** @var CommandOutputDocument $commandDocument 增加終端指令文件 */
$commandDocument = new CommandOutputDocument('cat /etc/hosts');
$documentStore->addDocument($commandDocument);

print_r($documentStore->getDocuments());
