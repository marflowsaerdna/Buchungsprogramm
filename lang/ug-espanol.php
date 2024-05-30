<?php
/*
= LuxCal event calendar on-line user guide =

Traducido al español por Michel Trottier y su novia - Montreal, Canada. Por favor envíe 
sus observaciones y comentarios a humm64@hotmail.com.

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
a: barra superior&nbsp;&nbsp;b: barra de navegación<br />c: calendario vistas&nbsp;&nbsp;d: cedula del día
</div>
<br />
<h4>Tabla de contenidos</h4>
<ol>
<li><p><a href="#1">Descripción general</a></p></li>
<li><p><a href="#2">Acceso (Entrada)</a></p></li>
<li><p><a href="#3">Añadir Evento</a></p></li>
<li><p><a href="#4">Editar / Borrar evento</a></p></li>
<li><p><a href="#5">Options del calendario</a></p></li>
<li><p><a href="#6">Vistas del calendario</a></p></li>
<li><p><a href="#7">Terminar session</a></p></li>
<li><p><a href="#8">Calendario de la Administración</a></p></li>
<li><p><a href="#9">About LuxCal</a></p></li>
</ol>
<br />
<br />
<br />
<br />
<br />
<a name="1"></a><h4>1. Descripción general</h4>
<p>El calendario LuxCal se ejecuta en un servidor web y puede ser visto y gestionado a través de su navegador web.</p>
<p>La barra superior muestra el título del calendario y el nombre del usuario actual. Justo debajo de la barra superior, la barra de navegación contiene varios menús desplegables y enlaces, para 
navegar, entrar / salir, para añadir un evento y para seleccionar las funciones de administrador. Los menús y enlaces que se muestran dependen de los derechos de acceso del usuario. Debajo de la barra de navegación, las diferentes vistas posibles de la agenda son mostradas. 
</p>
<br />
<a name="2"></a><h4>2. Acceso (Entrada)</h4>
<p>Para utilizar el calendario, haga clic en Conectar en la parte derecha de la barra de navegación. Esto le llevará a la pantalla de Inicio de sesión. Introduzca su nombre de usuario o correo electrónico (uno de los dos) y la contraseña recibida del administrador y haga clic en Iniciar sesión. If you select "Remember me" before clicking Log In, next times you launch the calendar you will be automatically logged in. Si olvidó su contraseña, haga clic en Conectar y, a continuación, haga clic en el enlace para obtener una nueva contraseña por correo electrónico.</p>
<p>Usted puede cambiar su dirección de correo electrónico y contraseña introduciendo su nombre de usuario / correo electrónico y contraseña actual y un nuevo correo electrónico / o contraseña.</p>
<p>Si el administrador del calendario le ha dado los derechos Ver a los usuarios de acceso público, el calendario puede ser visto sin iniciar sesión.</p>
<br />
<a name="3"></a><h4>3. Añadir Evento</h4>
<p>Los eventos se pueden añadir de varias maneras:</p>
<ul style="margin:0 20px">
<li><p>haciendo clic en el botón Agregar Evento en la barra de navegación</p></li>
<li><p>haciendo clic en la parte superior de la celula en la vista del mes o del año.</p></li>
<li><p>arrastrando una cierta parte del día en la vista de la semana o del día</p></li>
</ul>
<p>Cualquiera de estos métodos abrirá la ventana Evento con un formulario para introducir la información del evento. Algunos campos en el formulario serán pre-cargados, dependiendo de cuál de las formas anteriores se utiliza para añadir un evento.  </p>
<p>En la primera parte del formulario pueden entrarse el título, el lugar, la categoría y una descripción , y la opción Eventos privados puede ser seleccionada. Es una buena práctica mantener el título corto y utilizar el campo de descripción para más detalles. Las casillas de  lugar y categoría son opcionales. La selección de una categoría atribuye al evento un código de color en todas las vistas de acuerdo con el color de la categoría. El lugar y la descripción aparecerán "onmouseover" más tarde en las diferentes vistas del calendario. Un evento privado será visible para usted solamente, y no para otros.</p>
<p>URL añadido en la descripción de evento, en el formato [url | nombre ] (por ejemplo [www.mysite.com | minombre]), se convierten automáticamente en enlaces que pueden ser seleccionados en la vista del mes, la vista de los próximos eventos y la notificación por correo electrónico.</p>
<p>En la segunda parte del formulario, las fechas y las horas pueden ser especificadas. Si se selecciona la opción Todo el día, las horas no aparecerán en las vistas del calendario. La fecha de finalización es opcional y puede ser usada para los eventos de varios días. Fechas y horarios pueden introducirse manualmente o por medio de los botones selectores de fecha y de tiempo. Los formatos de fecha y hora dependen de la forma en que el administrador haya configurado el calendario. Following the date and time fields, events can be defined as recurring via a separate dialogue box, which opens when clicking the Change button. En este caso, el evento se repetirá tal como se especifica de principio a fin la fecha. Si no se especifica la fecha de finalización, el evento se repetirá para siempre, lo cual es particularmente útil para los cumpleaños.</p>
<p>En la última parte del formulario, a través de la característica Notificar, usted puede seleccionar para enviar un correo electrónico recordatorio a uno o más direcciones de correo electrónico algunos días antes de la fecha del evento. Además, un segundo recordatorio por correo electrónico se enviará automáticamente en la fecha del evento. Para los acontecimientos que se repiten un recordatorio por correo electrónico se enviará el número determinado de días antes de cada aparición del evento y en la fecha misma de cada evento.</p>
<p>Al terminar, pulse Agregar Evento.</p>
<p>If the "Don't close this window" checkbox is checked, the Event window will not close when pressing Add Event. In this case three new buttons will appear at the bottom of the window, to update the added event, to delete the added event, or to re-use the current event data to create an other new event, for instance to duplicate the event on an other date.</p>
<br />
<a name="4"></a><h4>4. Editar / Borrar evento</h4>
<p>En cada una de las vistas del calendario se puede hacer clic en un evento para verlo, editarlo o borrarlo. Esto abrirá la ventana de edición de eventos, que es similar a la ventana Agregar evento descrita anteriormente, excepto por los botones en la parte inferior de la ventana.</p>
<p>Dependiendo de sus derechos de acceso, puede ver los eventos, ver / editar / borrar sus propios eventos o ver / editar / borrar todos los eventos, incluyendo los eventos de otros usuarios.</p>
<p>Para una descripción de los campos, consulte la descripción de Añadir Evento mas arriba. Tenga en cuenta que al hacer clic en Eliminar evento instantáneamente elimina el evento en el calendario,  <strong>sin pedir confirmación.</strong>.</p>
<p>Eliminación de un evento recurrente eliminará todas las instancias del evento, no sólo una fecha específica.</p>
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
<a name="6"></a><h4>6. Vistas del calendario</h4>
<p>En todas las vistas, más detalles sobre el evento aparecerán onmouseover. For private events the background color of the pop up box will be ligh green. En la vista Proximos, las URL en el campo de descripción de los eventos se convertirán automáticamente en hipervínculos a los sitios web relacionados.</p>
<p>Cuando se tienen suficientes derechos de acceso:</p>
<ul style="margin:0 20px">
<li><p>En todas las vistas, hacer clic en un evento abrirá la ventana Editar Evento para el evento, lo cual  puede ser usado para ver, editar o borrar el evento.</p></li>
<li><p>En las vistas de año y mes, se puede agregar un nuevo evento para una fecha determinada haciendo clic en la parte superior de la célula del día (la línea donde se muestra el día del mes).</p></li>
<li><p>En las vistas de la semana y el día, una ventana Agregar evento se puede abrir arrastrando el cursor sobre un determinado periodo de tiempo, los campos fecha y hora serán llenados automáticamente con la información del intervalo de tiempo seleccionado.</p></li>
</ul>
<p>En la vista de cambios, una fecha de principio puede ser especificada. Una lista con todos los acontecimientos añadió, corregido o suprimido ya que la fecha de principio especificada será mostrada</p>
<p>Para mover un evento a una nueva fecha o hora, abrir la ventana Editar evento haciendo clic en el evento y cambie la fecha y/o la hora. Los eventos no se pueden arrastrar a nuevas fechas u horas.</p>
<br />
<a name="7"></a><h4>7. Terminar session</h4>
<p>Para salir, haga clic en Salir en la barra de navegación. Si cierra el calendario sin cerrar la sesión, la próxima vez que el calendario sea abierto, puede ser que comience sin pedir un registro de entrada.</p>
<br />
<a name="8"></a><h4>8. Calendario de la Administración</h4>
<p>- Las características siguientes requieren derechos de administrador  -</p>
<p>Cuando un usuario inicia sesión con derechos de administrador, un menú desplegable, llamado Administración, aparecerá en la parte derecha de la barra de navegación. A través de este menú las funciones de administrador siguientes son disponibles:</p>
<br />
<h5>a. Configuración</h5>
<p>Esta página muestra la configuración actual del calendario, que posteriormente pueden cambiarse. Todos los ajustes se explican en la página Cambiar configuración del calendario. La página proporciona una buena descripción de todas las configuraciones posibles.</p>
<p>La configuración del calendario se almacenan en el archivo config.php en el servidor. Es una buena práctica de grabar el registro config.php cada vez que es modificado.</p>
<br />
<h5>b. Categorías</h5>
<p>Agregar categorías de eventos con diferentes colores - aunque no es obligatorio - mejorará enormemente la vista del calendario. Ejemplos de categorías posibles son 'vacaciones', 'cita', 'Cumpleaños', 'importante', etc</p>
<p>La instalación inicial tiene una sola categoría, denominada «ninguna categoria". Seleccionar categorías del menú de la administración lleva a una página con una lista de todas las categorías, con la posibilidad de añadir nuevas categorías o editar / borrar las categorías existentes.</p>
<p>Cuando se agregan/editan eventos, las categorías definidas pueden ser seleccionadas a partir de una lista desplegable. El orden en que las categorías se muestran en la lista desplegable está determinado por el campo de secuencia. Los campos de Color del texto y Fondo definen los colores utilizados para mostrar los eventos en el calendario que pertenecen a esta categoría.</p>
<p>When adding / editing categories a 'repeat' value can be set; events in this resource will automatically repeat as specified. The checkbox 'Public' can be used to hide events belonging to this resource from being viewed by public access users (not logged in users) and exclude them from the RSS feeds.</p>
<p>Al eliminar una categoría, los acontecimientos que pertenecen a esta categoría seran redefinidos como 'ninguna categoria'.</p>
<br />
<h5>c. Usuarios</h5>
<p>La página de los usuarios le permite al administrador de calendario añadir y editar los usuarios y sus derechos de acceso. Dos áreas principales pueden ser editadas: el nombre del usuario / correo electrónico / contraseña y los derechos de acceso del usuario. Los derechos de acceso posibles son: Ver, publicar-propia, publicar-todo y Admin. Es importante utilizar una dirección de correo electrónico válida, para permitir al usuario recibir notificaciones por correo electrónico de las fechas de vencimiento de los eventos.</p>
<p>Via the Settings page, the administrator can enable "user self-registration" and set the access rights for self registered users. When self-registration is enabled, users can register to the calendar via the browser interface.</p> 
<p>A menos que el administrador del calendario le halla dado Acceso de lectura a usuarios de acceso público, los usuarios deben iniciar sesión utilizando su nombre de usuario o correo electrónico y contraseña. Dependiendo del tipo de usuario, un usuario puede recibir derechos de acceso diferentes.</p>
<p>For each user the default user-interface language on log-in can be specified. If no language is specified, the default calendar language specified on the settings page will be used.</p>
<br />
<h5>c. Base de datos</h5>
<p>La página de base de datos permite al administrador ejecutar las siguientes funciones:</p>
<ul>
<li>Verificar y reparar la base de datos, para localizar y resolver inconsistencias en las tablas.</li>
<li>Compactar la base de datos, para liberar espacio sin utilizar y evitaar sobrecargas.</li>
<li>Respaldar la base de datos, para crear archivos de respaldo que permitan recrear las tablas y su contenido.</li>
</ul>
<p>La primera función, Verificar y reparar la base de datos, sólo necesita ser ejecutada cuando las vistas del calendario ni funcionan adecuadamente. La segunda, Compactar la base de datos, puede ejecutarse anualmente para limpiar la base de datos, y la tercera, Respaldar la base de datos, deberia ejecutarse con más frecuencia, dependiendo del número de eventos que se manejen.</p>
<br />
<h5>d. Importación de archivos CSV</h5>
<p>Esta función puede utilizarse para importar al calendario LuxCal los datos de eventos que han sido exportados de otros calendarios (por ejemplo, MS Outlook). Mas amplias instrucciones se dan más en la página Importar CSV.</p>
<br />
<h5>e. Importación de archivos iCal</h5>
<p>Esta función se utiliza para importar eventos mediante archivos iCal (extensión .ics) en el LuxCal Calendar. Hallará más instrucciones en la página de importación. 
Sólo se importarán eventos compatibles con el calendario LuxCal. Otros componentes, como: Tareas, Diario, Ocupado/Libre, Zona horaria y Alarmas, serán ignorados.</p>
<br />
<h5>f. Exportación de archivos iCal</h5>
<p>Esta función se utiliza para exportar eventos del calendario LuxCal mediante archivos iCal (extensión .ics) 
Hallará más instrucciones en la página de exportación.</p>
<br />
<a name="9"></a><h4>9. About LuxCal</h4>
<p>Author: <b>Roel B.</b>&nbsp;&nbsp;&nbsp;&nbsp;Home page: <b><a href="http://www.luxsoft.eu/" target="_blank">http://www.luxsoft.eu/</a></b></p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the <b><a href="http://www.luxsoft.eu/index.php?pge=gnugpl" target="_blank">GNU General Public License</a></b> as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.</p>
<br />