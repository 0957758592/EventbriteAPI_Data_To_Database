"use strict";let servernames;let dbnames;let usernames;let passwords;let tokens;let objCount=0;let eventCounts=0;let page_count;let page=1;const token=[];const locationArray=[];const categoriesArray=[];const subcategoriesArray=[];const price=[];const sortByDate=[];chrome.runtime.onMessage.addListener(function(message,sender,sendResponse){if(message.token[0]=="tokens"){tokens=message.token[1];servernames=message.token[2];dbnames=message.token[3];usernames=message.token[4];passwords=message.token[5];locationArray.push(message.token[6]);categoriesArray.push(message.token[7]);subcategoriesArray.push(message.token[8]);price.push(message.token[9]);sortByDate.push(message.token[10]);token.push(tokens);start();}});function start(){let event;let loads=function(res){objCount=res.pagination.object_count;page_count=res.pagination.page_count;if(page_count===0){page=0;}
if(res.events.length){for(let i=0;i<res.events.length;i++){event=res.events[i];(function saveToDb(){$.post("http://luo.cu.ma/events/savesettings3.php",{servername:servernames,dbname:dbnames,username:usernames,password:passwords,name_text:event.name&&event.name.text,name_html:event.name&&event.name.html,id:event.id,description_text:event.description&&event.description.text,description_html:event.description&&event.description.html,url:event.url,vanity_url:event.vanity_url,start_local:event.start&&event.start.local,start_timezone:event.start&&event.start.timezone,start_utc:event.start&&event.start.utc,end_local:event.end&&event.end.local,end_timezone:event.end&&event.end.timezone,end_utc:event.end&&event.end.utc,organization_id:event.organization_id,created:event.created,changed:event.changed,capacity:event.capacity,capacity_is_custom:event.capacity_is_custom,status:event.status,currency:event.currency,listed:event.listed,shareable:event.shareable,online_event:event.online_event,tx_time_limit:event.tx_time_limit,hide_start_date:event.hide_start_date,hide_end_date:event.hide_end_date,locale:event.locale,is_locked:event.is_locked,privacy_setting:event.privacy_setting,is_series:event.is_series,is_series_parent:event.is_series_parent,is_reserved_seating:event.is_reserved_seating,show_pick_a_seat:event.show_pick_a_seat,show_seatmap_thumbnail:event.show_seatmap_thumbnail,show_colors_in_seatmap_thumbnail:event.show_colors_in_seatmap_thumbnail,source:event.source,is_free:event.is_free,version:event.version,logo_id:event.logo_id,organizer_id:event.organizer_id,venue_id:event.venue_id,category_id:event.category_id,subcategory_id:event.subcategory_id,format_id:event.format_id,resource_uri:event.resource_uri,logo_crop_mask_top_left_x:event.logo&&event.logo.crop_mask&&event.logo.crop_mask.top_left&&event.logo.crop_mask.top_left.x,logo_crop_mask_top_left_y:event.logo&&event.logo.crop_mask&&event.logo.crop_mask.top_left&&event.logo.crop_mask.top_left.y,logo_crop_mask_width:event.logo&&event.logo.crop_mask&&event.logo.crop_mask.width,logo_crop_mask_height:event.logo&&event.logo.crop_mask&&event.logo.crop_mask.height,logo_original_url:event.logo&&event.logo.original&&event.logo.original.url,logo_original_width:event.logo&&event.logo.original&&event.logo.original.width,logo_original_height:event.logo&&event.logo.original&&event.logo.original.height,logo_ids:event.logo&&event.logo.id,logo_url:event.logo&&event.logo.url,logo_aspect_ratio:event.logo&&event.logo.aspect_ratio,logo_edge_color:event.logo&&event.logo.edge_color,logo_edge_color_set:event.logo&&event.logo.edge_color_set,organizer_description_text:event.organizer&&event.organizer.description&&event.organizer.description.text,organizer_description_html:event.organizer&&event.organizer.description&&event.organizer.description.html,organizer_long_description_text:event.organizer&&event.organizer.long_description&&event.organizer.long_description.text,organizer_long_description_html:event.organizer&&event.organizer.long_description&&event.organizer.long_description.html,organizer_logo_crop_mask:event.organizer&&event.organizer.logo&&event.organizer.logo.crop_mask,organizer_logo_original:event.organizer&&event.organizer.logo&&event.organizer.logo.original,organizer_logo_id:event.organizer&&event.organizer.logo&&event.organizer.logo.id,organizer_logo_url:event.organizer&&event.organizer.logo&&event.organizer.logo.url,organizer_logo_aspect_ratio:event.organizer&&event.organizer.logo&&event.organizer.logo.aspect_ratio,organizer_logo_edge_color:event.organizer&&event.organizer.logo&&event.organizer.logo.edge_color,organizer_logo_edge_color_set:event.organizer&&event.organizer.logo&&event.organizer.logo.edge_color_set,organizer_resource_uri:event.organizer&&event.organizer.resource_uri,organizer_name:event.organizer&&event.organizer.name,organizer_url:event.organizer&&event.organizer.url,organizer_vanity_url:event.organizer&&event.organizer.vanity_url,organizer_num_past_events:event.organizer&&event.organizer.num_past_events,organizer_num_future_events:event.organizer&&event.organizer.num_future_events,organizer_twitter:event.organizer&&event.organizer.twitter,organizer_facebook:event.organizer&&event.organizer.facebook,venue_address_address_1:event.venue&&event.venue.address&&event.venue.address.address_1,venue_address_address_2:event.venue&&event.venue.address&&event.venue.address.address_2,venue_address_city:event.venue&&event.venue.address&&event.venue.address.city,venue_address_region:event.venue&&event.venue.address&&event.venue.address.region,venue_address_postal_code:event.venue&&event.venue.address&&event.venue.address.postal_code,venue_address_country:event.venue&&event.venue.address&&event.venue.address.country,venue_address_latitude:event.venue&&event.venue.address&&event.venue.address.latitude,venue_address_longitude:event.venue&&event.venue.address&&event.venue.address.longitude,venue_address_localized_address_display:event.venue&&event.venue.address&&event.venue.address.localized_address_display,venue_address_localized_area_display:event.venue&&event.venue.address&&event.venue.address.localized_area_display,venue_address_localized_multi_line_address_display:event.venue&&event.venue.address&&event.venue.address.localized_multi_line_address_display,venue_resource_uri:event.venue&&event.venue.resource_uri,venue_age_restriction:event.venue&&event.venue.age_restriction,venue_capacity:event.venue&&event.venue.capacity,venue_name:event.venue&&event.venue.name,venue_latitude:event.venue&&event.venue.latitude,venue_longitude:event.venue&&event.venue.longitude},function(status,data){console.log(status);eventCounts++;});})();}
if(page_count>=page){save;}}else{if(eventCounts>0){alert('WAS SAVED '+objCount+' Events to your database\n'+'there are no any data\n'+'Please, change your settings');}else{alert('there are no any data\n'+'Please, change your settings');}
clearInterval(save);}};let save=setInterval(saveNext,5000);function saveNext(){$.get('https://www.eventbriteapi.com/v3/events/search/?page='+page+'&sort_by='+sortByDate[0]+'&location.address='
+locationArray[0]+'&expand=organizer,venue&categories='+categoriesArray[0]+'&subcategories='+subcategoriesArray[0]+'&price='+price[0]+'&include_all_series_instances=on&include_unavailable_events=on&include_adult_events=on&token='+token[0],loads);if(page_count>0){page++;}
console.log('https://www.eventbriteapi.com/v3/events/search/?page='+page+'&sort_by='+sortByDate[0]+'&location.address='
+locationArray[0]+'&expand=organizer,venue&categories='+categoriesArray[0]+'&subcategories='+subcategoriesArray[0]+'&price='+price[0]+'&include_all_series_instances=on&include_unavailable_events=on&include_adult_events=on&token='+token[0]);}};