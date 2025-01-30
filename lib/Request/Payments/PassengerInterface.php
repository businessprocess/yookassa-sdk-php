<?php

/*
 * The MIT License
 *
 * Copyright (c) 2025 "YooMoney", NBСO LLC
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace YooKassa\Request\Payments;

/**
 * Interface PassengerInterface.
 *
 * @category Class
 * @package  YooKassa\Request
 * @author   cms@yoomoney.ru
 * @link     https://yookassa.ru/developers/api
 *
 * @property string $firstName Имя пассажира
 * @property string $first_name Имя пассажира
 * @property string $lastName Фамилия пассажира
 * @property string $last_name Фамилия пассажира
 */
interface PassengerInterface
{
    /**
     * Возвращает имя пассажира.
     */
    public function getFirstName(): ?string;

    /**
     * Устанавливает имя пассажира.
     *
     * @param string|null $value Имя пассажира
     *
     * @return self
     */
    public function setFirstName(?string $value): self;

    /**
     * Возвращает фамилию пассажира.
     */
    public function getLastName(): ?string;

    /**
     * Устанавливает фамилию пассажира.
     *
     * @param string|null $value Фамилия пассажира
     *
     * @return self
     */
    public function setLastName(?string $value): self;
}
