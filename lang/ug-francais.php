<?php
/*
= LuxCal event calendar on-line user guide =

La traduction française a été réalisée par Fabiou (fabiou.dec@gmail.com).
N'hésitez pas à lui faire part de vos remarques si vous constatez des
erreurs ou des oublis dans la traduction.

© Copyright 2009-2011  LuxSoft - www.LuxSoft.eu

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
a: barre supérieure&nbsp;&nbsp;b: barre de navigation<br />c: calendrier&nbsp;&nbsp;d: jour
</div>
<br />
<h4>Table des Matières</h4>
<ol>
<li><p><a href="#1">Préface</a></p></li>
<li><p><a href="#2">Ouvrir une session</a></p></li>
<li><p><a href="#3">Ajouter un événement</a></p></li>
<li><p><a href="#4">Editer/Supprimer un événement</a></p></li>
<li><p><a href="#5">Options du calendrier</a></p></li>
<li><p><a href="#6">Vues du calendrier</a></p></li>
<li><p><a href="#7">Fermer la session</a></p></li>
<li><p><a href="#8">Menu Admin du calendrier</a></p></li>
<li><p><a href="#9">About LuxCal</a></p></li>
</ol>
<br />
<br />
<br />
<br />
<br />
<a name="1"></a><h4>1. Préface</h4>
<p>Le calendrier de LuxCal fonctionne sur un serveur web et peut être consulté et administré par l'intermédiaire de votre navigateur web.</p>
<p>La barre supérieure montre le titre de votre calendrier, la date du jour et le nom de l'utilisateur courant.
    Directement en-dessous de la barre supérieure, la barre de navigation contient plusieurs menus déroulants et liens permettant de naviguer,
    de se connecter/déconnecter, d'ajouter un nouvel événement et de choisir les différentes fonctions d'Administrateur. Les menus et liens sont
	activés en fonction des droits d'accès que possède l'utilisateur.
    En-dessous de la barre de navigation, les diverses possibilités de vues du calendrier seront affichées.</p>
<br />
<a name="2"></a><h4>2. Ouvrir une session</h4>
<p>Si l'administrateur a donné la possibilité à l'utilisateur public de voir le calendrier, il n'est pas nécessaire d'ouvrir une session pour le consulter.</p>
<p>Pour ouvrir une session, cliquer sur "Connexion" à l'extrême droite de la barre de navigation. Entrez votre nom d'utilisateur ou votre adresse email
   (l'un ou l'autre) et le mot de passe reçu de votre administrateur et cliquez sur le bouton "Connexion". If you select "Remember me" before clicking Log In, 
	 next times you launch the calendar you will be automatically logged in. Si vous avez oublié votre mot de passe, encodez votre nom d'utilisateur ou votre 
	 adresse e-mail puis encodez ce que vous croyez être votre mot de passe. Ensuite, cliquez sur le bouton "Envoyer nouveau mot de passe". Recommencer la 
	 connexion avec le nouveau mot de passe que vous aurez reçu sur votre adresse email.</p>
<p>Vous pouvez changer votre non d'utilisateur, votre adresse email ou votre mot de passe en cliquant sur "Modifier mes données" puis en complétant les nouveaux champs.</p>
<br />
<a name="3"></a><h4>3. Ajouter un événement</h4>
<p>L'événement peut être ajouté de différentes manières :</p>
<ul style="margin:0 20px">
<li><p>En cliquant sur le bouton "Ajout événement" de la barre de navigation</p></li>
<li><p>En cliquant sur la date du jour concerné dans la vue "Mois" ou la vue "Année"</p></li>
<li><p>En sélectionnant l'heure ou la plage horaire dans la vue "Semaine" ou "Jour"</p></li>
</ul>
<p>Chaque possibilité affichera une fenêtre permettant d'encoder l'événement.</p>
<p>Dans la 1ère partie du formulaire, vous pouvez encoder le titre, le lieu du rendez-vous, choisir la catégorie, encoder une description et cocher
    l'option "Privé" si nécessaire. Il est conseillé d'écrire un titre court et d'utiliser le champ "Description" pour détailler l'événement.
	Vous pouvez utiliser également le champ "Description" pour écrire un lien URL. Les champs "Lieu" et "Catégorie" sont facultatifs.
	Le choix d'une catégorie influence la couleur du texte et du fond de l'événement et son affichage dans les différentes vues.
	Le contenu des champs "Titre", "Lieu" et "Description" apparaitront dans une info-bulle en passant simplement le curseur de la souris sur
	la date du jour et cela dans toute les vues. Dans cette info-bulle, vous aurez également le nom de l'utilisateur qui a ajouté l'événement.
	Si vous cochez la case du champ "Privé", vous serez le seul utilisateur à voir cet événement.</p>
<p>Le lien URL qui sera ajouté dans le champ "Description" d'un événement dans le format : [URL | nom] (ex : [www.monsite.com | monnom]), 
	sera automatiquement converti en lien hypertexte et pourra être sélectionné dans la vue mois, la vue prochain(s) événement(s) et la notification d'emails</p>
	<p>Dans la 2ème partie du formulaire, vous pouvez encoder les dates et les heures. Si l'événement prend toute la journée, vous devez cocher la case du champ 
	"Journée entière", la possibilité d'encoder les heures disparait et il n'y aura pas d'heures affichées dans les différentes vues.
	La date de fin est facultative et peut être utilisée pour les événements se déroulant sur plusieurs jours. Les dates et les heures peuvent être
	encodées manuellement ou par l'intermédiaire des boutons se trouvant à côté du champ. Vous pouvez répéter l'événement par l'intermédiaire d'une zone de dialogue séparée, 
	qui s'ouvre en cliquant sur le bouton "Modifier". Suivant le choix effectué, l'événement sera répété en tenant compte de la date de début et de la date de fin.
	Si aucune date de fin n'est spécifiée, l'évènement sera répété à l'infini, ce qui peut être utile pour les anniversaires.</p>
<p>Dans la 3ème partie du formulaire, vous pouvez choisir de recevoir un rappel d'un événement sur votre adresse email en choisissant le nombre de jours avant l'événement 
    puis en encodant la ou les adresse(s) email devant recevoir le rappel. Par défaut, votre adresse email est déjà inscrite.
    Un email sera envoyé directement et/ou x jours (en fonction du choix) avant chaque occurrence de l'événement.</p>
<p>Après avoir rempli le formulaire, cliquer sur le bouton "Sauver" pour l'enregistrer dans le calendrier.</p>
<p>Si vous cochez la case du champ "Ne pas fermer cette fenêtre", la fenêtre Événement ne se fermera pas. Dans ce cas-là, trois nouveaux boutons apparaîtront au fond de la fenêtre, 
    vous pourrez sauver les éventuelles modifications, le supprimer ou le dupliquer pour réutiliser les données de l'événement en changeant la date et/ou l'heure.</p>
<br />
<a name="4"></a><h4>4. Editer/Supprimer un événement</h4>
<p>Selon vos droits d'accès, vous pouvez voir tous les événements, voir/éditer/supprimer vos propres événements ou voir/éditer/supprimer les événements de tout le monde.</p>
<p>Si vous avez les droits d'accès requis, vous pouvez voir/éditer/supprimer un événement en cliquant sur son titre dans n'importe quelle vue.
 Une fenêtre s'ouvrira permettant l'édition des champs du formulaire. Cette fenêtre est semblable à celle utilisée pour ajouter un nouvel événement
 excepté les boutons se trouvant à la fin de la fenêtre.</p>
<p>Pour supprimer un événement du calendrier, cliquer sur le bouton "Supprimer". <strong>ATTENTION : Il n'y aura pas de demande de confirmation
 et l'événement sera supprimé définitivement</strong>.</p>
<p>Si vous supprimez un événement répété, toutes ses occurrences seront également supprimées et pas uniquement la date sélectionnée.</p>
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
<a name="6"></a><h4>6. Vues du calendrier</h4>
<p>Dans chaque vue, le détail des événements peut être vu via une info-bulle en passant le curseur de la souris au-dessus de l'événement. Pour les événements privés la couleur de fond de la info-bulle sera vert clair. Si vous avez écrit un lien URL
 dans le champ "Description", le lien sera actif dans chaque vue. Il vous suffira de cliquer dessus pour afficher le site web dans une autre fenêtre.</p>
<p>Si vous avez les droits d'accès requis :</p>
<ul style="margin:0 20px">
<li><p>Cliquer sur un événement dans n'importe quelle vue ouvrira une fenêtre vous permettant d'éditer, de supprimer ou de dupliquer un événement.</p></li>
<li><p>Dans les vues "Année" et "Mois", un nouvel événement peut être créé en cliquant sur la date concernée se trouvant au dessus de la case.</p></li>
<li><p>Dans les vues "Semaine" et "Jour", un nouvel événement peut-être créé en sélectionnant l'heure ou la plage horaire de la ou des journée(s) concernées.
  Les dates et les heures seront automatiquement remplies par la période choisie.</p></li>
</ul>
<p>Dans la vue "Modifications", une date de début peut être spécifiée. Une liste avec tous les événements ajoutés, modifiés ou effacés depuis la date de début spécfiée sera affichée</p>
<p>Pour déplacer un événement à une nouvelle date ou heure, il faut éditer l'événement et changer la date de début et/ou de fin et/ou l'heure dans le formulaire.
 Il n'est pas possible de déplacer les événements en utilisant la souris.</p>
<br />
<a name="7"></a><h4>7. Fermer la session</h4>
<p>Pour fermer votre session, cliquer sur "Déconnexion" dans la barre de navigation.</p>
<p>Si vous fermez le calendrier sans vous déconnecter, votre session restera ouvert. A la prochaine ouverture du calendrier, la session sera déjà ouverte avec votre nom d'utilisateur.</p>
<br />
<a name="8"></a><h4>8. Menu Admin du calendrier</h4>
<p><strong> - Les fonctions suivantes exigent que vous ayez les droits d'administrateur - </strong></p>
<p>Lorsqu'un utilisateur ouvre une session avec les droits d'administrateur, le menu déroulant "Menu Admin" apparait du côté droit dans la barre de navigation.
 Par l'intermédiaire de ce menu, les fonctions suivantes seront disponibles :</p>
<br />
<h5>a. Paramètres</h5>
<p>Cette fonction vous permet d'afficher les paramètres utilisés par le calendrier. Chaque paramètre a une description explicite de ce qu'il configure.
 Après avoir effectué une modification d'un ou plusieurs paramètres, cliquer sur le bouton "Sauver les paramètres" pour les enregistrer.</p>
<p>Les paramètres du calendrier sont sauvegardés dans le fichier de configuration "config.php" sur le serveur web.
 N'oubliez pas de faire une sauvegarde du fichier "config.php" AVANT toutes modifications.</p>
<br />
<h5>b. Catégories</h5>
<p>Cette fonction vous permet de gérer les types de catégorie affectés à chaque évènement. Elle permet également d'ajouter, d'éditer et de supprimer les catégories.</p>
<p>Vous pouvez donner des couleurs différentes aux catégories créés mais ce n'est pas obligatoire. Cela permet de donner une meilleure vue d'ensemble au calendrier.
 Les catégories peuvent être par exemple : rendez-vous, anniversaire, etc.</p>
<p>A l'installation, une seule catégorie est créée avec comme nom 'Aucune'.</p>
<p>Vous pouvez définir l'ordre d'affichage des différentes catégories en complétant le champ "Ordre d'affichage".</p>
<p>Les couleurs définies pour le texte et le fond des différentes catégories seront utilisées dans le calendrier pour montrer des événements appartenant à ces catégories.</p>
<p>Lorsque vous ajoutez/editez une catégorie, une 'Périodicité' peut être choisie; les événements de cette catégorie seront automatiquement répétés  comme spécifié. La case 'Public' peut être utilisée pour cacher des événements pour l'utilisateur public et exclure des événements appartenant à la catégorie du flux RSS.</p>
<p>Lorsque vous effacez une catégorie, les événements qui y étaient liés seront associés à la catégorie 'Aucune'.</p>
<br />
<h5>c. Utilisateurs</h5>
<p>Cette fonction vous permet de gérer les utilisateurs. Vous pouvez ajouter, éditer ou supprimer des utilisateurs et attribuer ou non des droits d'accès
 pour certaines fonctions. Lorsqu'on ajoute un nouvel utilisateur, il y a deux parties distinctes au formulaire à remplir. Dans la 1ère partie,
 on encode le nom de l'utilisateur, son adresse email et son mot de passe et dans la 2ème partie, on active les droits d'accès qu'il possédera.
 Les droits d'accès possibles sont : Voir, Ajouter/Editer/supprimer un événement et Admin. Il est important d'employer une adresse email valide
 afin de permettre à l'utilisateur de recevoir les notifications d'événements.</p>
<p>Par la page des paramètres, l'administrateur peut activer l'auto-enregistrement des utilisateurs et les utilisateurs peuvent également choisir leurs droits d'accès au calendrier. 
   Quand l'auto-enregistrement est permis, les utilisateurs peuvent s'enregistrer au calendrier par l'intermédiaire de l'interface du calendrier.</p> 
<p>A moins que l'Administrateur ait donné la possibilité à l'utilisateur public de voir le calendrier, l'utilisateur doit ouvrir une session en utilisant
 son nom d'utilisateur/son adresse email et son mot de passe pour consulter le calendrier. Selon le type d'utilisateur, les droits d'accès aux fonctions seront différents.</p>
<p>Il est possible de spécifier la langue qui sera utilise par utilisateur. Si aucune langue n'est spécifiée, la langue par défaut du calendrier sera utilisée.</p>
<br />
<h5>c. Base de données</h5>
<p>Cette page vous donne accès aux différentes fonctions de gestion de la base de données:</p>
<ul>
<li>Vérifier et réparer la base de données : trouver et réparer les incohérences dans les tables de la base de données</li>
<li>Compacter la base de données : supprimer définitivement les événements effacer de la base de données et libérer l'espace qu'il occupait</li>
<li>Sauvegarder la base de données : créer un fichier de sauvegarde de la structure des tables et de leurs contenus afin dêtre réutilisée pour recréer la base de données.</li>
</ul>
<p>La 1ère fonction "Vérifier et réparer la base de données" doit seulement être lancée lorsque des incohérences apparaissent dans le calendrier. La 2ème fonction "Compacter la base de données" doit être lancée une fois par an pour nettoyer la base de données, et la 3ème fonction "Sauvegarde de la base de données", doit être lancée régulièrement en fonction de l'utilsation du calendrier.</p>
<br />
<h5>d. Import Fichier CSV</h5>
<p>Cette fonction vous permet d'importer, dans votre calendrier LuxCal, des événements exportés en format CSV d'un autre calendrier comme par exemple MS Outlook.
 Vous trouverez toutes les instructions pour réaliser cet import après avoir cliquer sur la fonction.</p>
<br />
<h5>e. Import Fichier iCal</h5>
<p>Cette fonction vous permet d'importer, dans votre calendrier LuxCal, des événements exportés en format iCalendar 
(extension fichier .ics) d'un autre calendrier.  Vous trouverez toutes les instructions pour réaliser cet import après 
avoir cliquer sur la fonction Import iCal. Seul les événements compatibles avec le calendrier LuxCal  seront importés. 
Les autres composants (A faire, Jounal, Libre / Occupé, Alarme et heure de zone) seront ignorés.</p>
<br />
<h5>f. Export Fichier iCal</h5>
<p>Cette fonction vous permet d'exporter de votre calendrier LuxCal des événements en format iCalendar 
(extension fichier .ics). Vous trouverez toutes les instructions pour réaliser cet export après avoir 
cliquer sur la fonction Export iCal.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: 
<b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the 
<b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published 
by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied 
warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />