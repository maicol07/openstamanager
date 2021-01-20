<?php
/*
 * OpenSTAManager: il software gestionale open source per l'assistenza tecnica e la fatturazione
 * Copyright (C) DevCode s.r.l.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

include_once __DIR__.'/../../core.php';

$id_anagrafica = filter('id_anagrafica');

$help_codice_bic = tr('Il codice BIC (o SWIFT) è composto da 8 a 11 caratteri (lettere e numeri) ed è suddiviso in:').'<br><br><ul><li>'.tr('AAAA - codice bancario').'</li><li>'.tr('BB - codice ISO della nazione').'</li><li>'.tr('CC - codice città presso la quale è ubicata la banca').'</li><li>'.tr('DD - codice della filiale (opzionale)').'</li></ul>';

echo '
<form action="" method="post" id="add-form">
	<input type="hidden" name="op" value="add">
	<input type="hidden" name="backto" value="record-edit">

	<div class="row">
        <div class="col-md-6">
            {[ "type": "select", "label": "'.tr('Anagrafica').'", "name": "id_anagrafica", "required": "1", "value": "$id_anagrafica$", "ajax-source": "anagrafiche", "value": "'.$id_anagrafica.'", "disabled": "'.intval(!empty($id_anagrafica)).'" ]}
        </div>

		<div class="col-md-6">
			{[ "type": "text", "label": "'.tr('Nome').'", "name": "nome", "required": "1" ]}
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
			{[ "type": "text", "label": "'.tr('IBAN').'", "name": "iban", "required": "1", "class": "alphanumeric-mask", "maxlength": 32, "value": "$iban$" ]}
		</div>
		<div class="col-md-4">
			{[ "type": "text", "label": "'.tr('BIC').'", "name": "bic", "required": "1", "class": "alphanumeric-mask", "minlength": 8, "maxlength": 11, "value": "$bic$", "help": "'.$help_codice_bic.'" ]}
		</div>
	</div>

	<!-- PULSANTI -->
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="submit" class="btn btn-primary">
			    <i class="fa fa-plus"></i> '.tr('Aggiungi').'
            </button>
		</div>
	</div>
</form>';
