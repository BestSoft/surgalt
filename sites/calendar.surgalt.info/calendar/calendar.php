<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Frontier JQuery Calendar</title>

<!-- Include CSS for JQuery Frontier Calendar plugin (Required for calendar plugin) -->
<link rel="stylesheet" type="text/css" href="css/frontierCalendar/jquery-frontier-cal-1.3.2.css" />

<!-- Include CSS for color picker plugin (Not required for calendar plugin. Used for example.) -->
<link rel="stylesheet" type="text/css" href="css/colorpicker/colorpicker.css" />

<!-- Include CSS for JQuery UI (Required for calendar plugin.) -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" />

<!--
Include JQuery Core (Required for calendar plugin)
** This is our IE fix version which enables drag-and-drop to work correctly in IE. See README file in js/jquery-core folder. **
-->
<script type="text/javascript" src="js/jquery-core/jquery-1.4.2-ie-fix.min.js"></script>

<!-- Include JQuery UI (Required for calendar plugin.) -->
<script type="text/javascript" src="js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>

<!-- Include color picker plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/colorpicker/colorpicker.js"></script>

<!-- Include jquery tooltip plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>

<!--
	(Required for plugin)
	Dependancies for JQuery Frontier Calendar plugin.
    ** THESE MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>

<!-- Include JQuery Frontier Calendar plugin -->
<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.3.2.min.js"></script>

</head>
<body style="background-color: #aaaaaa;">

<!-- Some CSS for our example. (Not required for calendar plugin. Used for example.)-->
<style type="text/css" media="screen">
/*
Default font-size on the default ThemeRoller theme is set in ems, and with a value that when combined 
with body { font-size: 62.5%; } will align pixels with ems, so 11px=1.1em, 14px=1.4em. If setting the 
body font-size to 62.5% isn't an option, or not one you want, you can set the font-size in ThemeRoller 
to 1em or set it to px.
http://osdir.com/ml/jquery-ui/2009-04/msg00071.html
*/
body { font-size: 62.5%; }
.shadow {
	-moz-box-shadow: 3px 3px 4px #aaaaaa;
	-webkit-box-shadow: 3px 3px 4px #aaaaaa;
	box-shadow: 3px 3px 4px #aaaaaa;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#aaaaaa')";
	/* For IE 5.5 - 7 */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#aaaaaa');
}
</style>

