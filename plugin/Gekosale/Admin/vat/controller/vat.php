<?php
/**
 * Gekosale, Open Source E-Commerce Solution
 * http://www.gekosale.pl
 *
 * Copyright (c) 2008-2012 Gekosale sp. z o.o.. Zabronione jest usuwanie informacji o licencji i autorach.
 *
 * This library is free software; you can redistribute it and/or 
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version. 
 * 
 * 
 * $Revision: 438 $
 * $Author: gekosale $
 * $Date: 2011-08-27 11:29:36 +0200 (So, 27 sie 2011) $
 * $Id: vat.php 438 2011-08-27 09:29:36Z gekosale $ 
 */

namespace Gekosale;
use FormEngine;

class VatController extends Component\Controller\Admin
{

	public function index ()
	{
		$this->registry->xajax->registerFunction(array(
			'doDeleteVAT',
			$this->model,
			'doAJAXDeleteVAT'
		));
		
		$this->registry->xajax->registerFunction(array(
			'LoadAllVAT',
			$this->model,
			'getVATForAjax'
		));
		
		$this->registry->xajax->registerFunction(array(
			'GetValueSuggestions',
			$this->model,
			'getValueForAjax'
		));
		
		$this->renderLayout();
	}

	public function add ()
	{
		
		$form = $this->formModel->initForm();
		
		if ($form->Validate(FormEngine\FE::SubmittedData())){
			$this->model->addNewVAT($form->getSubmitValues(FormEngine\Elements\Form::FORMAT_FLAT));
			
			if (FormEngine\FE::IsAction('next')){
				App::redirect(__ADMINPANE__ . '/vat/add');
			}
			else{
				App::redirect(__ADMINPANE__ . '/vat');
			}
		}
		
		$this->renderLayout(Array(
			'form' => $form->Render()
		));
	}

	public function edit ()
	{
		
		$rawVatData = $this->model->getVATView($this->id);
		
		if (empty($rawVatData)){
			App::redirect(__ADMINPANE__ . '/vat');
		}
		
		$populateData = Array(
			'required_data' => Array(
				'value' => $rawVatData['value'],
				'language_data' => $rawVatData['language']
			)
		);
		
		$this->formModel->setPopulateData($populateData);
		
		$form = $this->formModel->initForm();
		
		if ($form->Validate(FormEngine\FE::SubmittedData())){
			try{
				$this->model->editVAT($form->getSubmitValues(FormEngine\Elements\Form::FORMAT_FLAT), $this->id);
			}
			catch (Exception $e){
				$this->registry->template->assign('error', $e->getMessage());
			}
			App::redirect(__ADMINPANE__ . '/vat');
		}
		
		$this->renderLayout(Array(
			'form' => $form->Render()
		));
	}
}