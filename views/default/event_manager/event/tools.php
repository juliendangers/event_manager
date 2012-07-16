<?php 

	$event = $vars["entity"];

	$toolLinks = '<span class="event_manager_event_actions">'.elgg_echo('tools').'</span><ul class="event_manager_event_actions_drop_down">';
	if($event->canEdit()) {
		$toolLinks .= '<li><a href="/events/event/edit/'.$event->getGUID().'">'.elgg_echo("event_manager:event:editevent").'</a></li>';
		$toolLinks .= '<li>'.elgg_view("output/confirmlink", array("href" => $vars["url"] . "action/event_manager/event/delete?guid=" . $event->getGUID(), "text" => elgg_echo("event_manager:event:deleteevent"))).'</li>';
		$toolLinks .= '<li><a href="/events/event/upload/'.$event->getGUID().'">'.elgg_echo("event_manager:event:uploadfiles").'</a></li>';
		if($event->registration_needed)	{
			$toolLinks .= '<li><a href="/events/registrationform/edit/'.$event->getGUID().'">'.elgg_echo("event_manager:event:editquestions").'</a></li>';
		}
		
		$toolLinks .= '<li>' . elgg_view("output/url", array("is_action" => true, "href" => "action/event_manager/attendees/export?guid=" . $event->getGUID(), "text" => elgg_echo("event_manager:event:exportattendees"))) . '</li>';
	}
	$toolLinks .= '<li><a href="'.$vars["url"].'mod/event_connector/export_event.php?event_id='.$event->getGUID().'">'.elgg_echo("event_manager:event:export").'</a></li>';
	$toolLinks .= '</ul></span>';
	
	echo $toolLinks;