<script type="text/javascript">
$(document).ready(function(){	

	var clickDate = "";
	var clickAgendaItem = "";
	
	/**
	 * Initializes calendar with current year & month
	 * specifies the callbacks for day click & agenda item click events
	 * then returns instance of plugin object
	 */
	var jfcalplugin = $("#mycal").jFrontierCal({
		date: new Date(),
		dayClickCallback: myDayClickHandler,
		agendaClickCallback: myAgendaClickHandler,
		agendaDropCallback: myAgendaDropHandler,
		agendaMouseoverCallback: myAgendaMouseoverHandler,
		applyAgendaTooltipCallback: myApplyTooltip,
		agendaDragStartCallback : myAgendaDragStart,
		agendaDragStopCallback : myAgendaDragStop,
		dragAndDropEnabled: true
	}).data("plugin");
	
	/**
	 * Do something when dragging starts on agenda div
	 */
	function myAgendaDragStart(eventObj,divElm,agendaItem){
		// destroy our qtip tooltip
		if(divElm.data("qtip")){
			divElm.qtip("destroy");
		}	
	};
	
	/**
	 * Do something when dragging stops on agenda div
	 */
	function myAgendaDragStop(eventObj,divElm,agendaItem){
		//alert("drag stop");
	};
	
	/**
	 * Custom tooltip - use any tooltip library you want to display the agenda data.
	 * for this example we use qTip - http://craigsworks.com/projects/qtip/
	 *
	 * @param divElm - jquery object for agenda div element
	 * @param agendaItem - javascript object containing agenda data.
	 */
	function myApplyTooltip(divElm,agendaItem){

		// Destroy currrent tooltip if present
		if(divElm.data("qtip")){
			divElm.qtip("destroy");
		}
		
		var displayData = "";
		
		var title = agendaItem.title;
		var startDate = agendaItem.startDate;
		var endDate = agendaItem.endDate;
		var allDay = agendaItem.allDay;
		var data = agendaItem.data;
		displayData += "<br><b>" + title+ "</b><br><br>";
		if(allDay){
			displayData += "(All day event)<br><br>";
		}else{
			displayData += "<b>Starts:</b> " + startDate + "<br>" + "<b>Ends:</b> " + endDate + "<br><br>";
		}
		for (var propertyName in data) {
			displayData += "<b>" + propertyName + ":</b> " + data[propertyName] + "<br>"
		}
		// use the user specified colors from the agenda item.
		var backgroundColor = agendaItem.displayProp.backgroundColor;
		var foregroundColor = agendaItem.displayProp.foregroundColor;
		var myStyle = {
			border: {
				width: 5,
				radius: 10
			},
			padding: 10, 
			textAlign: "left",
			tip: true,
			name: "dark" // other style properties are inherited from dark theme		
		};
		if(backgroundColor != null && backgroundColor != ""){
			myStyle["backgroundColor"] = backgroundColor;
		}
		if(foregroundColor != null && foregroundColor != ""){
			myStyle["color"] = foregroundColor;
		}
		// apply tooltip
		divElm.qtip({
			content: displayData,
			position: {
				corner: {
					tooltip: "bottomMiddle",
					target: "topMiddle"			
				},
				adjust: { 
					mouse: true,
					x: 0,
					y: -15
				},
				target: "mouse"
			},
			show: { 
				when: { 
					event: 'mouseover'
				}
			},
			style: myStyle
		});

	};

	/**
	 * Make the day cells roughly 3/4th as tall as they are wide. this makes our calendar wider than it is tall. 
	 */
	jfcalplugin.setAspectRatio("#mycal",0.75);

	/**
	 * Called when user clicks day cell
	 * use reference to plugin object to add agenda item
	 */
	function myDayClickHandler(eventObj){
		// Get the Date of the day that was clicked from the event object
		var date = eventObj.data.calDayDate;
		// store date in our global js variable for access later
		clickDate = date.getFullYear() + "-" + (date.getMonth()+1) + "-" + date.getDate();
		// open our add event dialog
		$('#add-event-form').dialog('open');
	};
	
	/**
	 * Called when user clicks and agenda item
	 * use reference to plugin object to edit agenda item
	 */
	function myAgendaClickHandler(eventObj){
		// Get ID of the agenda item from the event object
		var agendaId = eventObj.data.agendaId;		
		// pull agenda item from calendar
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
		clickAgendaItem = agendaItem;
		$("#display-event-form").dialog('open');
	};
	
	/**
	 * Called when user drops an agenda item into a day cell.
	 */
	function myAgendaDropHandler(eventObj){
		// Get ID of the agenda item from the event object
		var agendaId = eventObj.data.agendaId;
		// date agenda item was dropped onto
		var date = eventObj.data.calDayDate;
		// Pull agenda item from calendar
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
		alert("You dropped agenda item " + agendaItem.title + 
			" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
	};
	
	/**
	 * Called when a user mouses over an agenda item	
	 */
	function myAgendaMouseoverHandler(eventObj){
		var agendaId = eventObj.data.agendaId;
		var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
		//alert("You moused over agenda item " + agendaItem.title + " at location (X=" + eventObj.pageX + ", Y=" + eventObj.pageY + ")");
	};
	/**
	 * Initialize jquery ui datepicker. set date format to yyyy-mm-dd for easy parsing
	 */
	$("#dateSelect").datepicker({
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'yy-mm-dd'
	});
	
	/**
	 * Set datepicker to current date
	 */
	$("#dateSelect").datepicker('setDate', new Date());
	/**
	 * Use reference to plugin object to a specific year/month
	 */
	$("#dateSelect").bind('change', function() {
		var selectedDate = $("#dateSelect").val();
		var dtArray = selectedDate.split("-");
		var year = dtArray[0];
		// jquery datepicker months start at 1 (1=January)		
		var month = dtArray[1];
		// strip any preceeding 0's		
		month = month.replace(/^[0]+/g,"")		
		var day = dtArray[2];
		// plugin uses 0-based months so we subtrac 1
		jfcalplugin.showMonth("#mycal",year,parseInt(month-1).toString());
	});	
	/**
	 * Initialize previous month button
	 */
	$("#BtnPreviousMonth").button();
	$("#BtnPreviousMonth").click(function() {
		jfcalplugin.showPreviousMonth("#mycal");
		// update the jqeury datepicker value
		var calDate = jfcalplugin.getCurrentDate("#mycal"); // returns Date object
		var cyear = calDate.getFullYear();
		// Date month 0-based (0=January)
		var cmonth = calDate.getMonth();
		var cday = calDate.getDate();
		// jquery datepicker month starts at 1 (1=January) so we add 1
		$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);
		return false;
	});
	/**
	 * Initialize next month button
	 */
	$("#BtnNextMonth").button();
	$("#BtnNextMonth").click(function() {
		jfcalplugin.showNextMonth("#mycal");
		// update the jqeury datepicker value
		var calDate = jfcalplugin.getCurrentDate("#mycal"); // returns Date object
		var cyear = calDate.getFullYear();
		// Date month 0-based (0=January)
		var cmonth = calDate.getMonth();
		var cday = calDate.getDate();
		// jquery datepicker month starts at 1 (1=January) so we add 1
		$("#dateSelect").datepicker("setDate",cyear+"-"+(cmonth+1)+"-"+cday);		
		return false;
	});
	
	/**
	 * Initialize delete all agenda items button
	 */
	$("#BtnDeleteAll").button();
	$("#BtnDeleteAll").click(function() {	
		jfcalplugin.deleteAllAgendaItems("#mycal");	
		return false;
	});		
	
	/**
	 * Initialize iCal test button
	 */
	$("#BtnICalTest").button();
	$("#BtnICalTest").click(function() {
		// Please note that in Google Chrome this will not work with a local file. Chrome prevents AJAX calls
		// from reading local files on disk.		
		jfcalplugin.loadICalSource("#mycal",$("#iCalSource").val(),"html");	
		return false;
	});	

	/**
	 * Initialize add event modal form
	 */
	$("#add-event-form").dialog({
		autoOpen: false,
		height: 400,
		width: 400,
		modal: true,
		buttons: {
			'Add Event': function() {

				var what = jQuery.trim($("#what").val());
			
				if(what == ""){
					alert("Please enter a short event description into the \"what\" field.");
				}else{
				
					var startDate = $("#startDate").val();
					var startDtArray = startDate.split("-");
					var startYear = startDtArray[0];
					// jquery datepicker months start at 1 (1=January)		
					var startMonth = startDtArray[1];		
					var startDay = startDtArray[2];
					// strip any preceeding 0's		
					startMonth = startMonth.replace(/^[0]+/g,"");
					startDay = startDay.replace(/^[0]+/g,"");
					var startHour = jQuery.trim($("#startHour").val());
					var startMin = jQuery.trim($("#startMin").val());
					var startMeridiem = jQuery.trim($("#startMeridiem").val());
					startHour = parseInt(startHour.replace(/^[0]+/g,""));
					if(startMin == "0" || startMin == "00"){
						startMin = 0;
					}else{
						startMin = parseInt(startMin.replace(/^[0]+/g,""));
					}
					if(startMeridiem == "AM" && startHour == 12){
						startHour = 0;
					}else if(startMeridiem == "PM" && startHour < 12){
						startHour = parseInt(startHour) + 12;
					}

					var endDate = $("#endDate").val();
					var endDtArray = endDate.split("-");
					var endYear = endDtArray[0];
					// jquery datepicker months start at 1 (1=January)		
					var endMonth = endDtArray[1];		
					var endDay = endDtArray[2];
					// strip any preceeding 0's		
					endMonth = endMonth.replace(/^[0]+/g,"");

					endDay = endDay.replace(/^[0]+/g,"");
					var endHour = jQuery.trim($("#endHour").val());
					var endMin = jQuery.trim($("#endMin").val());
					var endMeridiem = jQuery.trim($("#endMeridiem").val());
					endHour = parseInt(endHour.replace(/^[0]+/g,""));
					if(endMin == "0" || endMin == "00"){
						endMin = 0;
					}else{
						endMin = parseInt(endMin.replace(/^[0]+/g,""));
					}
					if(endMeridiem == "AM" && endHour == 12){
						endHour = 0;
					}else if(endMeridiem == "PM" && endHour < 12){
						endHour = parseInt(endHour) + 12;
					}
					
					//alert("Start time: " + startHour + ":" + startMin + " " + startMeridiem + ", End time: " + endHour + ":" + endMin + " " + endMeridiem);

					// Dates use integers
					var startDateObj = new Date(parseInt(startYear),parseInt(startMonth)-1,parseInt(startDay),startHour,startMin,0,0);
					var endDateObj = new Date(parseInt(endYear),parseInt(endMonth)-1,parseInt(endDay),endHour,endMin,0,0);

					// add new event to the calendar
					jfcalplugin.addAgendaItem(
						"#mycal",
						what,
						startDateObj,
						endDateObj,
						false,
						{
							fname: "Santa",
							lname: "Claus",
							leadReindeer: "Rudolph",
							myDate: new Date(),
							myNum: 42
						},
						{
							backgroundColor: $("#colorBackground").val(),
							foregroundColor: $("#colorForeground").val()
						}
					);

					$(this).dialog('close');

				}
				
			},
			Cancel: function() {
				$(this).dialog('close');
			}
		},
		open: function(event, ui){
			// initialize start date picker
			$("#startDate").datepicker({
				showOtherMonths: true,
				selectOtherMonths: true,
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'yy-mm-dd'
			});
			// initialize end date picker
			$("#endDate").datepicker({
				showOtherMonths: true,
				selectOtherMonths: true,
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'yy-mm-dd'
			});
			// initialize with the date that was clicked
			$("#startDate").val(clickDate);
			$("#endDate").val(clickDate);
			// initialize color pickers
			$("#colorSelectorBackground").ColorPicker({
				color: "#333333",
				onShow: function (colpkr) {
					$(colpkr).css("z-index","10000");
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#colorSelectorBackground div").css("backgroundColor", "#" + hex);
					$("#colorBackground").val("#" + hex);
				}
			});
			//$("#colorBackground").val("#1040b0");		
			$("#colorSelectorForeground").ColorPicker({
				color: "#ffffff",
				onShow: function (colpkr) {
					$(colpkr).css("z-index","10000");
					$(colpkr).fadeIn(500);
					return false;
				},
				onHide: function (colpkr) {
					$(colpkr).fadeOut(500);
					return false;
				},
				onChange: function (hsb, hex, rgb) {
					$("#colorSelectorForeground div").css("backgroundColor", "#" + hex);
					$("#colorForeground").val("#" + hex);
				}
			});
			//$("#colorForeground").val("#ffffff");				
			// put focus on first form input element
			$("#what").focus();
		},
		close: function() {
			// reset form elements when we close so they are fresh when the dialog is opened again.
			$("#startDate").datepicker("destroy");
			$("#endDate").datepicker("destroy");
			$("#startDate").val("");
			$("#endDate").val("");
			$("#startHour option:eq(0)").attr("selected", "selected");
			$("#startMin option:eq(0)").attr("selected", "selected");
			$("#startMeridiem option:eq(0)").attr("selected", "selected");
			$("#endHour option:eq(0)").attr("selected", "selected");
			$("#endMin option:eq(0)").attr("selected", "selected");
			$("#endMeridiem option:eq(0)").attr("selected", "selected");			
			$("#what").val("");
			//$("#colorBackground").val("#1040b0");
			//$("#colorForeground").val("#ffffff");
		}
	});
	
	/**
	 * Initialize display event form.
	 */
	$("#display-event-form").dialog({
		autoOpen: false,
		height: 400,
		width: 400,
		modal: true,
		buttons: {		
			Cancel: function() {
				$(this).dialog('close');
			},
			'Edit': function() {
				alert("Make your own edit screen or dialog!");
			},
			'Delete': function() {
				if(confirm("Are you sure you want to delete this agenda item?")){
					if(clickAgendaItem != null){
						jfcalplugin.deleteAgendaItemById("#mycal",clickAgendaItem.agendaId);
						//jfcalplugin.deleteAgendaItemByDataAttr("#mycal","myNum",42);
					}
					$(this).dialog('close');
				}
			}			
		},
		open: function(event, ui){
			if(clickAgendaItem != null){
				var title = clickAgendaItem.title;
				var startDate = clickAgendaItem.startDate;
				var endDate = clickAgendaItem.endDate;
				var allDay = clickAgendaItem.allDay;
				var data = clickAgendaItem.data;
				// in our example add agenda modal form we put some fake data in the agenda data. we can retrieve it here.
				$("#display-event-form").append(
					"<br><b>" + title+ "</b><br><br>"		
				);				
				if(allDay){
					$("#display-event-form").append(
						"(All day event)<br><br>"				
					);				
				}else{
					$("#display-event-form").append(
						"<b>Starts:</b> " + startDate + "<br>" +
						"<b>Ends:</b> " + endDate + "<br><br>"				
					);				
				}
				for (var propertyName in data) {
					$("#display-event-form").append("<b>" + propertyName + ":</b> " + data[propertyName] + "<br>");
				}			
			}		
		},
		close: function() {
			// clear agenda data
			$("#display-event-form").html("");
		}
	});	 

	/**
	 * Initialize our tabs
	 */
	$("#tabs").tabs({
		/*
		 * Our calendar is initialized in a closed tab so we need to resize it when the example tab opens.
		 */
		show: function(event, ui){
			if(ui.index == 1){
				jfcalplugin.doResize("#mycal");
			}
		}	
	});
	
});
</script>

