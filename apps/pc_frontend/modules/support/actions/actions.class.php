<?php

/**
 * support actions.
 *
 * @package    OpenPNE
 * @subpackage support
 * @author     Your name here
 */
class supportActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfWebRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
}
