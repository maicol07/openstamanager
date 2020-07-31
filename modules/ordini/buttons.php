<?php

include_once __DIR__.'/../../core.php';

echo '
<div class="dropdown">
	<button class="btn btn-info dropdown-toggle '.(!in_array($record['stato'], ['Fatturato', 'Evaso', 'Bozza']) ? '' : 'disabled').'" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		<i class="fa fa-magic"></i>&nbsp;'.tr('Crea').'...
		<span class="caret"></span>
	</button>
	<ul class="dropdown-menu dropdown-menu-right">
	    <li>
            <a data-href="'.$structure->fileurl('crea_documento.php').'?id_module='.$id_module.'&id_record='.$id_record.'&documento=intervento" data-toggle="modal" data-title="'.tr('Crea attività').'">
                <i class="fa fa-wrench"></i>&nbsp;'.tr('Attività').'
            </a>
        </li>

        <li>
            <a data-href="'.$structure->fileurl('crea_documento.php').'?id_module='.$id_module.'&id_record='.$id_record.'&documento=ordine_fornitore" data-toggle="modal" data-title="'.tr('Crea ordine fornitore').'">
                <i class="fa fa-file-o"></i>&nbsp;'.tr('Ordine fornitore').'
            </a>
        </li>

        <li>
            <a data-href="'.$structure->fileurl('crea_documento.php').'?id_module='.$id_module.'&id_record='.$id_record.'&documento=ddt" data-toggle="modal" data-title="'.tr('Crea ddt').'">
                <i class="fa fa-truck"></i>&nbsp;'.tr('Ddt').'
            </a>
        </li>

        <li>
            <a data-href="'.$structure->fileurl('crea_documento.php').'?id_module='.$id_module.'&id_record='.$id_record.'&documento=fattura" data-toggle="modal" data-title="'.tr('Crea fattura').'">
                <i class="fa fa-file"></i>&nbsp;'.tr('Fattura').'
            </a>
        </li>
    </ul>
</div>';