<h1 style="font-size: 30px; font-weight: bold;">jQuery Frontier Calendar</h1>

<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Introduction</a></li>
		<li><a href="#tabs-2">Example</a></li>
		<li><a href="#tabs-3">Documentation</a></li>
	</ul>
	
	<div id="tabs-2">

		<div id="example" style="margin: auto; width:80%;">
		
		<br>
		
		<div class="shadow" style="border: 1px solid #aaaaaa; padding: 3px;">
			<b>
			Click the calendar to add some agenda items.
			<br><br>
			Please note that Chrome prevents AJAX calls from reading local files on disk so the iCal example will not work. Try in Firefox, Safari, Opera, or IE.
			For Chrome it should work when the iCal file is hosted online from your domain.
			</b>
		</div>
		
		<br><br>

		<div id="toolbar" class="ui-widget-header ui-corner-all" style="padding:3px; vertical-align: middle; white-space:nowrap; overflow: hidden;">
			<button id="BtnPreviousMonth">Previous Month</button>
			<button id="BtnNextMonth">Next Month</button>
			&nbsp;&nbsp;&nbsp;
			Date: <input type="text" id="dateSelect" size="20"/>
			&nbsp;&nbsp;&nbsp;
			<button id="BtnDeleteAll">Delete All</button>
			<button id="BtnICalTest">iCal Test</button>
			<input type="text" id="iCalSource" size="30" value="extra/fifa-world-cup-2010.ics"/>
		</div>

		<br>

		<!--
		You can use pixel widths or percentages. Calendar will auto resize all sub elements.
		Height will be calculated by aspect ratio. Basically all day cells will be as tall
		as they are wide.
		-->
		<div id="mycal"></div>

		</div>

		<!-- debugging-->
		<div id="calDebug"></div>

		<!-- Add event modal form -->
		<style type="text/css">
			//label, input.text, select { display:block; }
			fieldset { padding:0; border:0; margin-top:25px; }
			.ui-dialog .ui-state-error { padding: .3em; }
			.validateTips { border: 1px solid transparent; padding: 0.3em; }
		</style>
		<div id="add-event-form" title="Add New Event">
			<p class="validateTips">All form fields are required.</p>
			<form>
			<fieldset>
				<label for="name">What?</label>
				<input type="text" name="what" id="what" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>
				<table style="width:100%; padding:5px;">
					<tr>
						<td>
							<label>Start Date</label>
							<input type="text" name="startDate" id="startDate" value="" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>Start Hour</label>
							<select id="startHour" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="12" SELECTED>12</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
							</select>				
						<td>
						<td>
							<label>Start Minute</label>
							<select id="startMin" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00" SELECTED>00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>				
						<td>
						<td>
							<label>Start AM/PM</label>
							<select id="startMeridiem" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="AM" SELECTED>AM</option>
								<option value="PM">PM</option>
							</select>				
						</td>
					</tr>
					<tr>
						<td>
							<label>End Date</label>
							<input type="text" name="endDate" id="endDate" value="" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;"/>				
						</td>
						<td>&nbsp;</td>
						<td>
							<label>End Hour</label>
							<select id="endHour" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="12" SELECTED>12</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
								<option value="11">11</option>
							</select>				
						<td>
						<td>
							<label>End Minute</label>
							<select id="endMin" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="00" SELECTED>00</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="30">30</option>
								<option value="40">40</option>
								<option value="50">50</option>
							</select>				
						<td>
						<td>
							<label>End AM/PM</label>
							<select id="endMeridiem" class="text ui-widget-content ui-corner-all" style="margin-bottom:12px; width:95%; padding: .4em;">
								<option value="AM" SELECTED>AM</option>
								<option value="PM">PM</option>
							</select>				
						</td>				
					</tr>			
				</table>
				<table>
					<tr>
						<td>
							<label>Background Color</label>
						</td>
						<td>
							<div id="colorSelectorBackground"><div style="background-color: #333333; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorBackground" value="#333333">
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<label>Text Color</label>
						</td>
						<td>
							<div id="colorSelectorForeground"><div style="background-color: #ffffff; width:30px; height:30px; border: 2px solid #000000;"></div></div>
							<input type="hidden" id="colorForeground" value="#ffffff">
						</td>						
					</tr>				
				</table>
			</fieldset>
			</form>
		</div>
		
		<div id="display-event-form" title="View Agenda Item">
			
		</div>		

		<p>&nbsp;</p>

	</div><!-- end example tab -->

	<div id="tabs-3">
	
<!--

Begin Documentation

-->

