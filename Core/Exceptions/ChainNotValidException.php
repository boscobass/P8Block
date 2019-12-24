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

namespace P8Block\Exceptions;

/**
 * Description of ChainNotValidException
 *
 * @author boscobass
 */
class ChainNotValidException extends \Exception {
    public function __construct()
    {
        parent::__construct("The chain is not valid", 0);
    }
}
