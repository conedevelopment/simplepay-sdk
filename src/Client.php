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
     * Indicates whether the client is in sandbox mode.
     */
    protected bool $sandbox = false;

    /**
     * Create a new client instance.
     */
    public function __construct(string $merchantId, string $secretKey, bool $sandbox = false)
    {
        $this->merchantId = $merchantId;
        $this->secretKey = $secretKey;
        $this->sandbox = $sandbox;
    }

    /**
     * Sign the given data.
     */
    public function sign(string $data): string
    {
        return base64_encode(
            hash_hmac('sha384', $data, $this->secretKey, true)
        );
    }

    /**
     * Validate the signature.
     */
    public function validateSignature(string $hash, string $data): bool
    {
        return hash_equals($hash, $this->sign($data));
    }
}