<style type="text/css">
a {
  font: 11px/14px georgia, times, verdana, arial, helvetica, sans-serif;
  text-decoration:none;
}
a:hover { background-color:#ccc; }
a:link { color:royalblue; }
a:visited { color:royalblue; }
.code, .info, .codeHead, .apiHead, .api {
	background-color: #dddddd;
	color: #000000;
	font: 11px/14px verdana, georgia, times, arial, helvetica, sans-serif;
	line-height: 18px;
	padding: 3px;
	margin: 0px;
}
.codeHead {
	background-color: #bbbbbb;
}
.info {
	background-color: #ffffff;
	color: #444444;
}
.apiHead{
	background-color: #dedede;
	color: #000000;
}
.api {
	background-color: #ffffff;
	color: #333333;
}

textarea.code {
	width: 100%; height: 300px; padding:0px; margin:0px; font-size:1.2em; font-family:monospace; background-color: #efefef; color: #222222;
}
	
table.apiTable {
	border-width: 0px 0px 0px 0px;
	border-spacing: 2px;
	border-style: outset outset outset outset;
	border-color: gray gray gray gray;
	border-collapse: collapse;
	background-color: #ffffff;
	width: 100%;
}
table.apiTable th {
	font: 12px/12px verdana, georgia, times, arial, helvetica, sans-serif;
	font-weight: bold;
	text-align: left;
	color: #555555;
	border-width: 1px 1px 1px 1px;
	padding: 3px 3px 3px 3px;
	border-style: inset inset inset inset;
	border-color: rgb(200,200,200);
	background-color: #ffffff;
	-moz-border-radius: 0px 0px 0px 0px;
}
table.apiTable td {
	font: 12px/12px verdana, georgia, times, arial, helvetica, sans-serif;
	color: #555555;
	border-width: 1px 1px 1px 1px;
	padding: 3px 3px 3px 3px;
	border-style: inset inset inset inset;
	border-color: rgb(200,200,200);
	background-color: #ffffff;
	-moz-border-radius: 0px 0px 0px 0px;
}
</style>	
	
	
	
<h2>Sections</h2>
<ul>
<li><a href="#License">License & Usage</a></li>
<li><a href="#Requirements">Requirements</a></li>
<li><a href="#Install">Installation Instructions</a></li>
<li><a href="#Initialization">Initialize Calendar</a></li>
<li><a href="#Sizing">Calendar Sizing</a></li>
<li><a href="#DragAndDrop">Drag And Drop</a></li>
<li><a href="#TooltipSetup">Tooltip Setup</a></li>
<li><a href="#GetCurrentMonthYear">Get Current Month/Year</a></li>
<li><a href="#RetrieveAgendaItem">Retrieve Agenda Items</a></li>
<li><a href="#AddAgendaItem">Add Agenda Items</a></li>
<li><a href="#DeleteAgendaItem">Delete Agenda Items</a></li>
<li><a href="#EditAgendaItem">Edit Agenda Items</a></li>
<li><a href="#iCalSupport">iCal Support</a></li>
<li><a href="#Troubleshoot">Troubleshooting</a></li>
<li><a href="#ChangeLog">Change Log</a></li>
</ul>

<a name="License"></a>
<h2>License & Usage</h2>

<p>
Free to use. You're welcome. I claim no responsibility if it explodes in a cloud of doom.<br>
<b>MIT License:</b> <a href="http://en.wikipedia.org/wiki/MIT_License">http://en.wikipedia.org/wiki/MIT_License</a>
</p>

<p>
Seth Lenzi<br>
<a href="mailto:slenzi@gmail.com">slenzi@gmail.com</a>
</p>

<a name="Requirements"></a>
<h2>Requirements</h2>

<p><b>**Important**</b> Please read below regarding modified jQuery Core library for drag-and-drop in IE.</p>

<p>
<b>JQuery Core</b><br>
js/jquery-core/jquery-1.4.2-ie-fix.min.js if you want drag-and-drop to work correctly in IE. Otherwise use regular jQuery Core library.<br>
Read <b>README-IE-FIX.TXT</b> file in jquery-frontier-cal-x.x/js/jquery-core/ folder if you are interested in what was modified.<br>
<a href="http://jquery.com/">http://jquery.com/</a><br>
</p>

<p>
<b>JQuery UI</b><br>
<a href="http://jqueryui.com">http://jqueryui.com</a><br>
</p>

<p>
<b>jshashtable</b><br>
<a href="http://www.timdown.co.uk/jshashtable/">http://www.timdown.co.uk/jshashtable/</a><br>
<a href="http://code.google.com/p/jshashtable/">http://code.google.com/p/jshashtable/</a><br>
</p>



<a name="Install"></a>
<h2>Installation Instructions</h2>

<p>
<b>Step 1:</b> Install modified jQuery Core. This plugin should have come with a slightly modified version of the jQuery Core library in the js/jquery-core/ folder. The file name
is <b>jquery-1.4.2-ie-fix.js</b> for the uncompressed version and <b>jquery-1.4.2-ie-fix.min.js</b> for the compressed version. A slight modification was need to get
drag-and-drop to work correctly in Internet Explorer. If you don't care about IE than you can use an unmodified copy of jQuery Core library. If you are interested in
what was modified in the core library read the <b>README-IE-FIX.TXT</b> file in jquery-frontier-cal-x.x/js/jquery-core/ folder. When a new version of jQuery Core is released
you can make the same small modification. Only one line!
<pre>
WebContent/
  |__js/
  |   |__jquery-core/  
  |         |__jquery-1.4.2-ie-fix.min.js
  |
  |__index.html
</pre>
</p>

<p>
<b>Step 2:</b> If you don't already have the <b>jQuery UI</b> library you should download it from <a href="http://jqueryui.com">jQuery's UI web site</a>. This consists of a javascript file
and a CSS file. Add both files to your HTML document root. Javascript files should go in a folder named "js" or "javascript" and CSS files should go in a folder names "css".
<b>Note:</b> jQuery UI with the smoothness theme is already included with this example in the css/ folder.
<pre>
WebContent/
  |__js/
  |   |__jquery-core/  
  |   |     |__jquery-1.4.2-ie-fix.min.js
  |   |
  |   |__jquery-ui/
  |         |__smoothness/
  |               |__jquery-ui-1.8.1.custom.min.js
  |__css/
  |   |__jquery-ui/
  |         |__smoothness/
  |               |__jquery-ui-1.8.1.custom.css
  |__index.html
</pre>
</p>

<p>
<b>Step 3:</b> Add the <b>Frontier Calendar Javascript</b> file and <b>Frontier Calendar CSS</b> file to your HTML document root.
<pre>
WebContent/
  |__js/
  |   |__jquery-core/  
  |   |     |__jquery-1.4.2-ie-fix.min.js
  |   |
  |   |__jquery-ui/
  |   |     |__smoothness/
  |   |           |__jquery-ui-1.8.1.custom.min.js
  |   |
  |   |__frontierCalendar/  
  |         |__jquery-frontier-cal-1.3.2.min.js
  |
  |__css/
  |   |__jquery-ui/
  |   |     |__smoothness/
  |   |           |__jquery-ui-1.8.1.custom.css
  |   |
  |   |__frontierCalendar/  
  |         |__jquery-frontier-cal-1.3.2.css
  |
  |__index.html
</pre>
</p>

<p>
<b>Step 4:</b> Add the required <b>jshashtable-2.1.js</b> library inlcude in the example /js/lib/ folder.
<a href="http://code.google.com/p/jshashtable/">http://code.google.com/p/jshashtable/</a><br>
<b>Note: This library must be inlcuded before the Frontier Calendar javascript file!</b>
<pre>
WebContent/
  |__js/
  |   |__jquery-core/  
  |   |     |__jquery-1.4.2-ie-fix.min.js
  |   |
  |   |__jquery-ui/
  |   |     |__smoothness/
  |   |           |__jquery-ui-1.8.1.custom.min.js
  |   |
  |   |__frontierCalendar/  
  |   |     |__jquery-frontier-cal-1.3.2.min.js
  |   |
  |   |__lib/
  |        |__jshashtable-2.1.js
  |
  |__css/
  |   |__jquery-ui/
  |   |     |__smoothness/
  |   |           |__jquery-ui-1.8.1.custom.css
  |   |
  |   |__frontierCalendar/  
  |         |__jquery-frontier-cal-1.3.2.css
  |
  |__index.html
</pre>
</p>

<p>
<b>Step 5:</b> Inlcude all libraries on your html page. (<b>Note:</b> The colorpicker javascript file and css file are not required. This is used in the example.)
<xmp>
<link rel="stylesheet" type="text/css" href="css/frontierCalendar/jquery-frontier-cal-1.3.2.css" />
<!-- Include CSS for color picker plugin (Not required for calendar plugin. Used for example.) -->
<link rel="stylesheet" type="text/css" href="css/colorpicker/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="js/jquery-core/jquery-1.4.2-ie-fix.min.js"></script>
<script type="text/javascript" src="js/jquery-ui/smoothness/jquery-ui-1.8.1.custom.min.js"></script>
<!-- Include color picker plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/colorpicker/colorpicker.js"></script>
<!-- Include jquery tooltip plugin (Not required for calendar plugin. Used for example.) -->
<script type="text/javascript" src="js/jquery-qtip-1.0.0-rc3140944/jquery.qtip-1.0.js"></script>
<!--
    ** jshashtable-2.1.js MUST BE INCLUDED BEFORE THE FRONTIER CALENDAR PLUGIN. **
-->
<script type="text/javascript" src="js/lib/jshashtable-2.1.js"></script>
<script type="text/javascript" src="js/frontierCalendar/jquery-frontier-cal-1.3.2.min.js"></script>
</xmp>
</p>



<a name="Initialization"></a>
<h2>Initialize Calendar</h2>

<p>
Initialize the calendar with the current year and month using the date parameter. Provide callback functions for click events 
using the <b>dayClickCallback</b> and <b>agendaClickCallback</b> parameters, and drop events (drag-and-drop) via the <b>agendaDropCallback</b> option.
<b>dayClickCallback</b> will be fired when users click on a day 
cell and <b>agendaClickCallback</b> will be fired when users click on an agenda item. <b>agendaDropCallback</b> will be fired when agenda items are dragged and then
dropped into a day cell (if drag-and-drop is enabled.)
</p>

<p>
After initialization retrieve a reference to the plugin using <b>.data("plugin")</b>. The <b>jfcalplugin</b> object is the interface to 
the calendar and will be used later to interact with the calendar (add/edit/delete agenda items, etc.)
</p>

<p>
<div class="apiHead"><b>Constructor Signature:</b> var jfcalplugin = $('selector').jFrontierCal(date,dayClickCallback,agendaClickCallback,agendaDropCallback,dragAndDropEnabled)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>date</td>
		<td>javascript Date object</td>
		<td>A Date object with the year and month you want the calendar initialized to. Remember that with javascript Dates the months start at 0 (Januaray=0)</td>
	</tr>
	<tr>
		<td>dayClickCallback</td>
		<td>function</td>
		<td>
			A function that is triggered when a day cell is clicked. This is where you can create your customized add event form.
		</td>
	</tr>
	<tr>
		<td>agendaClickCallback</td>
		<td>function</td>
		<td>
			A function that is triggered when an agenda item is clicked. This is where you can create your customized delete/edit agenda item form.
		</td>
	</tr>
	<tr>
		<td>agendaDropCallback</td>
		<td>function</td>
		<td>
			A function that is called when an agenda item is dropped into a day cell. Here is where you could for example perform an AJAX call to update your database.
		</td>
	</tr>
	<tr>
		<td>dragAndDropEnabled</td>
		<td>boolean</td>
		<td>
			True to enable drag-and-drop, false to disable.
		</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Initialize Plugin With Current Year & Month</div>
<textarea class="code">
/**
 * Initialize with current year and date. Returns reference to plugin object.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	dragAndDropEnabled: true
}).data("plugin");
/**
 * Get the date (Date object) of the day that was clicked from the event object
 */
function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
	alert("You clicked day " + date.toDateString());
};
/**
 * Get the agenda item that was clicked.
 */
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);
};
/**
 * get the agenda item that was dropped. It's start and end dates will be updated.
 */
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};
</textarea>



