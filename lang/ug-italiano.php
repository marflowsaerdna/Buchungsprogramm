<?php
/*
= LuxCal event calendar on-line user guide =

Tradotto in Italiano da Angelo.G. - per commenti contattare elghisa@gmail.com

© Copyright 2009-2011 LuxSoft - www.LuxSoft.eu
This file is part of the LuxCal Web Calendar.

The LuxCal Web Calendar is free software: you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the Free Software Foundation, 
either version 3 of the License, or (at your option) any later version.

The LuxCal Web Calendar is distributed in the hope that it will be useful, but WITHOUT 
ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A 
PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with the LuxCal 
Web Calendar. If not, see <http://www.gnu.org/licenses/>.
*/

//LuxCal ug language file version
define("LUG","2.5.3");

?>
<div  class="floatR">
<img src="lang/ug-layout.png" alt="LuxCal page layout" /><br />
a: barra del titolo&nbsp;&nbsp;b: barra di navigazione&nbsp;&nbsp;c: calendario&nbsp;&nbsp;d: giorno
</div>
<br />
<h4>Indice</h4>
<ol>
<li><p><a href="#1">Panoramica</a></p></li>
<li><p><a href="#2">Fare il Log In</a></p></li>
<li><p><a href="#3">Aggiungere un Evento</a></p></li>
<li><p><a href="#4">Modificare / Eliminare un Evento</a></p></li>
<li><p><a href="#5">Optionen del Calendario</a></p></li>
<li><p><a href="#6">Viste del Calendario</a></p></li>
<li><p><a href="#7">Fare il Log Out</a></p></li>
<li><p><a href="#8">Amministrazione del Calendario</a></p></li>
<li><p><a href="#9">About LuxCal</a></p></li>
</ol>
<br />
<br />
<br />
<br />
<a name="1"></a><h4>1. Panoramica</h4>
<p>Il calendario LuxCal gira su un server web e pu&ograve; essere visto e gestito tramite un browser web.</p>
<p>La barra del titolo mostra il titolo del calendario, la data e il nome dell'utente corrente.
Subito sotto la barra del titolo, la barra di navigazione contiene molti menu a discesa e link, per navigare, fare il log in e il log out, aggiungere un evento e selezionare le funzioni di amministrazione. Il tipo di menu e di link visualizzati dipendono dai diritti d'accesso dell'utente.
Sotto la barra di navigazione ci sono le varie viste possibili del calendario</p>
<br />
<a name="2"></a><h4>2. Fare il Log In</h4>
<p>Per usare il calendario cliccare Log In sulla destra della barra di navigazione. Si apre la schermata di log in. Inserire il nome utente o l'indirizzo email (uno dei due) e la password ricevuta dall'amministratore e cliccare Log In. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. In caso si dimentichi la password, cliccare Log In e poi cliccare sul link per ricevere una nuova password via email.</p>
<p>&Egrave; possibile cambiare il proprio indirizzo email e password inserendo il nome utente o l'email e la password corrente e poi il nuovo indirizzo email e/o la nuova password.</p>
<p>Se l'amministratore del calendario ha dato i diritti di Visione agli utenti con accesso pubblico, il calendario pu&ograve; essere consultato senza fare il log in.</p>
<br />
<a name="3"></a><h4>3. Aggiungere un Evento</h4>
<p>Si possono aggiungere gli eventi in molti modi:</p>
<ul style="margin:0 20px">
<li><p>cliccando sul pulsante Aggiungi un Evento nella barra di navigazione</p></li>
<li><p>cliccando la parte superiore della casella di un giorno nelle viste per mese o per anno</p></li>
<li><p>trascinando una certa parte del giorno nelle viste per settimana o per giorno</p></li>
</ul>
<p>Cos&igrave; facendo si apre la finestra Evento con un modulo per inserire le informazioni dell'evento. Alcuni campi saranno precompilati, a seconda del modo scelto tra quelli descritti prima per aggiungere l'evento.</p>
<p>Nella prima parte del modulo si possono inserire il titolo, sede, categoria e una descrizione, e si pu&ograve; selezionare l'opzione Evento Privato. Si consiglia di tenere il titolo dell'evento breve ed usare il campo descrizione per i dettagli. La sede e la categoria dell'evento sono opzionali. La selezione di una categoria codificher&agrave; con un colore l'evento in tutte le viste, in accordo con il colore della categoria. La sede e la descrizione appariranno in un riquadro al passaggio del mouse sopra l'evento, nelle varie viste del calendario. Un evento privato sar&agrave; visibile solo al proprietario, e non agli altri utenti.</p>
<p>Gli URL aggiunti nella descrizione di un evento, nel formato [ url | nome ] (per esempio [www.miosito.com | mionome]), saranno automaticamente convertiti in hyperlinks che potranno essere selezionati nella vista per mese, nella vista eventi futuri e nelle email di notifica.</p>
<p>Nella seconda parte del modulo, si possono specificare data e ora. Se si seleziona Evento per tutto il giorno, non sar&agrave; visualizzato un orario nelle viste del calendario. La data fine &egrave; opzionale e pu&ograve; essere usata per eventi che si svolgono su pi&ugrave; giorni. Si possono inserire date e orari manualmente o tramite i pulsanti di selezione data e ora. Seguendo i campi della data e ora, gli Eventi possono essere definiti come ricorrenti tramite una finestra di dialogo che si apre cliccando sul pulsante Cambia. In questo caso l'evento sar&agrave; ripetuto come specificato dalla data d'inizio a quella finale. Se non viene specificata una data finale (sino a), l'evento sar&agrave; ripetuto per sempre, il che &egrave; particolarmente utile nei casi di ricorrenze come i compleanni.</p>
<p>Nell'ultima parte del modulo, attraverso la funzione Notifica, &egrave; possibile deecidere di mandare un messaggio email come promemoria ad uno o pi&ugrave; indirizzi email un certo numero di giorni prima della data in cui &egrave; programmato l'evento. Inoltre, un secondo promemoria sar&agrave; inviato per email automaticamente il giorno dell'evento. Per gli eventi ricorrenti un promemoria via email sar&agrave; inviato un numero di giorni selezionato prima di ogni occorrenza dell'evento e in ogni giorno di occorrenza dell'evento.</p>
<p>Dopo aver finito cliccare Aggiungi Evento.</p>
<p>Se si seleziona la casella "Non chiudere questa finestra", la finestra degli Eventi non si chiuder&agrave; quando si preme Aggiungi Evento. In questo caso tre nuovi pulsanti appariranno in basso nella finestra, per aggiornare l'evento aggiunto, per eliminare l'evento aggiunto, o per riusare i dati correnti dell'evento per creare un nuovo evento, per esempio per duplicare l'evento in un altra data.</p>
<br />
<a name="4"></a><h4>4. Modificare / Eliminare un Evento</h4>
<p>In ogni vista del calendario si pu&ograve; cliccare un evento per vederlo, modificarlo o eliminarlo. Questo far&agrave; aprire la finestra Modifica Evento, simile alla finestra Evento descritta prima, tranne per i pulsanti in basso.</p>
<p>In funzione dei diritti d'accesso, sar&agrave; possibile vedere/modificare/eliminare i propri eventi o vedere/modificare/eliminare tutti gli eventi, inclusi gli eventi degli altri uenti.</p>
<p>Per una descrizione dei campi, vedere le descrizioni date precedentemente in Aggiungere un Evento. Si noti che cliccando Elimina un Evento, lo si elimina istantaneamente del calendario, <strong>senza chiedere una conferma</strong>.</p>
<p>Se si elimina un evento ricorrente verranno eliminate tutte le istanze dell'evento, non solo quello in una data specifica.</p>
<br />
<a name="5"></a><h4>5. Calendar Options</h4>
<p>Clicking the Options button on the navigation bar will open the calendar's Options Panel. On this panel you can select the following via check boxes:</p>
<ul style="margin:0 20px">
<li><p>The calendar view (year, month, week, day, upcoming or changes).</p></li>
<li><p>An event filter based on event owners. Events of one single owner or multiple owners can be selected.</p></li>
<li><p>An event filter based on event categories. Events in one single resource or multiple categories can be selected.</p></li>
<li><p>The user interface language.</p></li>
</ul>
<p>Note: The display of the event filter menus and the language menu can be enabled/disabled by the calendar administrator.</p>
<p>After having made your choices in the Options Panel, the Options button in the navigation bar should be clicked again to activate your choices.</p> 
<br />
<a name="6"></a><h4>6. Viste del Calendario</h4>
<p>In tutte le viste, appariranno ulteriori dettagli sugli eventi passandoci sopra con il mouse. Per gli eventi privati ​​il ​​colore di sfondo della finestra di pop up sarà di colore verde chiaro. Nella vista eventi futuri, gli URL nel campo descrizione dell'evento, diventano automaticamente hyperlinks per i relativi siti web.</p>
<p>Se si hanno sufficienti diritti d'accesso:</p>
<p>In tutte le viste cliccando un evento si aprir&agrave; la finestra Modifica Evento relativa all'evento, che si pu&ograve; usare per vedere, modificare o eliminare l'evento.</p>
<ul>
<li><p>Nelle viste per anno e mese si pu&ograve; aggiungere un evento in una certa data cliccando nella parte superiore di una casella del giorno (sulla riga dove si vede il giorno del mese).</p></li>
<li><p>Nelle viste per settimana e per giorno, si pu&ograve; aprire una finestra Aggiungi evento trascinando il cursore sopra un certo intervallo di tempo; i campi data e ora saranno precaricati con i valori selezionati.</p></li>
<li><p>Per spostare un evento da una data ad un'altra o ad un altro orario, aprire la finestra Modifica evento cliccando l'evento e modificare la data o l'ora. Non si possono trascinare gli eventi in una nuova data o ora.</p></li>
</ul>
<p>Nella vista Modifiche, si pu&ograve; specificare una data. Verr&agrave; visualizzato un elenco con tutti gli eventi aggiunti, modificati o cancellati a partire dalla data specificata.</p>
<p>Per spostare un evento ad una nuova data od orario, aprire la finestra Modifica Evento cliccando sull'evento e modificare la data e/o l'ora. Non si possono trascinare gli eventi su una nuova data o orario.</p>
<br />
<a name="7"></a><h4>7. Fare il Log Out</h4>
<p>Per fare il log out, cliccare Log Out nella barra di navigazione. Se si chiude il calendario senza fare il log out, la volta successiva che si apre il calendario, potrebbe aprirsi senza chiedere di fare il log in.</p>
<br />
<a name="8"></a><h4>8. Amministrazione del Calendario</h4>
<p><b> Le seguenti funzioni richiedono i diritti di amministratore </b></p>
<p>Se un utente fa il log in e possiede i diritti di aministratore, un nuovo menu, Amministrazione, apparir&agrave; a destra nella barra di navigazione. Da quel menu sono accessibili le seguenti funzioni di amministrazione:</p>
<br />
<h5>a. Impostazioni</h5>
<p>Questa pagina mostra le impostazioni correnti del calendario che si possono modificare. Le inmpostazioni sono spiegate nella pagina Modifica impostazioni Calendario. La pagina fornisce una buona descrizione di tutte le possibili impostazioni.</p>
<p>Le impostazioni del Calendario sono memorizzate nel file config.php sul server. Si consiglia di fare sempre un backup del file config.php prima di fare modifiche.</p>
<br />
<h5>b. Categorie</h5>
<p>L'aggiunta delle categorie degli eventi in diversi colori, anche se non necessaria, aumenta la visibilit&agrave; del calendario. Esempi di possibili Categorie sono 'vacanze', 'appuntamenti', 'compleanni', 'importante', ecc.</p>
<p>L'installazione iniziale ha una sola categoria, di nome 'no cat'. Selezionando Categorie dal menu amministrazione porta ad una pagina con un elenco delle categorie, con la possibilit&agrave; di aggiungerne di nuove o di modificare/eliminare categorie esistenti.</p>
<p>Quando si aggiunge / modifica un evento si pu&ograve; selezionare una categoria gi&agrave; definita da un elenco a discesa. L'ordine in cui compaiano le categorie nell'elenco a discesa &egrave; determinato dal campo Sequenza. I campi colore testo e colore di fondo definiscono i colori utilizzati per visualizzare gli eventi di quella categoria.</p>
<p>When adding / editing categories a 'repeat' value can be set; events in this resource will automatically repeat as specified. The checkbox 'Public' can be used to hide events belonging to this resource from being viewed by public access users (not logged in users) and exclude them from the RSS feeds.</p>
<p>Quando si elimina una categoria, gli eventi che appartengono a questa categoria saranno passati alla categoria 'no cat'.</p>
<br />
<h5>c. Utenti</h5>
<p>La pagina utenti consente all'amministratore del calendario di aggiungere utenti e modificare i loro diritti d'accesso. Si possono modificare due aree principali: il nome/email/password dell'utente e i diritti d'accesso dell'utente. Possibili diritti di accesso sono: Vedi, Crea solo i propri eventi, Crea eventi di tutti, Amministratore. &Egrave; importante usare un indirizzo email valido, per consentire all'utente di ricevere le notifiche via mail delle date degli eventi.</p>
<p>Tramite la pagina Impostazioni, l'amministratore pu&ograve; abilitare "l'auto registrazione degli utenti" e impostare i diritti d'accesso per gli utenti che si auto registrano. Se l'autoregistrazione &egrave; abilitata, gli utenti si possono registrare al calendario tramite l'interfaccia del browser.</p> 
<p>A meno che l'amministratore abbia dato il diritto di Visualizare agli utenti che hanno un accesso pubblico, gli utenti devono fare il log in, usando il loro nome utente o indirizzo email e password. In funzione del tipo di utente, si possono assegnare differenti diritti d'accesso.</p>
<p>For each user the default user-interface language on log-in can be specified. If no language is specified, the default calendar language specified on the settings page will be used.</p>
<br />
<h5>d. Database</h5>
<p>La pagina del database consente all'amministratore del calendario di eseguire le seguenti funzioni:</p>
<ul>
<li>Verifica e Ripara il database, per trovare e risolvere incoerenze nelle tabelle del database</li>
<li>Compatta il database, per liberare spazio inutilizzato ed evitare spreco di risorse</li>
<li>Backup del database, per creare un file di backup che pu&ograve; essere usato per ricreare le tabelle, la struttura e i dati  del database</li>
</ul>
<p>La prima funzione, Verifica e Ripara il database, va eseguita solo se le viste del calendario non funzionano perfettamente. La seconda funzione, Compatta il database, pu&ograve; essere eseguita una volta all'anno per ripulire il database, la terza funzione, Backup del database, dovrebbe essere eseguita pi&ugrave; frequentemente, in funzione dele numero di modifiche apportate.</p>
<br />
<h5>e. Importazione dei file CSV</h5>
<p>Si usa questa funzione per importare nel Calendario Luxcal i dati di eventi esportati da altri calendari (per es. MS Outlook). Ulteriori istruzioni sono nella pagina Importazione CSV.</p>
<br />
<h5>f. Importazione dei file iCal</h5>
<p>Si usa questa funzione per importare nel Calendario Luxcal gli eventi presenti in un file iCal (estensione del file .ics). Ulteriori istruzioni sono presenti nella pagina Importazione iCal. Saranno importati solamente gli eventi compatibili con il Calendario LuxCal. Altri componenti, come: To-Do, Journal, Free / Busy, Time zone e Alarm, saranno ignorati.</p>
<br />
<h5>g. Esportazione dei file iCal</h5>
<p>Si usa questa funzione per esportare gli eventi di LuxCal in un file iCal (estensione del file .ics). Ulteriori istruzioni sono presenti nella pagina Esportazione iCal.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: <b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />