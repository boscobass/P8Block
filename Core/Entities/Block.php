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

class Block implements BlockInterface {
    
    const HASH_TYPE = 'sha256';
    
    private string $lastHash;
    
    private int $timestamp;
    
    private string $hash;
    
    private string $data;
    
    /**
     * 
     * @param int $timestamp
     * @param string $data
     * @param string $lastHash
     */
    public function __construct(int $timestamp, string $data, string $lastHash) 
    {
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->lastHash = $lastHash;
        $this->hash = hash(static::HASH_TYPE, $this->getBlockConcat());
    }
    
    /**
     * @return string
     */
    private function getBlockConcat() : string
    {
        return $this->lastHash.$this->timestamp.$this->data;
    }
    
    /**
     * 
     * @return string
     */
    public function getData() : string 
    {
        return $this->data;
    }
    
    /**
     * 
     * @return string
     */
    public function getHash() : string 
    {
        return $this->hash;
    }
    
    /**
     * 
     * @return string
     */
    public function getLastHash() : string 
    {
        return $this->lastHash;
    }
    
    /**
     * 
     * @return int
     */
    public function getTimestamp() : int 
    {
        return $this->timestamp;
    }

}