<a name="Sizing"></a>
<h2>Calendar Sizing</h2>

<p>
By default the calendar is 100% wide and the height is calculated by aspect ratio. The day cells will be roughly the same height as 
they are wide (minus the height of the week headers that show the day numbers.) There are a couple ways you can control the size of
the calendar.
</p>

<p>
<b>Option 1: CSS File</b><br>
In the CSS file you can change the <b>width</b> attribute of the <b>.JFrontierCal</b> element. You may use precentage widths and pixel widths.
</p>

<p>
<b>Option 2: Aspect ratio</b><br>
By default the aspect ratio is 1. This makes the day cells roughly the same height as they are wide. Using the API you can change this value.
For example, you can set the aspect ratio to 0.5 to make the day cells half as tall as they are wide resulting in a calendar that is much
wider than it is tall. The aspect ratio value must be less that or equal to 1, and greater than 0. A value of 0.75 makes the day cells 3/4th
as tall as they are wide, and a value of 0.25 makes the day cells 1/4th tall as they are wide.
</p>

<p>
<img src="documentationImages/AspectRatio.png" style="border: 0px solid;">
</p>

<p>
To change the aspect ratio use the <b>jfcalplugin.setAspectRatio()</b> method.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> setAspectRatio(calId,ratio)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td>ratio</td>
		<td>Float</td>
		<td>A value less than or equal to 1 and greater than 0.</td>
	</tr>		
</table>
</p>

<div class="codeHead"><b>Example:</b> Set Aspect Ratio</div>
<textarea class="code" style="height: 100px;">
<!--
jfcalplugin object is reference to calendar plugin. See initialization example above on how to obtain reference to plugin object.
-->
jfcalplugin.setAspectRatio("#mycal",0.75);
</textarea>



<a name="DragAndDrop"></a>
<h2>Drag And Drop</h2>

<p>
Drag-and-drop works in Chrome, Firefox, Safari, and Opera. If you want IE than you have to use the inlcuded modified jQuery Core file (jquery-1.4.2-ie-fix.min.js). Please
read the txt file at <a href="js/jquery-core/README-IE-FIX.TXT">query-frontier-cal-x.x/js/jquery-core/README-IE-FIX.TXT</a> for more information.
</p>

<p>
Drag-and-drop is enabled by default. To turn it off pass false for the <b>dragAndDropEnabled</b> when you initialize the calendar.
</p>

<p>
There are a few callback functions, <b>agendaDragStartCallback</b> & <b>agendaDragStopCallback</b>, that are fired when dragging starts and stops on agenda items. 
These callbacks are defined in the calendar initialization method.
</p>

<p>
When an agenda item is dragged but NOT dropped into another day cell it will revert back to it's start position. When it reverts the <b>applyAgendaTooltip(divElm,agendaItem)</b>
will be called again. When dragging starts you can destroy any tooltip you applied, when reverted it will be applied again.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> agendaDragStartCallback(eventObj,divElm,agendaItem)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>eventObj</td>
		<td>jQuery event object</td>
		<td>The event object for the drag event.</td>
	</tr>
	<tr>
		<td>divElm</td>
		<td>jQuery object</td>
		<td>The div element for the agenda item.</td>
	</tr>
	<tr>
		<td>agendaItem</td>
		<td>javascript object</td>
		<td>
			The agenda item data
<xmp>
{
	agendaId: [integer],
	title: [string]
	startDate: [Date],
	endDate: [Date],
	allDay: [boolean],
	data: {
		key1: [value1],
		key2: [value2],
		etc...
	},
	displayProp: {
		backgroundColor: [string],
		foregroundColor: [string]
	}
}
</xmp>
		</td>
	</tr>	
</table>
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> agendaDragStopCallback(eventObj,divElm,agendaItem)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>eventObj</td>
		<td>jQuery event object</td>
		<td>The event object for the drag event.</td>
	</tr>
	<tr>
		<td>divElm</td>
		<td>jQuery object</td>
		<td>The div element for the agenda item.</td>
	</tr>
	<tr>
		<td>agendaItem</td>
		<td>javascript object</td>
		<td>
			The agenda item data
<xmp>
{
	agendaId: [integer],
	title: [string]
	startDate: [Date],
	endDate: [Date],
	allDay: [boolean],
	data: {
		key1: [value1],
		key2: [value2],
		etc...
	},
	displayProp: {
		backgroundColor: [string],
		foregroundColor: [string]
	}
}
</xmp>
		</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Drag-start and drag-stop callbacks</div>
<textarea class="code" style="height: 600px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

/**
 * Do something when dragging starts on agenda div
 *
 * @param eventObj - jquery drag event object
 * @param divElm - jquery object - reference to the div element for the agenda item.
 * @param agendaItem - javascript object - agenda item data. 
 */
