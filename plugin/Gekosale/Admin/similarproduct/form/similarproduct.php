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
 * $Revision: 576 $
 * $Author: gekosale $
 * $Date: 2011-10-22 10:23:55 +0200 (So, 22 paź 2011) $
 * $Id: similarproduct.php 576 2011-10-22 08:23:55Z gekosale $ 
 */

namespace Gekosale;
use FormEngine;

class SimilarProductForm extends Component\Form
{
	
	protected $populateData;

	public function setPopulateData ($Data)
	{
		$this->populateData = $Data;
	}

	public function initForm ()
	{
		
		$form = new FormEngine\Elements\Form(Array(
			'name' => 'similarproduct',
			'action' => '',
			'method' => 'post'
		));
		
		$requiredData = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
			'name' => 'required_data',
			'label' => _('TXT_BASE_PRODUCT')
		)));
		
		if ((int) $this->registry->core->getParam() > 0){
			
			$requiredData->AddChild(new FormEngine\Elements\Constant(Array(
				'name' => 'name',
				'label' => _('TXT_BASE_PRODUCT')
			)));
			
			$relatedProducts = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
				'name' => 'related_products',
				'label' => _('TXT_SIMILAR_PRODUCTS')
			)));
			
			$relatedProducts->AddChild(new FormEngine\Elements\ProductSelectRelated(Array(
				'name' => 'products',
				'label' => _('TXT_SIMILAR_PRODUCTS'),
				'rules' => Array(
					new FormEngine\Rules\Required(_('ERR_EMPTY_SIMILAR_PRODUCTS'))
				),
				'repeat_min' => 1,
				'repeat_max' => FormEngine\FE::INFINITE,
				'exclude' => Array((int) $this->registry->core->getParam())
			)));
		}
		else{
			$productid = $requiredData->AddChild(new FormEngine\Elements\ProductSelect(Array(
				'name' => 'productid',
				'label' => _('TXT_BASE_PRODUCT'),
				'rules' => Array(
					new FormEngine\Rules\Required(_('ERR_EMPTY_BASE_PRODUCT'))
				)
			)));
			
			$relatedProducts = $form->AddChild(new FormEngine\Elements\Fieldset(Array(
				'name' => 'related_products',
				'label' => _('TXT_SIMILAR_PRODUCTS')
			)));
			
			$relatedProducts->AddChild(new FormEngine\Elements\ProductSelectRelated(Array(
				'name' => 'products',
				'label' => _('TXT_SIMILAR_PRODUCTS'),
				'rules' => Array(
					new FormEngine\Rules\Required(_('ERR_EMPTY_SIMILAR_PRODUCTS'))
				),
				'repeat_min' => 1,
				'repeat_max' => FormEngine\FE::INFINITE,
				'exclude_from' => $productid
			)));
		}
		
		$Data = Event::dispatch($this, 'admin.similiarproduct.initForm', Array(
			'form' => $form,
			'id' => (int) $this->registry->core->getParam(),
			'data' => $this->populateData
		));
		
		if (! empty($Data)){
			$form->Populate($Data);
		}
		
		$form->AddFilter(new FormEngine\Filters\NoCode());
		$form->AddFilter(new FormEngine\Filters\Trim());
		$form->AddFilter(new FormEngine\Filters\Secure());
		
		return $form;
	}
}