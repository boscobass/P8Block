<?php

/*
 * Copyright (C) 2019 boscobass
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace P8Block\Entities;

use P8Block\Interfaces\BlockInterface;
use P8Block\Exceptions\ChainNotValidException;

/**
 * Description of Ledger
 *
 * @author boscobass
 */
final class Ledger {
    
    private $chain = [];
    
    public function __construct()
    {
        $this->chain[] = static::genesis();
    }
    
    public function addBlock(BlockInterface $block) : BlockInterface
    {
        $this->chain[] = $block;
        return $block;
    }
    
    public function getChain() : array
    {
        return $this->chain;
    }
    
    public function getLastBLock() : BlockInterface
    {
        return end($this->chain);
    }

    public static function genesis() : BlockInterface
    {
        $now = new \DateTime();
        return new Block(
            $now->getTimestamp(),
            'Let there be light',
            hash(Block::HASH_TYPE,'In the beginning God created the heavens and the earth.')
        );
    }
    
    public function validateChain() : bool
    {
        if($this->chain[0] != static::genesis()) throw new ChainNotValidException();
        for($i = 1; $i < sizeof($this->chain); $i++){
            if($this->chain[$i]->getLastHash() !== $this->chain[$i-1]->getHash()) throw new ChainNotValidException();
        }
        return true;
    }
}
