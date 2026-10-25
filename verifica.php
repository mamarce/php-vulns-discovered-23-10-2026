<?php
echo "<h2>Verifica Mitigazioni e Versione PHP (CERT-EU 2026-018)</h2>";
echo "<ul style='font-size: 18px; line-height: 1.6;'>";

// 1. Controllo Versione PHP (Fix definitivi)
$php_version = phpversion();
$is_vulnerable = false;
$version_msg = "";

if (version_compare($php_version, '8.2.0', '<')) {
    $is_vulnerable = true;
    $version_msg = "Ramo EOL (incluso PHP 7). Non riceve patch ufficiali precompilate.";
} elseif (version_compare($php_version, '8.2.0', '>=') && version_compare($php_version, '8.2.35', '<')) {
    $is_vulnerable = true;
    $version_msg = "Ramo 8.2 vulnerabile (richiede >= 8.2.35).";
} elseif (version_compare($php_version, '8.3.0', '>=') && version_compare($php_version, '8.3.36', '<')) {
    $is_vulnerable = true;
    $version_msg = "Ramo 8.3 vulnerabile (richiede >= 8.3.36).";
} elseif (version_compare($php_version, '8.4.0', '>=') && version_compare($php_version, '8.4.27', '<')) {
    $is_vulnerable = true;
    $version_msg = "Ramo 8.4 vulnerabile (richiede >= 8.4.27).";
} elseif (version_compare($php_version, '8.5.0', '>=') && version_compare($php_version, '8.5.12', '<')) {
    $is_vulnerable = true;
    $version_msg = "Ramo 8.5 vulnerabile (richiede >= 8.5.12).";
}

if ($is_vulnerable) {
    echo "<li style='color: red;'><strong>VERSIONE A RISCHIO:</strong> PHP $php_version. $version_msg L'installazione richiede le mitigazioni sottostanti o un aggiornamento.</li>";
} else {
    echo "<li style='color: green;'><strong>VERSIONE SICURA:</strong> PHP $php_version è aggiornata con le patch ufficiali.</li>";
}

echo "<hr style='margin: 20px 0;'>";

// 2. Controllo CVE-2026-109619 e CVE-2026-115560 (Mitigazione Stale Global State)
$upload_progress = ini_get('session.upload_progress.enabled');
if (empty($upload_progress) || $upload_progress === '0' || strtolower($upload_progress) === 'off') {
    echo "<li style='color: green;'><strong>MITIGAZIONE ATTIVA:</strong> session.upload_progress.enabled è disabilitato.</li>";
} else {
    echo "<li style='color: red;'><strong>MITIGAZIONE MANCANTE:</strong> session.upload_progress.enabled è abilitato (Valore: $upload_progress).</li>";
}

// 3. Controllo CVE-2026-109618 (Mitigazione OOM Corruption)
$memory_limit = ini_get('memory_limit');
if ($memory_limit === '-1') {
    echo "<li style='color: green;'><strong>MITIGAZIONE ATTIVA:</strong> memory_limit è forzato a -1.</li>";
} else {
    echo "<li style='color: red;'><strong>MITIGAZIONE MANCANTE:</strong> memory_limit non è -1 (Valore: $memory_limit).</li>";
}

// 4. Controllo post_max_size (Mitigazione addizionale OOM)
$post_max_size = ini_get('post_max_size');
echo "<li style='color: #555;'><strong>INFO:</strong> post_max_size è impostato a $post_max_size (il bollettino consiglia 8M, massimo 32M se servono gli upload).</li>";

echo "</ul>";
?>
