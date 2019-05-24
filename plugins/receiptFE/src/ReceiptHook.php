<?php

namespace Plugins\ReceiptFE;

use Common\HookManager;
use Modules;

class ReceiptHook extends HookManager
{
    public function manage()
    {
        $list = Interaction::getReceiptList();

        return $list;
    }

    public function response($results)
    {
        $count = count($results);

        $module = Modules::get('Fatture di vendita');
        $plugin = $module->plugins->first(function ($value, $key) {
            return $value->name == 'Ricevute FE';
        });

        $link = ROOTDIR.'/controller.php?id_module='.$module->id.'#tab_'.$plugin->id;
        $icon = 'fa fa-ticket';
        $message = tr('Ci sono _NUM_ ricevute da importare', [
            '_NUM_' => $count,
        ]);

        return [
            'icon' => 'fa fa-ticket text-yellow',
            'link' => $link,
            'message' => $message,
            'notify' => !empty($count),
        ];
    }
}
