<?php

/**
 * Gekosale, Open Source E-Commerce Solution
 * http://www.gekosale.pl
 *
 * Copyright (c) 2008-2013 WellCommerce sp. z o.o.. Zabronione jest usuwanie informacji o licencji i autorach.
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
 * $Id: productrange.php 438 2011-08-27 09:29:36Z gekosale $
 */
namespace Gekosale;

use FormEngine;

class ProductRangeController extends Component\Controller\Admin
{

	public function index ()
	{
		$this->registry->xajax->registerFunction(array(
			'doDeleteProductRange',
			$this->model,
			'doAJAXDeleteProductRange'
		));

		$this->registry->xajax->registerFunction(array(
			'LoadAllProductRange',
			$this->model,
			'getProductRangeForAjax'
		));

		$this->registry->xajax->registerFunction(array(
			'GetNameSuggestions',
			$this->model,
			'getNameForAjax'
		));

		$this->registry->xajax->registerFunction(array(
			'GetFirstnameSuggestions',
			$this->model,
			'getFirstnameForAjax'
		));

		$this->registry->xajax->registerFunction(array(
			'GetSurnameSuggestions',
			$this->model,
			'getSurnameForAjax'
		));

		$this->registry->xajax->registerFunction(array(
			'disableOpinion',
			$this->model,
			'disableOpinion'
		));

		$this->registry->xajax->registerFunction(array(
			'enableOpinion',
			$this->model,
			'enableOpinion'
		));

		$this->renderLayout(Array(
			'datagrid_filter' => $this->model->getDatagridFilterData()
		));
	}

	public function edit()
	{
		$data = $this->model->getOpinion($this->id);
		
		$form = new FormEngine\Elements\Form(Array(
			'name' => 'productrange',
			'action' => '',
			'method' => 'post'
		));

		$requiredData = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
			'name' => 'data',
			'label' => _('TXT_OPINION')
		)));
		
		$requiredData->AddChild(new FormEngine\Elements\StaticText(Array(
			'text' => '<p>' . $data['nick'] . '</p>',
		)));

		$requiredData->AddChild(new FormEngine\Elements\Textarea(Array(
			'name' => 'review',
			'label' => _('TXT_CONTENT'),
			'rules' => Array(
				new FormEngine\Rules\Required(_('ERR_FILL_AN_OPINION')),
			)			
		)));

		$requiredData->AddChild(new FormEngine\Elements\Checkbox(array(
			'name' => 'enable',
			'label' => _('TXT_PUBLISH')
		)));


		$form->Populate(array(
			'data' => array(
				'review' => $data['review'],
				'enable' => (int) $data['enable']
			)
		));		

		$form->AddFilter(new FormEngine\Filters\NoCode());
		$form->AddFilter(new FormEngine\Filters\Trim());
		$form->AddFilter(new FormEngine\Filters\Secure());

		if ($form->Validate(FormEngine\FE::SubmittedData())){
			$this->model->editOpinion($form->getSubmitValues(), $this->registry->core->getParam());
			App::redirect(__ADMINPANE__ . '/productrange');
		}

		$this->renderLayout(Array(
			'form' => $form->Render()
		));
	}
}