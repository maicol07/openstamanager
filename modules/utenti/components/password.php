<?php

include_once __DIR__.'/../../core.php';

echo '
	<div class="row">
		<div class="col-md-12">
		    {[ "type": "password", "label": "'.tr('Password').'", "name": "password", "required": 1, "strength": "#submit-button" ]}
		</div>
    </div>';