function myAgendaDragStart(eventObj,divElm,agendaItem){
	// dragging started
	var title = agendaItem.title;
	var startDate = agendaItem.startDate;
	var endDate = agendaItem.endDate;
	var allDay = agendaItem.allDay;
	var data = agendaItem.data;	
};

/**
 * Do something when dragging stops on agenda div
 *
 * @param eventObj - jquery drag event object
 * @param divElm - jquery object - reference to the div element for the agenda item.
 * @param agendaItem - javascript object - agenda item data. 
 */
function myAgendaDragStop(eventObj,divElm,agendaItem){
	// dragging stopped
	var title = agendaItem.title;
	var startDate = agendaItem.startDate;
	var endDate = agendaItem.endDate;
	var allDay = agendaItem.allDay;
	var data = agendaItem.data;	
};
</textarea>


<a name="TooltipSetup"></a>
<h2>Tooltip Setup</h2>

<p>
Frontier calendar provides a hook that allows you to add tooltips to agenda items. You can use any tooltip library you want. Ideally the tooltip library you use should have
a destroy or hide method. The tooltip library used in the example is qtip, <a href="http://craigsworks.com/projects/qtip/">http://craigsworks.com/projects/qtip/</a>
</p>

<p>
<img src="documentationImages/TooltipTest.png" style="border: 0px solid;">
</p>

<p>
The hook is the callback function <b>applyAgendaTooltipCallback</b> defined during calendar initialization. This method is fired under the following conditions.
<ul>
	<li>
		When an agenda item is added to the calendar.
	</li>
	<li>
		When an agenda item is dragged and then dropped into a day cell.
	</li>
	<li>
		When an agenda reverts after it has been dragged but not dropped. For example, when the users drags the agenda item outside the bounds of 
		the calendar it will not be dropped and will revert back to the start day cell it was at.
	</li>
</ul>
</p>

<p>
This method could be fired multiple times if the agenda item wraps around to another week. For example if the agenda item starts on Friday and ends on Tuesday there will be two
div elements for the agenda item. One div element that spans from Friday to Saturday, and another div element in the next week that spans from Sunday to Tuesday. The tooltip 
will be applied to all div elements that make up the agenda item.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> applyAgendaTooltipCallback(divElm,agendaItem)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>divElm</td>
		<td>jQuery object</td>
		<td>The div element for the agenda item.</td>
	</tr>
	<tr>
		<td>agendaItem</td>
		<td>javascript object</td>
		<td>
			The agenda item data
<xmp>
{
	agendaId: [integer],
	title: [string]
	startDate: [Date],
	endDate: [Date],
	allDay: [boolean],
	data: {
		key1: [value1],
		key2: [value2],
		etc...
	},
	displayProp: {
		backgroundColor: [string],
		foregroundColor: [string]
	}
}
</xmp>
		</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Apply qTip tooltips to all agenda div elements</div>
<textarea class="code" style="height: 600px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

/**
 * Do something when dragging starts on agenda div
 */
function myAgendaDragStart(eventObj,divElm,agendaItem){
	// destroy our qtip tooltip
	if(divElm.data("qtip")){
		divElm.qtip("destroy");
	}	
};

/**
 * Do something when dragging stops on agenda div
 */
function myAgendaDragStop(eventObj,divElm,agendaItem){
	//alert("drag stop");
};

/**
 * Custom tooltip - use any tooltip library you want to display the agenda data.
 *
 * For this example we use qTip - http://craigsworks.com/projects/qtip/
 *
 * @param divElm - jquery object for agenda div element
 * @param agendaItem - javascript object containing agenda data.
 */
function myApplyTooltip(divElm,agendaItem){

	// Destroy currrent tooltip if present
	if(divElm.data("qtip")){
		divElm.qtip("destroy");
	}
	
	var displayData = "";
	
	var title = agendaItem.title;
	var startDate = agendaItem.startDate;
	var endDate = agendaItem.endDate;
	var allDay = agendaItem.allDay;
	var data = agendaItem.data;
	displayData += "<br><b>" + title+ "</b><br><br>";
	if(allDay){
		displayData += "(All day event)<br><br>";
	}else{
		displayData += "<b>Starts:</b> " + startDate + "<br>" + "<b>Ends:</b> " + endDate + "<br><br>";
	}
	for (var propertyName in data) {
		displayData += "<b>" + propertyName + ":</b> " + data[propertyName] + "<br>"
	}
	// apply tooltip
	divElm.qtip({
		content: displayData,
		position: {
			corner: {
				tooltip: "bottomMiddle",
				target: "topMiddle"			
			},
			adjust: { 
				mouse: true,
				x: 0,
				y: -15
			},
			target: "mouse"
		},
		show: { 
			when: { 
				event: 'mouseover'
			}
		},
		style: {
			border: {
				width: 5,
				radius: 10
			},
			padding: 10, 
			textAlign: "left",
			tip: true,
			name: "dark"
		}
	});

};
</textarea>


<a name="GetCurrentMonthYear"></a>
<h2>Get Current Month/Year</h2>

<p>
There are many instances in which you may need to get the current year and month that calendar is displaying. Use the <b>jfcalplugin.getCurrentDate()</b> method 
to get a javascript Date object.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> getCurrentDate(calId)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td colspan="3">
			<b>Returns:</b> A javascript Date object with the year and month that the calendar is currently set to.
		</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Get calendar Date (year & month)</div>
<textarea class="code" style="height: 500px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

// date with the year and month the calendar is set to.
var calDate = jfcalplugin.getCurrentDate("#mycal");

function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
};
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	var item = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};
</textarea>


<a name="RetrieveAgendaItem"></a>
<h2>Retrieve Agenda Items</h2>

<p>
To retrieve agenda items from the calendar use <b>jfcalplugin.getAgendaItemById()</b> or <b>jfcalplugin.getAgendaItemByDataAttr()</b> or <b>jfcalplugin.getAllAgendaItems()</b> 
</p>

<b>Agenda Item Object Specification:</b>
<textarea class="code">
{
	agendaId: [integer],
	title: [string]
	startDate: [Date],
	endDate: [Date],
	allDay: [boolean],
	data: {
		key1: [value1],
		key2: [value2],
		etc...
	},
	displayProp: {
		backgroundColor: [string],
		foregroundColor: [string]
	}
}
</textarea>

<p>
<div class="apiHead"><b>Method Signature:</b> getAgendaItemById(calId,agendaId)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td>agendaId</td>
		<td>integer</td>
		<td>The internal agenda ID. You can get this ID from event object on click events.</td>
	</tr>
	<tr>
		<td colspan="3">
			<b>Returns:</b> A single agenda item object.
		</td>
	</tr>	
</table>
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> getAgendaItemByDataAttr(calId,attrName,attrValue)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>	
	<tr>
		<td>attrName</td>
		<td>String</td>
		<td>
			The name of the attribute in the agenda data object. When you add an agenda item to the calendar one of the
			parameters is an object with key value pairs. This allows you to store any data you want in the agenda item.
<xmp>
Example data object:
{
myCustomAgendaId: "12345",
fname: "Papa",
lname: "Smurf"
}
</xmp>
			For this example data object you can retrieve the agenda item like so, getAgendaItemByDataAttr("#mycal","myCustomAgendaId","12345");
		</td>
	</tr>
	<tr>
		<td>attrValue</td>
		<td>string/number</td>
		<td>
			The attribute value in the data object.
		</td>
	</tr>
	<tr>
		<td colspan="3">
			<b>Return:</b> An array of agenda item objects. All agenda items that have the matching attribute value. If there is only
			one than the array will be of length 1.
		</td>
	</tr>	
</table>
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> getAllAgendaItems(calId)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td colspan="3">
			<b>Return:</b> An array of agenda item objects.
		</td>
	</tr>
</table>
</p>

