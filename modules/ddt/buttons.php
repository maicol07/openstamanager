<?php

include_once __DIR__.'/../../core.php';

echo '
<i class="fa fa-question-circle-o tip" title="'.tr("Il ddt è fatturabile solo se non si trova negli stati _STATE_LIST_ e la relativa causale è abilitata all'importazione in altri documenti", [
        '_STATE_LIST_' => 'Evaso, Parzialmente evaso, Parzialmente fatturato',
]).'"></i>
<button class="btn btn-info '.($ddt->isImportabile() ? '' : 'disabled').'" data-href="'.$structure->fileurl('crea_documento.php').'?id_module='.$id_module.'&id_record='.$id_record.'&documento=fattura" data-toggle="modal" data-title="'.tr('Crea fattura').(($dir == 'entrata') ? ' di vendita' : ' di acquisto').'">
    <i class="fa fa-magic"></i> '.tr('Crea fattura').(($dir == 'entrata') ? ' di vendita' : ' di acquisto').'
</button>';
