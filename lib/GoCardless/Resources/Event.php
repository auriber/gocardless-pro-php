<?php
/**
  * WARNING: Do not edit by hand, this file was generated by Crank:
  *
  * https://github.com/gocardless/crank
  */

namespace GoCardless\Resources;

/**
  * Events are stored for all webhooks. An event refers to a resource which has
  * been updated, for example a payment which has been collected, or a mandate
  * which has been transferred.
  */
class Event
{

    private $data;
    private $response;

  /**
    * Creates a new Resource from a http response passing in the data.
    * @param mixed $data Data coming into the resource.
    * @param Response $response \<no value>\Core\Response object.
    */
    public function __construct($data, $response = null)
    {
        if ($data === null) {
            throw new \Exception('Data cannot be null');
        }
        $this->response = $response;
        $this->data = $data;
    }


  /**
    * What has happened to the resource.
    *
    * @return string
    */
    public function action()
    {
        return $this->data->action;
    }

  /**
    * Fixed
    * [timestamp](https://developer.gocardless.com/pro/#overview-time-zones-dates),
    * recording when this resource was created.
    *
    * @return string
    */
    public function created_at()
    {
        return $this->data->created_at;
    }

  /**
    * 
    *
    * @return array[string]string
    */
    public function details()
    {
        return $this->data->details;
    }

  /**
    * Unique identifier, beginning with "EV"
    *
    * @return string
    */
    public function id()
    {
        return $this->data->id;
    }

  /**
    * Referenced objects. Key values to stdClasses returned.
    *
    * @return array[string]string
    */
    public function links()
    {
        return $this->data->links;
    }

  /**
    * If the `details[origin]` is `api`, this will contain any metadata you
    * specified when triggering this event. In other cases it will be an empty
    * object.
    *
    * @return array[string]string
    */
    public function metadata()
    {
        return $this->data->metadata;
    }

  /**
    * The resource type for this event. One of:
    * <ul>
    *
    * <li>`payments`</li>
    * <li>`mandates`</li>
    * <li>`payouts`</li>
   
    * * <li>`refunds`</li>
    * <li>`subscriptions`</li>
    * </ul>
    * [payments mandates payouts refunds subscriptions]
    * @return string
    */
    public function resource_type()
    {
        return $this->data->resource_type;
    }



  /**
    * Get the response object.
    * @return \GoCardless\Core\Response
    */
    public function response()
    {
        return $this->response;
    }

  /**
    * Returns a string representation of the project.
    * @return string 
    */
    public function __toString()
    {
        $ret = 'Event Class (';
        $ret .= print_r($this->data, true);
        return $ret;
    }
}
