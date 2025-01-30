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

namespace YooKassa\Request\Payments\PaymentData;

use InvalidArgumentException;
use YooKassa\Model\Payment\PaymentMethodType;

/**
 * Класс, представляющий модель PaymentDataFactory.
 *
 * Фабрика создания объекта платежных данных из массива.
 *
 * @category Class
 * @package  YooKassa\Request
 * @author   cms@yoomoney.ru
 * @link     https://yookassa.ru/developers/api
 */
class PaymentDataFactory
{
    private array $typeClassMap = [
        PaymentMethodType::YOO_MONEY => 'PaymentDataYooMoney',
        PaymentMethodType::BANK_CARD => 'PaymentDataBankCard',
        PaymentMethodType::SBERBANK => 'PaymentDataSberbank',
        PaymentMethodType::CASH => 'PaymentDataCash',
        PaymentMethodType::MOBILE_BALANCE => 'PaymentDataMobileBalance',
        PaymentMethodType::APPLE_PAY => 'PaymentDataApplePay',
        PaymentMethodType::GOOGLE_PAY => 'PaymentDataGooglePay',
        PaymentMethodType::B2B_SBERBANK => 'PaymentDataB2bSberbank',
        PaymentMethodType::TINKOFF_BANK => 'PaymentDataTinkoffBank',
        PaymentMethodType::SBP => 'PaymentDataSbp',
        PaymentMethodType::SBER_LOAN => 'PaymentDataSberLoan',
        PaymentMethodType::ELECTRONIC_CERTIFICATE => 'PaymentDataElectronicCertificate',
    ];

    /**
     * Фабричный метод создания объекта платежных данных по типу.
     *
     * @param string|null $type Тип платежных данных
     *
     * @return AbstractPaymentData
     */
    public function factory(?string $type = null): AbstractPaymentData
    {
        if (!is_string($type)) {
            throw new InvalidArgumentException('Invalid payment type value in payment factory');
        }
        if (!array_key_exists($type, $this->typeClassMap)) {
            throw new InvalidArgumentException('Invalid payment data type "' . $type . '"');
        }
        $className = __NAMESPACE__ . '\\' . $this->typeClassMap[$type];

        return new $className();
    }

    /**
     * Фабричный метод создания объекта платежных данных из массива.
     *
     * @param array|null $data Массив платежных данных
     * @param string|null $type Тип платежных данных
     */
    public function factoryFromArray(?array $data = null, ?string $type = null): AbstractPaymentData
    {
        if (null === $type) {
            if (array_key_exists('type', $data)) {
                $type = $data['type'];
                unset($data['type']);
            } else {
                throw new InvalidArgumentException(
                    'Parameter type not specified in PaymentDataFactory.factoryFromArray()'
                );
            }
        }
        $paymentData = $this->factory($type);
        foreach ($data as $key => $value) {
            if ($paymentData->offsetExists($key)) {
                $paymentData->offsetSet($key, $value);
            }
        }

        return $paymentData;
    }
}
