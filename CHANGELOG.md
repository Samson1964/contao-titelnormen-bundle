# Titel und Normen Changelog

## Version 0.1.1 (2026-07-29)

* Fix: Warning: Undefined array key "deleteConfirm" bei contao:migrate -> Lesezugriffe auf $GLOBALS['TL_LANG'] in den DCA-Dateien mit `?? null` bzw. `?? array()` abgesichert, da der DcaLoader die Sprachdateien noch nicht geladen hat

## Version 0.1.0 (2024-04-18)

* Add: codefog/contao-haste
* Change: Haste-Toggler statt des normalen Togglers
* Add: Kompatibilität PHP 8

## Version 0.0.2 (2021-08-15)

* Ausbau des Bundles mit den BE-Grundfunktionen

## Version 0.0.1 (2021-08-14)

* Initiale Version für Contao 4