<div class="codeHead"><b>Example:</b> Get Agenda Items from Calendar</div>
<textarea class="code" style="height: 600px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

// add sample item so we can retrieve it
jfcalplugin.addAgendaItem(
	"#mycal",
	"Indiana Jones and the Last Crusade",
	new Date(1989,4,24,1,0,0,0),
	new Date(1989,4,24,23,59,59,999),
	false,
	{
		fname: "Indiana",
		lname: "Jones",
		artifact: "Holy Grail"
	},
	{
		backgroundColor: "#FF0000",
		foregroundColor: "#FFFFFF"
	}	
);	
function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
};
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	var item = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};	

// retrieve agend item by data attribute
var item = jfcalplugin.getAgendaItemByDataAttr("#mycal","fname","Indiana");

// get all agenda items
var allItemsArray = jfcalplugin.getAllAgendaItems("#mycal");
</textarea>




<a name="AddAgendaItem"></a>
<h2>Add Agenda Items</h2>

<p>
To add an agenda item to the calendar use the <b>jfcalplugin.addAgendaItem()</b> method.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> addAgendaItem(calId,title,startDate,endDate,allDay,data,displayProp)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td>title</td>
		<td>String</td>
		<td>The title of the agenda item. This is displayed on the agenda div element.</td>
	</tr>
	<tr>
		<td>startDate</td>
		<td>Date</td>
		<td>Date & time the agenda event starts.</td>
	</tr>
	<tr>
		<td>endDate</td>
		<td>Date</td>
		<td>Date & time the agenda event ends.</td>
	</tr>
	<tr>
		<td>allDay</td>
		<td>boolean</td>
		<td>True if an all day event (do not show start time on agenda div element), false otherwise. False by default.</td>
	</tr>	
	<tr>
		<td>data</td>
		<td>Object</td>
		<td>
			Any optional data you want to store in the agenda item. An object with a series of key value pairs.
			e.g. {var1: "some data", var2: "more data", var3: "etc..."}<br><br>
			Pass null if you don't want to store any data.
		</td>
	</tr>
	<tr>
		<td>displayProp</td>
		<td>Object</td>
		<td>
Optional display properties for the agenda item, or null.
<xmp>
Allowed Options:
{
backgroundColor: [string],
foregroundColor: [string]
}
</xmp>
Color values can be hex, rbg, or color name (e.g. "#FF0000", or "rgb(255,0,0)" or "red")
		</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Add Agenda Item</div>
<textarea class="code">
<!--
jfcalplugin object is reference to calendar plugin. See initialization example above on how to obtain reference to plugin object.
-->
jfcalplugin.addAgendaItem(
	"#mycal",
	"Christmas Eve",
	new Date(2010,11,24,20,0,0,0),
	new Date(2010,11,24,23,59,59,999),
	false,
	{
		fname: "Santa",
		lname: "Claus",
		leadReindeer: "Rudolph",
		myExampleDate: new Date()
	},
	{
		backgroundColor: "#FF0000",
		foregroundColor: "#FFFFFF"
	}	
);
</textarea>




<a name="DeleteAgendaItem"></a>
<h2>Delete Agenda Items</h2>

<p>
To delete an agenda item use either <b>jfcalplugin.deleteAgendaItemById()</b>, or <b>jfcalplugin.deleteAgendaItemByDataAttr()</b>, or <b>jfcalplugin.deleteAllAgendaItems()</b> methods.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> deleteAgendaItemById(calId,agendaId)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td>agendaId</td>
		<td>integer</td>
		<td>The internal agenda ID. You can get this ID from event object on click events.</td>
	</tr>		
</table>
</p>

<div class="codeHead"><b>Example:</b> Delete Agenda Item By ID.</div>
<textarea class="code" style="height: 500px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
	alert("You clicked day " + date.toDateString());
};
/**
 * Delete any agenda item when it's clicked.
 */
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	jfcalplugin.deleteAgendaItemById("#mycal",agendaId);
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};		
</textarea>

<p>
<div class="apiHead"><b>Method Signature:</b> deleteAgendaItemByDataAttr(calId,attrName,attrValue)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>	
	<tr>
		<td>attrName</td>
		<td>String</td>
		<td>
			The name of the attribute in the agenda data object. When you add an agenda item to the calendar one of the
			parameters is an object with key value pairs. This allows you to store any data you want in the agenda item.
<xmp>
Example data object:
{
myCustomAgendaId: "12345",
fname: "Papa",
lname: "Smurf"
}
</xmp>
			For this example data object you can delete the agenda item like so, deleteAgendaItemByDataAttr("#mycal","myCustomAgendaId","12345");
		</td>
	</tr>
	<tr>
		<td>attrValue</td>
		<td>string/number</td>
		<td>
			The attribute value in the data object.
		</td>
	</tr>		
</table>
</p>

<div class="codeHead"><b>Example:</b> Delete Agenda Item By Data Attribute Value.</div>
<textarea class="code" style="height: 600px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

// add sample item so we can delete it
jfcalplugin.addAgendaItem(
	"#mycal",
	"Indiana Jones and the Last Crusade",
	new Date(1989,4,24,1,0,0,0),
	new Date(1989,4,24,23,59,59,999),
	false,
	{
		fname: "Indiana",
		lname: "Jones",
		artifact: "Holy Grail"
	},
	{
		backgroundColor: "#FF0000",
		foregroundColor: "#FFFFFF"
	}	
);
function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
	alert("You clicked day " + date.toDateString());
};
/**
 * Delete the clicked agenda item if it has a data attribute name "artifact" with value "Holy Grail"
 */
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	jfcalplugin.deleteAgendaItemByDataAttr("#mycal","artifact","Holy Grail");
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};		
</textarea>

<p>
<div class="apiHead"><b>Method Signature:</b> deleteAllAgendaItems(calId)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>	
</table>
</p>

<div class="codeHead"><b>Example:</b> Delete all agenda items.</div>
<textarea class="code" style="height: 400px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

jfcalplugin.deleteAllAgendaItems("#mycal");

function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
	jfcalplugin.deleteAgendaItemByDataAttr("#mycal","artifact","Holy Grail");
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};		
</textarea>

<p>&nbsp;</p>
<a name="EditAgendaItem"></a>
<h2>Edit Agenda Items</h2>

<p>Documentation coming soon!</p>

<p>For now you simply pull the agenda item from the calendar, update it, delete the existing entry and then re-add it. I will have a nice update method later.</p>	
	


<p>&nbsp;</p>
<a name="iCalSupport"></a>
<h2>iCal Support</h2>

<p>
Frontier calendar has some basic iCal support. You can import iCal VEVENT data from an iCal file using 
the <b>jfcalplugin.loadICalSource(calId,iCalUrl,responseDataType) method.</b>
</p>

<p>
Please note that I don't know every much about iCal... The above method just parses out the VEVENT data and builds agenda items.
</p>

<p>
<div class="apiHead"><b>Method Signature:</b> loadICalSource(calId,iCalUrl,responseDataType)</div>
<table class="apiTable">
	<tr>
		<th>Parameter</th>
		<th>Type</th>
		<th>Description</th>
	</tr>
	<tr>
		<td>calId</td>
		<td>String</td>
		<td>The ID of the calendar div element.</td>
	</tr>
	<tr>
		<td>iCalUrl</td>
		<td>String</td>
		<td>
			Path to the iCal file. This can be a local path on disk or a URL. This resource will be requested using a jQuery AJAX call.<br>
			<b>Please note:</b> This will not work on Chrome for local files. See 
			<a href="http://code.google.com/p/chromium/issues/detail?id=40787">http://code.google.com/p/chromium/issues/detail?id=40787</a>
		</td>
	</tr>	
	<tr>
		<td>responseDataType</td>
		<td>string</td>
		<td>
			Data type of the response data, something like "text/html" or "application/octet-stream", etc...<br>
		</td>
	</tr>		
