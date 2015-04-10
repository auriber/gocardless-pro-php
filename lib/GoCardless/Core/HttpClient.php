<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 *   https://github.com/gocardless/crank
 */

namespace GoCardless\Core;

/**
  * HTTP Client class wrapped by the Client class and 
  * used internally to route http requests.
  */
class HttpClient
{
  //  GoCardless Enterprise API

  /**
    * Authorisation header
    */
    private $auth;
  /**
    * Base API Url prefixing all requests the library makes
    */
    private $baseUrl;
  /**
    * List of default headers set during initialisation.
    */
    private $headers = array();

  /**
    * @param string $api_key Auth api key
    * @param string $api_secret Auth api secret
    * @param string $baseUrl Base HTTP access url
    * @param array[string]string Options (only inludes default headers for now)
    */
    public function __construct($api_key, $api_secret, $baseUrl, $options = array())
    {
        $this->baseUrl = $baseUrl;
        $this->auth = $api_key . ":" . $api_secret;

        $this->headers = array();
        if (isset($options['default_headers'])) {
            $this->headers = $options['default_headers'];
        }

        // Set Accept Header
        $this->headers['accept'] = 'application/json';

        // Config Headers
        $this->headers['GoCardless-Version'] = '2014-11-03';
        
    }

  /**
    * Gets the list of default headers the library is using. For debug purposes.
    * @return array[string]string
    */
    public function getHeaders()
    {
        return $this->headers;
    }

  /**
    * Gets the base url being used by the library. Primarily for debug purposes.
    * @return string
    */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

  /**
    * Constructor for a HTTP Request object
    * @param string $envelopeKey The key enveloping the request and response in json
    * @return Request
    */
    public function makeRequest($envelopeKey)
    {
        return new Request($this, $envelopeKey);
    }

  /**
    * Sets up a request using the curl wrapper passing in the current baseUrl, headers, and auth.
    * @param string $method HTTP MEthod
    * @param string $path Resource relative path (starts with a /)
    * @param string $postBody (Can be null), the post body sent with the request
    * @param array[string]string $headers Optional HTTP Override headers.
    * @return array[string]mixed
    */
    public function runCurlRequest($method, $path, $postBody = null, $headers = array())
    {
        $httpRequest = new CurlWrapper($method, $this->baseUrl . substr($path, 1));

        $httpRequest->setAuth($this->auth);
        $requestHeaders = array_merge($this->headers, $headers);
        $httpRequest->setHeaders($this->headers);

        if (isset($postBody)) {
            $httpRequest->setPostBody($postBody, 'application/json');
        }

        return $httpRequest->run();
    }
}
