# ZeroOne Markt API


Um diese API zu nutzen wird composer benötigt.
Führe zunächst folgenden Command aus:


```sh
composer update
```


REST API 
Anforderungen
Warenverwaltung/Kassensystem welche folgendes ermöglicht:

- Hinzufügen/Entfernen/Bearbeiten von Produkten mit (id, Preis, Name, Menge) <- Darf ergänzt werden um beliebige Felder
- Abfrage spezifischer Spalten, (z.B. Nur Preis, Name oder auch beides) über die id des Produktes
- Endpunkt um eine bestimmte Menge der ID X abzuziehen und den neuen Datensatz zurückgeben
- Endpunkt um einen QR Code zu einem Produkt zu erstellen welcher Preis und Name enthält
- Beliebige Ergänzung deinerseits

Spezifikationen
- PHP
- Keine Autorisierung/Authentifizierung
- Framework deiner Wahl
- SQL Datenbank für die Speicherung der Daten (ORM darf genutzt werden)
- Vollständiges Logging wenn etwas wichtiges passiert in Daily Logdateien

Offen gestellt ist
- Beliebige 3rd Party Libraries, welche nicht die Kernlogik des Systems übernehmen (Also ein vorhandenes Kassensystem z.B. sondern nur Komponenten wie ein HTTP Client oder QR Code Generator)