</table>
</p>

<div class="codeHead"><b>Example:</b> Load iCal data.</div>
<textarea class="code" style="height: 400px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

// load our sample FIFA World Cup 2010 iCal file in the extra/ folder inlcuded with this example.
jfcalplugin.loadICalSource("#mycal","extra/fifa-world-cup-2010.ics","application/octet-stream");	

function myDayClickHandler(eventObj){
	var date = eventObj.data.calDayDate;
	alert("You clicked day " + date.toDateString());
};
function myAgendaClickHandler (eventObj){
	var agendaId = eventObj.data.agendaId;
};
function myAgendaDropHandler(eventObj){
	var agendaId = eventObj.data.agendaId;
	var date = eventObj.data.calDayDate;		
	var agendaItem = jfcalplugin.getAgendaItemById("#mycal",agendaId);		
	alert("You dropped agenda item " + agendaItem.title + 
		" onto " + date.toString() + ". Here is where you can make an AJAX call to update your database.");
};	
</textarea>



<p>&nbsp;</p>
<a name="Troubleshoot"></a>
<h2>Troubleshooting</h2>

<p>
If another element on your page changes size, causing the calendar div element to move, you may notice that the agenda items
are not properly aligned. For example, if you have an element above the calendar that grows in height than the celendar div
element will be pushed down further on the page. Since the agenda items are absolutely positioned over the calendar day cells
they will not move, and they will not be properly aligned over the calendar.
</p>

<table style="width: 100%;">
	<tr>
		<td style="width: 50%;">
			<p>
			<b>Before:</b> Agenda items are posititoned correctly.
			</p>
			<img src="documentationImages/CalMove02.png" style="border: 0px solid;">
		</td>
		<td>
			<p>
			<b>After:</b> element above calendar cause calendar div to shift down. Absolute positioned agenda items do not
			shift down with the calendar. Looks bad! :(
			</p>		
			<img src="documentationImages/CalMove03.png" style="border: 0px solid;">
		</td>
	</tr>
</table>

<p>
<b>Solution 1:</b> Call the <b>reRenderAgendaItems(calId)</b> function to re-render the agenda items after the calendar moves.
</p>

<p>
<b>Solution 2:</b> Make sure there is nothing on your page that will cause the calendar div element to move! :)
</p>

<div class="codeHead"><b>Example:</b> Re-render agenda items function.</div>
<textarea class="code" style="height: 400px;">
/**
 * Initializes calendar.
 */
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");

// re-render agenda items if calendar element moves
jfcalplugin.reRenderAgendaItems("#mycal");	
	
</textarea>

<p>&nbsp;</p>
<a name="ChangeLog"></a>
<h2>Change Log</h2>

<p>
<b>June 23nd, 2010 - Version 1.3.1</b>
</p>
<ul>
<li>Crucial bug fix to the <b>deleteAgendaItemByDataAttr(calId,attrName,attrValue)</b> function.</li>
<br>
<li>New <b>reRenderAgendaItems(calId)</b> function that allows you to re-render the agenda items if they get out of alignment. See <a href="#Troubleshoot">Troubleshooting</a> section for further information</li>
</ul>

<br>

<p>
<b>June 22nd, 2010 - Version 1.3</b>
</p>

<ul>

<li> Bug fixes</li>

<br>

<li> Tooltips on agenda items. Use any tooltip library you want. Whatever library you choose it should probably have destroy() 
tooltip and/or hide() tooltip methods. See documentation on <b>applyAgendaTooltipCallback(divElm,agendaItem)</b> callback function.</li>

<img src="documentationImages/TooltipTest.png" style="border: 0px solid; width:400px;">

<br><br>

<li> Two additional callback functions for drag events, <b>agendaDragStartCallback(eventObj,divElm,agendaItem)</b> 
and <b>agendaDragStopCallback(eventObj,divElm,agendaItem)</b>. These are fired when dragging starts and dragging 
stops on agenda items (if drag-and-drop is enabled.)</li>

<br>

<li> New <b>deleteAllAgendaItems(calId)</b> method to delete all agenda items in the calendar.</li>

<br>

<li> Updated initialization for <b>applyAgendaTooltipCallback(divElm,agendaItem)</b>, <b>agendaDragStartCallback(eventObj,divElm,agendaItem)</b>, 
and <b>agendaDragStopCallback(eventObj,divElm,agendaItem)</b> callbacks.
<xmp>
var jfcalplugin = $("#mycal").jFrontierCal({
	date: new Date(),
	dayClickCallback: myDayClickHandler,
	agendaClickCallback: myAgendaClickHandler,
	agendaDropCallback: myAgendaDropHandler,
	agendaMouseoverCallback: myAgendaMouseoverHandler,
	applyAgendaTooltipCallback: myApplyTooltip,
	agendaDragStartCallback : myAgendaDragStart,
	agendaDragStopCallback : myAgendaDragStop,
	dragAndDropEnabled: true
}).data("plugin");
</xmp>
</li>

<br>

<li> This version (like 1.2) still requires the jquery core fix for drag-and-drop under IE. I'd like to fix this so it's not required...</li>

</ul>

<br>

<p>
<b>June 17th, 2010 - Version 1.2:</b>
<ul>
	<li>More Bug fixes</li>
	<br>
	<li>
		<b>CSS tweaks</b><br>
		New CSS attribute for the current day.<br>
		Arrows on agenda items that span weeks & months.
	</li>
	<br>
	<li>
		<b>Drag-and-drop agenda items!</b><br>
		This required a modification to the jQuery Core library to enable drag-and-drop to work correctly in Internet Explorer.
		If you don't care about IE than you can use an unmodified version of the jQuery Core library. Everything works fine in Chrome, Firefox, Opera, and Safari without the fix.
		There is a readme file inlcuded with this plugin, <a href="js/jquery-core/README-IE-FIX.TXT">query-frontier-cal-x.x/js/jquery-core/README-IE-FIX.TXT</a>, 
		that explains what was modified. Only one line was changed so not that big of a deal....
	</li>
	<br>
	<li>
		<b>The jfcalplugin.addAgendaItem() method changed slightly.</b><br>
		The new method signature is jfcalplugin.addAgendaItem(calId,title,startDate,endDate,allDay,data,displayProp).
		The new parameter is the boolean value 'allDay' which did not exist in version 1.1. This is a flag that tells the calendar the agenda item is an all day event. If you want
		the same exact functionality as version 1.1 then simply pass in 'false'. If you pass in 'true' then the start time will not be displayed on the agenda item.
	</li>
	<br>
	<li>
		All the getAgendaItem methods return an updated agenda object which inlcudes the allDay flag.
<xmp>
{
	agendaId: [integer],
	title: [string]
	startDate: [Date],
	endDate: [Date],
	allDay: [boolean],
	data: {
		key1: [value1],
		key2: [value2],
		etc...
	},
	displayProp: {
		backgroundColor: [string],
		foregroundColor: [string]
	}
}
</xmp>		
	</li>
	<br>
	<li>
		<b>The constructor/initialize method changed slightly.</b><br>
		There is a new boolean parameter called dragAndDropEnabled which allows you to turn off drag-and-drop. This is enabled by default.
<xmp>
var jfcalplugin = $('selector').jFrontierCal(date,dayClickCallback,agendaClickCallback,agendaDropCallback,dragAndDropEnabled)
</xmp>
	</li>	
</ul>
</p>


<p>
<b>June 14th, 2010 - Version 1.1:</b>
<ul>
	<li>Bug fixes</li>
	<br>
	<li>CSS tweaks</li>
	<br>
	<li>Performance tweaks...Yes, it runs slow in IE...</li>
	<br>
	<li>Basic VEVENT iCal support.</li>
</ul>
</p>

<p>
<b>June 9th, 2010 - Version 1.0: Initial release.</b>
</p>
	
	</div>

</div><!-- end tabs -->

<p>&nbsp;</p>


</body>
</html>