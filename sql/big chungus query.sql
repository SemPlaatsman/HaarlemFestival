#join  restaurnat
SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price`, `item`.`total_price` , `item`.`VAT`, 
`restaurant`.`name` as 'where', '' as 'who', `reservation`.`datetime` as 'when'  FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  
JOIN `reservation` on `item`.`event_id` = `reservation`.`item_id`
JOIN `restaurant` on `reservation`.`restaurant_id`  = `restaurant`.`id`

UNION ALL

#join dance
SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price`, `item`.`total_price` , `item`.`VAT`, 
`venue`.`name` as 'where', `artist`.`name` as 'who', `performance`.`start_date` as 'when' FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  
JOIN `ticket_dance` on `ticket_dance`.`item_id`= `item`.`event_id`
JOIN `performance` on `ticket_dance`.`performance_id` = `performance`.`id`
JOIN `artist` on  `performance`.`id` =  `artist`.`id`
JOIN `venue` on `performance`.`id` = `venue`.`id`

UNION ALL

#join history
SELECT `orders`.`id`,`time_payed`,`payment_status`, `item`.`total_price`, `item`.`total_price` , `item`.`VAT`, 
`history_tours`.`gathering_location` as 'where', '' as 'who' ,`history_tours`.`datetime` as 'when'  FROM `orders` 

JOIN `item` on `item`.`order_id` = `orders`.`id`  

JOIN `ticket_history` on `ticket_history`.`item_id`= `item`.`id`
JOIN `history_tours` on `ticket_history`.`tour_id` = `history_tours`.`id`

WHERE `payment_status` = TRUE; 