<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Services;

/**
  *  Helpers
  *

  *
  *  
  */
class Helper extends Base
{
  
  /**
    *  Mandate PDF
    *
    *  Returns a PDF mandate form with a signature field, ready to be signed by
    *  your customer. May be fully or partially pre-filled.
    *  
    *  You
    *  must specify `Accept: application/pdf` on requests to this endpoint.
   
    *  *  
    *  Bank account details may either be supplied using the IBAN
    *  (international bank account number), or [local
    *  details](https://developer.gocardless.com/pro/#ui-compliance-local-bank-details).
    *  For more information on the different fields required in each country,
    *  please see the [local bank
    *  details](https://developer.gocardless.com/pro/#ui-compliance-local-bank-details)
    *  section.
    *  
    *  To generate a mandate in a foreign language, set
    *  your `Accept-Language` header to the relevant [ISO
    *  639-1](http://en.wikipedia.org/wiki/List_of_ISO_639-1_codes#Partial_ISO_639_table)
    *  language code. Currently Dutch, English, French, German, Italian,
    *  Portuguese and Spanish are supported.
    *  
    *  _Note:_ If you want
    *  to render a PDF of an existing mandate you can also do so using the
    *  [mandate show
    *  endpoint](https://developer.gocardless.com/pro/#mandates-get-a-single-mandate).
    *
    *  Example URL: /helpers/mandate
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Helper
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function mandate($params = array(), $headers = array())
    {
        return $this->make_request('mandate', 'post', '/helpers/mandate', $params);
    }

  /**
    *  Modulus checking
    *
    *  Check whether an account number and bank / branch code combination are
    *  compatible.
    *  
    *  Bank account details may either be supplied
    *  using the IBAN (international bank account number), or [local
    *  details](https://developer.gocardless.com/pro/#ui-compliance-local-bank-details).
    *  For more information on the different fields required in each country,
    *  please see the [local bank
    *  details](https://developer.gocardless.com/pro/#ui-compliance-local-bank-details)
    *  section.
    *
    *  Example URL: /helpers/modulus_check
    *
    *
    * @param array $params POST/URL parameters for the argument. Automatically wrapped.
    * @param array $headers String to string associative array of custom headers to add to the requestion.
    *
    * @return Helper
    * @throws \GoCardless\Core\Error\GoCardlessError GoCardless API or server error, subclasses thereof.
    * @throws \GoCardless\Core\Error\HttpError PHP Curl transport layer-level errors.
    **/
    public function modulus_check($params = array(), $headers = array())
    {
        return $this->make_request('modulus_check', 'post', '/helpers/modulus_check', $params);
    }




   /**
    * Get the resource loading class.
    * Used internally to send http requests.
    *
    * @return string
    */
    protected function resourceClass()
    {
        return '\GoCardless\Resources\Helper';
    }

  /**
    *  Get the key the response object is enclosed in in JSON.
    *  Used internally to wrap and unwrap http requests.
    *
    *  @return string
    */
    protected function envelopeKey()
    {
        return 'helpers';
    }
}
