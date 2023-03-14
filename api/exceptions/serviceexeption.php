<?php
class ServiceException extends Exception
{
    protected $httpStatusCode;

    public function __construct($message = "", $httpCode = 500, int $code = 0, Throwable $previous = null) {
        $this->httpStatusCode = $httpCode;
        parent::__construct($message, $code, $previous);
    }

    public function getHttpCode() {
        return $this->httpStatusCode;
    }
}
?>