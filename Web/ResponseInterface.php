<?php
/**
 * Part of Windwalker project. 
 *
 * @copyright  Copyright (C) 2008 - 2014 Asikart.com. All rights reserved.
 * @license    GNU General Public License version 2 or later;
 */

namespace Windwalker\Application\Web;

/**
 * Interface ResponseInterface
 */
interface ResponseInterface
{
	/**
	 * Method to send the application response to the client.  All headers will be sent prior to the main
	 * application output data.
	 *
	 * @param   boolean $returnBody
	 *
	 * @return  string
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function respond($returnBody = false);

	/**
	 * Checks the accept encoding of the browser and compresses the data before
	 * sending it to the client if possible.
	 *
	 * @param string $encodings
	 *
	 * @return  static
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function compress($encodings);

	/**
	 * getCachable
	 *
	 * @param boolean $cachable
	 *
	 * @return  boolean
	 */
	public function isCachable($cachable = null);

	/**
	 * Method to set a response header.  If the replace flag is set then all headers
	 * with the given name will be replaced by the new one.  The headers are stored
	 * in an internal array to be sent when the site is sent to the browser.
	 *
	 * @param   string   $name     The name of the header to set.
	 * @param   string   $value    The value of the header to set.
	 * @param   boolean  $replace  True to replace any headers with the same name.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function setHeader($name, $value, $replace = false);

	/**
	 * Method to clear any set response headers.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function clearHeaders();

	/**
	 * getHeaders
	 *
	 * @return  array
	 */
	public function getHeaders();

	/**
	 * setHeaders
	 *
	 * @param   array $headers
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setHeaders($headers);

	/**
	 * Return the body content
	 *
	 * @param   boolean  $asArray  True to return the body as an array of strings.
	 *
	 * @return  mixed  The response body either as an array or concatenated string.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function getBody($asArray = false);

	/**
	 * Set body content.  If body content already defined, this will replace it.
	 *
	 * @param   string  $content  The content to set as the response body.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function setBody($content);

	/**
	 * Prepend content to the body content
	 *
	 * @param   string  $content  The content to prepend to the response body.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function prependBody($content);

	/**
	 * Append content to the body content
	 *
	 * @param   string  $content  The content to append to the response body.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function appendBody($content);

	/**
	 * Method to send a header to the client.  We are wrapping this to isolate the header() function
	 * from our code base for testing reasons.
	 *
	 * @param   string   $string   The header string.
	 * @param   boolean  $replace  The optional replace parameter indicates whether the header should
	 *                             replace a previous similar header, or add a second header of the same type.
	 * @param   integer  $code     Forces the HTTP response code to the specified value. Note that
	 *                             this parameter only has an effect if the string is not empty.
	 *
	 * @return  void
	 *
	 * @see     header()
	 * @since   {DEPLOY_VERSION}
	 */
	public function header($string, $replace = true, $code = null);

	/**
	 * Send the response headers.
	 *
	 * @return  static  Return self to support chaining.
	 *
	 * @since   {DEPLOY_VERSION}
	 */
	public function sendHeaders();

	/**
	 * Method to check to see if headers have already been sent.  We are wrapping this to isolate the
	 * headers_sent() function from our code base for testing reasons.
	 *
	 * @return  boolean  True if the headers have already been sent.
	 *
	 * @see     headers_sent()
	 * @since   {DEPLOY_VERSION}
	 */
	public function checkHeadersSent();

	/**
	 * Method to check the current client connection status to ensure that it is alive.  We are
	 * wrapping this to isolate the connection_status() function from our code base for testing reasons.
	 *
	 * @return  boolean  True if the connection is valid and normal.
	 *
	 * @see     connection_status()
	 * @since   {DEPLOY_VERSION}
	 */
	public function checkConnectionAlive();

	/**
	 * getMimeType
	 *
	 * @return  string
	 */
	public function getMimeType();

	/**
	 * setMimeType
	 *
	 * @param   string $mimeType
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setMimeType($mimeType);

	/**
	 * getCharSet
	 *
	 * @return  string
	 */
	public function getCharSet();

	/**
	 * setCharSet
	 *
	 * @param   string $charSet
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setCharSet($charSet);

	/**
	 * getModifiedDate
	 *
	 * @return  \DateTime
	 */
	public function getModifiedDate();

	/**
	 * setModifiedDate
	 *
	 * @param   \DateTime $modifiedDate
	 *
	 * @return  static  Return self to support chaining.
	 */
	public function setModifiedDate($modifiedDate);
}

