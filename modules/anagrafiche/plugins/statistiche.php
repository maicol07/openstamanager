<?php

include_once __DIR__.'/../../../core.php';

// Interventi
$rsi = [];
if (in_array('Cliente', explode(',', $record['tipianagrafica']))) {
    //Clienti
    $rsi = $dbo->fetchArray('SELECT ragione_sociale, (SELECT MIN(orario_inizio) FROM in_interventi_tecnici WHERE idintervento=in_interventi.id) AS data, (SELECT SUM(prezzo_ore_consuntivo+prezzo_km_consuntivo+prezzo_dirittochiamata) FROM in_interventi_tecnici WHERE idintervento=in_interventi.id) AS totale FROM in_interventi INNER JOIN an_anagrafiche ON in_interventi.idanagrafica=an_anagrafiche.idanagrafica WHERE in_interventi.idanagrafica='.prepare($id_record));
} elseif (in_array('Tecnico', explode(',', $record['tipianagrafica']))) {
    //Tecnici
    $rsi = $dbo->fetchArray('SELECT ragione_sociale, (SELECT MIN(orario_inizio) FROM in_interventi_tecnici WHERE idintervento=in_interventi.id) AS data, (SELECT SUM(prezzo_ore_consuntivo+prezzo_km_consuntivo+prezzo_dirittochiamata) FROM in_interventi_tecnici WHERE idintervento=in_interventi.id AND in_interventi_tecnici.idtecnico = '.prepare($id_record).' ) AS totale FROM in_interventi INNER JOIN an_anagrafiche ON in_interventi.idanagrafica=an_anagrafiche.idanagrafica INNER JOIN in_interventi_tecnici ON in_interventi.id = in_interventi_tecnici.idintervento  WHERE in_interventi_tecnici.idtecnico='.prepare($id_record));
}
$totale_interventi = 0;
$data_start = strtotime('now');

for ($i = 0; $i < count($rsi); ++$i) {
    $totale_interventi += $rsi[$i]['totale'];

    // Calcolo data più bassa per la ricerca
    if (strtotime($rsi[$i]['data']) < $data_start) {
        $data_start = strtotime($rsi[$i]['data']);
    }
}
echo '
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">'.tr('Interventi').'</h3>
				</div>
				<div class="box-body">';
if (count($rsi) > 0) {
    echo '
                    <p>'.tr('Sono stati svolti <strong>_NUMBER_ interventi</strong> per un totale di _MONEY_', [
                        '_NUMBER_' => count($rsi),
                        '_MONEY_' => moneyFormat($totale_interventi),
                    ]).'</p>
					<p><a href="'.$rootdir.'/controller.php?id_module='.Modules::get('Interventi')['id'].'&search_Ragione-sociale='.$rsi[0]['ragione_sociale'].'">'.tr('Visualizza').' <i class="fa fa-chevron-right"></i></a></p>';
} else {
    echo '
					<p>'.tr('Nessun intervento').'.</p>';
}

echo '
				</div>
			</div>
		</div>';

// Preventivi
$rsi = $dbo->fetchArray('SELECT co_preventivi.id AS idpreventivo, data_accettazione AS data, ragione_sociale FROM co_preventivi INNER JOIN an_anagrafiche ON co_preventivi.idanagrafica=an_anagrafiche.idanagrafica WHERE co_preventivi.idanagrafica='.prepare($id_record).' AND default_revision = 1');
$totale_preventivi = 0;
$data_start = strtotime('now');

for ($i = 0; $i < count($rsi); ++$i) {
    $totale_preventivi += get_imponibile_preventivo($rsi[$i]['idpreventivo']);
    // Calcolo data più bassa per la ricerca
    if (strtotime($rsi[$i]['data']) < $data_start) {
        $data_start = strtotime($rsi[$i]['data']);
    }
}

echo '
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">'.tr('Preventivi').'</h3>
				</div>
				<div class="box-body">';
if (count($rsi) > 0) {
    echo '
					<p>'.tr('Sono stati fatti <strong>_NUMBER_ preventivi</strong> per un totale di _MONEY_', [
                        '_NUMBER_' => count($rsi),
                        '_MONEY_' => moneyFormat($totale_preventivi),
                    ]).'</p>
					<p><a href="'.$rootdir.'/controller.php?id_module='.Modules::get('Preventivi')['id'].'&search_Cliente='.$rsi[0]['ragione_sociale'].'">'.tr('Visualizza').' <i class="fa fa-chevron-right"></i></a></p>';
} else {
    echo '
					<p>'.tr('Nessun preventivo').'.</p>';
}

echo '
				</div>
			</div>
		</div>
	</div>';

// Contratti
$rsi = $dbo->fetchArray('SELECT data_accettazione AS data, ragione_sociale, (SELECT SUM(co_righe_contratti.subtotale - co_righe_contratti.sconto) FROM co_righe_contratti WHERE co_righe_contratti.idcontratto = co_contratti.id) AS budget FROM co_contratti INNER JOIN an_anagrafiche ON co_contratti.idanagrafica=an_anagrafiche.idanagrafica WHERE co_contratti.idanagrafica='.prepare($id_record));

