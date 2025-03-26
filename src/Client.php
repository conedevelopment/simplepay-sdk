<?php

namespace Cone\SimplePay;

class Client
{
    /**
     * The merchant ID.
     */
    protected string $merchantId;

    /**
     * The secret key.
     */
    protected string $secretKey;

    /**
     * Create a new client instance.
     */
    public function __construct(string $merchantId, string $secretKey)
    {
        $this->merchantId = $merchantId;
        $this->secretKey = $secretKey;
    }
}
