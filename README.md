# php-vulns-discovered-23-10-2026
Patch temporanee per sistemi con versioni di PHP inferiori a 8.2.35 contro CVE-2026-109618 - CVE-2026-109619 - CVE-2026-115560

Uno script da caricare nel server per verificare istantaneamente se la versione di PHP in uso è vulnerabile e se, applicando alcune modifiche ai files di configurazione php.ini e apache2 è possibile ridurre le possibilità di attacco

## Elenco dei files:
 - verifica.php
 - è lo script da caricare TEMPORANEAMENTE (ricordate di cancellarlo dopo l'uso) nel server
 - conf_mods.txt
 - istruzioni passo passo per modificare i parametri di PHP e di APACHE per mitigare la pericolosità delle CVE segnalate (qualora non sia possibile aggiornare nell'immediato la versione di PHP)

## ATTENZIONE
Le patch risolvono solo in parte le vulnerabilità riscontrate in tutte le versioni di PHP e servono a rendere meno facile l'attacco ma non sono sostitutive dell'aggiornamento di versione. Possono essere quindi applicate temporaneamente ma E' NECESSARIO al più presto un aggiornamento della versione di PHP in uso, secondo il seguente schema:
 - PHP 8.5 versioni dalla 8.5.12 o superiori
- PHP 8.4 versioni dalla 8.4.27 o superiori
- PHP 8.3 versioni dalla 8.3.36 o superiori
- PHP 8.2 versioni dalla 8.2.35 o superiori

### TUTTE le versioni di PHP inferiori alla 8.2.35 sono affette dalle vulnerabilità scoperte il 23 ottobre 2026
### Descrizione delle vulnerabilità disponibili qui: https://cert.europa.eu/publications/security-advisories/2026-018
