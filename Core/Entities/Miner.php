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

use P8Block\Interfaces\MinerInterface;
use P8Block\Interfaces\BlockInterface;

/**
 * Description of Miner
 *
 * @author boscobass
 */
class Miner implements \P8Block\Interfaces\MinerInterface {
    
    public static function mine(BlockInterface $lastBlock, string $data) : BlockInterface
    {
        $now = new \DateTime();
        return new Block($now->getTimestamp(), $data, $lastBlock->getHash());
    }
    
}