$totale_contratti = 0;
$data_start = strtotime(date('Ymd'));

for ($i = 0; $i < count($rsi); ++$i) {
    $totale_contratti += $rsi[$i]['budget'];

    // Calcolo data più bassa per la ricerca
    if (strtotime($rsi[$i]['data']) < $data_start) {
        $data_start = strtotime($rsi[$i]['data']);
    }
}
echo '
	<div class="row">
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">'.tr('Contratti').'</h3>
				</div>
				<div class="box-body">';
if (count($rsi) > 0) {
    echo '
					<p>'.tr('Sono stati stipulati <strong>_NUMBER_ contratti</strong> per un totale di _MONEY_', [
                        '_NUMBER_' => count($rsi),
                        '_MONEY_' => moneyFormat($totale_contratti),
                    ]).'</p>
					<p><a href="'.$rootdir.'/controller.php?id_module='.Modules::get('Contratti')['id'].'&search_Cliente='.$rsi[0]['ragione_sociale'].'">'.tr('Visualizza').' <i class="fa fa-chevron-right"></i></a></p>';
} else {
    echo '
					<p>'.tr('Nessun contratto').'.</p>';
}
echo '
				</div>
			</div>
		</div>';

// Fatture
echo '
		<div class="col-md-6">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">'.tr('Fatture').'</h3>
				</div>
				<div class="box-body">';

// Fatture di vendita
$rsi = $dbo->fetchArray("SELECT id, data, ragione_sociale, (SELECT SUM(subtotale+iva) FROM co_righe_documenti WHERE iddocumento=co_documenti.id) AS totale FROM co_documenti INNER JOIN an_anagrafiche ON co_documenti.idanagrafica=an_anagrafiche.idanagrafica WHERE idtipodocumento IN(SELECT id FROM co_tipidocumento WHERE dir='entrata') AND co_documenti.idanagrafica=".prepare($id_record));

$totale_fatture_vendita = 0;
$date_start = date('Y-01-01');

foreach ($rsi as $fattura) {
    $totale_fatture_vendita = sum($totale_fatture_vendita, Modules\Fatture\Fattura::find($fattura['id'])->netto);

    // Calcolo data più bassa per la ricerca
    if (strtotime($fattura['data']) < strtotime($date_start)) {
        $date_start = $fattura['data'];
    }
}

if (count($rsi) > 0) {
    echo '
					<p>'.tr('Sono state emesse <strong>_NUMBER_ fatture di vendita</strong> per un totale di _MONEY_', [
                        '_NUMBER_' => count($rsi),
                        '_MONEY_' => moneyFormat($totale_fatture_vendita),
                    ]).'</p>
					<p><a href="'.$rootdir.'/controller.php?id_module='.Modules::get('Fatture di vendita')['id'].'&period_start='.$date_start.'&period_end='.date('Y-12-31').'&search_Ragione-sociale='.$fattura['ragione_sociale'].'">'.tr('Visualizza').' <i class="fa fa-chevron-right"></i></a></p>';
} else {
    echo '
					<p>'.tr('Nessuna fattura di vendita').'.</p>';
}

echo '
                    <hr>';

// Fatture di acquisto
$rsi = $dbo->fetchArray("SELECT data, ragione_sociale, (SELECT SUM(subtotale+iva) FROM co_righe_documenti WHERE iddocumento=co_documenti.id) AS totale FROM co_documenti INNER JOIN an_anagrafiche ON co_documenti.idanagrafica=an_anagrafiche.idanagrafica WHERE idtipodocumento IN(SELECT id FROM co_tipidocumento WHERE dir='uscita') AND co_documenti.idanagrafica=".prepare($id_record));

$totale_fatture_acquisto = 0;
$date_start = date('Y-01-01');

for ($i = 0; $i < count($rsi); ++$i) {
    $totale_fatture_acquisto += $rsi[$i]['totale'];

    // Calcolo data più bassa per la ricerca
    if (strtotime($rsi[$i]['data']) < strtotime($date_start)) {
        $date_start = $rsi[$i]['data'];
    }
}
if (count($rsi) > 0) {
    echo '
					<p>'.tr('Sono state registrate <strong>_NUMBER_ fatture di acquisto</strong> per un totale di _MONEY_', [
                        '_NUMBER_' => count($rsi),
                        '_TOT_' => moneyFormat($totale_fatture_acquisto),
                    ]).'</p>
					<p><a href="'.$rootdir.'/controller.php?id_module='.Modules::get('Fatture di acquisto')['id'].'&period_start='.$date_start.'&period_end='.date('Y-12-31').'&search_Ragione-sociale='.$rsi[0]['ragione_sociale'].'">'.tr('Visualizza').' <i class="fa fa-chevron-right"></i></a></p>';
} else {
    echo '
					<p>'.tr('Nessuna fattura di acquisto').'.</p>';
}
echo '
				</div>
			</div>
		</div>
	</div>';
