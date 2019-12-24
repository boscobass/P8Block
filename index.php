<?php

require_once __DIR__.'/vendor/autoload.php';

use P8Block\Entities\Ledger;
use P8Block\Entities\Miner;

$ledger = new Ledger();
$newBlock = Miner::mine($ledger->getLastBLock(), 'vamos testar para ver se funciona');
$ledger->addBlock($newBlock);

var_dump($ledger->getChain());